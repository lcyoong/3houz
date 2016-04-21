<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Traits\ControllerTrait;
use App\General;
use App\Project;

class ProjectController extends Controller
{
  use ControllerTrait;
  protected $projectRepo;
  protected $general;

  public function __construct(Project $projectRepo, General $general)
  {
      $this->projectRepo = $projectRepo;

      $this->general = $general;
  }

  public function autoCompleteProject(Request $request)
  {
      $input = $request->all();

      $result = $this->projectRepo->where('prj_name', 'like', '%'.$input['term'].'%')->selectRaw('prj_id, prj_name, prj_state, prj_location')->toJson();

      return $result;
  }

  public function autoCompleteLocations(Request $request)
  {
      $input = $request->all();

      $result = $this->projectRepo->where('prj_location', 'like', '%'.$input['term'].'%')->groupBy('prj_location')->selectRaw('prj_location')->toJson();

      return $result;
  }

}
