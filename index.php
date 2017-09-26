<?php
   
   /**
        Project : Smart Connect
        Author  : Pavan Yekabote


   */
    include_once('./php/const.php');
    include_once('./php/init_conn.php');
    include_once('./php/res.php');
    $con = new Connections();
    if($con->status == TRUE)
    {


    if(!empty($_GET) and $con->status == TRUE){
        /** for Read request */
        if($_GET[Constants::$REQ_TYPE] == Constants::$REQ_TYPE_READ ){

            $connStatus = Constants::$RES_FAILED;
            $sockStatus = array(0);
            $message = Constants::$RES_MESSAGE_FAILED;

            $reqDev = $_GET[Constants::$REQ_DEVICE_ID];
            $status = $_GET[Constants::$REQ_STATUS_DATA];
         /*   $arr = str_split($status);
            $priorityCounter = array();
            for( $i=0; $i< count($arr); $i++){
                $psObj = $con->getPriorityOfDevice($reqDev, $i);
                if( $psObj->priority==1)
                    $priorityCounter[$i] = $psObj->status;
            }
            if(count($priorityCounter)>0){
               

            } */
            $connStatus = Constants::$RES_OK;
            $sockStatus = str_split($con->getStatusOfAllDevices($reqDev));
            $message = Constants::$RES_MESSAGE_SUCCESS;
            header('Content-Type: application/json');
            echo json_encode(new ResponseRead($connStatus, $sockStatus, $message));
        }

        /** For Write Request */
        if($_GET[Constants::$REQ_TYPE] == Constants::$REQ_TYPE_WRITE){

            //Varss for JSON Output object
            $writeStatus= Constants::$RES_FAILED;
            $message = Constants::$RES_MESSAGE_FAILED;
            $sockArray= array(new Status(Constants::$RES_FAILED));
            $nSockUpdates = 0;

            $reqDev = $_GET[Constants::$REQ_DEVICE_ID];
            $status = $_GET[Constants::$REQ_STATUS_DATA];
            $numSocks = $con->getDeviceData($reqDev) ;
            $arr = str_split($status);
          
            if($numSocks > 0 && $numSocks == count($arr))
            {
                $sockArray = array();
                
                for($i=0; $i<$numSocks; $i++)
                {
                    if($con->updateStatusWithDevId($reqDev,$i+1,$arr[$i]) == TRUE){
                        array_push($sockArray, new Status(Constants::$RES_OK));
                        $nSockUpdates++;   
                    }
                    else
                        array_push($sockArray, Constants::$RES_FAILED);
                }
                $writeStatus = ( $nSockUpdates == $numSocks ) ? Constants::$RES_OK : Constants::$RES_FAILED; //Write Status if all success then ok else Failed
                $message = ( $nSockUpdates == $numSocks ) ? Constants::$RES_MESSAGE_SUCCESS  : Constants::$RES_MESSAGE_FAILED;
            } 
            header('Content-Type: application/json');
            echo json_encode(new ResponseWrite($writeStatus, $sockArray, $message));
        }  
    }
}
    
?>
