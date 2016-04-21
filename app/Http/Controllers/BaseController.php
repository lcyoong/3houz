<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BaseController extends Controller
{
  public function __construct()
  {
  }

  // sort search
  public function sortSearch(Request $request)
  {
      $request->session()->forget('sort_search');

      $request->session()->put('sort_search', $request->input('sort_search'));

      $message = trans('form.sort_content');

      // return General::jsonGoodResponse($message);
      return response()->json(['message'=>'OK']);
  }
}
