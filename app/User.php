<?php

namespace App;

use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Traits\ModelTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;
    use ModelTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tel_no', 'facebook_id', 'avatar'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function member()
    {
        return $this->hasOne('App\Member', 'mb_user_id');
    }

    public function owns($related, $field = 'user_id')
    {
        return $this->id === $related->$field;
    }

    // public function roles()
    // {
        // return $this->hasMany('App\Role', '');
    // }

    public function scopeFilter($query, $filter = [])
    {
        return $query->where(function ($query) use ($filter) {
            if (array_get($filter, 'name')) {
                $query->where('name', 'LIKE', '%' . $filter['name'] . '%');
            }
            if (array_get($filter, 'email')) {
                $query->where('email', 'LIKE', '%' . $filter['email'] . '%');
            }
            if (array_get($filter, 'tel_no')) {
                $query->where('tel_no', 'LIKE', '%' . $filter['tel_no'] . '%');
            }
        });
    }
}
