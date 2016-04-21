<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;
use App\Picture;

class Property extends Model
{
    use ModelTrait;

    protected $table = 'properties';
    protected $primaryKey = 'prop_id';
    protected $fillable = ['prop_label', 'prop_name', 'prop_type', 'prop_tenure', 'prop_furnishing', 'prop_description', 'prop_location', 'prop_type', 'prop_no_bedrooms', 'prop_no_bathrooms', 'prop_built_up', 'prop_furnishing', 'prop_direction', 'prop_occupied', 'prop_price', 'prop_owner', 'prop_reference', 'prop_state', 'prop_created_by'];

    public function scopeJoinMember($query)
    {
        $query->join('users', 'id', '=', 'prop_owner');
    }

    public function member()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public static function boot()
    {
        Property::creating(function ($post) {
            $post['prop_created_by'] = auth()->user()->id;
        });
    }

    public function scopeFilter($query, $filter = [])
    {
        if (array_get($filter, 'search_type')) {
            $query->where('prop_type', '=', $filter['search_type']);
        }
        if (array_get($filter, 'search_location')) {
            $query->where('prop_location', '=', $filter['search_location']);
        }
        if (array_get($filter, 'search_price_range')) {
            $query->whereBetween('prop_price', explode(',', $filter['search_price_range']));
        }
        if (array_get($filter, 'search_price_from')) {
            $query->where('prop_price', '>=', $filter['search_price_from']);
        }
        if (array_get($filter, 'search_price_to')) {
            $query->where('prop_price', '<=', $filter['search_price_to']);
        }
    }

    public function scopeSort($query, $sort = null)
    {
        if ($sort == 'alpha_asc') {
            $query->orderBy('prj_name', 'asc');
        } elseif ($sort == 'created_desc') {
            $query->orderBy('properties.created_at', 'desc');
        } elseif ($sort == 'created_asc') {
            $query->orderBy('properties.created_at', 'asc');
        }
    }

    public function scopeFilterOwner($query, $owner = null)
    {
        if (!is_null($owner)) {
            $query->where('prop_owner', '=', $owner);
        }
    }

    public function pictures()
    {
        return $this->hasMany('App\Picture', 'pic_proprietor');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'prop_owner');
    }

    public function project()
    {
        return $this->belongsTo('App\Project', 'prop_name');
    }

    public function addPicture(Picture $pic)
    {
        $this->pictures()->save($pic);
    }

    public function scopeLatest($query)
    {
        return $query->where('prop_status', '=', 'active');
    }

    public function scopeWithPicture($query)
    {
        return $query->leftJoin('picture', 'prop_id', '=', 'pic_proprietor')->groupBy('prop_id');
    }

    public function scopeWithOwner($query)
    {
        return $query->addSelect('name', 'email', 'tel_no')->join('users', 'id', '=', 'prop_owner');
    }

    public function scopeJoinType($query)
    {
        return $query->addSelect('prty_description')->leftJoin('property_types', 'prop_type', '=', 'prty_id');
    }

    public function scopeJoinProject($query)
    {
        return $query->join('projects', 'prop_name', '=', 'prj_id');
    }

}
