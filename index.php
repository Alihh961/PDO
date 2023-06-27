<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Repository\MovieRepository;

$m = new MovieRepository();

dump($m->fetchAllMovies());



