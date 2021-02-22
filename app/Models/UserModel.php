<?php
namespace App\Models;

class UserModel
{
    private $username;
    private $password;
    
    //Constructor
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    
    /**
     * Getter Method -> username
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * Getter method -> password
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}
