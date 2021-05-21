<?php
ob_start();
$title = "Add New course";
include  "includes/header.php";
function find_teacher($id)
{
    global $con;
    $query = "select * from teacher where t_id=$id";
    $list_teacher =mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($list_teacher);
    if ($row)
    {

        return $row['t_name'];
    } else {
        $mag ="No teacher assign yet";
        return $mag;
    }


}
        if (isset($_POST['submit']))
        {
            include  "includes/db.php";


            $id =$_POST['id'];
            $course_name =$_POST['course_name'];
            $level =$_POST['level'];
            $teacher =$_POST['teacher_id'];
            if (empty($id)or empty($course_name) or empty($level)or empty($teacher))
            {
                header("location: add_course.php?message=2");
            }
            else{
                $query = "select * from course where crn ='$id'";
                $row = mysqli_query($con, $query);

                $count = mysqli_num_rows($row);
                if ($count)
                {
                    header("location: add_course.php?message=1");
                } else {


                    $query = "INSERT INTO course(crn, c_name, c_level,t_id)";
                    $query .= "VALUES({$id},'{$course_name}','{$level}','{$teacher}') ";
                    $create_course = mysqli_query($con, $query);

                    comfirm($create_course);
                    header("location: add_course.php?message=0");
                }
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
                                            <span>Add New Course</span>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="card-body">
                                                <form action="" method="post">
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==1){ ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> The course already exists.
                                                    </div>
                                                        <?php } else if (isset($_GET['message']) and $_GET["message"]==0){?>
                                                        <div class="alert alert-success" role="alert">
                                                            <strong>Well done!</strong> You successfully add the course.
                                                        </div>
                                                        <?php } ?>
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==2){?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> Please Fill all fields.
                                                    </div>
                                                    <?php } ?>
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">CRN</label>
                                                    <input class="form-control" maxlength="3" type="text" name="id" value="" id="example-text-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-search-input" class="col-form-label">Course Name</label>
                                                    <input class="form-control" type="search" name="course_name" value="" id="example-search-input">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Select Level for the course</label>
                                                    <select name="level" class="form-control">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Select Teacher for the course</label>
                                                        <select name="teacher_id" class="form-control">
                                                            <option value="No teacher assign yet">No teacher assign yet</option>
                                                            <?php
                                                            $query = "Select * from teacher ";
                                                            $select_teacher= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_teacher)) {
                                                                $id = $row['t_id'];
                                                                $name = $row['t_name'];


                                                                echo "<option value='{$id}' >{$name}</option>";
                                                            }

                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <input type="submit" name="submit" class="btn btn-outline-primary mb-3">
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
<?php include  "includes/footer.php"; ?>