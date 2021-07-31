<?php
/**
 * 
 * Interface Segregation Principle
 * 
 * 
 */

 interface DBConnectionInterface{
     public function connect();
 }

 class MySQLConnection implements DBConnectionInterface
 {
    public function connect()
    {
        return "MySQL Connected";
    }
 }

 class OracleConnection implements DBConnectionInterface
 {
    public function connect()
    {
        return "OracleConnection Connected";
    }
 }

 class UserDB
 {
     private $dbConnection;

     public function __construct(DBConnectionInterface $dbConnection)
     {
         $this->dbConnection = $dbConnection;
     }

     public function store()
     {
        //return "User added";
        print_r($this->dbConnection);
     }

 }

 $mySQLConnection = new MySQLConnection();
 $oracleConnection = new OracleConnection();
 $addUser = new UserDB($mySQLConnection);
 echo $addUser->store();
 $addUser = new UserDB($oracleConnection);
 echo $addUser->store();
