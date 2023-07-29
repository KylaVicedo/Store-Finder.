<?php 
header("Cache-control: no-cache");


$result = mysqli_query($connection,"SELECT * FROM bookmark LEFT JOIN store on bookmark.store_id = store.id WHERE bookmark.username = '".$_SESSION["bookmark"]."' ORDER BY bookmark.id DESC ");


if(array_key_exists("btn_search",$_POST)){
$_SESSION["bookmark"] = $_REQUEST["search"];
header("Location: ?page=bookmark");
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
    
          
           header("location: ?page=bookmark");
        }else{
            header("location: ?page=home");
        }
    
     
    
        
    
    }

   
    
        if(array_key_exists("btn_remove",$_POST)){
            $query = "DELETE FROM bookmark WHERE username = '".$_SESSION["bookmark"]."' AND store_id = '".$_REQUEST["id"]."'";
        
            if(mysqli_query($connection,$query)){
        
              
               header("location: ?page=bookmark");
            }else{
                header("location: ?page=home");
            }
        
         
        
            
        
        }


?>