<?php
	
	class ResponseRead{

		var $connStatus,$sockStatus,$message;
		
		function __construct($connStatus, $sockStatus, $message){

			$this->connStatus = $connStatus;
			$this->sockStatus = $sockStatus;	
			$this->message = $message;
		}

	}

	class ResponseWrite{

		//Status of Success , array of write status of Each Socket, Message for success or fail
		var $writeStatus,$sockStatus,$message;
		
		function __construct($writeStatus, $sockStatus, $message){
			$this->writeStatus = $writeStatus;
			$this->sockStatus = $sockStatus;
			$this->message = $message;
		}
	}

	class Status{
		var $status;
		function __construct($stat){
			$this->status = $stat;
		}
	}
?>