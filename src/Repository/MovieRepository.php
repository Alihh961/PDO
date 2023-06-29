<?php

namespace App\Repository;

use App\Service\PDOService;
use App\Model\Movie;
use PDO;
use DateTime;

#[\AllowDynamicProperties]
class MovieRepository
{


    private PDOService $PDOService;

    public function __construct()
    {
        $this->PDOService = new PDOService();
    }

    //* Fetch all movies as array from database
    public function fetchAllMovies(): array
    {
        return $this->PDOService->getPDO()->query("Select * From movie")->fetchAll();
    }


    //! ERROR
    //* Fetch all movies of database and convert te objects returned into objects of MOVIE class
    // public function findAll(): Movie | false
    // { 
    //     $query = $this->PDOService->getPDO()->query("Select * From movie");
    //     return $this->convertReturnedObjectIntoMovieClass($query->fetchAll(PDO::class));
    // }




    //* Select a movie from database according to its id
    public function findById(int $id)
    {
        $query = $this->PDOService->getPDO()->prepare("SELECT * FROM movie WHERE id = ?");
        $query->bindValue(1, $id);
        if ($query->execute()) {
           return  $this->convertReturnedObjectIntoMovieClass($query->fetchObject());
        } else {
            return false;
        }
    }
    

    //* Select a movie from database according to its title


    public function findByTitle(string $title): array|bool
    {
        $query = $this->PDOService->getPDO()->prepare('SELECT * FROM movie WHERE title LIKE :title');
        $like = '%' . $title . '%';
        $query->bindParam(':title', $like);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, Movie::class);
    }


    //* Insert new Movie to the database

    public function insertMovie(Movie $movie): Movie
    {
        $query = $this->PDOService->getPDO()->prepare('INSERT INTO movie VALUE (null ,:title , :release_date)');
        $title = $movie->getTitle();
        $date = $movie->getReleaseDate();
        $release_date = $date->format('Y-m-d');
        $query->bindParam(':title', $title);
        $query->bindParam(':release_date', $release_date);
        $query->execute();
        return $movie;
    }



    //* Add the IDs of movie and actor in the common table movie_actor
    public function addActorsToMovie(Movie $movie): Movie
    {
        $actors = $movie->getActors();
        
        foreach ($actors as $actor) {
            
            $query = $this->PDOService->getPDO()->prepare('INSERT INTO movie_actor VALUES (null ,:id_actor , :id_movie )');
            
            $idMovie = $movie->getId();
            $idActor = $actor->getId();

            $query->bindParam(':id_actor', $idActor);
            $query->bindParam(':id_movie', $idMovie);

            $query->execute();
        }
        return $movie;

    }


    //* Delete a movie from the database
    public function deleteMovie(Movie $movie): void
    {
        $query = $this->PDOService->getPDO()->prepare('DELETE FROM movie WHERE id = :idMovie');
        $idMovie = $movie->getId();
        $query->bindParam(':idMovie', $idMovie);
        $query->execute();
    }


    //* Update a movie informtions
    public function updateMovie(Movie $movie): Movie
    {
        $query = $this->PDOService->getPDO()->prepare("UPDATE movie SET title = :title , release_date = :release_date WHERE id = :idMovie");
        $idMovie = $movie->getId();
        $title = $movie->getTitle();
        $releaseDate = ($movie->getReleaseDate())->format("Y-m-d");
        $query->bindParam(':idMovie', $idMovie);
        $query->bindParam(':title', $title);
        $query->bindParam(':release_date', $releaseDate);
        $query->execute();

        return $movie;
    }


    //* convert objects returned from the database into objects of MOVIE class
    public function convertReturnedObjectIntoMovieClass(object $object):Movie{
        $new = new Movie();

        $date = new DateTime($object->release_date);
        $new->setTitle($object->title);
        $new->setReleaseDate($date);
        $new->setId($object->id);

        return $new;
    }
}
// class MovieRepository extends PDOService {


//     public function fetchAllMovies():array{
//         return $this->pdo->query("Select * From movie")->fetchAll();
//      }
 
//     //  public function findAllMovieObject(){
//     //      //* fetchObject used to convert the data received from array into object
//     //      //* fetchObject will return the first row from the database and not all data found
//     //      $query =$this->pdo->query("Select * From movie");
//     //      return $query->fetchObject(Movie::class);
//     //  }
 
//          public function findAll(){
//          $query =$this->pdo->query("Select * From movie");
//          return $query->fetchAll(PDO::class,Movie::class);
//      }


// }