<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
// use App\Traits\ModelTrait;

class OfferKey extends BaseModel
{
    // use ModelTrait;
    protected $table = 'offer_keys';
    protected $primaryKey = 'ofk_id';
    protected $fillable = ['ofk_property', 'ofk_buyer'];

    public function store($input)
    {
      $this->validate($input, $rules);
    }

    public function validateAfter($input, $property)
    {
      $validator = Validator::make($input, []);

      $validator->after(function($validator) use($property, $input) {
          if (!$property->isKey(array_get($input, 'ofk_key'))) {
              $validator->errors()->add('ofk_key', 'Something is wrong with this field!');
          }
      });

      if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
      }

      return null;

    }

    public function property()
    {
      return $this->belongsTo('App\Property', 'ofk_property');
    }

    public function buyer()
    {
      return $this->belongsTo('App\User', 'ofk_buyer');
    }

    public function scopeJoinBuyer($query)
    {
      return $query->join('users', 'id', '=', 'ofk_buyer');
    }

    public function scopeJoinProperty($query)
    {
      return $query->join('properties', 'prop_id', '=', 'ofk_property');
    }

    public function scopeJoinProject($query)
    {
      return $query->join('projects', 'prj_id', '=', 'prop_name');
    }

}
