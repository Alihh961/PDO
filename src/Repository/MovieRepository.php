<?php

namespace App\Repository;

use App\Service\PDOService;
use App\Model\Movie;


class MovieRepository
{


    private PDOService $PDOService;

    public function __construct()
    {
        $this->PDOService = new PDOService();
    }


    public function fetchAllMovies(): array
    {
        return $this->PDOService->getPDO()->query("Select * From movie")->fetchAll();
    }


    //! we use PDO::class, Movie::class to convert the results into object(class of Movie)
    public function findAll(): Movie | false
    {
        $query = $this->PDOService->getPDO()->query("Select * From movie");
        return $query->fetchAll(PDO::class, Movie::class);
    }

    public function findById(int $id)
    {
        $query = $this->PDOService->getPDO()->prepare("Select * From movie where id =?");
        $query->bindValue(1, $id);
        if ($query->execute())
            return $query->fetchObject(Movie::class);

        else
            return false;
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