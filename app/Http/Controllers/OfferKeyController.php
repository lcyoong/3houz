<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Traits\ControllerTrait;
use App\Http\Requests;
use App\Http\Requests\CreateOfferKey;
use App\Property;
use App\OfferKey;

class OfferKeyController extends Controller
{
    use ControllerTrait;

    public function __construct()
    {
        $this->parm = ['search_path'=>'offer_key/search', 'search'=>'src_offer_key'];
    }

    public function index()
    {
      $page_title = trans('offer_key.title_listing');

      $keys = Offerkey::where('prop_owner', '=', auth()->user()->id)->joinBuyer()->joinProperty()->joinProject()->getPaginated();

      return view('offer_key.list', compact('keys', 'page_title'));
    }

    public function createByBuyer(Property $property)
    {
      $buyer = auth()->user();

      return view('offer_key.create_buyer', compact('property', 'buyer'));
    }

    public function storeByBuyer(Property $property, CreateOfferKey $request)
    {
      $input = $request->input();

      // $ofk = new OfferKey;

      return OfferKey::create(['ofk_property' => array_get($input, 'ofk_property'), 'ofk_buyer'=>$request->user()->id]);

      // $vld = $ofk->validateAfter($input, $property);

      // if (!is_null($vld)) return $vld;

    }

    public function delete(OfferKey $key)
    {
        $this->authorize('update', $key);

        $buyer = $key->buyer;

        return view('offer_key.delete', compact('key', 'buyer'));
    }

    public function destroy(Request $request)
    {
        $input = $request->all();

        OfferKey::find($input['ofk_id'])->delete();

        return redirect()->back()->with('status', trans('common.save_successful'));
    }

}
