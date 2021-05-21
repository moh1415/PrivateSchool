<?php
ob_start();
$title ="List of Assignment";
include  "includes/header.php";



?>
<?php

if (isset($_GET['delete']))
{


    $the_user_id = mysqli_real_escape_string($con,$_GET['delete']);
    $query = "Delete from assignment_sub where id = $the_user_id";
    $delete_query = mysqli_query($con, $query);
    header("location: view_list_assignment_sub.php");


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

                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">
                                                                <th scope="col">Assignment ID</th>
                                                                <th scope="col">Assignment  File</th>
                                                                <th scope="col">student name</th>
                                                                <th scope="col">Course Name</th>
                                                                <th scope="col">Action</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                   //$course_id= find_course_id($_SESSION['teacher_id']);
                                                                     $query1 ="select * from course where t_id={$_SESSION['teacher_id']}";
                                                                    $list_course =mysqli_query($con,$query1);
                                                                    while ($row=mysqli_fetch_assoc($list_course)) {
                                                                        $idforcourse = $row['crn'];

                                                                    $query = "select * from assignment_sub where c_id={$idforcourse}";
                                                                    $list_parent =mysqli_query($con,$query);

                                                                    while ($row=mysqli_fetch_assoc($list_parent))
                                                                    {
                                                                        $id =$row['id'];
                                                                        $file =$row['file'];
                                                                        $student =$row['s_id'];
                                                                        $course_id =$row['c_id'];


                                                                ?>

                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $file;?></td>
                                                                <td><?php echo find_student_name($student);?></td>
                                                                <td><?php echo find_course_name($course_id);?></td>
                                                                <td><a href='file/assignment/<?php echo $file;?>'><i class="ti-download"></a></i></td>
                                                                <td><a href='view_list_assignment_sub.php?delete=<?php echo $id;?>'><i class="ti-trash"></a></i></td>


                                                            </tr>
                                                            <?php } } ?>

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