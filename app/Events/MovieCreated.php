<?php

namespace App\Events;

use App\Models\Movie;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class MovieCreated
{
  use Dispatchable, SerializesModels;

  /**
   * Create a new event instance.
   */
  public function __construct(public Movie $movie)
  {
    //
  }
}
