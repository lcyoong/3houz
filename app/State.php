<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class State extends Model
{
  use ModelTrait;

  public function scopeActive($query)
  {
      return $query->where('state_status', '=', 'active');
  }

}
