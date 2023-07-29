<?php 


header("Cache-control: no-cache");

if(empty($_SESSION["uid"])){
    header("Location: ?page=login");
}
$query = "SELECT * FROM store WHERE user_id = '".$_SESSION["uid"]."'";
$data = mysqli_fetch_array(mysqli_query($connection,$query));

if(array_key_exists("btn_update",$_POST)){
    $query = "
    
      
       UPDATE store 

        SET
        name =
        '".mysqli_real_escape_string($connection,$_REQUEST["name"])."',
        type =
        '".mysqli_real_escape_string($connection,$_REQUEST["type"])."',
        map =
        '".mysqli_real_escape_string($connection,$_REQUEST["map"])."',
        address =
        '".mysqli_real_escape_string($connection,$_REQUEST["address"])."',
        contact =
        '".mysqli_real_escape_string($connection,$_REQUEST["contact"])."',
        description =
        '".mysqli_real_escape_string($connection,$_REQUEST["description"])."'

        WHERE user_id = '".$_SESSION["uid"]."'
        
    ";

    if(mysqli_query($connection,$query)){

     
       header("location: ?page=my_store");
    }else{
        header("location: ?page=home");
    }

 

    

}



if(isset($_FILES['image'])){
    
 
    $file_name = $_FILES['image']['name'];
    $file_tmp =$_FILES['image']['tmp_name'];
  
  

     $temp = explode(".", $_FILES["image"]["name"]);
     $newfilename = $_SESSION["uid"] . ".png";
     move_uploaded_file($_FILES["image"]["tmp_name"], $config["FS"] . DS . $newfilename);
   

     header("Location: ?page=my_store");
 }


?>