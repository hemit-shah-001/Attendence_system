<?php
        $username='root';
        $password="";
        $server= "localhost";
        $db= "attendence_system";

        $conn= mysqli_connect($server,$username,$password,$db);
        
        if(!$conn){
            die("no connection".mysqli_connect_error());    
        }
?>