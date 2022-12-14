<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements JWTSubject
{
	use HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'lastname',
		'email',
		'password',
		'birth_date',
		'about_me',
		'gender_id',
		'relationship_id',
		'wish_id',
		'city_id'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	/**
	 * Get the identifier that will be stored in the subject claim of the JWT.
	 *
	 * @return mixed
	 */
	public function getJWTIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Return a key value array, containing any custom claims to be added to the JWT.
	 *
	 * @return array
	 */
	public function getJWTCustomClaims()
	{
		return [];
	}

	public function user_all()
	{
		$friends = auth()->user()->friend_all()
		->pluck('friend_id')
		->prepend(auth()->user()->id);

		$requests = auth()->user()->friend_request_all()
		->pluck('friend_id')
		->prepend(auth()->user()->id);

		$merge = $friends->mergeRecursive($requests);

		return User::whereNotIn('id', $merge)->get();
	}

	public function friend_all()
	{
		return auth()->user()
		->friends()
		->get()
		->transform(function ($item, $key)
		{ 
			if ($item->friend_id == auth()->user()->id)
			{
				$item->friend_id = $item->user_id; 
				$item->user_id = auth()->user()->id; 
			}
			return $item; 
		});
	}

	public function friend_request_all()
	{
		return auth()->user()
		->friendrequests()
		->get()
		->transform(function ($item, $key)
		{ 
			if ($item->friend_id == auth()->user()->id)
			{
				$item->friend_id = $item->user_id; 
				$item->user_id = auth()->user()->id; 
			}
			return $item; 
		});
	}

	public function message_all()
	{
		return auth()->user()
    ->conversations()
    ->with('messages')
    ->get()
    ->pluck('messages')
    ->flatten();
	}

	public function conversation_all()
	{
		return auth()->user()
		->conversations()
		->get()
		->transform(function ($item, $key)
		{ 
			if ($item->friend_id == auth()->user()->id)
			{
				$item->friend_id = $item->user_id; 
				$item->user_id = auth()->user()->id; 
			}
			return $item; 
		});
	}


  public function conversations(): HasMany
  {
    return $this->hasMany(Conversation::class)
    ->where('user_id', auth()->user()->id)
    ->orWhere('friend_id', auth()->user()->id);
  }

  public function friends(): HasMany
  {
    return $this->hasMany(Friend::class)
    ->where(function (Builder $query)
    	{
    		return $query->where('status', true)
    		->where('user_id', auth()->user()->id);
    	})
    ->orWhere(function (Builder $query)
    	{
    		return $query->where('status', true)
  			->where('friend_id', auth()->user()->id);
    	});
  }

  public function friendrequests(): HasMany
  {
    return $this->hasMany(Friend::class)
    ->where(function (Builder $query)
    	{
    		return $query->where('status', false)
    		->where('user_id', auth()->user()->id);
    	})
    ->orWhere(function (Builder $query)
    	{
    		return $query->where('status', false)
    			->where('friend_id', auth()->user()->id);
    	});
  }
  
  public function photos(): HasMany
  {
    return $this->hasMany(Photo::class);
  }

	public function messages(): HasMany
	{
		return $this->hasMany(Message::class);
	}

	public function notifications(): HasMany
	{
		return $this->hasMany(Notification::class);
	}

  public function city(): BelongsTo
  {
  	return $this->belongsTo(City::class);
  }

  public function relationship(): BelongsTo
  {
  	return $this->belongsTo(Relationship::class);
  }

  public function gender(): BelongsTo
  {
  	return $this->belongsTo(Gender::class);
  }

  public function wish(): BelongsTo
  {
  	return $this->belongsTo(Wish::class);
  }
}