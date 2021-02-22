<?php
namespace App\Services\Data;
use App\Models\CustomerModel;
use Exception;
use mysqli;
use App\Services\Data\Utility\DBConnect;


class CustomerDao
{
    private $dbObj;
    
    public function __construct($dbObj)
    {
        $this->dbObj = $dbObj;
    }
    
    /*
     * Method to add new customer
     */
    public function addCustomer(CustomerModel $data)
    {
        try 
        {
            $sql = "INSERT INTO customer 
                    (firstname, lastname) 
                    VALUES ('{$data->getFirstName()}', '{$data->getLastName()}')";
            
            //die($sql);
            
            return $this->dbObj->query($sql);
            //$this->connectionObject->closeDbConnect();
        } catch (Exception $e) 
        {
            echo $e;
        }
        
    }
    
    //ACID
    //Get hte next ID for the PK to put in the FK
    public function getNextID()
    {
        try 
        {
            //Define thte query to get the next ID
            $sql = "SELECT id
                        FROM customer
                        ORDER BY id DESC LIMIT 0,1";
            
            $result = $this->dbObj->query($sql);
            while ($row = mysqli_fetch_array($result))
            {
                return $row['id'];
            }
        } 
        catch (Exception $e) 
        {
            echo $e->getMessage();
        }
    }
}
    