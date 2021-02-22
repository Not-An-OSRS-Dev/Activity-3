<?php
namespace App\Services\Business;

use App\Models\UserModel;
use App\Services\Data\SecurityDAO;
use App\Models\CustomerModel;
use App\Services\Data\CustomerDao;
use App\Services\Data\Utility\DBConnect;
use App\Services\Data\OrderDAO;

class SecurityService
{
    private SecurityDAO $dao;
    
    /**
     * Call the DAO search method and return the result
     * @param UserModel $user
     * @return boolean
     */
    public function login(UserModel $user)
    {
        //Instantiate dao
        $this->dao = new SecurityDAO();
        
        //Return true or false by passing the credentials
        // to the object
        return $this->dao->findByUser($user);
    }
    
    //Method to manage the customer data in the Business Layer
    public function addCustomer(CustomerModel $data)
    {
        //Instantiate the data access layer
        $this->addNewCustomer = new CustomerDao();
        
        //Return true or false by passing the customer data
        return $this->addNewCustomer->addCustomer($data);
    }
    
    //Manage ACID Transactions
    public function addAllInformation(string $product, CustomerModel $customerdata)
    {
        //Create a connection to the database
        //Create an instance of the class
        $conn = new DBConnect("cst256week4");
        
        // Call the method to create the connection
        $dbObj = $conn->getDbConnect();
        
        //First turn off autocommit
        $conn->setDbAutocommitFalse();
        
        //Begin a transaction
        $conn->beginTransaction();
        
        //Instantiate the Data Access Layer
        $addNewCustomer = new CustomerDAO($dbObj);
        
        //Add the customer data
        $isSuccessful = $addNewCustomer->addCustomer($customerdata);
        
        //Next CustomerId
        $customerID = $addNewCustomer->getNextID();
        
        //Instantiate the Data Access Layer
        $addNewOrder = new OrderDAO($dbObj);
        
        //Add product order data
        $isSuccessfulOrder = $addNewOrder->addOrder($product, $customerID);
        
        //die ("CustomerSuccess: " . $isSuccessful . "\t OrderSuccess: " . $isSuccessfulOrder);
        
        if ($isSuccessful && $isSuccessfulOrder)
        {
            $conn->commitTransaction();
        }
        else $conn->rollbackTransaction();
        $conn->closeDbConnect();
        return ($isSuccessful && $isSuccessfulOrder);
    }
    
    public function createOrder(string $product, int $customerID)
    {
        $addNewOrder = new OrderDAO();
        
        return $addNewOrder->addOrder($product, $customerID);
    }
}