<?php $title= "Login"; ?>
<?php session_start();?>
<head>
      <title><?php echo $title ?> | Brand name</title>
      <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/icon1.png" />
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body style="background-image: url('img/bg.jpeg'); background-attachment: fixed;">
<nav class="navbar navbar-default" style="height:80px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">
        <img alt="Brand" src="img/topimg1.png" width="150px">
      </a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    </ul>
  </div>
</nav>
    
        <?php
        if(isset($_POST['login']))
        {
            $username=$_POST['username'];
            $password=$_POST['password'];
            $query="SELECT * FROM users WHERE username='$username'";
            include ('connection-db.php');
            $result=mysqli_query($con,$query);
            $row=mysqli_fetch_assoc($result);
            if($username == $row['username'] && md5($password) == $row['password'])
            {
                $_SESSION['username']=$row['username'];
                $_SESSION['type']=$row['type'];
                $_SESSION['name']=$row['name'];
                $_SESSION['unit']=$row['unit'];
                header("location:index.php");
            }
            else {
                header("location:login.php?status=0");
            }
        }
        ?>

<div class='container'>
<?php if(isset($_GET['status']) && $_GET['status']==0){ ?>
    <div class="alert alert-danger">
  <strong>Error!</strong> Username or Password is incorrect.
    </div>
    <?php } ?>

  <div class="panel panel-default dialog-panel">
    <div class='panel-heading'>
        <h5>Login</h5>
    </div>
    <div class="panel-body">
    <form class='form-horizontal' action="login.php"  method="POST" role='form' name="login" autocomplete="off">
        <div class='form-group'>
          <label class='control-label col-md-2 col-md-offset-2' for='username'>إسم المستخدم </label>
            <div class='col-md-8'>
              <div class='col-md-7 indent-small'>
                <div class='form-group internal'>
                  <input required class='form-control' id='username' name="username" type='text'>
                </div>
              </div>
            </div>
          </div>
        <div class='form-group'>
          <label class='control-label col-md-2 col-md-offset-2' for='employee-name'>كلمة المرور </label>
            <div class='col-md-8'>
              <div class='col-md-7 indent-small'>
                <div class='form-group internal'>
                  <input required class='form-control' id='password' name="password" type='password'>
                </div>
              </div>
            </div>
          </div>
            <div class='form-group'><legend></legend>
            <div class='col-md-offset-4 col-md-1'>
              <button class='btn-lg btn-success' type='submit' name="login" method="post" style="width:400px;">تسجيل الدخول</button>
            </div>
          </div>
        </form>
      </div>
    </div></div></body>