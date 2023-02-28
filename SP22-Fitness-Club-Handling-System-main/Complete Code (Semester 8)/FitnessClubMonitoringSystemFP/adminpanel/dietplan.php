<?php 

// if(!isset($_SESSION['username'])) {
//     echo "<script>window.open('index.php', '_self')</script>";
// }

?>


<div class="row">
    <div class="col l12 s12 m12 add_product" style="padding: 0 !important;">
        <h4 class="center heading" style="margin-top: 0px;">Add New Diet Plan</h4>
        <form action="adminarea.php?dietplan" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Trainee Name</td>
                    <td>
                    <select name="trainee_name" required style="display: block !important;">
                            <option value="">Select Trainee</option>
                            <?php 
                                
                                $get_session = "select * from students";
                                $run_session = mysqli_query($con, $get_session);
                            
                                while ($row_sess = mysqli_fetch_array($run_session)) {
                            
                                    $session_id = $row_sess['student_id'];
                                    $session_name = $row_sess['student_name'];
                            
                                    echo "<option value='$session_name'>$session_name</option>";
                            
                                }

                            ?>
                        </select>        
                   </td>
                </tr>
                <tr>
                    <td>Diet Chart Image</td>
                    <td><input type="file" name="diet_image" required></td>
                </tr>
                <tr>
                    <td>Food Details</td>
                    <td><input type="text" name="food_details" required></td>
                </tr>
                <tr>
                    <td>Diet Time</td>
                    <td>
                        <select name="diet_time" required style="display: block !important;">
                            <option value="">Select Session</option>
                            <?php 
                                
                                $get_session = "select * from session";
                                $run_session = mysqli_query($con, $get_session);
                            
                                while ($row_sess = mysqli_fetch_array($run_session)) {
                            
                                    $session_id = $row_sess['session_id'];
                                    $session_name = $row_sess['session_name'];
                            
                                    echo "<option value='$session_name'>$session_name</option>";
                            
                                }

                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Daily Calories</td>
                    <td><input type="text" name="daily_calories" onkeypress="return isNumber(event)" required></td>
                </tr>
                <tr>
                    <td>Total Days</td>
                    <td><input type="text" name="total_days" onkeypress="return isNumber(event)" required></td>
                </tr>
               
                <tr>
                    <td>Trainer Name</td>
                    <td><input type="text" name="trainer_name" required></td>
                </tr>
               
                <tr>
                    <td colspan="2">
                        <input type="submit" name="add_diet" value="Add Diet Now">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

    if(isset($_POST['add_diet'])) {

        // Getting text inputs
        $trainee_name = $_POST['trainee_name'];
        $food_details = $_POST['food_details'];
        $diet_time = $_POST['diet_time'];
        $daily_calories = $_POST['daily_calories'];
        $total_days = $_POST['total_days'];
        $trainer_name = $_POST['trainer_name'];
      
        // Getting image from the field
        $diet_image = $_FILES['diet_image'] ['name'];
        $diet_image_tmp = $_FILES['diet_image'] ['tmp_name'];

        // Moving file into other folder
        move_uploaded_file($diet_image_tmp, "dietchart/$diet_image");

        $add_diet = "insert into dietplan (trainee_name, food_details,diet_time,daily_calories, total_days,diet_image,trainer_name ) values 
                                      ('$trainee_name','$food_details','$diet_time','$daily_calories', '$total_days',  '$diet_image', '$trainer_name')";

        $insert_c = mysqli_query($con, $add_diet); 

        if($insert_c) {
            echo "<script>window.alert('Diet Plan has been inserted')</script>";
            echo "<script>window.open('adminarea.php?add_diet', '_self')</script>";
        }
    }

?>