<?php
    session_start();
    include("php/config.php");
    include("php/functions.php");
    $user_data = check_login($config);
    $u_id = "";
    if(isset($_GET['id'])){
        $u_id = $_GET['id'];
    }
 

    if(empty($u_id)){

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
        header("Location: users.php");
    }
}
else {
    if(isset($_POST['submit'])){
        $user_name = $_POST['username'];
        $first_name = $_POST['firstname'];
        $sname = $_POST['surname'];
        $password = $_POST['password'];
        $c_password = $_POST['cpassword'];
        $s_type = $_POST['sType'];
        //$dater = date("Y-m-d");

        $username_query = "select * from users where user_id ='$u_id'";
        $verify_username = mysqli_query($config, $username_query );

        if(!empty($user_name) && !empty($first_name) && !empty($sname)&& !empty($password) && !empty($s_type)){
                if(mysqli_num_rows($verify_username) !=1){

                    echo " <div>
                    <p>Please use a different username</p>
                        </div>";

                       // echo " <div><a href='register.php'><button>Go Back </button></a></div>";
                }
                else{
                    if($password === $c_password){
                        //echo "'$dater'";
                        $query = "update users SET user_id ='$user_name',p_word='$password',f_name='$first_name',surname='$sname',type='$s_type' where user_id ='$u_id'";
                        mysqli_query($config,$query) or die("Error connecting to server update");
                         
                        echo"<div>
                        <p>Successfully Updated</p>
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
        header("Location: users.php");
    }

}
 
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="C:\xampp\htdocs\LegalDeposit\bootstrap-5.3.2-dist\css\bootstrap.min.css">-->

    <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Register</title>
</head>
<body>
<header>
        <?php include("topbarr.php"); ?>
        </header>
 <div class="contain1">
 <?php
if ($_SESSION['sType'] == 'admin'){
    include("sidebar.php");   
                          }
                       else {
                        include("sidebar1.php");
                       } ?>
  
        <div class="form">

        <?php 
                    if(isset($u_id)){
                            
                        $que ="select * from users where user_id= '$u_id'";
                        $result = mysqli_query($config, $que); 

                        $row2= mysqli_fetch_assoc($result);
                   
            ?>
          

            <form method="post" action="" id="regForm">
            <div id="formname"><h3>REGISTRATION</h3></div>
                <div class="inputfield">
                    <input type="text" class="regInput" alt="Username" placeholder="User Name" value = "<?php echo isset($row2['user_id']) ? $row2['user_id']: '' ?>" name="username" id="username">
                </div>
                <div class="inputfield">
                    <input type="text" class="regInput" alt="Enter First Name" placeholder="First Name" value = "<?php echo isset($row2['f_name']) ? $row2['f_name']: ''?>" name="firstname" id="firstname">
                </div>
                <div class="inputfield">
                    <input type="text" class="regInput" alt="Enter Surname" placeholder="Surname" value = "<?php echo isset($row2['surname']) ? $row2['surname']: ''?>" name="surname" id="surname">
                </div>
                <div class="inputfield">
                    <input type="password" class="regInput" alt="New Password" placeholder="New Password" name="password" value = "<?php if(isset($row2['p_word'])){echo $row2['p_word'];} else{echo '';}?>" id="password">
                </div>
                <div class="inputfield">
                    <input type="password" class="regInput" alt="Confirm Password" placeholder="Confirm Password" value = "<?php echo isset($row2['p_word']) ? $row2['p_word']: ''?>" name="cpassword" id="cpassword">
                </div>
                <div class="stafftype">
                    <label for="stafft" id="stafflabel">Type</label>
                    <select name="sType" id="stafft">
                    <?php if ($row2['type'] !="staff" && $row2['type'] !="admin") {?>
                        <option value=" " <?php echo 'selected'; ?>></option><?php } ?>
                        <option value="staff" <?php if(isset($row2['type']) && $row2['type'] == "staff"){ echo 'selected';} else {echo '';} ?>>Staff</option>
                        <option value="admin" <?php if(isset($row2['type']) && $row2['type'] == "admin"){ echo 'selected';}else {echo '';} ?>>Admin</option>

                    </select>
                </div>
                <div class="inputsubmit">
                    <button type="submit" id="submit" name="submit">Submit</button>
                </div>
                 
            </form>
            <?php } ?>
        </div>
                    </div>

  
    

    <!--<script src="C:\xampp\htdocs\LegalDeposit\bootstrap-5.3.2-dist\js\bootstrap.min.js"></script> -->
    <script>
    <script src="jquery/jquery3.7.js"></script>
    <script src="./bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</script>
</body>
</html>