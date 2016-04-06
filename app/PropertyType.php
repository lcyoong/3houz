<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class PropertyType extends Model
{
    use ModelTrait;
    //
    protected $table = 'property_types';
    protected $primaryKey = 'prty_id';
}
