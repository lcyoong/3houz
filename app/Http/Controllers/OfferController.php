<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Traits\ControllerTrait;
use App\Http\Requests\CreateOffer;
use App\Property;
use App\Offer;
use App\OfferKey;
use App\General;

class OfferController extends Controller
{
  use ControllerTrait;

  public function __construct()
  {
      $this->parm = ['search_path'=>'offer/search', 'search'=>'src_offer'];
  }

  public function index()
  {
    $offer_repo = new  Offer;

    $offers = $offer_repo->filterOwner(auth()->user()->id)
                              ->orderBy('of_id', 'desc')
                              ->getPaginated();

    $page_title = trans('offer.title_listing_received');

    return view('offer.list_received', compact('offers', 'page_title') + $this->parm);

  }

  public function listGiven()
  {
    $offer_repo = new  Offer;

    $offers = $offer_repo->filterBuyer(auth()->user()->id)
                              ->orderBy('of_id', 'desc')
                              ->getPaginated();

    $page_title = trans('offer.title_listing_given');

    return view('offer.list_given', compact('offers', 'page_title') + $this->parm);

  }

  public function create(Property $property)
  {
    $key_exists = $this->checkKey($property, auth()->user());

    $existing = Offer::where('of_property', '=', $property->prop_id)->where('of_buyer', '=', auth()->user()->id)->first();

    $page_title = trans('offer.title_create');

    $owner = $property->owner;

    if ($existing) {
      return view('offer.existing', compact('property', 'page_title', 'owner', 'existing'));
    } else {
      return view('offer.create', compact('property', 'page_title', 'owner', 'key_exists'));
    }
  }

  // public function preview(CreateOffer $request)
  // {
  //   $offer = $request->input();
  //
  //   session()->put('new_offer', $offer);
  //
  //   return view('offer.preview', compact('offer'));
  // }

  public function store(CreateOffer $request)
  {
    $input = $request->except(['_token', 'agree']);

    $created = Offer::create($input);

    return redirect('offer')->with('status', trans('common.store_successful'));
  }

  public function display(Offer $offer)
  {
    $property = $offer->property;

    return view('offer.view', compact('offer', 'property'));
  }

  public function edit(Offer $offer)
  {
    $this->authorize('update', $offer);

    $page_title = trans('offer.title_edit');

    $go_back = 'offer';

    $property = $offer->property;

    $general = new General;

    $dd_status = $general->outputDropDown('of_status');

    return view('offer.edit', compact('offer', 'property', 'go_back', 'page_title', 'dd_status'));
  }

  public function update(Request $request)
  {
      $input = $request->only(['of_status', 'of_owner_remarks', 'of_id']);

      $updated = Offer::find(array_get($input, 'of_id'))->update($input);

      return redirect()->back()->with('status', trans('common.save_successful'));
  }

  protected function checkKey($property, $buyer)
  {
      $offerkey = OfferKey::where('ofk_property', '=', $property->prop_id)->where('ofk_buyer', '=', $buyer->id)->first();

      return is_null($offerkey) ? false : true;
  }


}
