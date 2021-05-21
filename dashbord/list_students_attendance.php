<?php
ob_start();
$title ="List of student for attendance";
include  "includes/header.php";



?>
<?php

if (isset($_GET['id']))
{

$id =$_GET['id'];

}

if (isset($_GET['att']))
{

    $id =$_GET['id'];

}

function att($class_id,$id){

    global $con;
    $today =date("Y/m/d");
    $query = "select * from attendance where date='$today' and s_id!= null";
    $list_att =mysqli_query($con,$query);
    $row=mysqli_num_rows($list_att);
    if ($row)
    {
        header("location: list_students_attendance.php?message=0&id=$class_id");
    } else {
        $date = date("Y/m/d");
        $query = "INSERT INTO attendance(class_no, content, date,s_id)";
        $query .= "VALUES({$class_id},'{presence}','{$date}','{$id}') ";
        $create_attendance = mysqli_query($con, $query);
        header("location: list_students_attendance.php?message=1&id=$class_id");
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
                                                                <th scope="col">Absent</th>

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
                                                                <?php echo "<td><input class='checkboxes' type='checkbox' name='checkboxarray[]' value='$id'></td>";?>

                                                            </tr>

                                                            <?php } ?>




                                                            <?php



                                                            ?>











                                                            <?php
                                                            if (isset($_POST['checkboxarray']))
                                                            {
                                                                foreach ($_POST['checkboxarray'] as $check)
                                                                {
                                                                    $bulk_options = $_POST['bulk_options'];

                                                                    switch ($bulk_options)
                                                                    {

                                                                        case $bulk_options:
                                                                            $today =date("Y/m/d");
                                                                            $query = "select * from attendance where date='$today' and s_id='{$check}'";
                                                                            $list_att =mysqli_query($con,$query);
                                                                            $row=mysqli_num_rows($list_att);
                                                                            if ($row)
                                                                            {
                                                                                header("location: list_students_attendance.php?message=0&id=$class_id");
                                                                            } else {
                                                                                $date = date("Y/m/d");
                                                                                $query = "INSERT INTO attendance(class_no, content, date,s_id)";
                                                                                $query .= "VALUES({$class_id},'absence','{$date}','{$check}') ";
                                                                                $create_attendance = mysqli_query($con, $query);
                                                                                 header("location: list_students_attendance.php?message=1&id=$class_id");
                                                                                if (!$create_attendance) {
                                                                                    die('QUERY FAILED' . mysqli_error($con));
                                                                                }
                                                                                break;
                                                                            }


                                                                    }
                                                                }


                                                            }

                                                            ?>

                                                            </tbody>
                                                        </table>
                                                            <div
                                                                    class="form-group col-sm-2">
                                                                <div style="padding: 4px" id="bulkOptionContainer" class="col-xs-4">
                                                                    <select hidden name="bulk_options" id="" class="form-control">

                                                                        <option value="absence">Absence</option>



                                                                    </select></div>
                                                            <div class="form-group">
                                                            <input class="btn btn-primary" type="submit" name="submit" value="Save">
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