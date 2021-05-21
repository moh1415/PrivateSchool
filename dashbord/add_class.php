<?php
ob_start();
$title = "Add New Class";
include  "includes/header.php";




if (isset($_POST['submit1'])){
    
    $id1 =$_POST['level'];
    $level =$_GET['id1'];
    header("location: add_class.php?id1=$id1");
    
}







        if (isset($_POST['submit']))
        {
            include  "includes/db.php";
           // $id =$_POST['id'];
            $course_name =$_POST['fullname'];
            $sub1 =$_POST['sub1'];
            $sub2 =$_POST['sub2'];
            $sub3 =$_POST['sub3'];
            $sub4 =$_POST['sub4'];
            $sub5 =$_POST['sub5'];
            $sub6 =$_POST['sub6'];
            $sub7 =$_POST['sub7'];
            $level =$_POST['level'];
            
            if (empty($course_name)or empty($sub1)or empty($sub2)or empty($sub3)or empty($sub4) or empty($sub5) or empty($sub6) or empty($sub7))
            {
                header("location: add_class.php?message=2");
            }
            else {
                $query = "select * from class where c_id ='$id'";
                $row = mysqli_query($con, $query);

                $count = mysqli_num_rows($row);
                
                
                
                
                
                
                
                                                        $query67 = "Select * from class where c_name = $course_name AND c_level = $level ";
                                                        $select_course67= mysqli_query($con,$query67);
                                                      
                                                            $count12 = mysqli_num_rows($select_course67);
                
                if ($count12){
                                                                
                                                                 header("location: add_class.php?message=1");
                                                     
                }
                
                
                
                
                
                
                
                
                
                else if ($count)
                {
                    header("location: add_class.php?message=1");
                } else {


                    $query = "INSERT INTO class(c_name, sub1, sub2,sub3,sub4, sub5,sub6,sub7,c_level)";
                    $query .= "VALUES('{$course_name}','{$sub1}','{$sub2}','{$sub3}','{$sub4}','{$sub5}','{$sub6}','{$sub7}','{$level}')";
                    $create_class = mysqli_query($con, $query);

                    comfirm($create_class);
                    header("location: add_class.php?message=0");
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
                                            <span>Add New Class</span>
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
                                                            <strong>Well done!</strong> You successfully add the class.
                                                        </div>
                                                        <?php } ?>
                                                    <?php  if (isset($_GET['message']) and $_GET["message"]==2){?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> Please Fill all fields.
                                                    </div>
                                                    <?php } ?>
                                                    
                                                    
                                                    <?php  if(!isset($_GET['id1'])) { ?>
                                                    
                                                    <div style="padding: 4px" id="bulkOptionContainer" class="col-xs-4">
                                                                   <label for="example-search-input" class="col-form-label">Select Level</label>
                                                                <select name="level" id="" class="form-control">
                                                                     
                                                                    <option value="">Level</option >
                                                                    <?php
                                                                  


                                                                        echo "<option value='1' >1</option>";
                                                                        echo "<option value='2' >2</option>";
                                                                        echo "<option value='3' >3</option>";
                                                                   

                                                                    ?>
                                                                </select></div>
                                                            <input type="submit" name="submit1" class="btn btn-success" value="continue">
                                                    
                                                    
                                                   <?php  }?>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                        <?php  if(isset($_GET['id1'])) {  
                                                            
                                                            $level1 = $_GET['id1'];
                                                            ?>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                              
                                                <div class="form-group">
                                                    <label for="example-search-input" class="col-form-label">Class Section</label>
                                                    <input class="form-control" type="search" name="fullname" value="" id="example-search-input">
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Select Course 1 to assign</label>
                                                    <select name="sub1" class="form-control">
                                                        <?php
                                                        $query = "Select * from course where c_level = $level1";
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
                                                        <?php
                                                        $query = "Select * from course where c_level = $level1";
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
                                                        <?php
                                                        $query = "Select * from course where c_level = $level1";
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
                                                        <?php
                                                        $query = "Select * from course where c_level = $level1";
                                                        $select_course= mysqli_query($con,$query);
                                                        while ($row=mysqli_fetch_assoc($select_course)) {
                                                            $course_id = $row['crn'];
                                                            $course_name = $row['c_name'];
                                                            $course_level = $row['c_level'];

                                                            echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                        }


                                                        ?>
                                                    </select>
                                                    <label class="col-form-label">Select Course 5 to assign</label>
                                                    <select name="sub5" class="form-control">
                                                        <?php
                                                        $query = "Select * from course where c_level = $level1";
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
                                                        <?php
                                                        $query = "Select * from course where c_level = $level1";
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
                                                        <?php
                                                        $query = "Select * from course where c_level = $level1 ";
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
                                                    
                                                    <div style="padding: 4px" id="bulkOptionContainer" class="col-xs-4">
                                                                   <label for="example-search-input" class="col-form-label">Select Level</label>
                                                                <select name="level" id="" class="form-control">
                                                                     
                                                                    
                                                                    <?php
                                                                  
               $level1 =$_GET['id1'];

                                                                        echo "<option value='$level1' >$level1</option>";
                                                                   

                                                                    ?>
                                                                </select></div>
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-group col-6">
                                                        <input type="submit" name="submit" class="btn btn-outline-primary mb-3">
                                                        
                                                        <?php  }?>
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