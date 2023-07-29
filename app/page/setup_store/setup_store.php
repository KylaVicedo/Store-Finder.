<?php 


if(array_key_exists("btn_update",$_POST)){
    $query = "
    INSERT INTO `store`(`user_id`, `name`, `type`, `map`, `address`, `contact`, `description`, `status`) VALUES 
    (   
        '".$_SESSION["uid"]."',
        '".mysqli_real_escape_string($connection,$_REQUEST["name"])."',
        '".mysqli_real_escape_string($connection,$_REQUEST["type"])."',
        '".mysqli_real_escape_string($connection,$_REQUEST["map"])."',
        '".mysqli_real_escape_string($connection,$_REQUEST["address"])."',
        '".mysqli_real_escape_string($connection,$_REQUEST["contact"])."',
        '".mysqli_real_escape_string($connection,$_REQUEST["description"])."',
        'Active'
    )
    ";

    if(mysqli_query($connection,$query)){

       mysqli_query($connection,"UPDATE users SET status = 'Active' WHERE id = '".$_SESSION["uid"]."'");
       header("location: ?page=my_store");
    }else{
        header("location: ?page=home");
    }

 

    

}

?>