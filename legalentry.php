<?php
 session_start();
 include("php/config.php");
 include("php/functions.php");
 $user_data = check_login($config);

 if(isset($_POST['submit'])){
    $book_id = randomize();
    $book_title = $_POST['b_title'];
    $authorname = $_POST['authname'];
    $pub_name= $_POST['p_name'];
    $placeofpub = $_POST['p_publication'];
    $y_pub = $_POST['y_publication'];
    $isbn = $_POST['isbn_ssn'];
    $acc_no = $_POST["ac_no"];
    $book_cat = $_POST["bCat"];
    $deposit_no = $_POST["ld_no"];
    $date_dep = date('Y-m-d',strtotime($_POST['d_o_d']));
    $booktype = $_POST["bType"];
    $dep_type = $_POST["gui"];
    $state_dep = $_POST["sDepo"];
    $con_add = $_POST["c_add"];
    $remarks = $_POST["remarks"];

    $query = "insert  into books (book_id,title,author,p_name,p_of_pub,y_of_pub,isbn_ssn,access_no,book_type) values('$book_id','$book_title','$authorname','$pub_name','$placeofpub','$y_pub','$isbn','$acc_no','$book_cat');";
    $query2="insert into legald (l_dep_no,copies_deposit,dep_type,s_o_dep,d_o_dep,contact_address,remark, book_id) values('$deposit_no','$booktype','$dep_type','$state_dep','$date_dep','$con_add','$remarks','$book_id');";
    mysqli_query($config,$query) or die("Error connecting to server");
    mysqli_query($config,$query2) or die("Error connecting to server");

   
   



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
    <title>Legal Deposit</title>
</head>
<body>
        <header>
        <?php include("topbarr.php"); ?>
        </header>
<div class="contain">
<?php
if ($_SESSION['sType'] == 'admin'){
    include("sidebar.php");   
                          }
                       else {
                        include("sidebar1.php");
                       } ?>
    <div class="form">
            
            <form method="post" action="" class="lForm">
                <div id="formname"><h3>LEGAL DEPOSIT ENTRY</h3></div>
                <div class="inputentry">
                    <input type="text" class="legInput" alt="Book title" placeholder="Book Title" name="b_title" id="b_title">
                </div>
                <div class="inputentry">
                    <input type="text" class="legInput" alt="Authors Name" placeholder="Author/Editors Name" name="authname" id="authname">
                </div>
                <div class="inputentry">
                    <input type="text" class="legInput" alt="Publishers Name" placeholder="Publishers Name" name="p_name" id="p_name">
                </div>
                <div class="inputentry">
                    <input type="text" class="legInput" alt="Place of Publication" placeholder="Place of Publication" name="p_publication" id="p_publication">
                </div>
                <div class="inputentry">
                    <input type="text" class="legInput" alt="Year of Publication" placeholder="Year of Publication" name="y_publication" id="y_publication">
                </div>

                <div class="inputentry">
                    <input type="text" class="legInput" alt="ISBN/ISSN" placeholder="ISBN/ISSN" name="isbn_ssn" id="isbn_ssn">
                </div>

                <div class="bookCat">
                    <label for="bookCatee" id="booklabel2">Book Category</label>
                    <select name="bCat" id="bookCatee">
                        <option value=" " disabled selected>Select Type</option>
                        <option value="Monographs">Monographs</option>
                        <option value="Serials">Serials</option>
                       

                    </select>
                </div>

                <div class="inputentry">
                    <input type="text" class="legInput" alt="Accession Number" placeholder="Accession Number" name="ac_no" id="ac_no">
                </div>
                <div class="inputentry">
                    <input type="text" class="legInput" alt="Legal Deposit Number" placeholder="Legal Deposit Number" name="ld_no" id="ld_no">
                </div>
                <div class="dateDep">
                <label for="d_o_d" id="datelabel">Date of Deposit</label>
                    <input type="date" class="legInput" alt="Date of Deposit"   placeholder="Date of Deposit" name="d_o_d" id="d_o_d">
                </div>

                <div class="booktype">
                    <label for="bookt" id="booklabel1">Deposit Type</label>
                    <select name="bType" id="bookt" >
                        <option value=" " disabled selected>Select Type</option>
                        <option value="3">Private</option>
                        <option value="10">State</option>
                        <option value="25">Federal</option>

                    </select>
                    <input type="hidden" value="empty" name="gui" id="gui">
                </div>
                <div class="soDeposit">
                    <label for="soD" id="booklabel1">State of Deposit</label>
                    <select name="sDepo" id="soD">
                    
                            <option disabled selected>Select State</option>
                            <option value="Abia">Abia</option>
                            <option value="Adamawa">Adamawa</option>
                            <option value="Akwa Ibom">Akwa Ibom</option>
                            <option value="Anambra">Anambra</option>
                            <option value="Bauchi">Bauchi</option>
                            <option value="Bayelsa">Bayelsa</option>
                            <option value="Benue">Benue</option>
                            <option value="Borno">Borno</option>
                            <option value="Cross River">Cross River</option>
                            <option value="Delta">Delta</option>
                            <option value="Ebonyi">Ebonyi</option>
                            <option value="Edo">Edo</option>
                            <option value="Ekiti">Ekiti</option>
                            <option value="Enugu">Enugu</option>
                            <option value="FCT">Federal Capital Territory</option>
                            <option value="Gombe">Gombe</option>
                            <option value="Imo">Imo</option>
                            <option value="Jigawa">Jigawa</option>
                            <option value="Kaduna">Kaduna</option>
                            <option value="Kano">Kano</option>
                            <option value="Katsina">Katsina</option>
                            <option value="Kebbi">Kebbi</option>
                            <option value="Kogi">Kogi</option>
                            <option value="Kwara">Kwara</option>
                            <option value="Lagos">Lagos</option>
                            <option value="Nasarawa">Nasarawa</option>
                            <option value="Niger">Niger</option>
                            <option value="Ogun">Ogun</option>
                            <option value="Ondo">Ondo</option>
                            <option value="Osun">Osun</option>
                            <option value="Oyo">Oyo</option>
                            <option value="Plateau">Plateau</option>
                            <option value="Rivers">Rivers</option>
                            <option value="Sokoto">Sokoto</option>
                            <option value="Taraba">Taraba</option>
                            <option value="Yobe">Yobe</option>
                            <option value="Zamfara">Zamfara</option>
                            </select>
                </div>

                <div class="inputentry">
                    <input type="text" class="legInput" alt="Contact Address" placeholder="Contact Address" name="c_add" id="c_add">
                </div>
                <div class="textentry">
                    <label for="remarks" id="remarklabel">Remarks</label>
                    <textarea alt="Remarks" placeholder="Remarks to be made......" name="remarks" id="remarks" rows="5" cols="50" > </textarea>
                </div>
                <div id="subbutton">
                    <button type="submit" id="subLeg" name="submit">Submit</button>
                </div>
            </form>

    </div>

 </div>
<script>

    document.getElementById('bookt').addEventListener("click",type,true);
        function change(){
            let a = document.getElementById('d_o_d').innerText;
            let c = a.split('-').reverse().join('-');
            a = c;
            alert(a);
            console.log(a);
        }

        function type(){
            var vv = document.getElementById("bookt").value;
            if(vv == "3"){
                document.getElementById("gui").value= "Private";
            }
            else if (vv == "10"){
                document.getElementById("gui").value= "State";
            }
            else{
                document.getElementById("gui").value= "Federal";
            }
        }

</script>
<script>
    <script src="jquery/jquery3.7.js"></script>
    <script src="./bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</script>
    
</body>
</html>