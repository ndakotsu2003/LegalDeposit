<?php
    session_start();
    include("php/config.php");
    include("php/functions.php");
    
    
    
    $user_data = check_login($config);
    $mon = $_POST['mon'];
    $yr = $_POST['yr'];

?>

<?php
        $titlesum=0;
        $volumesum=0;
        $date1= "$yr-$mon-31";
        $date2= "$yr-$mon-01";
        $query1 = "Select  legald.s_o_dep , COUNT(legald.s_o_dep)AS titles,SUM(legald.copies_deposit)AS total_copies from legald 
        WHERE legald.d_o_dep <= '$date1' 
        AND legald.d_o_dep>='$date2' GROUP BY legald.s_o_dep";
        $result = mysqli_query($config,$query1) or die("Error connecting to server");
        $i =1;
        while($row1=$result->fetch_assoc()){
            $titlesum1 = $row1['titles'];
            $volumesum1 = $row1['total_copies'];
            $titlesum+= $titlesum1;
            $volumesum+=$volumesum1;
?>
        <tr>
        <td style= 'text-align: center'><?php echo $i ?></td>
        <td style= 'text-align: center'><?php echo $row1['s_o_dep']?></td>
        <td style= 'text-align: center'><?php echo $row1['titles'] ?></td>
        <td style= 'text-align: center'><?php echo $row1['total_copies'] ?></td>
        
        
        <?php
            $i++;
        }


        ?>
        <tr>
        <td style= 'text-align: center'></td>
        <td style= 'text-align: center'><?php echo "Total"?></td>
        <td style= 'text-align: center'><?php echo $titlesum?></td>
        <td style= 'text-align: center' id="fill_up"><?php echo $volumesum?></td>
        </tr>
     <?php
     ?>
     


