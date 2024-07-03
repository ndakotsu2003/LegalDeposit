<?php
    session_start();
    include("php/config.php");
    include("php/functions.php");
    $user_data = check_login($config);

    if(isset($_POST['submit'])){
        $user_name = $_POST['username'];
        $first_name = $_POST['firstname'];
        $sname = $_POST['surname'];
        $password = $_POST['password'];
        $c_password = $_POST['cpassword'];
        $s_type = $_POST['sType'];
        $dater = date("Y-m-d");

        $username_query = "select * from users where user_id ='$user_name'";
        $verify_username = mysqli_query($config, $username_query );

        if(!empty($user_name) && !empty($first_name) && !empty($sname)&& !empty($password) && !empty($s_type)){
                if(mysqli_num_rows($verify_username) !=0){

                    echo " <div>
                    <p>Please use a different username</p>
                        </div>";

                        echo " <div><a href='register.php'><button>Go Back </button></a></div>";
                }
                else{
                    if($password === $c_password){
                        echo "'$dater'";
                        $query = "insert into users (user_id,p_word,f_name,surname,type,d_created) values('$user_name','$password','$first_name','$sname','$s_type','$dater')";
                        mysqli_query($config,$query) or die("Error connecting to server");
                         
                        echo"<div>
                        <p>Successfully Registered</p>
                            </div>";
                    }
                    else{
                        echo "Password isnt confirmed";
                    }
                }
        }
        else{
            echo "<div>
                    <p>Fill eveery field '$user_name'</p>
            </div>";
        }

    }
 
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--<link rel="stylesheet" href="C:\xampp\htdocs\LegalDeposit\bootstrap-5.3.2-dist\css\bootstrap.min.css">-->

    

    <title>Register</title>
</head>
<body>
<header>
        <?php include("topbarr.php"); ?>
        </header>
  <div id="contain">
  <?php include("sidebar.php"); ?>
        <div class="form">
            <div id="fLogo">LOGO</div>
            <form method="post" action="" id="regForm">
                <div class="inputfield">
                    <input type="text" class="regInput" alt="Username" placeholder="User Name" name="username" id="username">
                </div>
                <div class="inputfield">
                    <input type="text" class="regInput" alt="Enter First Name" placeholder="First Name" name="firstname" id="firstname">
                </div>
                <div class="inputfield">
                    <input type="text" class="regInput" alt="Enter Surname" placeholder="Surname" name="surname" id="surname">
                </div>
                <div class="inputfield">
                    <input type="password" class="regInput" alt="New Password" placeholder="New Password" name="password" id="password">
                </div>
                <div class="inputfield">
                    <input type="password" class="regInput" alt="Confirm Password" placeholder="Confirm Password" name="cpassword" id="cpassword">
                </div>
                <div class="stafftype">
                    <label for="stafft" id="stafflabel">Type</label>
                    <select name="sType" id="stafft">
                        <option value=" "></option>
                        <option value="staff">Staff</option>
                        <option value="admin">Admin</option>

                    </select>
                </div>
                <div class="inputsubmit">
                    <button type="submit" id="submit" name="submit">Submit</button>
                </div>
                 
            </form>
        </div>


</div>
    

    <!--<script src="C:\xampp\htdocs\LegalDeposit\bootstrap-5.3.2-dist\js\bootstrap.min.js"></script> -->
    <script>
    <script src="jquery/jquery3.7.js"></script>
    <script src="./bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</script>
</body>
</html>








            