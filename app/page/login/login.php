<?php 

$message = "";
if(array_key_exists("btn_login",$_POST)){
        $result = mysqli_query($connection,"SELECT * FROM users WHERE username = '".$_REQUEST["username"]."'  AND password = '".$_REQUEST["password"]."'");
        $data = mysqli_fetch_array($result);
        if(mysqli_num_rows($result) == 1){
          
        if($data["status"] == "Active"){
            $_SESSION["uid"] = $data["id"];
            header("Location: ?page=my_store");
        }

        if($data["status"] == "Setup"){
            $_SESSION["uid"] = $data["id"];
            header("Location: ?page=setup_store");
        }
          
        }else{
            $message = "Wrong Credential!";
        }
}

?>