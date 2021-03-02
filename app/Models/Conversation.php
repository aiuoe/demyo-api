<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
  use HasFactory;

  protected $table = 'conversations', $fillable = [
    'friend_id', 
    'user_id'
  ];

	public function messages(): HasMany
	{
    return $this->hasMany(Message::class);
	}

  public function user(): BelongsTo
  {
  	return $this->belongsTo(User::class);
  }

  public function friend(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }
}
