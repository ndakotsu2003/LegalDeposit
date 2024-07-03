<?php
 session_start();
 include("php/config.php");
 include("php/functions.php");
 $user_data = check_login($config);

 $b_id = $_GET['id'];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <div class="contain">

        <div class="displayarea">
            <?php 
                    if(isset($_GET['id'])){
                            
                        $que ="select books.book_id, books.title, books.author, books.p_name,books.p_of_pub,books.y_of_pub,books.isbn_ssn,books.access_no,legald.l_dep_no,legald.copies_deposit,legald.s_o_dep,legald.d_o_dep,legald.contact_address,legald.remark from books inner join legald on books.book_id = legald.book_id where books.book_id = '$b_id'";
                        $result = mysqli_query($config, $que); 

                        $row2= mysqli_fetch_assoc($result);
                   
            ?>
            <div id="view_header">LEGAL DEPOSIT VIEW</div>

            <div class="row">
                <p>BOOK TITLE : <?php echo $row2['title']?> </p>
            </div>
            <div class="row">
                <p>AUTHOR/EDITORS NAME : <?php echo $row2['author']?> </p>
            </div>
            <div class="row">
                <p>PUBLISHERS NAME : <?php echo $row2['p_name']?></p>
            </div>
            <div class="row">
                <p>PLACE OF PUBLICATION :  <?php echo $row2['p_of_pub']?></p>
            </div>
            <div class="row">
                <p>YEAR OF PUBLICATION :  <?php echo $row2['y_of_pub']?></p>
            </div>
            <div class="row">
                <p>ISBN/ISSN : <?php echo $row2['isbn_ssn']?></p>
            </div>
            <div class="row">
                <p>ACCESSION NUMBER : <?php echo $row2['access_no']?></p>
            </div>
            <div class="row">
                <p>LEGAL DEPOSIT NUMBER : <?php echo $row2['l_dep_no']?></p>
            </div>
            <div class="row">
                <p>DATE OF DEPOSIT : <?php echo $row2['d_o_dep']?></p>
            </div>
            <div class="row">
                <p>TYPE OF DEPOSIT : <?php echo $row2['copies_deposit']?></p>
            </div>
            <div class="row">
                <p>STATE OF DEPOSIT : <?php echo $row2['s_o_dep']?></p>
            </div>
            <div class="row">
                <p>CONTACT ADDRESS : <?php echo $row2['contact_address']?></p>
            </div>
            <div class="row">
                <p>REAMARKS : <?php echo $row2['remark']?></p>
            </div>

        </div>
             <?php } ?>

            <div id="buttons">
            <a class=><button id="print">Print Receipt</button></a>
            <a class="btt" href= "edit.php?id=<?php echo $b_id?> & crazy"  ><button id="edit">Edit</button></a>
        
            </div>
    </div>

    
</body>
</html>