<?php
ob_start();
$title = "Edit Teacher";
include  "includes/header.php";
        if (isset($_GET['edit']))
        {
            $teacher_id = $_GET['edit'];
        }


        if (isset($_POST['update']))
        {
            include  "includes/db.php";
            $id =$_POST['id'];
            $fullname =$_POST['fullname'];
            $phone =$_POST['phone'];
            $address =$_POST['address'];
            $password =$_POST['password'];
            $class =$_POST['class_id'];

            if (empty($fullname)or empty($phone)or empty($address)or empty($password)or empty($class))
            {
                header("location: edit_teacher.php?message=2&edit=$teacher_id");
            } else{
                $query = "UPDATE teacher SET ";
                $query .="t_name  = '{$fullname}', ";
                $query .="t_phone = '{$phone}', ";
                $query .="password   = '{$password}', ";
                $query .="address= '{$address}', ";
                $query .="c_id  = '{$class}' ";
                $query .= "WHERE t_id = {$teacher_id} ";
                $edit_student = mysqli_query($con, $query);
                comfirm($edit_student);
                header("location: edit_teacher.php?message=0");

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
                                            <span>Edit New Teacher</span>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="card-body">
                                                <form action="" method="post">
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==1){ ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> The teacher already exists.
                                                    </div>
                                                        <?php } else if (isset($_GET['message']) and $_GET["message"]==0){?>
                                                        <div class="alert alert-success" role="alert">
                                                            <strong>Well done!</strong> You successfully update the teacher <a href="list_teachers.php" class="alert-link"> back to teacher list</a>.

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



                                                                    $query = "select * from teacher where t_id='$teacher_id'";
                                                                    $list_teacher =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_teacher))
                                                                    {
                                                                        $id =$row['t_id'];
                                                                        $name =$row['t_name'];
                                                                        $phone =$row['t_phone'];
                                                                        $class =$row['c_id'];
                                                                        $address =$row['address'];
                                                                        $password =$row['password'];






                                                    ?>

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
                                                    <input class="form-control" maxlength="10" type="text" name="phone" value="<?php echo $phone;?>" id="example-email-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-tel-input" class="col-form-label">Address</label>
                                                    <input class="form-control" type="text" name="address" value="<?php echo $address;?>" id="example-tel-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword" class="">Password</label>
                                                    <input type="password" class="form-control" name="password" id="inputPassword" value="<?php echo $password;?>" placeholder="Password">
                                                </div>
                                                    <div class="form-group">
                                                    <label class="col-form-label">Select Course</label>
                                                    <select name="class_id" class="form-control">
                                                        <?php
                                                        $query = "Select * from course ";
                                                        $select_class= mysqli_query($con,$query);
                                                        while ($row=mysqli_fetch_assoc($select_class)) {
                                                            $id = $row['crn'];
                                                            $name = $row['c_name'];


                                                            echo "<option value='{$id}' >{$name}</option>";
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