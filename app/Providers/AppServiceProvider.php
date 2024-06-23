<?php

namespace App\Providers;

use App\Services\Imdb;
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
    //
  }
}
