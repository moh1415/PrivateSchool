<?php
ob_start();
$title ="History of student attendance";
include  "includes/header.php";



?>
<?php

if (isset($_GET['id']))
{

$id =$_GET['id'];

}
function find_num_atten($id)
{
    global $con;
    $query = "select * from attendance where s_id=$id and content='absence'";
    $list_course =mysqli_query($con,$query);
    $row=mysqli_num_rows($list_course);

        return $row;

}
if (isset($_GET['delete']))
{
   $att_id= $_GET['att_id'];

    $the_user_id = mysqli_real_escape_string($con,$_GET['delete']);
    $query = "Delete from attendance where s_id = $the_user_id and att_id=$att_id";
    $delete_query = mysqli_query($con, $query);
    header("location: view_history_attendance.php?id=$the_user_id");


}
?>
<div class="main-content">
    <!-- header area start -->
    <div class="header-area">
        <div class="row align-items-center">
            <!-- nav and search button -->

            <!-- profile info & task notification -->

        </div>
    </div>
    <!-- header area end -->
    <!-- page title area start -->

    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-area">
                            <div class="invoice-head">
                                <div class="row">
                                    <div class="iv-left col-6">
                                        <span>Attendance LIST History</span>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title"></h4>


                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <form method="post" action="">
                                                            <?php if (isset($_GET['message']) and $_GET["message"]==0){ ?>
                                                                <div class="alert alert-danger" role="alert">
                                                                    <strong>Wrong!</strong> The Attendance already save.
                                                                </div>
                                                            <?php } else if (isset($_GET['message']) and $_GET["message"]==1){?>
                                                                <div class="alert alert-success" role="alert">
                                                                    <strong>Well done!</strong> You successfully save the attendance.
                                                                </div>
                                                            <?php } ?>
                                                        <table class="table text-center">
                                                        <?php if ($_SESSION['role']=='student' or $_SESSION['role']=='parent' ){ ?>
                                                            <h4 class="alert alert-info">Number of absences <?php echo find_num_atten($id); ?> And percentage <?php echo find_num_atten($id)/80*100.." %";?></h4>
                                                        <?php }?>
                                                            <br>

                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">

                                                                <th scope="col">ID</th>
                                                                <th scope="col">Date</th>
                                                                <th scope="col">status</th>
                                                                <?php if ($_SESSION['role']=='admin'){ ?>
                                                                <th scope="col">action</th>
                                                                <?php }?>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                    $query = "select * from attendance where s_id =$id";
                                                                    $list_student =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_student))
                                                                    {

                                                                        $id =$row['s_id'];
                                                                        $att_id =$row['att_id'];
                                                                        $date =$row['date'];
                                                                        $status =$row['content'];



                                                                ?>

                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $date;?></td>
                                                                <td><?php echo $status;?></td>
                                                                        <?php if ($_SESSION['role']=='admin'){ ?>
                                                                <td><a href='view_history_attendance.php?delete=<?php echo $id;?>&att_id=<?php echo $att_id ?>'><i class="ti-trash"></a></i></td>
                                                                        <?php }?>

                                                            </tr>

                                                            <?php } ?>


                                                            </tbody>
                                                        </table><div class="form-group">

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include  "includes/footer.php"; ?>