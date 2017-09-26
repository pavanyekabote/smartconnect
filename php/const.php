<?php
    
    class Constants{
        
        //Auth params
        static $AUTH_USERNAME = 'usn';
        static $AUTH_PASSWORD = 'pwd';

        //Request parameter name
        static $REQ_TYPE = "reqType";
        static $REQ_DEVICE_ID = "reqDevId";
        static $REQ_STATUS_DATA = "reqStatusData";
        
        
        //Request Parameters if req from Device
        static $REQ_TYPE_READ = 1; //Read
        
        //Request params if req from App
        static $REQ_TYPE_WRITE = 2; //Write
        
        //Responses
        static $RES_FAILED = "FAILED";
        static $RES_OK = "OK";
        static $RES_MESSAGE_SUCCESS = "SUCCESS";
        static $RES_MESSAGE_FAILED = "ERROR OCCURED";
        //Priority
        static $PRIORITY_HIGH = 1;
        static $PRIORITY_LOW = 0;
        //MySQL Connection 
        static  $DB_NAME = "smartconnect";
        static  $DB_SERVER = "localhost:3306";
        static  $DB_USERNAME = "root";
        static  $DB_PASSWORD = "";
        
        static  $DB_TABLES = array("users", "devices", "sockupdates");
        static  $DB_TABLE_STRUCTURE = array("(userId int primary key, username varchar(200), password varchar(200))ENGINE=InnoDB",
                                                "(userId int, deviceId int primary key, deviceName varchar(200),foreign key(userId) references smartconnect.users(userId))ENGINE=InnoDB",
                                                 "(deviceId int,sockNumber int, sockStatus int,priority int, foreign key(deviceId) references smartconnect.devices(deviceId))ENGINE=InnoDB"
                                                );
    }

?>

