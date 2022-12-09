<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

	public function buildings()
	{
		return $this->belongsToMany(Building::class, 'manager_building');
	}

	public function living_apartments()
	{
		return $this->hasMany(Apartment::class, 'living_id', 'id');
	}

	public function owner_apartments()
	{
		return $this->hasMany(Apartment::class, 'owner_id', 'id');
	}

	public function announcements()
	{
		return $this->belongsToMany(Announcement::class, 'user_announcement')->withPivot('ddate');
	}

	public function transactions()
	{
		return $this->belongsToMany(Transaction::class, 'user_transaction', 'user_id', 'transaction_id');
	}

	public function payments()
	{
		return $this->hasMany(Payment::class, 'user_id', 'id');
	}

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
