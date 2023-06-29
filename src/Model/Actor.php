<?php

namespace App\Model;



class Actor
{

    private int $id;
    private string $FirstName;
    private string $LastName;


    public function setId(int $id):void{
        
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * Get the value of LastName
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * Set the value of LastName
     *
     * @return  self
     */
    public function setLastName($LastName)
    {
        $this->LastName = $LastName;

        return $this;
    }

    /**
     * Get the value of FirstName
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * Set the value of FirstName
     *
     * @return  self
     */
    public function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;

        return $this;
    }
}