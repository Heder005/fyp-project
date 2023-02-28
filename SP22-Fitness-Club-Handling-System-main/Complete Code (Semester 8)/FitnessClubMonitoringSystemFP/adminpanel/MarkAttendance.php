<?php 

include("../db/connection.php");
if(session_id()=='')
{
    session_start();
}
// if(!isset($_SESSION['username'])) {
//     echo "<script>window.open('index.php', '_self')</script>";
   
// }

if(isset($_GET['attUser'])) {
    

    $u_name = $_GET['attUser'];
    $t_name = $_SESSION['username'];
    $date = date('d-m-y h:i:s');

    $insert_c = "insert into attendance (u_name,t_name,status,att_date	) Values ('$u_name', '$t_name', 'Present','$date')";
    $run_c = mysqli_query($con, $insert_c);

    if($run_c) {
       // echo "<script>window.alert('User Mark Present')</script>";
        echo "<script>window.open('adminarea.php?MarkAttendance', '_self')</script>";
    }
}

?>

<div class="row view_table">
    <div class="col 12 m12 l12" style="padding: 0 !important">
        <h4 class="center heading" style="margin-top: 0px;">Mark Attendance</h4>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>               
               
                <th>Delete</th>
            </tr>
            <?php 

                $uType='';
                
                if (isset($_SESSION['uType']))
                {
                    $uType=$_SESSION['uType'];
                }
                $get_trainers='';
                if($uType <> "Trainer")
                    $get_trainers = "SELECT * FROM students ";
                else
                    $get_trainers = "SELECT * FROM students where type = 'Member' ";

                $run_trainers = mysqli_query($con, $get_trainers);
                
                while($row_trainers = mysqli_fetch_array($run_trainers)) {
                    
                    $trainer_id = $row_trainers['student_id'];
                    $session_id = $row_trainers['student_id'];
                    $student_name = $row_trainers['student_name'];
                    $student_email = $row_trainers['student_email'];
                    $type = $row_trainers['type'];

                    // $get_session = "select * from session where session_id = '$session_id'";
                    // $run_session = mysqli_query($con, $get_session);

                    // $row_session = mysqli_fetch_array($run_session);
                        
                    $session_name = $row_trainers['student_name'];

            ?>
            <tr>
                <td><?php echo $trainer_id; ?></td>
                <td><?php echo $student_name ?></td>
                <td><?php echo $student_email ?></td>
              
                <td><?php echo $type ?></td>
              
                <td><a href="MarkAttendance.php?attUser=<?php echo $student_name ?>">Present</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

