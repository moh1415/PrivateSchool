<?php
ob_start();
$title ="View of student for attendance";
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
                                        <span>Attendance LIST</span>
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
                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">

                                                                <th scope="col">ID</th>
                                                                <th scope="col">Student Name</th>
                                                                <th scope="col">Class ID</th>
                                                                <th scope="col">Number of absences</th>
                                                                <th scope="col">percentage of absences</th>
                                                                <th scope="col">history of all Attendance</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                    $query = "select * from student where class =$id";
                                                                    $list_student =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_student))
                                                                    {
                                                                        $id =$row['s_id'];
                                                                        $class_id =$row['class'];
                                                                        $name =$row['s_name'];



                                                                ?>

                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $class_id;?></td>
                                                                <td><?php echo find_num_atten($id);?></td>
                                                                <td><?php echo find_num_atten($id)/80*100.." %";?></td>
                                                                <td><a href='view_history_attendance.php?id=<?php echo $id;?>'><i class="ti-pencil"></a></i></td>
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