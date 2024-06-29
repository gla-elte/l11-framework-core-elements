<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\MovieCreated;
use App\Notifications\MoviePremier;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPremierNotification
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
    collect([User::first(), User::find($event->movie->user_id)])->each(
      fn ($user) =>
      $user->notify(new MoviePremier($event->movie->id, $user->id, $event->movie->budget))
    );
  }
}
