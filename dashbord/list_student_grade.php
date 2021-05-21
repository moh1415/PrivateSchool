<?php
ob_start();
$title ="List of Courses Grade";
include  "includes/header.php";
if (isset($_GET['id']))
{

    $course_id =$_GET['id'];
    //$course_name =$_GET['course_name'];
}


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
function find_student($id)
{
    global $con;
    $query = "select * from student where s_id=$id";
    $list_course =mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($list_course);
    if ($row)
    {

        return $row['s_name'];
    } else {
        $mag ="No student assign yet";
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
                                        <span>LIST Of Student Grades</span>
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
                                                                <th scope="col">Student Name</th>
<!--                                                                <th scope="col">Course Name</th>-->
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                    $query = "select * from grades where crn={$course_id}";
                                                                    $list_grade =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_grade))
                                                                    {
                                                                        $id =$row['crn'];
                                                                        $course_name =$row['c_name'];
                                                                        $student_id =$row['s_id'];



                                                                ?>

                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $course_name;?></td>
                                                                <td><?php echo find_student($student_id);?></td>
                                                                <td><a href='list_student_grade.php?delete=<?php echo $student_id;?>&crn=<?php echo $id;?>'><i class="ti-trash"></a></td>
                                                            </tr>
                                                            <?php

                                                                    } ?>

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
<?php
if (isset($_GET['delete']))
{

        $course_id =$_GET['crn'];
        //$course_name =$_GET['course_name'];

    $the_user_id = mysqli_real_escape_string($con,$_GET['delete']);
    $query = "Delete from grades where s_id = $the_user_id";
    $delete_query = mysqli_query($con, $query);
    header("location: list_student_grade.php?id=$course_id");


}
?>

<?php include  "includes/footer.php"; ?>