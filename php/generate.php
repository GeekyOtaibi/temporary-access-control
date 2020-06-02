<?php
    include('connection-db.php');
    $query = "SELECT max(genNum),year from controlnumber as lastnum limit 1;";
    $result=  mysqli_query($con, $query);
    $row=mysqli_fetch_assoc($result);
    $genNum = $row['max(genNum)'] + 1;
    $lastyear = $row['year'];
    if(date('y',strtotime('20'.$lastyear)) != date('y')){
        $genNum = 1;
    }
    
    //echo 'stage 1 success. genNum='.$genNum.' lastyear='.$lastyear.' year='.date('y');

    $unit = $_POST['unit'];
    $year = date('y');
    $concat = $unit.'-'.$year.'-'.$genNum;

    //echo '<br>stage 2 success. concat='.$concat;
    
    include('connection-db.php');
    $query = "INSERT INTO `controlnumber`(`unit`, `year`, `genNum`, `fullcode`) VALUES ('$unit','$year',$genNum,'$concat')";
    $result=  mysqli_query($con, $query);

    //echo '<br>stage 3 success. result='.$result;
    echo $concat;
    
?>