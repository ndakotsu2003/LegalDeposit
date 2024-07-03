<?php
 session_start();
 include("php/config.php");
 include("php/functions.php");
 $user_data = check_login($config);
 
 


?>
<?php



if(isset($_POST["action"])){
    
    if($_POST["action"] == "deleterecord"){
      deleterecord();
    }
    else if($_POST["action"] == "deleteuser"){
        deleteuser();
      }

  }

// if(isset($_POST["action"])){
    
//        if($_POST["action"] == "deleterecord"){
//    deleteuser();
//      }
         
    
//      }
     
 
function deleterecord(){
    include("php/config.php");
    
    if($_POST['id']){
           
        
        $query = "delete from books where book_id = '$_POST[id]'";
        $query2 = "delete from legald where book_id = '$_POST[id]'";
       
        mysqli_query($config,$query) or die("Error connecting to server");
        mysqli_query($config,$query2) or die("Error connecting to server");
        
        echo 1;
    
    }
    

}

function deleteuser(){
    
    include("php/config.php");
    
    if($_POST['id']){
    
        
        
        $query = "delete from users where user_id = '$_POST[id]'";
        
       
        mysqli_query($config,$query) or die("Error connecting to server");
        
        echo 1;
    
    }
    
    

}






?>


