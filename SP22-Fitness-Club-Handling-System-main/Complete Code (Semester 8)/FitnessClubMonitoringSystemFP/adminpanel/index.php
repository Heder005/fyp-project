<?php 
  include("../db/connection.php");
  if(session_id()=='')
  {
      session_start();
  }

  if(isset($_SESSION['username']) || isset($_SESSION['student_email'])) {

        $uType='';
        $admin_email='';
        if (isset($_SESSION['uType']))
        {
            $uType=$_SESSION['uType'];
        }
      if($uType <> "Member")
	   echo "<script>window.open('adminarea.php', '_self')</script>";

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fitness Club Handling System</title>
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="login">

    <div class="main_container login_panel center"> 
        <h4>Admin Panel</h4>
        <form method="post">
            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="submit" name="login" value="Login">

            <br>
            <br>
			<p class="login-register-text" style="color:white;text-align: center;">Go Back to ? <a href="../index.php">Main Website</a>.</p>
        </form>
    </div>
    
    <script src="../js/jQuery.js"></script>
    <script src="../js/materialize.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>

<?php 
    
    if(isset($_POST['login'])) {

        $username = $_POST['username'];
        $pass = $_POST['password'];

        $sel_admin = "select * from admin where username = '$username' AND password = '$pass'";
        $run_admin = mysqli_query($con, $sel_admin);

        $check_admin = mysqli_num_rows($run_admin);

        if($check_admin == 0) {
            echo "<script>window.alert('username or Password not matched.')</script>";
        }

        else {
            $_SESSION['username'] = $username;

            echo "<script>window.open('adminarea.php', '_self')</script>";
        }

    }

?>