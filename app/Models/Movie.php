<?php

namespace App\Models;

use App\Events\MovieCreated;
use App\Observers\MovieObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([MovieObserver::class])]
class Movie extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'premier_date', 'score', 'budget', 'user_id'];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  protected static function booted(): void
  {
    // static::created( function (Movie $movie) {
    //   dd($movie);
    // });
    static::creating(function (Movie $movie) {
      $movie->user_id = auth()->id();
    });
  }

  protected $dispatchesEvents = [
    // 'created' => MovieCreated::class,
  ];
}
