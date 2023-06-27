<?php 

namespace App\Repository;
use App\Service\PDOService;


class MovieRepository {


    private PDOService $conx;  

    public function __construct()
    {
        $this->conx = new PDOService();
    }
    

    public function fetchAllMovies():array{
         return $this->conx->getPDO()->query("Select * From movie")->fetchAll();
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