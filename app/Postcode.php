<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class Postcode extends Model
{
    use ModelTrait;
    protected $table = 'postcode';
}
