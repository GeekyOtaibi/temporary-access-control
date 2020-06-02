<!DOCTYPE html>
<?php session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
?>
<html dir="rtl">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>إدخال السجلات المؤقتة</title>
      <link rel="stylesheet" href="css/style.css">
      <link rel="icon" type="image/png" href="img/icon1.png" />
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="bower_components/jquery/jquery.js"></script>

    <style>
        body {
            background: #0080ff;
            background: linear-gradient(to bottom right, rgba(255,204,102,0.5) 50%, rgba(0,102,204,0.70) 100%) no-repeat center center fixed
                , url('img/bg.jpeg') no-repeat center center fixed;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default" style="height:80px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">
          <img alt="Brand" src="img/topimg1.png" width="150px">
      </a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    
      <li><a><span class="glyphicon glyphicon-user"></span> المستخدم: <?php echo str_replace('"','', json_encode($_SESSION['name'], JSON_UNESCAPED_UNICODE)); ?></a></li>
      <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> الصفحة الرئيسية</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> تسجيل الخروج</a></li>
    </ul>
  </div>
</nav>

<div class="col-xs-10" id="main">
    <div style="font-size:70px;color:white">صفحة الإعدادات</div>
    <div style="font-size:30px;color:white">الرجاء اختيار احدى خيارات التنقل يمين الشاشة</div>
</div>
<div class="col-xs-2">
  <div class="panel panel-default">
  <div class="panel-heading"><strong>خيارات التنقل</strong></div>
  <div class="list-group">
    <a onclick="panel_selector('php/settings/password_panel.php');" class="list-group-item">تغيير كلمة المرور</a>
    <?php if(isset($_SESSION['type']) && $_SESSION['type']=="admin"){ ?>
    <a onclick="panel_selector('php/settings/mnguser_panel.php');" class="list-group-item list-group-item-warning">إدارة المستخدمين</a>
    <a onclick="panel_selector('php/settings/controlnum_panel.php');" class="list-group-item list-group-item-warning">مراجعة ارقام الضبط</a>
    <?php } ?>
    <?php if(isset($_SESSION['type']) && $_SESSION['type']=="admin" ||  $_SESSION['type']=="staff"){ ?>
    <a onclick="panel_selector('php/settings/access_panel.php');" class="list-group-item list-group-item-warning">صلاحيات تمديد التصاريح للزوار</a>
    <?php } ?>
  </div>
</div>
</div>
    
<?php include('modals.php'); ?>
    
<script src="js/moment.js"></script>
<script src="node_modules/chart.js/dist/Chart.js"></script>
<script src="node_modules/chart.js/dist/Chart.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="bower_components/jquery/jquery.js"></script>
    
<!---<script>----------------------------------------<script>-----------------------------------------------<script>--------->
<script>
    function panel_selector(filename) {
    var target = document.getElementById("main");
        var xhr = new XMLHttpRequest();
        xhr.open('GET', filename , true);
        xhr.onreadystatechange = function () {
          if(xhr.readyState == 2) {
            target.innerHTML = 'Loading...';
          }
          if(xhr.readyState == 4 && xhr.status == 200) {
            target.innerHTML = xhr.responseText;
          }
        }
        xhr.send();
      }
//------------------------------------------------------------------>
    function password_edit(){
        document.getElementById('current-password').style = "border: 1px solid #aaaaaa";
        document.getElementById('new-password1').style = "border: 1px solid #aaaaaa";
        document.getElementById('new-password2').style = "border: 1px solid #aaaaaa";
        var pass = true;
        
        if(document.getElementById('current-password').value == ""){
            pass = false;
            document.getElementById('current-password').style = "border: 1px solid #ff0000";
        }
        if(document.getElementById('new-password1').value == ""){
            pass = false;
            document.getElementById('new-password1').style = "border: 1px solid #ff0000";
        }
        if(document.getElementById('new-password2').value == ""){
            pass = false;
            document.getElementById('new-password2').style = "border: 1px solid #ff0000";
        }
        if(document.getElementById('new-password1').value != document.getElementById('new-password2').value){
            pass = false;
            document.getElementById('new-password1').style = "border: 1px solid #ff0000";
            document.getElementById('new-password2').style = "border: 1px solid #ff0000";
        }
        
        
        if(pass == true){
        $.post('php/settings/password_edit.php'
            ,{
                'curpassword' : document.getElementById('current-password').value,
                'newpassword' : document.getElementById('new-password1').value,
                'username' : "<?php echo $_SESSION['username']; ?>"
            },
        function( data ) { document.getElementById('password-message').innerHTML = data; } );
            }
    }
//------------------------------------------------------------------>
    function show_mng(type){
        document.getElementById('mng-container').style ='visibility:visible';
        if(type =="update"){ 
            document.getElementById("search-btn").style ='visibility:visible'; 
            document.getElementById("password1").placeholder = 'ان لم تكن ترد تغيير كلمة المرور, فدعها فارغة';
            document.getElementById("password2").placeholder = 'ان لم تكن ترد تغيير كلمة المرور, فدعها فارغة';
        }
        else{
            document.getElementById("search-btn").style ='visibility:hidden';
            document.getElementById("password1").placeholder = '';
            document.getElementById("password2").placeholder = '';
        }
    }
//------------------------------------------------------------------>
    function submit_mng(){
        $.post('php/settings/submit_mng.php'
            ,{
                'username' : document.getElementById('username').value,
                'name' : document.getElementById('name').value,
                'password' : document.getElementById('password1').value,
                'type' : document.getElementById('type').value,
                'unit' : document.getElementById('unit').value,
                'mng-type' : document.getElementById('mng-type').value,
            },
        function( data ) { document.getElementById('mng-message').innerHTML = data; } );
    }
//------------------------------------------------------------------>
    function search_user(){
        $.post('php/settings/submit_mng.php'
            ,{
                'search' : document.getElementById('username').value,
            },
        function( user ) { $("#name").val(user.name); $("#type").val(user.type); $("#unit").val(user.unit);} );
    }
//------------------------------------------------------------------>
    function search_controlnum(){
        $.post('php/settings/show_controlnum.php'
            ,{
                'controlnum' : document.getElementById('controlnum').value,
            },
        function( data ) { document.getElementById('records-container').innerHTML = data; } );
    }
//------------------------------------------------------------------>
    function search_access(){
        document.getElementById('seach-bar').style = "border: 1px solid #aaaaaa"
        if(document.getElementById('seach-bar').value != ""){
        $.post('php/settings/show_access.php'
            ,{
                'search' : document.getElementById('seach-bar').value,
                'type' : document.getElementById('type-selector').value,
            },
        function( data ) { document.getElementById('access-container').innerHTML = data; } );
            }
        else{
            document.getElementById('seach-bar').style = "border: 1px solid #ff0000"
        }
    }
//------------------------------------------------------------------>
    function edit_access(id,action){
        $.post('php/settings/admin.php'
            ,{
            'ID' : id,
            'action' : action,
            'grant' : "<?php echo $_SESSION['username'] ?>"
            },
        function() { search_access(); } );
    }
//------------------------------------------------------------------>
    function delete_record(id,type){
        $.post('php/settings/admin.php'
            ,{
            'ID' : id,
            'type' : type,
            'action' : 'delete'
            },
        function(data) { document.getElementById('records-container').innerHTML = data; } );
    }
</script>
</body>
</html>