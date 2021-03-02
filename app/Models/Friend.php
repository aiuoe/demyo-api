<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Nuwave\Lighthouse\Exceptions\AuthorizationException;

class Friend extends Model
{
  use HasFactory;

  protected $table = 'friends', 
  $fillable = [
    'friend_id', 
    'user_id'
  ], 
  $guarded = [
    'status'
  ],
  $hidden = [
    'status'
  ];

  public function acceptFriendRequest()
  {
    if (auth()->user()->id == $this->friend_id)
    {
      $this->status = true;
      $this->save();
      return 1;
    }
    else
      return 0;
  }

  public function user(): BelongsTo
  {
  	return $this->belongsTo(User::class);
  }

  public function friend(): BelongsTo
  {
  	return $this->belongsTo(User::class);
  }

  public function conversations(): HasMany
  {
    return $this->hasMany(Conversation::class);
  }
}
