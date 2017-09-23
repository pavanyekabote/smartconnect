<?php
   
    include_once('./php/const.php');
    include_once('./php/init_conn.php');
    $con = new Connections();
    if($con->status == TRUE)
        echo "Connection Established";
    else echo "Could not establish connection";

    if(!empty($_GET) and $con->status == TRUE){

        if($_GET[Constants::$REQ_FROM] == Constants::$REQ_FROM_DEVICE ){

            $reqDev = $_GET[Constants::$REQ_DEVICE_ID];
            $status = $_GET[Constants::$REQ_STATUS_DATA];
            $arr = str_split($status);
            $priorityCounter = array( );
            for( $i=0; $i< count($arr); $i++){
                $psObj = $con->getPriorityOfDevice($reqDev, $i);
                if( $psObj->priority==1)
                    $priorityCounter[$i] = $psObj->status;
            }
            if(count($priorityCounter)>0){
               

            }
            echo $con->getStatusOfAllDevices($reqDev);
        }
    }
    
?>