<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $fillable = ['mb_user_id'];
	
	/**
	 * Get the user associated with the member.
	 */
	public function user()
	{
		return $this->belongsTo('App\User', 'id');
	}	
}
