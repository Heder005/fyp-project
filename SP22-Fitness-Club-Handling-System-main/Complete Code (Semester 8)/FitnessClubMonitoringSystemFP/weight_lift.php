<?php 

include("db/connection.php");
if(session_id()=='')
{
    session_start();
}
// if(!isset($_SESSION['username'])) {
//     echo "<script>window.open('index.php', '_self')</script>";
// }

?>


<div class="row">
    <div class="col l12 s12 m12 add_product" style="padding: 0 !important;">
        <h4 class="center heading" style="margin-top: 0px;">Add Weight Lift Details</h4>
        <form action="weight_lift.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Weight Title</td>
                    <td><input type="text" name="weight_title" required></td>
                </tr>
                <tr>
                    <td>Total Weight</td>
                    <td><input type="text" name="total_weight" onkeypress="return isNumber(event)" required></td>
                </tr>
                <tr>
                    <td>No of Reps</td>
                    <td><input type="text" name="no_of_reps" onkeypress="return isNumber(event)" required></td>
                </tr>
                <tr>
                    <td>Other Details</td>
                    <td><input type="text" name="other_details" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="weight_lift" value="Add Weight Details">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

    if(isset($_POST['weight_lift'])) {

        // Getting text inputs
        $weight_title = $_POST['weight_title'];
        $total_weight = $_POST['total_weight'];      
        $no_of_reps = $_POST['no_of_reps'];
        $other_details = $_POST['other_details'];
        $date = date('d-m-y h:i:s');
        $student_email='';
        if (isset($_SESSION['student_email']))
        {
            $student_email = $_SESSION['student_email'];
        }
        echo '<script type="text/javascript"> alert("Veriable Value = ' .$student_email.' ")</script>';
        // Getting image from the field


        // Moving file into other folder
       

        $weight_lift = "insert into weight_lift (  weight_title, total_weight,no_of_reps, other_details,date,user_name ) values ('$weight_title','$total_weight','$no_of_reps',  '$other_details','$date',  '$student_email')";

        $insert_c = mysqli_query($con, $weight_lift); 

        if($insert_c) {
            echo "<script>window.alert('Weight Details has been inserted')</script>";
            echo "<script>window.open('my_account.php?weight_lift', '_self')</script>";
        }
    }

?>