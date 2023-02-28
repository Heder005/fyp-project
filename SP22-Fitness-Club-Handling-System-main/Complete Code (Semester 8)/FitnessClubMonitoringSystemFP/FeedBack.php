<?php 

session_start();    
include('db/connection.php');

if (isset($_SESSION['student_email']))
{
    //echo "<script>window.open('index.php', '_self')</script>";
}

 // Getting Login Details Entered By User
 $TName= '';

 //echo '<script type="text/javascript"> alert("Veriable Value = ' .$_GET['TName'].' ")</script>'; 
 if(isset($_GET['TName']))
 {
     $TName = $_GET['TName'];
     $_SESSION['TName'] = $TName;
 }
 //echo '<script type="text/javascript"> alert("Veriable New = ' .$TName.' ")</script>'; 

 // Getting Entered Record
 if(isset($_POST['submit']))
 {
  //e  echo "<script>window.alert('Feedback Rating Open')</script>";
     $c_name = $_POST['c_name'];
     $c_email = $_POST['c_email'];
     $c_review = $_POST['c_review'];
     $c_rate = $_POST['c_rate'];
     $customer_email = '';
     if(isset($_SESSION['TName']))
     {
         $TName = $_SESSION['TName'];
         //$_SESSION['TName'] = $TName;
     }
     if(isset($_SESSION['student_email']))
     {
        $customer_email= $_SESSION['student_email'];
         //$_SESSION['TName'] = $TName;
     }
   
    //  if(!empty($_POST['c_rate'])) {
    //      echo '  ' . $_POST['c_rate'];
    //      echo "<script>window.alert('Checked' .$c_rate)</script>";
    //  }
     // checking if email is already registered or not
    
    //  $get_customer = "select * from students where student_email = '$c_email'";

    //  $run_customer = mysqli_query($con, $get_customer);

    //  $customer = mysqli_fetch_array($run_customer);

    //  $customer_email = $customer['student_email'];

    //  if ($customer_email == $c_email)

    //  {
    //      echo "<script>window.alert('Email Already Registered')</script>";
    //      exit;
    //  }

    //  // if email is not registered already then create a new account

    //  else 
    //  {
         $insert_c = "insert into feedback (c_name, c_email,c_review,c_rate,c_trainer,c_user) Values ('$c_name', '$c_email', '$c_review','$c_rate', '$TName', '$customer_email')";
         $run_c = mysqli_query($con, $insert_c);

         //$_SESSION['student_email'] = $c_email;

         echo "<script>window.alert('Feedback Rating Successfully')</script>";

        if(isset($_SESSION['TName']))
        {
            $TName = $_SESSION['TName'];
            //$_SESSION['TName'] = $TName;
        }
        
         echo "<script>window.open('FeedBack.php?TName=$TName', '_self')</script>";

     //}
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
            <a href="#!" class="brand-logo left"><img src="images/logo.png" alt="Logo" style="width: 35px; position: relative; top: 8px;">  Fitness Club </a>
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

       
            <div class="col s6" style="border-left: 1px solid #dbdbdb;">
                <h4 class="heading center z-depth-3">Give Feedback Rating</h4>
                <form method="post" class="customer_account_page" action="feedback.php"> 
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
                        <td><b>Feedback:</b></td>
                        <td><input type="text" name="c_review" placeholder="enter your feedback" required/></td>
                    </tr>
                    
                    <tr>
                    <td><b>Rate Services</b></td>
                    <td>
                        <select name="c_rate" required style="display: block !important;">
                            <option value="">Select Rating</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                          
                        </select>
                    </td>

                    </tr>

                </table> 
                <div class="row">
                    <div class="col s12 m12 l12">
                        <input type="submit" name="submit" id="submit" value="Submit" />
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
