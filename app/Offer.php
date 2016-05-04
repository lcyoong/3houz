<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class Offer extends Model
{
    use ModelTrait;

    protected $table = 'offers';
    protected $primaryKey = 'of_id';
    protected $fillables = ['of_date', 'of_property', 'of_buyer', 'of_owner', 'of_property_address', 'of_buyer_name', 'of_buyer_address', 'of_buyer_ic',
                            'of_buyer_tel', 'of_owner_name', 'of_owner_ic', 'of_owner_tel', 'of_status', 'of_attachment_path', 'of_purchase_price',
                            'of_downpayment_percent', 'of_paid_within', 'of_grace_period', 'of_grace_interest_percent', 'of_special_conditions', 'of_owner_remarks'];
    protected $guarded = ['_token'];

    public static function boot()
    {
        Offer::creating(function ($post) {
            $post['of_status'] = 'pending';

            $post['of_date'] = date('Y-m-d', strtotime($post['of_date']));
        });
    }

    public function property()
    {
      return $this->belongsTo('App\Property', 'of_property');
    }

    public function buyer()
    {
      return $this->belongsTo('App\User', 'of_buyer');
    }

    public function owner()
    {
      return $this->belongsTo('App\User', 'of_owner');
    }

    public function scopeFilterOwner($query, $owner = null)
    {
        if (!is_null($owner)) {
            $query->where('of_owner', '=', $owner);
        }
    }

    public function scopeFilterBuyer($query, $owner = null)
    {
        if (!is_null($owner)) {
            $query->where('of_buyer', '=', $owner);
        }
    }

    public function scopeWithOwner($query)
    {
        return $query->addSelect('name', 'email', 'tel_no')->join('users', 'id', '=', 'of_owner');
    }

}
