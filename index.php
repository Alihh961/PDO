<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Repository\MovieRepository;
use App\Repository\ActorRepository;
use App\Model\Movie;
use App\Model\Actor;



// $newMovie = new Movie();

// $newMovie->setTitle("Transformers 1");
// $date = new DateTime('2023-11-21');
// $newMovie->setReleaseDate($date);

// $newMovie1 = new Movie();

// $newMovie1->setTitle("Spider-man No way");
// $date = new DateTime('2022-05-03');
// $newMovie1->setReleaseDate($date);





// $newActor = new Actor();
// $newActor->setFirstName("John");
// $newActor->setLastName("Doe");

// $newActor1= new Actor();
// $newActor1->setFirstName("Michael");
// $newActor1->setLastName("Johnson");

// $newActor2= new Actor();
// $newActor2->setFirstName("Emily");
// $newActor2->setLastName("Davis");



// $newMovie->getActors($newActor2);
// $newMovie->getActors($newActor1);

// $newMovie1->getActors($newActor);
// $newMovie1->getActors($newActor1);



$movieRepo = new MovieRepository();
$actorRepo = new ActorRepository();

// dump($movieRepo->fetchAllMovies());


// $movieRepo->insertMovie($newMovie);
// $movieRepo->insertMovie($newMovie1);

// $actorRepo->insertActor($newActor);
// $actorRepo->insertActor($newActor1);
// $actorRepo->insertActor($newActor2);

$movie = $movieRepo->findById(51);
$movie1 = $movieRepo->findById(52);

$actor = $actorRepo->findById(38);
$actor1 = $actorRepo->findById(39);
$actor2 = $actorRepo->findById(40);

$movie->addActor($actor);

$movie1->addActor($actor);
$movie1->addActor($actor1);
$movie1->addActor($actor2);




$movieRepo->addActorsToMovie($movie);
$movieRepo->addActorsToMovie($movie1);


// $movie->setTitle("Les Oups");
// $movieRepo->updateMovie($movie);

