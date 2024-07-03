<?php
    session_start();
    include("php/config.php");
    include("php/functions.php");
    include("topbarr.php");
    $user_data = check_login($config);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/dtcss/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.1-web/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="jquery/jquery3.7.js"></script>
    <script defer src="js.js"></script>
    <title>Home</title>
</head>
<body>
        
<div id="displaytable">
<?php
if ($_SESSION['sType'] == 'admin'){
    include("sidebar.php");   
                          }
                       else {
                        include("sidebar1.php");
                       } ?>
        
        
        <div id="tabdiv">
        <a class="alink" href="register.php"><button class="add">New User <i class="fa-solid fa-plus"></i></button></a>
    <table class="table table-bordered" id="tab">
        <p id="rre">blank</p>
        <thead class="">
            <th class="tab_head">#</th>
            <th class="tab_head">First Name</th>
            <th class="tab_head">Surname</th>
            <th class="tab_head">Type</th>
            <th class="tab_head">Action</th>
        </thead>
        <tbody>
            <?php
                $query = "select * from users";
                $result = mysqli_query($config, $query);
                
                        
                    $i =1;
                while($row = mysqli_fetch_assoc($result)){
                    
            ?>
        
            <tr>
             <td class="tab_data"><?php echo $i?></td>
             <td class="tab_data"><?php echo $row['f_name']?></td>
             <td class="tab_data"><?php echo $row['surname']?></td>
             <td class="tab_data"><?php echo $row['type']?></td>
             <!--<td class="tab_data"><a><button id="del" onclick = "deleted(<?php echo $row['user_id']?>)"  value = "<?php echo $row['user_id']?>">Delete </button></a><a href= "register.php?id=<?php echo $row['user_id']?> & crazy"  ><button >Edit</button></a></td> -->
             <td class="tab_data action_butt"><a class="btt"><button id="del1" onclick = "deleted('<?php echo $row['user_id']?>')" value = "<?php echo $row['user_id']?>">Delete</button></a>
             <a class="btt" href= "register.php?id=<?php echo $row['user_id']?> & crazy"  ><button id="edit1">Edit</button></a>
            </td> 
            </tr>
        <?php 
        $i++;
        } ?>
        </tbody>
</table>

    </div>
    </div>
    
<script>
    let you  = document.getElementById('mod');
    let you2  = document.getElementById('weyre');
    let you3  = document.getElementById('del');
    let yes  = document.getElementById('yesbtn');
    let yesA  = document.getElementById('yesA');
    let lori  = document.getElementById('lori');
    let ref= document.querySelector('.tt');
    let yrr  = document.getElementById('yy');
    let tester  = document.getElementById('rre');
    

    function deleted(id){
          
        var result = confirm("Are you sure you want to delete?");
   if(result){
        $.ajax({
			url: "delete.php",
			method: "POST",
			data: {
                id: id,
                action: "deleteuser"
                }
			,
			success: function(response){
              // Response is the output of action file
              if(response == 1){
                alert("Data Deleted Successfully");
                location.reload();
              }
              else {
                alert("Data Cannot Be Deleted");
                location.reload();
              }
            }
		});

        
    }
    
    }
    </script>
    </script>
    <script src="jquery/jquery3.7.js"></script>
    <script src="./bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
    <script src="./bootstrap-5.3.2-dist/js/dtjs/dataTables.js"></script>
    <script src="./bootstrap-5.3.2-dist/js/dtjs/dataTables.bootstrap5.js"></script>
</body>
</html>