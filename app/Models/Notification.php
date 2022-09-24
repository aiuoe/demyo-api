<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
	use HasFactory;

	protected $table = 'notifications', $fillable = ['friend_id', 'user_id', 'message'];

  public function user(): BelongsTo
  {
  	return $this->belongsTo(User::class);
  }

  public function friend(): BelongsTo
  {
  	return $this->belongsTo(User::class);
  }
}
