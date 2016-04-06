<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Traits\ControllerTrait;

use App\Property;
use App\Postcode;
use App\PropertyType;

class SearchController extends Controller
{
    use ControllerTrait;
    protected $propRepo;
    protected $param;

    public function __construct(Property $propRepo)
    {
        $this->propRepo = $propRepo;

        $postcode = Postcode::groupBy('post_office')->toDropDown('post_office', 'post_office');

        $type = PropertyType::where('prty_status', '=', 'active')->toDropDown('prty_id', 'prty_description');

        $this->parm = compact('postcode', 'type');
    }

    public function index()
    {
        return view('public.index', $this->parm);
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $result = $this->propRepo->filter($request->all())->withPicture()->getPaginated();

        return view('public.result', compact('result') + $this->parm);
    }

    public function propertyDetail(Property $property)
    {
        $pics = $property->pictures;

        $owner = $property->owner;

        $property = $this->propRepo->select('properties.*')->where('prop_id', '=', $property->prop_id)->joinType()->first();

        return view('public.property_detail', compact('property', 'pics', 'owner'));
    }
}
