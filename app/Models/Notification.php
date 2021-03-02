<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	use HasFactory;

	protected $table = 'notifications', $fillable = ['user_id', 'message'];

  public function user(): BelongsTo
  {
  	return $this->belongsTo(User::class);
  }
}
