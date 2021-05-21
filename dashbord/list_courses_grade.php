<?php
ob_start();
$title ="List of Courses Grade";
include  "includes/header.php";



?>
<?php
                                    function find_course($crn)
                                    {
                                        global $con;
                                        $query = "select * from course where crn=$crn";
                                        $list_course =mysqli_query($con,$query);
                                        $row=mysqli_fetch_assoc($list_course);
                                        if ($row)
                                        {

                                            return $row['c_name']." Level ".$row['c_level'];
                                        } else {
                                            $mag ="No course assign yet";
                                            return $mag;
                                        }
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
                                        <span>Courses LIST</span>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title"></h4>


                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">
                                                                <th scope="col">CRN</th>
                                                                <th scope="col">Course Name</th>
                                                                <th scope="col">Level</th>
<!--                                                                <th scope="col">Course Name</th>-->
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                    $query = "select * from course where t_id={$_SESSION['teacher_id']}";
                                                                    $list_parent =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_parent))
                                                                    {
                                                                        $id =$row['crn'];
                                                                        $name =$row['c_name'];
                                                                        $level =$row['c_level'];



                                                                ?>

                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $level;?></td>
                                                                <td><a href='add_grade.php?id=<?php echo $id;?>&course_name=<?php echo $name?>&course_level=<?php echo $level?>'><button type="button" class="btn btn-rounded btn-primary mb-3">Add Grade</button></a>
                                                                    <a href='view_student_grade.php?id=<?php echo $id;?>'><button type="button" class="btn btn-rounded btn-primary mb-3">View Grade</button></a>
                                                                    <a href='list_student_grade.php?id=<?php echo $id;?>'><button type="button" class="btn btn-rounded btn-primary mb-3">Delete Grade</button></a>
                                                                </td>
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