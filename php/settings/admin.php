<?php
include('connection-db.php');

if(isset($_POST['ID']) && $_POST['action']=="add"){
    $id = $_POST['ID'];
    $grant = $_POST['grant'];
    $query = "UPDATE `access` SET `access`=1 ,`grantedBy`='$grant' WHERE ID='$id';";
    $result=  mysqli_query($con, $query);
}
if(isset($_POST['ID']) && $_POST['action']=="remove"){
    $id = $_POST['ID'];
    $grant = $_POST['grant'];
    $query = "UPDATE `access` SET `access`=0 ,`grantedBy`='$grant' WHERE ID='$id';";
    $result=  mysqli_query($con, $query);
}

if(isset($_POST['ID']) && $_POST['action']=='delete'){
    $id = $_POST['ID'];
    if($_POST['type']=='person'){
        $query = "DELETE FROM `person_record` WHERE `person_record`.`ID` = $id;";
        $result=  mysqli_query($con, $query);
        if($result ==1){
            echo "<div class='panel panel-success'><div class='panel-heading'>رسالة</div><div class='panel-body'>تم حذف السجل المطلوب</div></div>;";
        }
        else{
            echo "<div class='panel panel-danger'><div class='panel-heading'>رسالة</div><div class='panel-body'>يوجد خطا ما</div></div>;";
        }
    }
    else{
        $query = "DELETE FROM `car_record` WHERE `car_record`.`ID` = $id;";
        $result=  mysqli_query($con, $query);
        if($result ==1){
            echo "<div class='panel panel-success'><div class='panel-heading'>رسالة</div><div class='panel-body'>تم حذف السجل المطلوب</div></div>;";
        }
        else{
            echo "<div class='panel panel-danger'><div class='panel-heading'>رسالة</div><div class='panel-body'>يوجد خطا ما</div></div>;";
        }
    }
}
?>