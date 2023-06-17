<?php
    $servername = "localhost";
    $serverusername = "root";
    $serverpassword = "";
    $serverdb_name = "happy_stationary";
    
    $con = mysqli_connect($servername, $serverusername,$serverpassword,$serverdb_name); 
    if(!$con)
    {
        echo "Fail";
        
    }
?>