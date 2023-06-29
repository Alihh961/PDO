<?php

namespace App\Model;

use DateTime;
use App\Model\Actor;


class Movie
{

    private ?int $id ;
    private ?string $title;
    private ?DateTime $releaseDate;
    private array $actors;
    


    public function __construct(){
        $this->actors = [];
    }


    public function setId($id){
        $this->id =$id;
    }


    public function  getId():int{
        return $this->id;
    }

    
    public function getActors():array{
        return $this->actors;
    }


    public function addActor(Actor $actor){
        if(!in_array($actor,$this->actors))
            $this->actors[] = $actor;
    }


    public function removeActor(Actor $actor): void
    {
        if(($key = array_search($actor, $this->actors)) !== false){
            unset($this->actors[$key]);
        }
    }


    public function setTitle(string $title): void
    {
        $this->title = $title;
    }


    public function getTitle():string{
        return $this->title;
    }


    public function getReleaseDate(): Datetime
    {
        return $this->releaseDate;
    }


    public function setReleaseDate(Datetime $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }
    
}
