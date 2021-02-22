<?php
namespace App\Models;

class CustomerModel
{
    private $firstName;
    private $lastName;
    
    //Constructor
    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    
    /**
     * Getter Method -> firstName
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * Getter method -> lastName
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }
}
