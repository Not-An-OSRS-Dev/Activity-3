<?php
namespace App\Services\Data\Utility;

use mysqli;

class DBConnect
{
    private $conn;
    private $customerDao;
    
    private $servername;// = "localhost";
    private $db;// = "cst256week4";
    private $username;// = "root";
    private $password;// = "root";
    
    public function __construct(string $dbname)
    {
        //Initialize the properties
        $this->db=$dbname;
        //die($dbname);
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "root";
    }
    
    /*
     * Create a database connection
     */
    public function getDbConnect()
    {
        //Create a connection to the database
        //OOP style
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db);
        //Procedural Style
        //$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->db);
        
        //Scope Resolution Style
        //Sal says this doesn't work
        //Will error out if not called in the same class where the query is being made 
        //(and the connection is resolved and closed in the same class)
        //$this->conn = mysqli::connect($this->servername, $this->username, $this->password, $this->dbname);
        
        if ($this->conn->connect_error || $this->conn == null)
        {
            //Never use die() if you are doing an acid approach
            echo "Failed to connect to MySQL: " . $this->conn->connect_error;
            exit();
        }
        
        return ($this->conn);
    }
    
    /*
     * Turn ON Autocommit 
     */
    public function setDbAutocommitTrue()
    {
        $this->conn->autocommit(TRUE);
    }
    
    /*
     * Turn OFF Autocommit
     */
    public function setDbAutocommitFalse()
    {
        $this->conn->autocommit(FALSE);
    }
    
    /*
     * Close the connection
     */
    public function closeDbConnect()
    {
        //Procdeural Style
        //mysqli_close($this->conn);
        
        //OOP Style
        $this->conn->close();
    }
    /*
     * Begin a Transaction
     */
    public function beginTransaction()
    {
        $this->conn->begin_transaction();
    }
    
    /*
     * Commit a Transaction
     */
    public function commitTransaction()
    {
        $this->conn->commit();
    }
    
    /*
     * Rollback a Transaction
     */
    public function rollbackTransaction()
    {
        $this->conn->rollback();
    }
}

