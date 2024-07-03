<?php
 session_start();

 include ("php/config.php");
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <title>Login Page</title>
   
</head>
<body>
        <div class="body">
            <div id="right">
                <h1>LEGAL DEPOSIT <br> REPOSITORY</h1>
            </div>
            <div id="left">
                <div id="leftbod">
                    <?php
                    
                       if(isset ($_POST['submit'])){
                          $user_id = mysqli_real_escape_string($config, $_POST['username']);
                          $password = mysqli_real_escape_string($config, $_POST['password']);

                          $sql = "SELECT * FROM users WHERE user_id ='$user_id' and p_word ='$password'";
                          $result = mysqli_query($config, $sql);
                          $row = mysqli_fetch_assoc($result);

                          if(is_array($row) && !empty($row)){
                            $_SESSION['userName'] = $row['user_id'];
                            $_SESSION['firstName'] = $row['f_name'];
                            $_SESSION['lastName'] = $row['surname'];
                            $_SESSION['sType'] =$row['type'];
                            
                          }
                          else {
                            echo " <div id='error'>
                                        <p>Wrong Login details </p>
                                    </div>";
                            echo " <a href='login.php'><button>Go Back</button></a>";
                            
                             }
                          if (isset($_SESSION['userName'])){
                            header("Location: index.php");
                          }
                        } else {
                    ?>
                <div id="hdd"><h3>Logo</h3></div>
                        <form action="" method="post" id="newF">
                            <h3>Login</h3>
                            <input class="fInput" type="text" name="username" id="username" alt="Enter Username" placeholder="Username">
                            <input class="fInput" type="password" name="password" id="password" alt="Enter Password" placeholder="Password">
                            <input type="submit" name="submit" id="sub" value="Login">
                        </form>
        </div>
        <?php } ?>
        </div>
    
</div>
    <script src="js.js"></script>
</body>
</html>