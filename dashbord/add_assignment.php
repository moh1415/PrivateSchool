<?php
ob_start();
$title = "Add New Assignment";
include  "includes/header.php";
        if (isset($_POST['submit'])) {
            include "includes/db.php";
            $title = $_POST['title'];
            $date = $_POST['date'];
            $course = $_POST['course'];
            $t_id=$_SESSION['teacher_id'];
            $query = "Select * from course where crn= $course";
            $select_course = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($select_course);
            $course_name = $row['c_name'];

            $files  = $_FILES['content']['name'];
            $files_temp = $_FILES['content']['tmp_name'];
            move_uploaded_file($files_temp, "file/assignment/$files" );
            
            
            
            
                     $query33 = "Select * from assignment where c_id = $course ";
                $select_course33 = mysqli_query($con,$query33);
                $row33 = mysqli_fetch_assoc($select_course33);
            
            if($row33){
                
                header("location:add_assignment.php?message=1");
            }

    else{
            
            
            
            
            
            

                    $query = "INSERT INTO assignment(title, content,dead_line,c_id,c_name,t_id)";
                    $query .= "VALUES('{$title}','{$files}','{$date}','{$course}','{$course_name}','{$t_id}') ";
                    $create_assignment = mysqli_query($con, $query);
                    $noftit_con="New assingnment added";
                    $class_id= find_class($course);
            foreach ($class_id as $value)
            {
                notification($title,$value,$noftit_con,$t_id);

            }
                    header("location: add_assignment.php?message=0");
                   // comfirm($create_assignment);




            }}


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
                                            <span>Add New Assignment</span>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="card-body">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==1){ ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> The assignment already exists.
                                                    </div>
                                                        <?php } else if (isset($_GET['message']) and $_GET["message"]==0){?>
                                                        <div class="alert alert-success" role="alert">
                                                            <strong>Well done!</strong> You successfully add the assignment.
                                                        </div>
                                                        <?php } ?>
                                                    <?php  if (isset($_GET['message']) and $_GET["message"]==2){?>
                                                        <div class="alert alert-danger" role="alert">
                                                            <strong>Wrong!</strong> Please Fill all fields.
                                                        </div>
                                                    <?php } ?>

                                                <div class="form-group">
                                                    <label for="example-search-input" class="col-form-label">Assignment Title</label>
                                                    <input class="form-control" type="search" name="title" value="" id="example-search-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-email-input" class="col-form-label">Content</label>
                                                    <input class="form-control" type="file" name="content" value="" id="example-email-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Dead line</label>
                                                    <input class="form-control"  type="date" name="date" value="" id="example-url-input">
                                                </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Select Course 1 to assign</label>
                                                        <select name="course" class="form-control">
                                                            <?php
                                                            $query = "Select * from course where t_id={$_SESSION['teacher_id']}";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
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