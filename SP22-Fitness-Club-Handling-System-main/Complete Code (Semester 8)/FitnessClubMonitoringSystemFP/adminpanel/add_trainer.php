<?php 

// if(!isset($_SESSION['username'])) {
//     echo "<script>window.open('index.php', '_self')</script>";
// }

?>


<div class="row">
    <div class="col l12 s12 m12 add_product" style="padding: 0 !important;">
        <h4 class="center heading" style="margin-top: 0px;">Add New Trainer Schedule</h4>
        <form action="adminarea.php?add_trainer" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Trainer Name</td>
                    <td>
                        <!-- <input type="text" name="trainer_name" required> -->
                        <select name="trainer_name" required style="display: block !important;">
                            <option value="">Select Name</option>
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
                    <td><input type="file" name="trainer_image" required></td>
                </tr>
                <tr>
                    <td>Trainer Details</td>
                    <td><input type="text" name="trainer_details" required></td>
                </tr>
                <tr>
                    <td>Select Session</td>
                    <td>
                        <select name="session_time" required style="display: block !important;">
                            <option value="">Select Session</option>
                            <?php 
                                
                                $get_session = "select * from session";
                                $run_session = mysqli_query($con, $get_session);
                            
                                while ($row_sess = mysqli_fetch_array($run_session)) {
                            
                                    $session_id = $row_sess['session_id'];
                                    $session_name = $row_sess['session_name'];
                            
                                    echo "<option value='$session_id'>$session_name</option>";
                            
                                }

                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Total Seats Available</td>
                    <td><input type="text" name="total_seats" onkeypress="return isNumber(event)" required></td>
                </tr>
                <tr>
                    <td>Package Name</td>
                    <td><input type="text" name="package_name" required></td>
                </tr>
                <tr>
                    <td>Training Fee</td>
                    <td><input type="text" name="training_fee" onkeypress="return isNumber(event)" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="add_trainer" value="Add Trainer Now">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

    if(isset($_POST['add_trainer'])) {

        // Getting text inputs
        $trainer_name = $_POST['trainer_name'];
        $trainer_details = $_POST['trainer_details'];
        $session_time = $_POST['session_time'];
        $total_seats = $_POST['total_seats'];
        $package_name = $_POST['package_name'];
        $training_fee = $_POST['training_fee'];
        // Getting image from the field
        $trainer_image = $_FILES['trainer_image'] ['name'];
        $trainer_image_tmp = $_FILES['trainer_image'] ['tmp_name'];

        // Moving file into other folder
        move_uploaded_file($trainer_image_tmp, "trainers/$trainer_image");

        $add_trainer = "insert into trainers (session_id, total_seats, trainer_name, trainer_image, trainer_details,package_name,training_fee ) values ('$session_time', '$total_seats', '$trainer_name', '$trainer_image', '$trainer_details','$package_name','$training_fee')";

        $insert_c = mysqli_query($con, $add_trainer); 

        if($insert_c) {
            echo "<script>window.alert('Trainer has been inserted')</script>";
            echo "<script>window.open('adminarea.php?add_trainer', '_self')</script>";
        }
    }

?>