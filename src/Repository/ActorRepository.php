<?php 

namespace App\Repository;

use App\Service\PDOService;
use App\Model\Actor;
use PDO;

class ActorRepository{

    private PDOService $pdo;

    public function __construct()
    {
        $this->pdo= new PDOService();
    }


    //* fetch all actors from the database
    public function fetchAllActors(){
        $query = "select * from actor";
       
        return  $this->pdo->getPDO()->query($query)->fetchAll();

    }

    //* Select from database according to its ID 
    public function findById(int $id): Actor | bool{
        $query = "select * from actor where id = ?";
        $query = $this->pdo->getPDO()->prepare($query);
        $query->bindValue(1,$id);
        $query->execute();
        return $this->convertReturnedObjectIntoActorClass($query->fetchObject());

    }

    //* Insert new actors to database
    public function insertActor(Actor $actor): Actor
    {
        $query = $this->pdo->getPDO()->prepare('INSERT INTO actor VALUE (null,:first_name, :last_name)');
        $firstName = $actor->getFirstName();
        $lastName = $actor->getLastName();

        $query->bindParam(':first_name', $firstName);
        $query->bindParam(':last_name', $lastName);
        $query->execute();
        return $actor;
    }

    //* Delete actors from database
    public function deleteActor(Actor $actor): void
    {
        $query = $this->pdo->getPDO()->prepare('DELETE FROM actor WHERE id = :idActor');
        $idActor = $actor->getId();
        $query->bindParam(':idActor', $idActor);
        $query->execute();
    }

    //* Update actors in database
    public function updateActor(Actor $actor):void {

        $firstName = $actor->getFirstName();
        $lastName = $actor->getLastName();
        $id = $actor->getId();
        $query = $this->pdo->getPDO()->prepare('UPDATE actor set value(first_name = :first_name  , last_name = :last_name) WHERE id = :id');
        $query->bindParam(":first_name" ,$firstName);  
        $query->bindParam(":last_name" ,$lastName);  
        $query->bindParam(":id" ,$id);  
        $query->execute();

     }


     //* convert the returned object of the method FINDBYID() into an object of class ACTOR
    public function convertReturnedObjectIntoActorClass( object $object):Actor{

        $new = new Actor();

        $new->setFirstName($object->first_name);
        $new->setLastName($object->last_name);
        $new->setId($object->id);
        return $new;
    }
}


