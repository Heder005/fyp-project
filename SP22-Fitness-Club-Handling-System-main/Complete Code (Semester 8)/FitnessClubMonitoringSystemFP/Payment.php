<?PHP

// if(!isset($_SESSION['student_email'])) {
//     echo "<script>window.open('index.php', '_self')</script>";
// }

include('db/connection.php');

$userid = "";
$email = "";
$bamount="";
if(isset($_GET['enrollment_id'])) {
    $id = $_GET['enrollment_id'];
    $userid = $id;
}
if(isset($_GET['fee'])) {
    $id = $_GET['fee'];
    $bamount = $id;
}

if(isset($_GET['eventid'])) {
    $id = $_GET['eventid'];
    $email = $id;
}
$rec = mysqli_query($con, "select max(trainer_id) + 1 as trainer_id from trainers order by trainer_id desc");
$record = mysqli_fetch_array($rec);

//$userid = "U1000".$record['userid'];
//echo '<script type="text/javascript">alert("Data has been submitted to ' . $userid . '");</script>';

if(isset($_POST['submit'])){

    $user_id = $_POST['order_id'];
        $bamount = $_POST['bamount'];
        $paytype = $_POST['paytype'];
        $acctitle = $_POST['acctitle'];
        $accountno = $_POST['accountno'];
        $expdate = $_POST['expdate'];
        $seccode = $_POST['seccode'];
        $useremail = $_POST['useremail'];
        $usercontact = $_POST['usercontact'];
        $shipaddress	 = $_POST['shipaddress'];
       
        // $exists = get_table_where("users","customer_email",$email);
        // if(!empty($exists)){
        //     echo " <script type='text/javascript'>location.href = 'payment.php?msg=exists';</script>";

        // }
    
        $values = $user_id."','".$bamount."','". $paytype."','". $acctitle."','". $accountno."','". $expdate."','". $seccode."','". $useremail."','". $usercontact."','". $shipaddress;
       // echo '<script type="text/javascript">alert("Data has been submitted to ' . $bamount . '");</script>';
       // $insert = insert_into_table("paymethod","order_id,bamount, paytype, acctitle, accountno, expdate, seccode, useremail, usercontact, shipaddress",$values);
        $insert = "insert into paymethod (order_id,bamount, paytype, acctitle, accountno, expdate, seccode, useremail, usercontact, shipaddress) values ('$user_id','$bamount','$paytype','$acctitle','$accountno','$expdate','$seccode','$useremail','$usercontact','$shipaddress')";
        $insert_c = mysqli_query($con, $insert); 

        // $sql = "INSERT INTO users(username,user_name,email,user_email,password,user_password,user_contact,address,user_type,created) VALUES('$user_name','$user_name','$email','$email','$password','$password','$user_contact','$address','$user_type','$created')";
		// 	$insert = mysqli_query($con,$sql);
      
        if($insert_c){
            echo " <script type='text/javascript'>location.href = 'payment.php?msg=success';</script>";
        }else{
        echo " <script type='text/javascript'>location.href = 'payment.php?msg=error';</script>";
        }
        
  }else{

 ?><title>Fitness Club Handling System</title>

    <?php
    if(!empty($_GET['msg'])){
        if($_GET['msg'] == 'success'){ ?>
            <div class="alert alert-success" role="alert">
                <strong>Success!</strong>Your payment has been done your order in process</a> Now.
               </div>
       <?php  }else if($_GET['msg'] == 'error'){ ?>
            <div class="alert alert-danger" role="alert">
                <strong>Error!</strong>Oops Something went wrong please try again.
               </div>
       <?php  }else if($_GET['msg'] == 'passwords'){ ?>
            <div class="alert alert-warning" role="alert">
                <strong>Warning!</strong>Passwords did not match, try again.
               </div>
       <?php  }else if($_GET['msg'] == 'exists'){ ?>
            <div class="alert alert-warning" role="alert">
                <strong>Warning!</strong>This Email is already exists please try another email.
               </div>
       <?php  }
    }
    ?>
		<div class="row">
    <div class="col l12 s12 m12 add_product" style="padding: 0 !important;">
					<h3>Other Payment Method</h3>
                                        <form action="payment.php" method="post" name="register" enctype="multipart/form-data">

                                        <div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text"  name="order_id" required=""  placeholder="Order #"  value="<?php echo $userid?>">
							<div class="clearfix"></div>
						</div>

                                        <div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text"  name="bamount" required=""  placeholder="Bill Amount"  value="<?php echo $bamount?>">
							<div class="clearfix"></div>
						</div>
                        <div class="key">
                           <select name="paytype" style="width:100%;height:40px;">
                            <option value=""  >Select Type</option>
                                <option value="CreditCard" selected >Credit Card</option>
                                <option value="Bank">Bank</option>
                                <option value="JazzCash">Jazz Cash</option>
                                <option value="EasyPaisa">Easy Paisa</option>
                            </select>
							<div class="clearfix"></div>

						</div>
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text"  name="acctitle" required=""  placeholder="Account Title">
							<div class="clearfix"></div>
						</div>
                        <div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="text"  name="accountno"  required="" placeholder="Account/Card Number">
							<div class="clearfix"></div>
						</div>
                        <div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" name="expdate" required="" placeholder="Expiry Date">
							<div class="clearfix"></div>

						</div>
                        <div>
                           
                        <div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" name="seccode" required="" placeholder="Security Code">
							<div class="clearfix"></div>

						</div>
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text"  name="useremail"  required=""  placeholder="Email" value="<?php echo $email?>">
							<div class="clearfix"></div>
						</div>
						
						
                        <div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text"  name="usercontact" required=""  placeholder="Contact No.">
							<div class="clearfix"></div>
						</div>
                        <div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text"  name="shipaddress" required="" 
        placeholder="Shipping Address">
							<div class="clearfix"></div>
						</div>
                                            <input type="submit" name="submit" value="PayNow">
					</form>
				</div>
			</div>
	
  <?PHP }
//include 'footer.php';
 ?>