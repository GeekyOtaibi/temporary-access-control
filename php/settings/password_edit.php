<?php 
$curpassword = $_POST['curpassword'];
$newpassword = $_POST['newpassword'];
$username = $_POST['username'];

include('connection-db.php');
$query = "SELECT password FROM users WHERE username='$username';";
$result=  mysqli_query($con, $query);
$row=mysqli_fetch_assoc($result);

if($row['password'] == md5($curpassword)){
    $query = "UPDATE users SET password= md5($newpassword) WHERE username='$username';";
    $result=  mysqli_query($con, $query);
    if($result == 1){ ?>
    <div class="alert alert-success" role="alert">تم تغيير الكلمة الرور بنجاح</div>
    <?php }else{ ?>
    <div class="alert alert-danger" role="alert">حدث خطأ في ادخال المعلومات. الرجاء التواصل مع مسؤول النظام</div>
    <?php } 
}else{ ?>
    <div class="alert alert-danger" role="alert">كلمة المرور الحالية غير صحيحة</div>
<?php } ?>