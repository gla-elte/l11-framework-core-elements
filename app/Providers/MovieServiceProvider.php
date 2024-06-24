<?php

namespace App\Providers;

use App\Models\Movie;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Connection;

class MovieServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    $this->app->singleton(Connection::class, function ($app) {
      return new Connection(config('database.default'));
    });
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    view()->composer('*', function ($view) {
      $view->with('top5Movies', Movie::orderByDesc('score')->take(5)->get());
    });
  }
}
