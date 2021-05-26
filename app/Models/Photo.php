<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
  use HasFactory;

  protected $table = 'photos', $fillable = ['user_id', 'url'];

  public function user(): BelongsTo
  {
  	return $this->belongsTo(User::class);
  }

  public function friend(): BelongsTo
  {
  	return $this->belongsTo(Friend::class);
  }
}
