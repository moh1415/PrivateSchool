<?php
ob_start();
$title = "Edit Prent";
include  "includes/header.php";
        if (isset($_GET['edit']))
        {
            $parent_id = $_GET['edit'];
        }


        if (isset($_POST['update']))
        {
            include  "includes/db.php";
            $id =$_POST['id'];
            $fullname =$_POST['fullname'];
            $phone =$_POST['phone'];
            $work_number =$_POST['work_number'];
            $address =$_POST['address'];
            $password =$_POST['password'];
           // $student_id =$_POST['student_id'];
            if (empty($fullname)or empty($phone)or empty($work_number)or empty($address)or empty($password))
            {
                header("location: edit_parent.php?message=2&edit=$parent_id");
            } else{
                $query = "UPDATE parent SET ";
                $query .="p_name  = '{$fullname}', ";
                $query .="phone_num = '{$phone}', ";
               // $query .="s_id = '{$student_id}', ";
                $query .="work_num = '{$work_number}', ";
                $query .="password   = '{$password}', ";
                $query .="address= '{$address}' ";
                $query .= "WHERE p_id = {$parent_id} ";
                $edit_parent = mysqli_query($con, $query);
                header("location: edit_parent.php?message=0");

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
                                            <span>Edit New Parent</span>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="card-body">
                                                <form action="" method="post">
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==1){ ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> The parent already exists.
                                                    </div>
                                                        <?php } else if (isset($_GET['message']) and $_GET["message"]==0){?>
                                                        <div class="alert alert-success" role="alert">
                                                            <strong>Well done!</strong> You successfully update the parent <?php if ($_SESSION['role']=='admin') {echo '<a href="list_parents.php" class="alert-link"> back to parents list</a>.';} ?>

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



                                                                    $query = "select * from parent where p_id='$parent_id'";
                                                                    $list_parent =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_parent))
                                                                    {
                                                                        $id =$row['p_id'];
                                                                        $name =$row['p_name'];
                                                                        $phone =$row['phone_num'];
                                                                        $work_num =$row['work_num'];
                                                                        $address =$row['address'];
                                                                        $password =$row['password'];
                                                                        //$student_id =$row['s_id'];





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
                                                    <label for="example-url-input" class="col-form-label">Work Number</label>
                                                    <input class="form-control" type="text" maxlength="11" name="work_number" value="<?php echo $work_num;?>" id="example-url-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-tel-input" class="col-form-label">Address</label>
                                                    <input class="form-control" type="text" name="address" value="<?php echo $address;?>" id="example-tel-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword" class="">Password</label>
                                                    <input type="password" class="form-control" name="password" id="inputPassword" value="<?php echo $password;?>" placeholder="Password">
                                                </div>
<!--                                                    <div class="form-group">-->
<!--                                                        <label for="example-tel-input" class="col-form-label">Student ID</label>-->
<!--                                                        <input class="form-control" type="text" maxlength="10" name="student_id" value="--><?php //echo $student_id;?><!--" id="example-tel-input">-->
<!--                                                    </div>-->


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