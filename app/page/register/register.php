<?php 


if(array_key_exists("btn_register",$_POST)){

    $query = "INSERT INTO `users`(`name`, `username`, `password`, `role`, `status`) VALUES ('".$_REQUEST["name"]."','".$_REQUEST["username"]."','".$_REQUEST["password"]."','Store Owner', 'Setup')";
    mysqli_query($connection,$query);
    header("Location: ?page=login");

}

?>