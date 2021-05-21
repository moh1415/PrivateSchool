<?php
ob_start();
$title = "Edit Grade";
include  "includes/header.php";
if (isset($_GET['id']))
{
    $course_id =$_GET['id'];
}
if (isset($_GET['course_name']))
{
    $course_name =$_GET['course_name'];
}
if (isset($_GET['edit']))
{
    $grade_id =$_GET['edit'];
}

        if (isset($_POST['submit']))
        {
            include  "includes/db.php";
            $quiz1 =$_POST['quiz1'];
            $quiz2 =$_POST['quiz2'];
            $midexam =$_POST['midexam'];
            $finleexam =$_POST['finleexam'];
            $student_id =$_POST['student_id'];
            $ass_grade =$_POST['ass_grade'];
            $total=$quiz1+$quiz2+$midexam+$finleexam+$ass_grade;



                    if ($total>100)
                    {
                        header("location: edit_grade.php?message=2&edit=$grade_id");
                    }
                    else{
                        $query = "UPDATE grades SET ";
                        $query .="quiz_1= '{$quiz1}', ";
                        $query .="quiz_2 = '{$quiz2}', ";
                        $query .="mid_exam = '{$midexam}', ";
                        $query .="ass_grade = '{$ass_grade}', ";
                        $query .="finle_exam= '{$finleexam}', ";
                        $query .="total = '{$total}' ";
                        $query .= "WHERE grade_id = {$grade_id} ";
                        $edit_grade = mysqli_query($con, $query);
                        comfirm($edit_grade);
                        header("location: edit_grade.php?message=0&edit=$grade_id");
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
                                            <span>Edit Grade</span>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="card-body">
                                                <form action="" method="post">
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==1){ ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> The grade already exists.
                                                    </div>
                                                        <?php } else if (isset($_GET['message']) and $_GET["message"]==0){?>
                                                        <div class="alert alert-success" role="alert">
                                                            <strong>Well done!</strong> You successfully edit the grade.
                                                        </div>
                                                        <?php } ?>
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==2){?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> The Grade should not be more 100 as total.
                                                    </div>
                                                    <?php } ?>

                                                    <?php
                                                    $query = "select * from grades where grade_id ='$grade_id'";
                                                    $view_grade = mysqli_query($con, $query);
                                                    while ($row=mysqli_fetch_assoc($view_grade))
                                                    {

                                                        $id =$row['crn'];
                                                        $course_name =$row['c_name'];
                                                        $student_id =$row['s_id'];
                                                        $quiz_1 =$row['quiz_1'];
                                                        $quiz_2 =$row['quiz_2'];
                                                        $ass_grade =$row['ass_grade'];
                                                        $mid_exam =$row['mid_exam'];
                                                        $finle_exam =$row['finle_exam'];
                                                        $total =$row['total'];
                                                        $grade_id =$row['grade_id'];



                                                    ?>
                                                    <div class="form-group">
                                                        <label class="">Your edit student</label><h4><?php echo find_student($student_id)?></h4>

                                                    </div>
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">Quiz 1</label>
                                                    <input class="form-control" maxlength="2" type="text" name="quiz1" value="<?php echo $quiz_1;?>" id="example-text-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-search-input" class="col-form-label">Quiz 2</label>
                                                    <input class="form-control" type="text" name="quiz2" value="<?php echo $quiz_2;?>" id="example-search-input">
                                                </div>
                                                    <div class="form-group">
                                                        <label for="example-search-input" class="col-form-label">Mid Exam</label>
                                                        <input class="form-control" type="text" name="midexam" value="<?php echo $mid_exam;?>" id="example-search-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-search-input" class="col-form-label">Final Exam</label>
                                                        <input class="form-control" type="text" name="finleexam" value="<?php echo $finle_exam;?>" id="example-search-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-search-input" class="col-form-label">Assignmrnt Grade</label>
                                                        <input class="form-control" type="text" name="ass_grade" value="<?php echo $ass_grade;?>" id="example-search-input">
                                                    </div>
                                                    <?php  }?>
                                                    <div class="form-group col-6">
                                                        <input type="submit" name="submit" class="btn btn-outline-primary mb-3" value="Save">
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