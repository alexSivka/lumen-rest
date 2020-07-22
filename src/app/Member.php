<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{


	protected $table = 'members';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name', 'last_name', 'email'
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	/**
	 * events through pivot table
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 *
	 */
	public function events()
	{
		return $this->belongsToMany('App\Event', 'event_members');
	}
}