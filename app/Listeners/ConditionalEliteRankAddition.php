<?php

namespace App\Listeners;

use App\Events\MovieCreated;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ConditionalEliteRankAddition
{
  /**
   * Create the event listener.
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   */
  public function handle(MovieCreated $event): void
  {
    $user_id = $event->movie->user_id;
    $xp = Movie::where('user_id', $user_id)->count();

    if ($xp == 2) {
      User::where('id', $user_id)->update(['elite' => true]);
    }
  }
}
