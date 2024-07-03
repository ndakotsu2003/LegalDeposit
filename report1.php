<?php
    session_start();
    include("php/config.php");
    include("php/functions.php");
    
    
    
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
    <script defer src="js.js"></script>
    <title>Report</title>
</head>
<body>
    <header>
    <?php include("topbarr.php"); ?>
    </header>
    <div class="contain">
    <?php include("sidebar.php"); ?>
        <div class="top_part">
            <div id="r_header">REPORTS</div>
            <div id="month">
                <p>Please Select the month and year</p>
                <div class="selectt">
                    <label for="month_drop" id="monthlabel">Month</label>
                    <select name="mType" id="month_drop">
                    
                        <option value=" "></option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>

                    </select>

                    <label for="year_drop" id="yearlabel">Year</label>
                    <select name="yType" id="year_drop" onclick="populate_year()">
                    
                        <option value=" "></option>
                    </select>
                </div>
                <div id="generate">
                    <button onclick="populate()">Generate</button></div>
           </div>
        </div>
        <div id="report">
            <div id="table1">
                <p>the total number of books is <span id="fillu"></span><p>
                    <table class="table table-bordered" id="tab_1">
                        <thead>
                            
                            <colgroup>
                                            <col width="10%">
                                            <col width="20%">
                                            <col width="10%">
                                            <col width="10%">
                                            
                                        </colgroup>
                            <tr>
                                <th class="text-center">S/N</th>
                                <th class="text-center">Materials Recieved</th>
                                <th class="text-center">Titles</th>
                                <th class="text-center">Volumes</th>
                                
                            </tr>
                                            </thead>
                    <tbody id="tab1">



                    </tbody>


                                            </table>


            </div>
            <div id="table2">
                    <table class="table table-bordered" id="tab_2">
                        <thead>
                            
                            <colgroup>
                                            <col width="10%">
                                            <col width="20%">
                                            <col width="10%">
                                            <col width="10%">
                                            
                                        </colgroup>
                            <tr>
                                <th class="text-center">S/N</th>
                                <th class="text-center">State</th>
                                <th class="text-center">Titles</th>
                                <th class="text-center">Volumes</th>
                                
                                
                            </tr>
                                            </thead>
                    <tbody id="tab2">



                    </tbody>


                                            </table>


            </div>
    </div>
    <script>
            
       
        function populate_year(){
            let dateDropdown = document.getElementById('year_drop'); 
       
            let currentYear = new Date().getFullYear();    
            let earliestYear = 2000;     
            while (currentYear >= earliestYear) {      
                let dateOption = document.createElement('option');          
                dateOption.text = currentYear;      
                dateOption.value = currentYear;        
                dateDropdown.add(dateOption);      
                currentYear -= 1;  
            }  
        }

        function populate(){
            firsttable();
            secondtable();
        }
        function firsttable(){
            var mon = document.getElementById("month_drop").value;
            var yr = document.getElementById("year_drop").value;
            $.ajax({
			url: "rep1.php",
			method: "POST",
			data: {mon: mon,
                    yr: yr,
                action: "populate_first"
            
                  }
            ,
			success: function(data){
                           
             $("#tab1").html(data);
            }
		});
       
        }

        function secondtable(){
            var mon = document.getElementById("month_drop").value;
            var yr = document.getElementById("year_drop").value;
            $.ajax({
			url: "rep2.php",
			method: "POST",
			data: {mon: mon,
                    yr: yr,
                action: "populate_second"
            
                  }
            ,
			success: function(data){
                           
             $("#tab2").html(data);
            }
		});
        }

        function popup(){
            document.getElementById("fillu").innerHTML = document.getElementByID("fill_up").innerText;
        }
    </script>
     <script src="jquery/jquery3.7.js"></script>
     <script src="./bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
     <script src="./bootstrap-5.3.2-dist/js/dtjs/dataTables.js"></script>
     <script src="./bootstrap-5.3.2-dist/js/dtjs/dataTables.bootstrap5.js"></script>
</body>
</html>