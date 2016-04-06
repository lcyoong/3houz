<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class General extends Model
{
    use ModelTrait;
    //
    public function outputDropDown($group)
    {
        return $this->where('gen_group', '=', $group)->where('gen_status', '=', 'active')->toDropDown('gen_code', 'gen_value');
    }
}
