<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class PropertyFavourites extends Model
{
  use ModelTrait;

  protected $table = 'property_favourites';
  protected $primaryKey = 'fav_id';
  protected $fillable = ['fav_owner', 'fav_property'];

  public function owner()
  {
      return $this->belongsTo('App\User', 'fav_owner');
  }

  public function property()
  {
      return $this->belongsTo('App\Property', 'fav_property');
  }

  public function scopeFilterOwner($query, $owner = null)
  {
      if (!is_null($owner)) {
          $query->where('fav_owner', '=', $owner);
      }
  }

  public function scopeJoinMember($query)
  {
      $query->join('users', 'id', '=', 'fav_owner');
  }

  public function scopeJoinProperty($query)
  {
      $query->join('properties', 'prop_id', '=', 'fav_property');
  }

  public function isFavourite($prop_id, $user_id)
  {
      return $this->where('fav_owner', '=', $user_id)->where('fav_property', '=', $prop_id)->first();
  }

  public function scopeFilter($query, $filter = [])
  {
      if (array_get($filter, 'fav_property')) {
          $query->where('fav_property', '=', $filter['fav_property']);
      }
      if (array_get($filter, 'fav_owner')) {
          $query->where('fav_owner', '=', $filter['fav_owner']);
      }
  }

  public function scopeWithOwner($query)
  {
      return $query->addSelect('name', 'email', 'tel_no')->join('users', 'id', '=', 'fav_owner');
  }

  public function scopeWithProperty($query)
  {
      return $query->addSelect('properties.*')->join('properties', 'prop_id', '=', 'fav_property');
  }

}
