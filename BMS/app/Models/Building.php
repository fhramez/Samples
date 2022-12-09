<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Building extends Model
{
    use HasFactory;

	public function managers()
	{
		return $this->belongsToMany(User::class, 'manager_building');
	}

	public function apartments()
	{
		return $this->hasMany(Apartment::class, 'building_id', 'id');
	}

	public function announcements()
	{
		return $this->hasMany(Announcement::class, 'building_id', 'id');
	}

	public function transactions()
	{
		return $this->hasMany(Transaction::class, 'building_id', 'id');
	}

	public function isManager()
	{
		if (Auth::user()->buildings()->find($this->id) != NULL)
			return true;
		else
			return false;
		
		// Another algorithm:
		//  $Build = Auth::user()->buildings;
		//  $ismanager = false;
		//  foreach($Build as $B)
		//  	if($B->id == $building->id)
		// 		$ismanager = true;
	}
}
