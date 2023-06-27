<?php 

namespace App\Service;

use PDO;
use App\Model\Movie;

class PDOService {

    protected PDO $pdo;
    private string $dsn = 'mysql:host=127.0.0.1:3306;dbname=allo_cine';
    private string $user = 'root';
    private string $pwd = '';

    public function __construct()
    {
        $this->pdo = new PDO($this->dsn,$this->user ,$this->pwd);
    }

    public function fetchAllMovies():array{
       return $this->pdo->query("Select * From movie")->fetchAll();
    }

    // public function findAll(){
    //     //* fetchObject used to convert the data received from array into object
    //     //* fetchObject will return the first row from the database and not all data found
    //     $query =$this->pdo->query("Select * From movie");
    //     return $query->fetchObject(Movie::class);
    // }

    

}