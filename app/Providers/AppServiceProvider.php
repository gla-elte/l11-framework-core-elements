<?php

namespace App\Providers;

// use App\Events\MovieCreated;
// use App\Listeners\SendPremierNotification;
// use App\Models\Movie;
// use App\Observers\MovieObserver;
use App\Services\Imdb;
// use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    $this->app->singleton(Imdb::class, function ($app) {
      return new Imdb(config('services.imdb.key'));
    });
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    // Event::listen(
    //   MovieCreated::class,
    //   SendPremierNotification::class,
    // );

    // Movie::observe(MovieObserver::class);
  }
}
