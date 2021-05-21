<?php
ob_start();
$title = "Edit New course";
include  "includes/header.php";
if (isset($_GET['edit']))
{
    $course_id = $_GET['edit'];
}
        if (isset($_POST['update']))
        {
            include  "includes/db.php";
            $id =$_POST['id'];
            $course_name =$_POST['course_name'];
            $level =$_POST['level'];
            $teacher =$_POST['teacher_id'];
            if (empty($id)or empty($course_name) or empty($level)or empty($teacher))
            {
                header("location: edit_course.php?message=2");
            }
            else{
                $query = "UPDATE course SET ";
                $query .="crn= '{$id}', ";
                $query .="c_name = '{$course_name}', ";
                $query .="c_level= '{$level}', ";
                $query .="t_id = '{$teacher}' ";
                $query .= "WHERE crn = {$course_id} ";
                $edit_course = mysqli_query($con, $query);
                comfirm($edit_course);
                header("location: edit_course.php?message=0");
            }
        }
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
                                            <span>Edit New Course</span>
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
                                                            <strong>Well done!</strong> You successfully edit the course.
                                                        </div>
                                                        <?php } ?>
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==2){?>
                                                    <div class="alert alert-success" role="alert">
                                                        <strong>Well done!</strong> Please Fill all fields.
                                                    </div>
                                                    <?php } ?>
                                                            <?php
                                                            if (isset($_GET['edit']))
                                                            {
                                                                $query = "select * from course where crn='$course_id'";
                                                                $list_course =mysqli_query($con,$query);
                                                                while ($row=mysqli_fetch_assoc($list_course))
                                                                {
                                                                    $id =$row['crn'];
                                                                    $name =$row['c_name'];
                                                                    $level =$row['c_level'];
                                                                    $teacher_id =$row['t_id'];

                                                                    ?>
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">CRN</label>
                                                    <input class="form-control" maxlength="3" type="text" name="id" value="<?php echo $id;?>" id="example-text-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-search-input" class="col-form-label">Course Name</label>
                                                    <input class="form-control" type="search" name="course_name" value="<?php echo $name;?>" id="example-search-input">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Select Level for the course</label>
                                                    <select name="level" class="form-control">
                                                        <option value="<?php echo $level;?>"><?php echo $level." "."Now";?></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Select Teacher for the course</label>
                                                        <select name="teacher_id" class="form-control">
                                                            <option value="<?php echo $id;?>"><?php echo find_teacher($id)." "."Now";?></option>
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
                                                        <input type="submit" name="update" class="btn btn-outline-primary mb-3">
                                                    </div>

                                                </form>
                                            </div><?php }}?>

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