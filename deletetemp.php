<?php
 session_start();
 include("php/config.php");
 include("php/functions.php");
 $user_data = check_login($config);

 $b_id = $_GET['id'];
 /*if(isset($b_id)){

    $query = "delete from books where book_id = '$b_id'";
    $query2 = "delete from legald where book_id = '$b_id'";
   
    mysqli_query($config,$query) or die("Error connecting to server");
    mysqli_query($config,$query2) or die("Error connecting to server");
   
    header("Location: index.php");
 }
*/



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <p>BITCHES</p>
    <p><?php echo $b_id?> </p>
</body>
</html>


if($row1 && $row2){

$query = "delete from books where book_id = '$del_id'";
$query2 = "delete from legald where book_id = '$del_id'";

mysqli_query($config,$query) or die("Error connecting to server");
mysqli_query($config,$query2) or die("Error connecting to server");

echo 1;

}
else{
echo 0;
exit;
}

