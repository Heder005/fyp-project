<?php 

include("db/connection.php");

if(isset($_GET['enrollment_id'])) {
    
    $delete_id = $_GET['enrollment_id'];

    $delete_reservation = "delete from enrollment where enrollment_id = '$delete_id'";

    $run_delete_reservation = mysqli_query($con, $delete_reservation);

    if($run_delete_reservation) {
        echo "<script>window.alert('Reservation Cancelled Successfully')</script>";
        echo "<script>window.open('my_account.php?my_reservation', '_self')</script>";
    }
}
if(isset($_GET['e_id'])) {
    
    $delete_id = $_GET['e_id'];
    echo '<script type="text/javascript"> alert("Veriable Value = ' .$delete_id.' ")</script>';

    $delete_reservation = "update equipments set Status='', user_name = '' where e_id = '$delete_id'";

    $run_delete_reservation = mysqli_query($con, $delete_reservation);

    if($run_delete_reservation) {
        echo "<script>window.alert('Reservation Removed Successfully')</script>";
        echo "<script>window.open('adminarea.php?my_reservation', '_self')</script>";
    }
}

?>