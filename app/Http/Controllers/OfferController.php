<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Traits\ControllerTrait;
use App\Http\Requests\CreateOffer;
use App\Property;
use App\Offer;
use App\OfferKey;

class OfferController extends Controller
{
  use ControllerTrait;

  public function __construct()
  {

  }

  public function index()
  {

  }

  public function create(Property $property)
  {
    // Prompt key enter if not found
    // if (!$this->checkKey($property, auth()->user())) {
    //   return redirect('property/'.$property->prop_id.'/offer_key');
    // }
    $key_exists = $this->checkKey($property, auth()->user());

    $page_title = trans('offer.title_create');

    $owner = $property->owner;

    return view('offer.create', compact('property', 'page_title', 'owner', 'key_exists'));
  }

  public function preview(CreateOffer $request)
  {
    $offer = $request->input();

    return view('offer.preview', compact('offer'));
  }

  public function store(CreateOffer $request)
  {
    Offer::create($request->input());

    return redirect('property')->with('status', trans('common.store_successful'));
  }

  protected function checkKey($property, $buyer)
  {
      $offerkey = OfferKey::where('ofk_property', '=', $property->prop_id)->where('ofk_buyer', '=', $buyer->id)->first();

      return is_null($offerkey) ? false : true;
  }


}
