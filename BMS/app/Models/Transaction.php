<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Transaction extends Model
{
    use HasFactory;

	public function building()
	{
		return $this->hasOne(Building::class, 'id', 'building_id');
	}

	public function apartments()
	{
		return $this->belongsToMany(Apartment::class, 'apartment_transaction', 'transaction_id', 'apartment_id');
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_transaction', 'transaction_id', 'user_id');
	}

	public function invoices()
	{
		return $this->hasMany(Invoice::class, 'transaction_id', 'id');
	}

	public function isForAuthUser()
	{
		$t = $this;

		if ($t->related_to == "Owners")
		{
			$flag = 0;
			
			foreach ($t->apartments as $a)
				if ($a->owner_id == Auth::user()->id)
					$flag = 1;

			if ($flag == 1)
				return true;
		}

		if ($t->related_to == "Livings")
		{
			$flag = 0;
			
			foreach ($t->apartments as $a)
				if ($a->living_id == Auth::user()->id)
					$flag = 1;

			if ($flag == 1)
				return true;
		}

		return false;
	}
}
