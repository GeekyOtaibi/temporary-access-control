<?php

if(isset($_POST['mng-type'])){

$username = $_POST['username'];
$name = $_POST['name'];
$password = $_POST['password'];
$type = $_POST['type'];
$unit = $_POST['unit'];
$mng = $_POST['mng-type'];

include('connection-db.php');
if($mng == 'add'){
    $query = "INSERT INTO `users`(`username`, `name`, `password`, `type`, `unit`) VALUES ('$username','$name',md5($password),'$type','$unit');";
}
else{
    if($password != ''){ $password = ",`password`=md5($password)"; }
    $query = "UPDATE `users` SET `name`='$name' $password,`type`='$type',`unit`='$unit' WHERE username='$username';";
}
$result=  mysqli_query($con, $query);
if($result == 1){ ?>
    <div class="alert alert-success" role="alert">تمت العملية بنجاح</div>
<?php }else{ ?>
    <div class="alert alert-danger" role="alert">هنالك خطأ في المدخلات</div>
<?php }
    die();
}
if(isset($_POST['search'])){
    $search = $_POST['search'];
    include('connection-db.php');
    $query = "SELECT name,type,unit FROM users WHERE username = $search;";
    $result=  mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    
    $user = array("name"=>$row['name'],"type"=>$row['type'],"unit"=>$row['unit']);
    header("Content-Type: application/json");
    echo json_encode($user);
}
?>
