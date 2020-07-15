<!DOCTYPE html>
<?php
  if(isset($_POST['otheruser'])){
    setcookie("username", "", time()-3600);
    setcookie("userid", "", time()-3600);
    header("Location: index.php");
  }
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminDashbord</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/skins/skin-yellow.min.css">
  
  <link rel="stylesheet" href="css/style.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="login.php"><b>Admin</b>Dashboard</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
<?php
  if(isset($_COOKIE['username'])){
    echo '<p class="login-box-msg">Welcome back '.$_COOKIE['username'].'</p>';
  }else{
    echo '<p class="login-box-msg">Sign in to start your session</p>';
  }
?>

<?php
      if(isset($_POST['uname']) && $_POST['uname']!=""){
          $uname=$_POST['uname'];
          $upass=$_POST['upass'];
          
          require("dbconnect.php");
          
          $qry = "SELECT * FROM users WHERE username='".$uname."'";
          $result = $con->query($qry);
          
          require("dbclose.php");
          if($result->num_rows > 0){
              $row = $result->fetch_assoc();
              if($row['password']==$upass){
                  session_start();
                  $_SESSION['sid']=$row['id'];
                  $_SESSION['name']=$row['firstname']." ".$row['lastname'];
                  $_SESSION['image']=$row['image'];
                  $_SESSION['role']=$row['userrole'];

                  setcookie("username", $_SESSION['name'], time()+60*60*24);
                  setcookie("userid", $uname, time()+60*60*24);

                  header("Location: index.php");
              }else{
                  echo "<p>Password is incorrect.</p>";
              }
          }else{
              echo "<p>Username is incorrect.</p>";
          }
          
      }
      
?>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <?php 
        if(isset($_COOKIE['userid'])){ 
          echo '<input name="uname" type="hidden" value="'.$_COOKIE['userid'].'"><p class="form-control" disabled>'.$_COOKIE['userid'].'</p>'; 
        }else{
          echo '<input name="uname" type="email" class="form-control" placeholder="Email" required>';
        }
        ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="upass" type="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </form>
      <form action="" method="post">
        <div class="col-xs-4 pull-right">
          <button type="submit" name="otheruser" class="btn btn-default btn-block btn-flat">Other User</button>
		  
		  
        </div>
      </form>
        <!-- /.col -->
      </div>
    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>
