<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

	protected $table = 'events';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'city', 'date'
	];

	/**
	 * members through pivot table
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */

	public function members()
	{
		return $this->belongsToMany('App\Member', 'event_members');
	}
}