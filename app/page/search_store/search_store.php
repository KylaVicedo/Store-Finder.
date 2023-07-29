<?php 
header("Cache-control: no-cache");

if(!empty($_SESSION["search"])){

    $result = mysqli_query($connection,"SELECT * FROM store WHERE 
    name LIKE '%".$_SESSION["search"]."%' OR
    type LIKE '%".$_SESSION["search"]."%' OR
    address LIKE '%".$_SESSION["search"]."%' OR
    description LIKE '%".$_SESSION["search"]."%'
    ORDER BY id DESC 
    ");

}else{
    $result = mysqli_query($connection,"SELECT * FROM store ORDER BY id DESC ");
}

if(array_key_exists("btn_search",$_POST)){
$_SESSION["search"] = $_REQUEST["search"];
header("Location: ?page=search_store");
}


if(array_key_exists("btn_view",$_POST)){
    $_SESSION["view_id"] = $_REQUEST["id"];
    header("Location: ?page=map_viewer");
    }

    if(array_key_exists("btn_add_bookmark",$_POST)){
        $query = "
        INSERT INTO `bookmark`( `username`, `store_id`) VALUES (  
            '".mysqli_real_escape_string($connection,$_REQUEST["username"])."',
            '".mysqli_real_escape_string($connection,$_REQUEST["id"])."'
        )
        ";
    
        if(mysqli_query($connection,$query)){
    
          $_SESSION["bookmark"] = $_REQUEST["username"];
           header("location: ?page=bookmark");
        }else{
            header("location: ?page=home");
        }
    
     
    
        
    
    }


?>