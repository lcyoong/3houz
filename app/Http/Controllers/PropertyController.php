<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Traits\ControllerTrait;
use App\Property;
use App\Postcode;
use App\State;
use App\General;
use App\PropertyType;
use App\PropertyUnlock;
use App\Http\Requests\CreateProperty;
use App\Http\Requests\EditProperty;

class PropertyController extends Controller
{
    use ControllerTrait;
    protected $propertyRepo;
    protected $general;

    public function __construct(Property $propertyRepo, General $general)
    {
        $this->propertyRepo = $propertyRepo;

        $this->general = $general;

        $this->parm = ['search_path'=>'property/search', 'search'=>'src_prop'];
    }

    //
    public function index()
    {
        $props = $this->listing();

        $page_title = trans('property.title_listing');

        return view('property.list', compact('props', 'page_title') + $this->parm);
    }

    public function listOwn(Request $request)
    {
        $props = $this->listing(auth()->user()->id);

        $page_title = trans('property.title_my_listing');

        return view('property.list', compact('props', 'page_title') + $this->parm);
    }

		protected function listing($owner = null)
    {
        return $this->propertyRepo->filterOwner($owner)
																	->joinMember()
                                  ->joinProject()
																	->filter(session()->get('src_prop', []))
                                  ->orderBy('prop_id', 'desc')
																	->getPaginated();
    }

    public function create()
    {
        $page_title = trans('property.title_create');

        $go_back = 'property';

        $state = State::active()->toDropDown('state_code', 'state_name');

        // $postcode = Postcode::groupBy('post_office')->toDropDown('post_office', 'post_office');

        $tenure = $this->general->outputDropDown('prop_tenure');

        $furnish = $this->general->outputDropDown('prop_furnish');

        $type = PropertyType::where('prty_status', '=', 'active')->toDropDown('prty_id', 'prty_description');

        return view('property.create', compact('page_title', 'go_back', 'state', 'tenure', 'furnish', 'type') + $this->parm);
    }

    public function store(CreateProperty $request)
    {
        $input = $request->all();

        // dd($input);

        $this->propertyRepo->create($input);

        return redirect('property')->with('status', trans('common.store_successful'));
    }

    public function edit(Property $prop)
    {
        $page_title = trans('property.title_edit');

        $go_back = 'property';

        $this->authorize('update', $prop);

        $postcode = Postcode::groupBy('post_office')->toDropDown('post_office', 'post_office');

        $tenure = $this->general->outputDropDown('prop_tenure');

        $furnish = $this->general->outputDropDown('prop_furnish');

        $type = PropertyType::where('prty_status', '=', 'active')->toDropDown('prty_id', 'prty_description');

        return view('property.edit', compact('page_title', 'go_back', 'prop', 'tenure', 'furnish', 'postcode', 'type'));
    }

    public function update(EditProperty $request)
    {
        $input = $request->all();

        $this->propertyRepo->find($input['prop_id'])->update($input);

        return redirect()->back()->with('status', trans('common.save_successful'));
    }

    public function delete(Property $prop)
    {
        $this->authorize('update', $prop);

        return view('property.delete', compact('prop'));
    }

    public function destroy(Request $request)
    {
        $input = $request->all();

        $this->propertyRepo->find($input['prop_id'])->delete();

        return redirect()->back()->with('status', trans('common.save_successful'));
    }

    public function unlock(Property $property)
    {
        return PropertyUnlock::firstOrCreate(['pul_owner'=>auth()->user()->id, 'pul_property'=>$property->prop_id]);
    }

    // public function images(Property $prop)
    // {
    //     $this->authorize('update', $prop);
    //
    //     return view('property.images', compact('prop'));
    // }
}
