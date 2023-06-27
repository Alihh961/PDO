<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Service\PDOService;



$conx = new PDOService();

dump($conx->fetchAllMovies());
dump($conx->findAll());