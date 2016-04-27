<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyUnlock extends Model
{
    protected $fillable = ['pul_owner', 'pul_property'];
}
