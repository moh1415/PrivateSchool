<?php
ob_start();
$title = "Edit Class";
include  "includes/header.php";
        if (isset($_GET['edit']))
        {
            $class_id = $_GET['edit'];
        }


        if (isset($_POST['update']))
        {
            include  "includes/db.php";
            $id =$_POST['id'];
            $class_name =$_POST['fullname'];
            $level1234 =$_POST['level'];
            $sub1 =$_POST['sub1'];
            $sub2 =$_POST['sub2'];
            $sub3 =$_POST['sub3'];
            $sub4 =$_POST['sub4'];
             $sub5 =$_POST['sub5'];
            $sub6 =$_POST['sub6'];
            $sub7 =$_POST['sub7'];



            if (empty($class_name)or empty($sub1)or empty($sub2)or empty($sub3)or empty($sub4))
            {
                header("location: edit_class.php?message=2&edit=$class_id");
            } else{
                $query = "UPDATE class SET ";
                $query .="c_name  = '{$class_name}', ";
                $query .="c_level  = '{$level1234}', ";
                $query .="sub1 = '{$sub1}', ";
                $query .="sub2   = '{$sub2}', ";
                $query .="sub3= '{$sub3}', ";
                $query .="sub4  = '{$sub4}', ";
                $query .="sub5   = '{$sub5}', ";
                $query .="sub6= '{$sub6}', ";
                $query .="sub7  = '{$sub7}' ";
                $query .= "WHERE c_id = {$class_id} ";
                $edit_student = mysqli_query($con, $query);
                comfirm($edit_student);
                header("location: edit_class.php?message=0");

            }



        }
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
                                            <span>Edit New Class</span>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="card-body">
                                                <form action="" method="post">
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==1){ ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> The class already exists.
                                                    </div>
                                                        <?php } else if (isset($_GET['message']) and $_GET["message"]==0){?>
                                                        <div class="alert alert-success" role="alert">
                                                            <strong>Well done!</strong> You successfully update the class <a href="classes.php" class="alert-link"> back to classes list</a>.

                                                        </div>
                                                        <?php } ?>
                                                    <?php  if (isset($_GET['message']) and $_GET["message"]==2){?>
                                                        <div class="alert alert-danger" role="alert">
                                                            <strong>Wrong!</strong> Please Fill all fields.
                                                        </div>
                                                    <?php } ?>
                                                    <?php
                                                    if (isset($_GET['edit']))
                                                    {



                                                                    $query = "select * from class where c_id='$class_id'";
                                                                    $list_class =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_class))
                                                                    {
                                                                        $id =$row['c_id'];
                                                                        $name =$row['c_name'];
                                                                        $level =$row['c_level'];
                                                                        $sub1 =$row['sub1'];
                                                                        $sub2 =$row['sub2'];
                                                                        $sub3 =$row['sub3'];
                                                                        $sub4 =$row['sub4'];
                                                                        $sub5 =$row['sub5'];
                                                                        $sub6 =$row['sub6'];
                                                                        $sub7 =$row['sub7'];






                                                    ?>

                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">ID</label>
                                                    <input class="form-control" disabled maxlength="10" type="text" name="id" value="<?php echo $id;?>" id="example-text-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-search-input" class="col-form-label">Class Section</label>
                                                    <input class="form-control" type="search" name="fullname" value="<?php echo $name;?>" id="example-search-input">
                                                </div>

                                                    
                                                       <div style="padding: 4px" id="bulkOptionContainer" class="col-xs-4">
                                                                   <label for="example-search-input" class="col-form-label">Level</label>
                                                                <select name="level" id="" class="form-control">
                                                                     
                                                                    <?php
                                                                  

                                                                        echo "<option value='$level' >$level</option>";
                                                                        echo "<option value='1' >1</option>";
                                                                        echo "<option value='2' >2</option>";
                                                                        echo "<option value='3' >3</option>";
                                                                   

                                                                    ?>
                                                                </select></div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label class="col-form-label">Select Course 1 to assign</label>
                                                        <select name="sub1" class="form-control">
                                                            <option value='<?php echo $sub1;?>'><?php echo find_course($sub1)." "."Now";?></option>
                                                            <?php
                                                            $query = "Select * from course ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                        <label class="col-form-label">Select Course 2 to assign</label>
                                                        <select name="sub2" class="form-control">
                                                            <option value='<?php echo $sub2;?>'><?php echo find_course($sub2)." "."Now";?></option>
                                                            <?php
                                                            $query = "Select * from course ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }


                                                            ?>
                                                        </select>
                                                        <label class="col-form-label">Select Course 3 to assign</label>
                                                        <select name="sub3" class="form-control">
                                                            <option value='<?php echo $sub3;?>'><?php echo find_course($sub3)." "."Now";?></option>
                                                            <?php
                                                            $query = "Select * from course ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }


                                                            ?>
                                                        </select>
                                                        <label class="col-form-label">Select Course 4 to assign</label>
                                                        <select name="sub4" class="form-control">
                                                            <option value='<?php echo $sub4;?>'><?php echo find_course($sub4)." "."Now";?></option><br>
                                                            <?php
                                                            $query = "Select * from course ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];
                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option><br>";
                                                            }


                                                            ?>
                                                        </select>
                                                          <label class="col-form-label">Select Course 5 to assign</label>
                                                        <select name="sub5" class="form-control">
                                                            <option value='<?php echo $sub5;?>'><?php echo find_course($sub5)." "."Now";?></option>
                                                            <?php
                                                            $query = "Select * from course ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                          <label class="col-form-label">Select Course 6 to assign</label>
                                                        <select name="sub6" class="form-control">
                                                            <option value='<?php echo $sub6;?>'><?php echo find_course($sub6)." "."Now";?></option>
                                                            <?php
                                                            $query = "Select * from course ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                          <label class="col-form-label">Select Course 7 to assign</label>
                                                        <select name="sub7" class="form-control">
                                                            <option value='<?php echo $sub7;?>'><?php echo find_course($sub7)." "."Now";?></option>
                                                            <?php
                                                            $query = "Select * from course ";
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
                                                        <input type="submit" name="update" class="btn btn-outline-primary mb-3">
                                                    </div>

                                                </form>
                                            </div>  <?php }} ?>

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