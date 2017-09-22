<?php
    
    if(!empty($_GET)){
        echo $_GET['usn'];
        $conn = new mysqli("localhost:3306","root","","smartconnect");
        if($conn->connect_error){
            echo '<h1 style="color:red;">Error could not connect</h1>';
            
        }
        else
            echo '<h1 style="color:green;">Connection Successful</h1>';
    
    }
?>