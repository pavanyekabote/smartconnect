<?php

    include_once('const.php');

    class Connections{
        
        var $conn;
        var $status = TRUE;
        function __construct(){
            $this->conn = new mysqli(Constants::$DB_SERVER, Constants::$DB_USERNAME, Constants::$DB_PASSWORD);
            if($this->conn->connect_error)
                die("Connection failed: " . $conn->connect_error);
            else{
             
                $this->initConnections();
                
            }
        }
        
        
        function initConnections(){
            
            $succ_count = 0;
            $CREATE_DATABASE = "CREATE DATABASE IF NOT EXISTS ".Constants::$DB_NAME;
            $CREATE_TABLE = "CREATE TABLE IF NOT EXISTS ".Constants::$DB_NAME;
            if($this->conn->query($CREATE_DATABASE) == TRUE ){
                
                for($i=0; $i< count(Constants::$DB_TABLES); $i++){
                    
                    $query = $CREATE_TABLE.".".Constants::$DB_TABLES[$i]." ".Constants::$DB_TABLE_STRUCTURE[$i];
                    //echo $query."<br />";
                    if(!$this->conn->query($query) == TRUE){
                        $succ_count++;
                    }   
                    
                }
                
                
            }
            else
                echo "Could not create database";
            if($succ_count == 3)
                $this->status = TRUE;
        }
        
        /** Store Data */
        function storeData($a){

        }


        function getPriorityOfDevice($devId,$socketNumber){

            $query = "SELECT sockStatus,priority FROM ".Constants::$DB_NAME.".".Constants::$DB_TABLES[2]." where  deviceId=".$devId." and sockNumber=".$socketNumber;   
          //  echo $query."<br />"    ;
            $result = $this->conn->query($query);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    return new PSOfSockets($row['sockStatus'],$row['priority']);            
                }
            }
            return new PSOfSockets(0,0);
       }

       function getStatusOfAllDevices($devId)
       {
            $query = "SELECT sockStatus from ".Constants::$DB_NAME.".".Constants::$DB_TABLES[2]." where  deviceId=".$devId;
            $res = "";
           // echo $query;
            $result = $this->conn->query($query);
            if($result->num_rows>0)
                while ($row = $result->fetch_assoc()) {
                    # code...
                    $res = $res."".$row['sockStatus'];
                }
            return $res;
       }
    }

    class PSOfSockets{
        var $status,$priority;
        function __construct($status, $priority){
            $this->status = $status;
            $this->priority  = $priority;
        }
    }

?>