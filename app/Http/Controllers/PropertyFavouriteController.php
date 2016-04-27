<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PropertyFavourites;
use App\Property;
use App\Http\Requests\AddFavourite;

class PropertyFavouriteController extends Controller
{
  public function __construct(PropertyFavourites $favRepo)
  {
      $this->favRepo = $favRepo;

      $this->parm = ['search_path'=>'favourite/search', 'search'=>'src_fav'];
  }

  public function index()
  {
      $favs = $this->listing();

      $page_title = trans('property_favourite.title_listing');

      return view('property_favourite.list', compact('favs', 'page_title') + $this->parm);
  }

  public function store(AddFavourite $request)
  {
      $input = $request->input();

      unset($input['_token']);

      return $this->favRepo->firstOrCreate($input);
  }

  public function destroy(Request $request)
  {
      return $this->favRepo->destroy($request->input('fav_id'));
  }

  public function isFavourite(Property $property)
  {
      if (auth()->check()) {
        return $this->favRepo->isFavourite($property->prop_id, auth()->user()->id);
      }
  }

  public function listOwn(Request $request)
  {
      $favs = $this->listing($request->user()->id);

      $page_title = trans('property_favourite.title_my_listing');

      return view('property_favourite.list', compact('favs', 'page_title') + $this->parm);
  }

  protected function listing($owner = null)
  {
      return $this->favRepo->filterOwner($owner)
                                ->joinMember()
                                ->joinProperty()
                                ->filter(session()->get($this->parm['search'], []))
                                ->getPaginated();
  }
}
