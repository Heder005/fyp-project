<?php 

// if(!isset($_SESSION['username'])) {
//     echo "<script>window.open('index.php', '_self')</script>";
// }

?>
<button onClick="window.print()">Print Record</button>
<div class="row view_table">
    <div class="col 12 m12 l12" style="padding: 0 !important">
        <h4 class="center heading" style="margin-top: 0px;">All Diet Plan Info</h4>
        <table>
            <tr>
                <th>ID</th>
                <th>Trainee Name</th>
               
                <th>Food Details</th>
                <th>Image</th>
                <th>Diet Time</th>
                <th>Daily Calories</th>
                <th>Total Days</th>
                <th>Trainer Name</th>
                <!-- <th>Edit</th>
                <th>Delete</th> -->
            </tr>
            <?php 

                $get_trainers = "SELECT * FROM dietplan";
                $run_trainers = mysqli_query($con, $get_trainers);
                
                while($row_trainers = mysqli_fetch_array($run_trainers)) {
                    
                    $trainer_id = $row_trainers['id'];
                    $trainee_name = $row_trainers['trainee_name'];
                    $diet_image = $row_trainers['diet_image'];
                    $food_details = $row_trainers['food_details'];
                    
                    $diet_time = $row_trainers['diet_time'];
                    $daily_calories = $row_trainers['daily_calories'];
                    $total_days = $row_trainers['total_days'];
                    $trainer_name = $row_trainers['trainer_name'];
                    // $get_session = "select * from session where session_id = '$session_id'";
                    // $run_session = mysqli_query($con, $get_session);

                    // $row_session = mysqli_fetch_array($run_session);
                        
                    // $session_name = $row_session['session_name'];

            ?>
            <tr>
            <td><?php echo $trainer_id ?></td>
                <td><?php echo $trainee_name; ?></td>
                <td><?php echo $food_details ?></td>
                <td><img src="dietchart/<?php echo $diet_image ?>" style="width: 50px;"></td>
              
                <td><?php echo $diet_time ?></td>
                <td><?php echo $daily_calories ?></td>
                <td><?php echo $total_days ?></td>
                <td><?php echo $trainer_name ?></td>
               
                <!-- <td><a href="adminarea.php?edit_trainer=<?php // echo $trainer_id ?>">Edit</a></td>
                <td><a href="delete_trainer.php?delete_trainer=<?php // echo $trainer_id ?>">Delete</a></td> -->
            </tr>
            <?php } ?>
        </table>
    </div>
</div>