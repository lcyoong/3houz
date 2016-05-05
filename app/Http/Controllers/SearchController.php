<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Traits\ControllerTrait;
use Session;

use App\Property;
use App\Postcode;
use App\PropertyType;
use App\General;
use App\PropertyUnlock;
use DB;

class SearchController extends BaseController
{
    use ControllerTrait;
    protected $propRepo;
    protected $param;

    public function __construct(Property $propRepo)
    {
        $this->propRepo = $propRepo;

        $general = new General;

        $search_cache = session()->get('search_cache', []);

        $postcode = Postcode::groupBy('post_office')->toDropDown('post_office', 'post_office');

        $type = PropertyType::where('prty_status', '=', 'active')->toDropDown('prty_id', 'prty_description');

        $dd_sort = $general->outputDropDown('sort_search');

        $sort_search = session()->get('sort_search', []);

        $this->parm = compact('postcode', 'type', 'search_cache', 'dd_sort', 'sort_search');
    }

    public function index()
    {
        return view('public.index', $this->parm);
    }

    public function search(Request $request)
    {
        // if ($request->isMethod('post')) {
            Session::put('search_cache', $request->except('_token'));
        // }

        $search_cache = Session::get('search_cache', []);

        $sort_by = session()->get('sort_search');

        $result = $this->propRepo->select('properties.*')->filter($search_cache)->withPicture()->joinProject()->sort($sort_by)->getPaginated();

        $title = implode(', ', array_values(array_filter($search_cache))) . ' ' . config('3houz.title');

        return view('public.result', compact('result', 'search_cache', 'title') + $this->parm);
    }

    public function propertyDetail(Property $property)
    {
        $query_str = http_build_query(session()->get('search_cache', []));

        $pics = $property->pictures;

        $property->increment('prop_view');

        // $owner = $property->owner;

        $property = $this->propRepo->select('properties.*')->where('prop_id', '=', $property->prop_id)->joinType()->withPicture()->first();

        $project = $property->project;

        $title = $project->prj_name . ', ' . $property->prop_location . ' ' . config('3houz.title');

        $page_desc = $project->prj_name . ', ' . $property->prop_location . ' - ' . $property->prop_description;

        $page_img = url('property-pic/' . $property->pic_path);

        return view('public.property_detail', compact('property', 'pics', 'title', 'page_desc', 'page_img', 'query_str') + $this->parm);
    }

    public function ownerDetail(Property $property)
    {
        $unlocked = false;

        if (auth()->check()) {
          $unlocked = PropertyUnlock::where('pul_owner', '=', auth()->user()->id)->where('pul_property', '=', $property->prop_id)->count() > 0 ? true : false;
        }

        $owner = $property->owner;

        return view('public.owner_detail', compact('property', 'owner', 'unlocked') + $this->parm);

    }
}
