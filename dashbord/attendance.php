<?php
ob_start();
$title ="Attendance";
include "includes/header.php";
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
if (isset($_GET['delete']))
{


    $the_user_id = mysqli_real_escape_string($con,$_GET['delete']);
    $query = "Delete from class where c_id = $the_user_id";
    $delete_query = mysqli_query($con, $query);
    header("location: classes.php");


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
                                        <span>Attendance List Of Classes</span>
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
                                                                <th scope="col">Class ID</th>
                                                                <th scope="col">Class Level</th>
                                                                <th scope="col">Class Section</th>
                                                                <th scope="col">Attendance list</th>
                                                                <th scope="col">View student Attendance list</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                            <?php
                                                            $query = "select * from class";
                                                            $list_class =mysqli_query($con,$query);

                                                            while ($row=mysqli_fetch_assoc($list_class))
                                                            {

                                                                $id =$row['c_id'];
                                                                $level =$row['c_level'];
                                                                $name =$row['c_name'];


                                                                ?>
                                                                <th scope="row"><?php echo $id;?></th>
                                                                <th scope="row"><?php echo $level;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><a href='list_students_attendance.php?id=<?php echo $id;?>'><i class="ti-pencil"></a></i></td>
                                                                <td><a href='view_students_attendance.php?id=<?php echo $id;?>'><i class="ti-pencil"></a></i></td>
                                                            </tr>
                                                            <?php } ?>
                                                            </tr>

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
<?php include "includes/footer.php"; ?>