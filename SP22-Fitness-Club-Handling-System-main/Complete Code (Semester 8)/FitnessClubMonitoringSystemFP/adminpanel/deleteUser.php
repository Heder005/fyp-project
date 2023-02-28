<?php 

include("../db/connection.php");

if(isset($_GET['deleteUser'])) {
    
    $delete_id = $_GET['deleteUser'];

    $delete_inst = "delete from students where student_id = '$delete_id'";

    $run_delete_inst = mysqli_query($con, $delete_inst);

    if($run_delete_inst) {
        echo "<script>window.alert('User Info Deleted')</script>";
        echo "<script>window.open('adminarea.php?viewUsers', '_self')</script>";
    }
}


?>