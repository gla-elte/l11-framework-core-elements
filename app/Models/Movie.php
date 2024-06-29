<?php

namespace App\Models;

use App\Events\MovieCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'premier_date', 'score', 'budget', 'user_id'];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  protected $dispatchesEvents = [
    'created' => MovieCreated::class,
  ];
}
