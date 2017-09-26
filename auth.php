<?php
	
	include_once('./php/const.php');
	include_once('./php/init_conn.php');
	echo 'Here';
	if(!empty($_GET)){
		$usn = $_GET['usn'];
		$pwd = $_GET['pwd'];
		$con = new Connections();
		if( $con->status == TRUE ){
			if($con->getUserAuthToken($usn, $pwd) == TRUE){
				echo 'Login Success';
			}
			else
				echo 'Login Failed';

		}
	}
	else{
		echo 'FIA';
	}

?>