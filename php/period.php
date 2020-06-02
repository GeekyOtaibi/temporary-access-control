<?php
if(isset($_POST['residence'])){
    $residence = $_POST['residence'];
    if($residence == ''){
        die();
    }
    include('connection-db.php');
    $query = "SELECT sum(period) FROM person_record where residence='$residence'";
    $result=  mysqli_query($con, $query);
    $row=mysqli_fetch_assoc($result);
    $sum = $row['sum(period)'];
    
    $query = "SELECT access FROM access where ID='$residence'";
    $result=  mysqli_query($con, $query);
    
    if( mysqli_num_rows($result) > 0){
        $row=mysqli_fetch_assoc($result);
        $access = $row['access'];
    }
    else{
        $access = '0';
    }
    
    $person = array("period"=>$sum,"access"=>$access);
    header("Content-Type: application/json");
    echo json_encode($person);
}

if(isset($_POST['carNum'])){
    $carNum = $_POST['carNum'];
    if($carNum == ''){
        die();
    }
    include('connection-db.php');
    $query = "SELECT sum(period) FROM car_record where carNum='$carNum'";
    $result=  mysqli_query($con, $query);
    $row=mysqli_fetch_assoc($result);
    $sum = $row['sum(period)'];
    
    $query = "SELECT access FROM access where ID='$carNum'";
    $result=  mysqli_query($con, $query);
    
    if( mysqli_num_rows($result) > 0){
        $row=mysqli_fetch_assoc($result);
        $access = $row['access'];
    }
    else{
        $access = '0';
    }
    
    $car = array("period"=>$sum,"access"=>$access);
    header("Content-Type: application/json");
    echo json_encode($car);
}
?>