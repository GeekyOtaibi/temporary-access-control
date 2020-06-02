<?php
    echo 'start submit record: ';

    include('connection-db.php');
    $query = "SELECT fullcode FROM controlnumber ORDER BY ID DESC limit 1;";
    $result=  mysqli_query($con, $query);
    $row=mysqli_fetch_assoc($result);
    echo '<br> fullcode='.$row['fullcode'];

    if(isset($_POST['residence'])){
    $controlNum = $row['fullcode'];
    $residence = $_POST['residence'];
    $respCenter = $_POST['respCenter'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $period = $_POST['period'];
    $notes = $_POST['notes'];
    $postDate = date('Y-m-d');
    $username = $_POST['username'];
    $startDate = date('Y-m-d',strtotime($startDate));
    $endDate = date('Y-m-d',strtotime($endDate));

    $query = "INSERT INTO `person_record`(`controlNum`, `residence`, `respCenter`, `company`,`location`, `postDate`, `startDate`, `endDate`, `username`, `period`, `note`) VALUES ('$controlNum','$residence','$respCenter','$company','$location','$postDate','$startDate','$endDate','$username','$period','$notes')";

    $result=mysqli_query($con,$query);
    if($result==1){
        echo '<br>person: stage 1 successed';
        
        $query = "SELECT ID FROM access WHERE ID='$residence';";
        $result= mysqli_query($con,$query);
        
        if(mysqli_num_rows($result) < 1){
            $query = "INSERT INTO access (ID,access) values ('$residence',0);";
            $result=mysqli_query($con,$query);
                if($result==1){
                    echo "<br>add to limit table.";
                }
        }
    }
    else{
        echo '<br>person: stage 1 failed';
    }
}
    if(isset($_POST['carNum'])){
    $controlNum = $row['fullcode'];
    $carNum = $_POST['carNum'];
    $respCenter = $_POST['respCenter'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $period = $_POST['period'];
    $notes = $_POST['notes'];
    $postDate = date('Y-m-d');
    $username = $_POST['username'];
    $startDate = date('Y-m-d',strtotime($startDate));
    $endDate = date('Y-m-d',strtotime($endDate));

    $query = "INSERT INTO `car_record`(`controlNum`, `carNum`, `respCenter`, `company`,`location`, `postDate`, `startDate`, `endDate`, `username`, `period`, `note`) VALUES ('$controlNum','$carNum','$respCenter','$company','$location','$postDate','$startDate','$endDate','$username','$period','$notes')";
        
    $result=mysqli_query($con,$query);
    if($result==1){
        echo '<br>car: stage 1 successed';
        
        $query = "SELECT ID FROM access WHERE ID='$carNum';";
        $result= mysqli_query($con,$query);
        
        if(mysqli_num_rows($result) < 1){
            $query = "INSERT INTO access (ID,access) values ('$carNum',0);";
            $result=mysqli_query($con,$query);
                if($result==1){
                    echo "<br>add to limit table.";
                }
            
        }
    }
    else{
        echo '<br>car: stage 1 failed';
    }
}
?>