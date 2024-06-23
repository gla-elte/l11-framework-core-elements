<?php

namespace App\Services;

class Imdb
{
  public function __construct(protected $apiKey)
  {
    //
  }

  public function getPoster($movieId)
  {
    return "actual poster URL";
  }
}


