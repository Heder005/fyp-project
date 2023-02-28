<?php 

if(session_id()=='')
{
    session_start();
}   
include('db/connection.php');

if (isset($_SESSION['student_email']))
{
    echo "<script>window.open('index.php', '_self')</script>";
}

 // Getting Login Details Entered By User
 if(isset($_POST['login']))
 {
     $c_email = $_POST['email'];
     
     $c_pass = $_POST['pass'];

     $uType = $_POST['uType1'];
     
     $sel_c = "select * from students where student_password ='$c_pass' AND student_email = '$c_email' AND type = '$uType'";
     
     $run_c = mysqli_query($con, $sel_c);
     
     $check_customer = mysqli_num_rows($run_c); 
     
     // if record not found from db then don't start session
     if($check_customer == 0)
     {
         echo "<script>alert('Password or Email is incorrect')</script>";
         exit();
     }
     
     else 
     {
        while ($row_pro = mysqli_fetch_array($run_c)) {

            $student_name = $row_pro['student_name'];
            $_SESSION['student_name'] = $student_name; 

           // echo '<script type="text/javascript"> alert("Veriable Value = ' . $_SESSION['student_name'].'")</script>';
        }
         $_SESSION['student_email'] = $c_email; 
         $_SESSION['uType'] = $uType; 
       
         echo "<script>alert('Account logged in successfully')</script>";
         if($uType=="Trainer")
         
              echo "<script>window.open('adminpanel/adminarea.php','_self')</script>";
         else
              echo "<script>window.open('index.php','_self')</script>";
     }
 }

 // Getting Entered Record
 if(isset($_POST['register']))
 {

     $c_name = $_POST['c_name'];
     $c_email = $_POST['c_email'];
     $c_pass = $_POST['c_pass'];
     $uType = $_POST['uType'];
     $customer_email = '';

    //  if(!empty($_POST['uType'])) {
    //      echo '  ' . $_POST['uType'];
    //      echo "<script>window.alert('Checked' .$uType)</script>";
    //  }
     // checking if email is already registered or not
    
     $get_customer = "select * from students where student_email = '$c_email'";

     $run_customer = mysqli_query($con, $get_customer);

     $customer = mysqli_fetch_array($run_customer);

     $customer_email = $customer['student_email'];

     if ($customer_email == $c_email)

     {
         echo "<script>window.alert('Email Already Registered')</script>";
         exit;
     }

     // if email is not registered already then create a new account

     else 
     {
         $insert_c = "insert into students (student_name, student_email, student_password,type) Values ('$c_name', '$c_email', '$c_pass','$uType')";
         $run_c = mysqli_query($con, $insert_c);

         $_SESSION['student_email'] = $c_email;

         echo "<script>window.alert('Account Created Successfully')</script>";
         echo "<script>window.open('index.php', '_self')</script>";

     }
 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fitness Club Handling System</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    
    <div class="wrapper">
        <nav>
            <div class="nav-wrapper">
            <a href="#!" class="brand-logo left"><img src="images/logo.png" alt="Logo" style="width: 35px; position: relative; top: 8px;"> Fitness Club</a>
                <ul class="right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="trainers.php">Trainers</a></li>
                    <?php 

                    if (isset($_SESSION['student_email']))
                    {
                        echo "<li><a href='my_account.php' class='waves-effect waves-light btn'>Profile</a></li>";
                        echo "<li><a href='logout.php' class='waves-effect waves-light btn'>Log Out</a></li>";
                    }

                    else {
                        echo "<li><a href='register.php' class='waves-effect waves-light btn'>Login | Register</a></li>";
                      
                    }
                    echo "<li><a href='adminpanel/index.php' class='waves-effect waves-light btn'>Admin</a></li>";

                    ?>
                </ul>
            </div>
        </nav>

        <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
            <div class="col s6">
                <h4 class="heading center z-depth-3">Login</h4>
                <form method="post" class="customer_account_page"> 
                    <table> 
                        <tr>
                            <td><b>Email:</b></td>
                            <td><input type="email" name="email" placeholder="enter email" required/></td>
                        </tr>
                        
                        <tr>
                            <td><b>Password:</b></td>
                            <td><input type="password" name="pass" placeholder="enter password" required/></td>
                        </tr>
                        <tr>

                        <td><b>Type</b></td>
                    <td>
                        <select name="uType1" required style="display: block !important;">
                            <option value="">Select Session</option>
                            <option value="Trainer">Trainer</option>
                            <option value="Member">Member</option>
                 
                            
                    </td>
                    </tr>
                    </table> 
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <input type="submit" name="login" value="Login" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="col s6" style="border-left: 1px solid #dbdbdb;">
                <h4 class="heading center z-depth-3">Register</h4>
                <form method="post" class="customer_account_page" action="register.php"> 
                <table> 
                    <tr>
                        <td><b>Name:</b></td>
                        <td><input type="text" name="c_name" placeholder="enter name" required/></td>
                    </tr>

                    <tr>
                        <td><b>Email:</b></td>
                        <td><input type="email" name="c_email" placeholder="enter email" required/></td>
                    </tr>
                    
                    <tr>
                        <td><b>Password:</b></td>
                        <td><input type="password" name="c_pass" placeholder="enter password" required/></td>
                    </tr>
                    
                    <tr>
                    <td><b>Type</b></td>
                    <td>
                        <select name="uType" required style="display: block !important;">
                            <option value="">Select Session</option>
                            <option value="Trainer">Trainer</option>
                            <option value="Member">Member</option>
                          
                        </select>
                    </td>

                    </tr>

                </table> 
                <div class="row">
                    <div class="col s12 m12 l12">
                        <input type="submit" name="register" value="Sign Up" />
                    </div>
                </div>
            </div>
        </div>

        

        <div class="footer">
            copyright &copy; 2022 |
            <a href="adminpanel/index.php" target="_blank" style="font-size: 14px; color: #fff;">Fitness Club Handling System</a>
        </div>
        
    </div>


    <script src="js/jQuery.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>

</body>
</html>
