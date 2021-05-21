<?php
ob_start();
$title ="List of Assignment";
include  "includes/header.php";



?>
<?php

if (isset($_GET['delete']))
{


    $the_user_id = mysqli_real_escape_string($con,$_GET['delete']);
    $query = "Delete from assignment where ass_id = $the_user_id";
    $delete_query = mysqli_query($con, $query);
    header("location: list_assignment.php");


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
                                        <span>Assignment LIST</span>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title"></h4>
                                                <a href="add_assignment.php"><button type="button"  class="btn btn-rounded btn-primary mb-3">Add New Assignment</button></a>
                                                <a href="view_list_assignment_sub.php"><button type="button"  class="btn btn-rounded btn-primary mb-3">View Assignment Submission </button></a>
                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">
                                                                <th scope="col">Assignment ID</th>
                                                                <th scope="col">Assignment  title</th>
                                                                <th scope="col">Dead line</th>
                                                                <th scope="col">Course Name</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                    $query = "select * from assignment where t_id={$_SESSION['teacher_id']}";
                                                                    $list_parent =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_parent))
                                                                    {
                                                                        $id =$row['ass_id'];
                                                                        $title =$row['title'];
                                                                        $date =$row['dead_line'];
                                                                        $course_name =$row['c_name'];


                                                                ?>

                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $title;?></td>
                                                                <td><?php echo $date;?></td>
                                                                <td><?php echo $course_name;?></td>
                                                                <td><a href='list_assignment.php?delete=<?php echo $id;?>'><i class="ti-trash"></a></i></td>
                                                            </tr>
                                                            <?php } ?>

                                                            </tbody>
                                                        </table>
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