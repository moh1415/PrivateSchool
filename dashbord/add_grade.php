<?php
ob_start();
$title = "Add New Grade";
include  "includes/header.php";
if (isset($_GET['id']))
{
    $course_id =$_GET['id'];
}
if (isset($_GET['course_name']) and isset($_GET['course_level']))
{
    $course_name =$_GET['course_name'];
    
}



  if (isset($_POST['submit11']))
        {
      $level122 =$_POST['level122'];
$student_id2344 =$_POST['student_id1'];
header("location: add_grade.php?sd=$student_id2344&sd1=$level122");
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
                $query = "select * from grades where s_id ='$student_id'and crn='$course_id'";
                $row = mysqli_query($con, $query);

                $count = mysqli_num_rows($row);
                if ($count)
                {
                    header("location: add_grade.php?message=1");
                } else {
                    if ($total>100)
                    {
                        header("location: add_grade.php?message=2");
                    }
                    else{
                        $query = "INSERT INTO grades(c_name, quiz_1, quiz_2,mid_exam,finle_exam,total,t_id,crn,s_id,ass_grade)";
                        $query .= "VALUES('{$_GET['course_name']}','{$quiz1}','{$quiz2}','{$midexam}','{$finleexam}','{$total}','{$_SESSION['teacher_id']}','{$_GET['id']}','{$student_id}','{$ass_grade}') ";
                        $create_course = mysqli_query($con, $query);
                        $noftit_con="Your grade added";
                        $class_id= find_class1($student_id);
                        notification_par($title,$class_id,$noftit_con,$_SESSION['teacher_id'],$student_id);
                        notification($title,$class_id,$noftit_con,$_SESSION['teacher_id']);

                        comfirm($create_course);
                        header("location: add_grade.php?message=0&id=$course_id&course_name=$course_name");
                    }



                }



        }
if (isset($_GET['course_level']))
{
    $level =$_GET['course_level'];
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
                                            <span>Add New Grade</span>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="card-body">
                                                <form action="" method="post">
                                                  <?php  if (isset($_GET['course_name']) and isset($_GET['course_level'])){ ?>
                                                    
                                                    
                                                     <div class="form-group">
                                                   <?php $level1255 = $_GET['course_level'];?>
                                                    <input class="form-control" maxlength="2"  hidden type="text" name="level122" value="<?php echo $level1255 ?>" id="example-text-input">
                                                </div>
                                                    
                                                    
                                                    
                                                      <div class="form-group">
                                                        <label class="col-form-label">Select Class Section</label>
                                                        <select name="student_id1" class="form-control">
                                                            <?php
    
                                                             
                                                            $query = "Select * from class where c_level='$level'";
                                                            $select_teacher= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_teacher)) {
                                                                $id = $row['c_id'];
                                                                $name = $row['c_name'];
                                                                
//                                                                 $query11 = "Select * from class where level='$level'";
//                                                            $select_teacher11= mysqli_query($con,$query11);
//                                                            while ($row11=mysqli_fetch_assoc($select_teacher11)) {
                                                                
                                                                


                                                                echo "<option value='{$id}' >Section {$name}</option>";
                                                            }

                                                            ?>
                                                        </select>
                                                          <div class="form-group col-6">
                                                        <input type="submit" name="submit11" class="btn btn-outline-primary mb-3" value="Submit">
                                                    </div>
                                                          
                                                    </div>
                                                    
                                                <?php    }
                                                            ?>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==1){ ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> The grade already exists.
                                                    </div>
                                                        <?php } else if (isset($_GET['message']) and $_GET["message"]==0){?>
                                                        <div class="alert alert-success" role="alert">
                                                            <strong>Well done!</strong> You successfully add the grade.
                                                        </div>
                                                        <?php } ?>
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==2){?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> The Grade should not be more 100 as total.
                                                    </div>
                                                    <?php } ?>
                                                    
                                                    
                                                    
                                                     <?php 
                                                    
                                                    
                                                    if (isset($_GET['sd'])){
                                                    
                                                    $class = $_GET['sd'];
                                                    $level12345 = $_GET['sd1'];
                                                    
                                                    
                                                    ?>
                                                    
                                                    <div class="form-group">
                                                        <label class="col-form-label">Select Student to enter the grade</label>
                                                        <select name="student_id" class="form-control">
                                                            <?php
                                                            
                                                            $query = "Select * from student where level=$level12345 AND class=$class";
                                                            $select_teacher= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_teacher)) {
                                                                $id = $row['s_id'];
                                                                $name = $row['s_name'];


                                                                echo "<option value='{$id}' >{$name}</option>";
                                                            }

                                                            ?>
                                                        </select>
                                                    </div>
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">Quiz 1</label>
                                                    <input class="form-control" maxlength="2" type="text" name="quiz1" value="" id="example-text-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-search-input" class="col-form-label">Quiz 2</label>
                                                    <input class="form-control" type="text" name="quiz2" value="" id="example-search-input">
                                                </div>
                                                    <div class="form-group">
                                                        <label for="example-search-input" class="col-form-label">Mid Exam</label>
                                                        <input class="form-control" type="text" name="midexam" value="" id="example-search-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-search-input" class="col-form-label">Final Exam</label>
                                                        <input class="form-control" type="text" name="finleexam" value="" id="example-search-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-search-input" class="col-form-label">Assignmrnt Grade</label>
                                                        <input class="form-control" type="text" name="ass_grade" value="" id="example-search-input">
                                                    </div>

                                                    <div class="form-group col-6">
                                                        <input type="submit" name="submit" class="btn btn-outline-primary mb-3" value="Save">
                                                    </div>
 <?php }?>
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