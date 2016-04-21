<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class Project extends Model
{
    use ModelTrait;

    protected $primaryKey = 'prj_id';
}
