<?php 

$DATABASE_TYPE = "mysql";
$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DATABASE = "store_db";



switch ($DATABASE_TYPE){

    case "mysql":
        $connection  = new mysqli($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

        if(mysqli_connect_errno()){
        
            echo "SERVER ERROR!";
        
        }

        break;



    default:

    break;
}


?>