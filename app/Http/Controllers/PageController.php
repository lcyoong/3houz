<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ControllerTrait;

use App\Http\Requests;
use App\Property;
use App\Postcode;
use App\PropertyType;
use App\General;

class PageController extends Controller
{
  use ControllerTrait;
  protected $propRepo;
  protected $param;

  public function __construct(Property $propRepo)
  {
      $this->propRepo = $propRepo;

      $general = new General;

      $search_cache = session()->get('search_cache', []);

      // $postcode = Postcode::groupBy('post_office')->toDropDown('post_office', 'post_office');

      $type = PropertyType::where('prty_status', '=', 'active')->toDropDown('prty_id', 'prty_description');

      $dd_sort = $general->outputDropDown('sort_search');

      $sort_search = session()->get('sort_search', []);

      $this->parm = compact('type', 'search_cache', 'dd_sort', 'sort_search');
  }

    public function faq()
    {
        return view('public.faq');
    }

    public function contact()
    {
        return view('public.contact', $this->parm);
    }

}
