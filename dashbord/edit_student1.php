<?php
ob_start();
$title = "Edit Student";
include  "includes/header.php";
        if (isset($_GET['edit']))
        {
            $student_id = $_GET['edit'];
        }


        if (isset($_POST['update']))
        {
            include  "includes/db.php";
            $id =$_POST['id11'];
            $fullname =$_POST['fullname'];
            $phone =$_POST['phone'];
            $em_number =$_POST['em_number'];
            $address =$_POST['address'];
            $password =$_POST['password'];
            $level =$_POST['level'];
            $class =$_POST['class'];;
            if (empty($fullname)or empty($phone)or empty($em_number)or empty($address)or empty($password))
            {
                header("location: edit_student.php?message=2&edit=$student_id");
            } else{
                $query = "UPDATE student SET ";
                $query .="s_name  = '{$fullname}', ";
                $query .="s_phone = '{$phone}', ";
                $query .="level = '{$level}', ";
                $query .="emg_num = '{$em_number}', ";
                $query .="password   = '{$password}', ";
                $query .="address= '{$address}', ";
                $query .="class  = '{$class}' ";
                $query .= "WHERE s_id = {$student_id} ";
                $edit_student = mysqli_query($con, $query);
                header("location: edit_student.php?message=0");

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
                                            <span>Edit New Student</span>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="card-body">
                                                <form action="" method="post">
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==1){ ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> The student already exists.
                                                    </div>
                                                        <?php } else if (isset($_GET['message']) and $_GET["message"]==0){?>
                                                        <div class="alert alert-success" role="alert">
                                                            <strong>Well done!</strong> You successfully update the student <a href="list_students.php" class="alert-link"> back to student list</a>.

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



                                                                    $query = "select * from student where s_id='$student_id'";
                                                                    $list_student =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_student))
                                                                    {
                                                                        $id =$row['s_id'];
                                                                        $name =$row['s_name'];
                                                                        $phone =$row['s_phone'];
                                                                        $level =$row['level'];
                                                                        $emg_num =$row['emg_num'];
                                                                        $password =$row['password'];
                                                                        $address =$row['address'];
                                                                        $class121 =$row['class'];





                                                    ?>
                                                    
                                                               <div class="form-group">
                                                   
                                                    <input class="form-control"  hidden maxlength="10" type="text" name="class" value="<?php echo $class121;?>" id="example-text-input">
                                                </div>
                                                    
                                                    
                                                    

                                                       <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">ID</label>
                                                    <input class="form-control" disabled maxlength="10" type="text" name="id" value="<?php echo $id;?>" id="example-text-input">
                                                </div>
                                                    
                                      
                                                <div class="form-group">
                                                    <label for="example-search-input" class="col-form-label">Full Name</label>
                                                    <input class="form-control" type="search" name="fullname" value="<?php echo $name;?>" id="example-search-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-email-input" class="col-form-label">Phone</label>
                                                    <input class="form-control" type="text" name="phone" value="<?php echo $phone;?>" id="example-email-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Emergency Number</label>
                                                    <input class="form-control" type="text" name="em_number" value="<?php echo $emg_num;?>" id="example-url-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-tel-input" class="col-form-label">Address</label>
                                                    <input class="form-control" type="text" name="address" value="<?php echo $address;?>" id="example-tel-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword" class="">Password</label>
                                                    <input type="password" class="form-control" name="password" id="inputPassword" value="<?php echo $password;?>" placeholder="Password">
                                                </div>

                                             
                                                     <div style="padding: 4px" id="bulkOptionContainer" class="col-xs-4">
                                                                   <label for="example-search-input" class="col-form-label">Select Level</label>
                                                                <select name="level" id="" class="form-control">
                                                                     
                                                                    <option value="">Level</option >
                                                                    <?php
                                                                  

                                                                        echo "<option value='$level' >$level</option>";
                                                                        echo "<option value='1' >1</option>";
                                                                        echo "<option value='2' >2</option>";
                                                                        echo "<option value='3' >3</option>";
                                                                   

                                                                    ?>
                                                                </select></div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    

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