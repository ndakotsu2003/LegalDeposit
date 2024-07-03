<?php 

function check_login($config){

    if (isset($_SESSION['userName']))
    {
        $user_name = $_SESSION['userName'];
        $query= "select * from users where user_id = '$user_name' ";
        $result  = mysqli_query($config, $query);

        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    else{
        header("Location: login.php");
        die();
    }
}


function randomize(){
    $time =6;
    $character = '0123456789';
    $random ='';
    for($i =0; $i < $time; $i++){

        $ran = mt_rand(0,strlen($character)-1);
        $random .= $character[$ran];
    }

     $random .= rand(1,250);
     return $random;

}
function changeDate($val){
    $cDate = explode('/',$val);
    $year = $cDate[2];
    $month =$cDate[1];
    $day=$cDate[0];
    $new_date = $year . '-' . $month . '-' . $day;
     return $new_date;
}

?>