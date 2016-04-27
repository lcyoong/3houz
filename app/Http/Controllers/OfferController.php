<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Traits\ControllerTrait;
use App\Http\Requests\CreateOffer;
use App\Property;
use App\Offer;

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
    $page_title = trans('offer.title_create');

    $owner = $property->owner;

    return view('offer.create', compact('property', 'page_title', 'owner'));
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


}
