<?php
    
    class Constants{
        
        //Request parameter name
        static $REQ_FROM = "reqFrom";
        static $REQ_DEVICE_ID = "reqDevId";
        static $REQ_STATUS_DATA = "reqStatusData";
        
            
        //Request Parameters if req from Device
        static $REQ_FROM_DEVICE = 1;
        
        //Request params if req from App
        static $REQ_FROM_APP = 2;
        
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

