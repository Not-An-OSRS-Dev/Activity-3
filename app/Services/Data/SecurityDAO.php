<?php
namespace App\Services\Data;

use App\Models\UserModel;
use Exception;

class SecurityDAO 
{
    //Define the connection string
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    
    //Constructor that creates a connection with the database
    public function __construct() 
    {
       //Create a connection to the database
       $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
       
       //Make sure to always test the connection and see if there are any errors.
       if ($this->conn == false)
       {
           die(mysqli_error($this->conn));
       }
    }
    
    /**
     * This method will search through the database 
     * for the specified UserModel object
     * @param UserModel $user the user to search the db for
     * @return boolean whether the user was found
     */
    public function findByUser(UserModel $user)
    {
        try 
        {
            //Define the query to search the database for the credentials
            $this->dbQuery = "SELECT email, password
                                From users
                                WHERE email = '{$user->getUsername()}'
                                    AND password = '{$user->getPassword()}'";
            
            //die($this->dbQuery);
            
            // If the selected query returns a resultset
            $result = mysqli_query($this->conn, $this->dbQuery);
            
            $userFound = (mysqli_num_rows($result) > 0);
            
            //Free results and close connection
            mysqli_free_result($result);
            mysqli_close($this->conn);
            
            //Return value
            return $userFound;
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
}