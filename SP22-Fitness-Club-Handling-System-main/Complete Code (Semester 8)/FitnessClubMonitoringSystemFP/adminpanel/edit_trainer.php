
<?php 

// if(!isset($_SESSION['username'])) {
//     echo "<script>window.open('index.php', '_self')</script>";
// }

if(isset($_GET['edit_trainer'])) {
    $get_id = $_GET['edit_trainer'];

    $update_id = $get_id;

    $get_pro = "SELECT * FROM trainers WHERE trainer_id = '$get_id'";
    $run_pro = mysqli_query($con, $get_pro);

    $row_pro = mysqli_fetch_array($run_pro);
        
    $trainer_id = $row_pro['trainer_id'];
    $session_id = $row_pro['session_id'];
    $total_seats = $row_pro['total_seats'];
    $trainer_image = $row_pro['trainer_image'];
    $trainer_name = $row_pro['trainer_name'];
    $package_name = $row_pro['package_name'];
    $training_fee = $row_pro['training_fee'];

    $get_session = "select * from session where session_id = '$session_id'";
    $run_session = mysqli_query($con, $get_session);

    $row_session = mysqli_fetch_array($run_session);
        
    
    $session_id ='';
    $session_name ='';
    if(isset($row_session)) 
    {                       
        $session_id = $row_session['session_id'];
        $session_name = $row_session['session_name'];
    }
  
}

?>

<div class="row">
    <div class="col l12 s12 m12 add_product" style="padding: 0 !important;">
        <h4 class="center heading" style="margin-top: 0px;">Edit Trainer Info</h4>
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Trainer Name</td>
                    <td>
                        <!-- <input type="text" name="trainer_name" value="<?php //echo $trainer_name ?>" required> -->
                        <select name="trainer_name" required style="display: block !important;">
                        <option value="<?php echo $trainer_name; ?>"><?php echo $trainer_name; ?></option>
                            <?php 
                                
                                $get_session = "select * from students where type= 'Trainer'";
                                $run_session = mysqli_query($con, $get_session);
                            
                                while ($row_sess = mysqli_fetch_array($run_session)) {
                            
                                    $student_id = $row_sess['student_id'];
                                    $student_name = $row_sess['student_name'];
                            
                                    echo "<option value='$student_name'>$student_name</option>";
                            
                                }

                            ?>
                        </select>
                    
                    </td>
                </tr>
                <tr>
                    <td>Trainer Image</td>
                    <td><input type="file" name="trainer_image"><img src="trainers/<?php echo $trainer_image; ?>" style="width: 40px;"></td>
                </tr>
                <tr>
                    <td>Select Session</td>
                    <td>
                        <select name="session_time" style="display: block !important;">
                            <option value="<?php echo $session_id; ?>"><?php echo $session_name; ?></option>
                            <?php 
                                
                                $get_cats = "select * from session";
                                $run_cats = mysqli_query($con, $get_cats);
                            
                                while ($row_cats = mysqli_fetch_array($run_cats)) {
                            
                                    $session_id = $row_cats['session_id'];
                                    $session_name = $row_cats['session_name'];
                            
                                    echo "<option value='$session_id'>$session_name</option>";
                            
                                }

                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Total Seats Available</td>
                    <td><input type="text" name="total_seats" value="<?php echo $total_seats; ?>" required style="text-indent:10px;"></td>
                </tr>
                <tr>
                    <td>Package Name</td>
                    <td><input type="text" name="package_name" value="<?php echo $package_name ?>" required></td>
                </tr>
                <tr>
                    <td>Training Fee</td>
                    <td><input type="text" name="training_fee" value="<?php echo $training_fee ?>" required style="text-indent:10px;"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="update_trainer" value="Update Trainer Info">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
    
<script>
    // Only Accept numbers for contact input
    function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
    }
    return true;
    }
</script>

<?php

    if(isset($_POST['update_trainer'])) {

         // Getting text inputs
         $trainer_name = $_POST['trainer_name'];
         $session_time = $_POST['session_time'];
         $total_seats = $_POST['total_seats'];
         $package_name = $_POST['package_name'];
         $training_fee = $_POST['training_fee'];
 
         //echo '<script type="text/javascript"> alert("Veriable Value = ' .$package_name.' , '.$training_fee.'")</script>';

         // Getting image from the field
         $trainer_image = $_FILES['trainer_image'] ['name'];
         $trainer_image_tmp = $_FILES['trainer_image'] ['tmp_name'];

       // Moving file into other folder
        move_uploaded_file($trainer_image_tmp, "trainers/$trainer_image");


        $update_trainer = "update trainers set session_id = '$session_time', total_seats = '$total_seats', trainer_name = '$trainer_name', trainer_image = '$trainer_image', package_name = '$package_name', training_fee = '$training_fee' where trainer_id = '$trainer_id'";
        $run_t = mysqli_query($con, $update_trainer); 

        if($run_t) {
            echo "<script>window.alert('Trainer Info Updated Successfully')</script>";
            echo "<script>window.open('adminarea.php?view_trainers', '_self')</script>";
        }
    }

?>