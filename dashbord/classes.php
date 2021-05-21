<?php
ob_start();
$title ="Classes";
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
                                        <span>CLASS LIST</span>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title"></h4>
                                                <a href="add_class.php"><button type="button"  class="btn btn-rounded btn-primary mb-3">Add New Class</button></a>
                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">
                                                                <th scope="col">Class ID</th>
                                                                <th scope="col">Class Section</th>
                                                                <th scope="col">Class Level</th>
                                                                <th scope="col">Course 1</th>
                                                                <th scope="col">Course 2</th>
                                                                <th scope="col">Course 3</th>
                                                                <th scope="col">Course 4</th>
                                                                <th scope="col">Course 5</th>
                                                                <th scope="col">Course 6</th>
                                                                <th scope="col">Course 7</th>
                                                                <th scope="col">Action</th>
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
                                                                $name =$row['c_name'];
                                                                $sub1 =$row['sub1'];
                                                                $sub2 =$row['sub2'];
                                                                $sub3 =$row['sub3'];
                                                                $sub4 =$row['sub4'];
                                                                 $sub5 =$row['sub5'];
                                                                $sub6 =$row['sub6'];
                                                                $sub7=$row['sub7'];
                                                                $level=$row['c_level'];

                                                                ?>
                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $level;?></td>
                                                                <td><?php echo find_course($sub1);?></td>
                                                                <td><?php echo find_course($sub2);?></td>
                                                                <td><?php echo find_course($sub3);;?></td>
                                                                <td><?php echo find_course($sub4);?></td>
                                                                 <td><?php echo find_course($sub5);?></td>
                                                                <td><?php echo find_course($sub6);;?></td>
                                                                <td><?php echo find_course($sub7);?></td>
                                                                <td><a href='classes.php?delete=<?php echo $id;?>'><i class="ti-trash"></a></i><a href='edit_class.php?edit=<?php echo $id;?>'><i class="ti-pencil"></a></i></td>
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