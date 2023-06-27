<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Repository\MovieRepository;

$movie = new MovieRepository();

dump($movie->findById(800));



