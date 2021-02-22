<?php
namespace App\Services\Data;

use mysqli;
use App\Models\UserModel;
use Exception;

class OrderDAO
{
    //Define the connection string
    //private $conn;
    private $dbObj;
    
    //Constructor that creates a connection with the database
    public function __construct($dbObj) 
    {
        $this->dbObj = $dbObj;
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
            $sql = "SELECT email, password
                                From users
                                WHERE email = '{$user->getUsername()}'
                                    AND password = '{$user->getPassword()}'";
            
            //die($this->dbQuery);
            
            // If the selected query returns a resultset
            $result = $this->dbObj->query($sql);
            
            $userFound = (mysqli_num_rows($result) > 0);
            
            //Free results and close connection
            mysqli_free_result($result);
            //mysqli_close($this->conn);
            
            //Return value
            return $userFound;
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    /*
     * Function to add an order to the database
     */
    public function addOrder(string $product, int $customerID)
    {
        try
        {
            $sql = "INSERT INTO `order`
                    (product, customer_id)
                    VALUES ('" . $product . "', " . $customerID . ")";
            
            //die ($sql);
            
            return $this->dbObj->query($sql);
        } 
        catch (Exception $e)
        {
           echo $e->getMessage();
        }
    }
    
}