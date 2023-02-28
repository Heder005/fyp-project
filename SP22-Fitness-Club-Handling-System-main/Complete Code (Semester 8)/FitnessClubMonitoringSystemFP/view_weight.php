
<?php 



if(session_id()=='')
{
    session_start();
}
if (isset($_SESSION['student_email']))
{
    $s_email = "SELECT student_id FROM students where student_email = '$_SESSION[student_email]'";
    $run_s = mysqli_query($con, $s_email);

    $ss_email = mysqli_fetch_assoc($run_s);
    $current_student_id = $ss_email['student_id'];

    global $current_student_id;

}


?>

<div class="row">
    <div class="col l12 s12 m12 add_product" style="padding: 0 !important;">
    <h4 class="center heading" style="margin-top: 0px;">Weight Lift Details</h4>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="my_courses">

                    <tr style='border-bottom: 1px solid #dbdbdb; background: #3a4664; color: #fff;'>
                        <th class='center'>ID</th>
                        <th class='center'>Date</th>
                        <th class='center'>Title</th>
                      
                        <th class='center'>T. Weight</th>
                        <th class='center'>Reps</th>
                        <th class='center'>Details</th>
                        <!-- <th class='center' >Action</th> -->
                    </tr>
                
                <?php 
                
                $student_email='';
                if (isset($_SESSION["student_email"]))
                {
                    $student_email = $_SESSION["student_email"];
                }

                $get_pro = "select * from weight_lift where user_name = '$student_email'";
                $run_pro = mysqli_query($con, $get_pro);
        
                while($row_pro = mysqli_fetch_array($run_pro)) {
        
                  $w_id = $row_pro['w_id'];
                  $date = $row_pro['date'];
                  $weight_title = $row_pro['weight_title'];
            
                  $total_weight = $row_pro['total_weight'];
                  $no_of_reps = $row_pro['no_of_reps'];
                  $other_details = $row_pro['other_details'];
                // --------------------------------------------------


                

                    echo "
                    
                    <tr style='border-bottom: 1px solid #dbdbdb;'>
                        <td class='center'>$w_id</td>
                        <td class='center'>$date</td>
                        <td class='center'>$weight_title</td>
                        <td class='center'>$total_weight</td>    
                        <td class='center'>$no_of_reps</td>                       
                        <td class='center'>$other_details</td>
                       
                        
                    </tr>
                    
                    ";
                }
            
                ?>

            </table>
        </form>
    </div>
</div>


    
