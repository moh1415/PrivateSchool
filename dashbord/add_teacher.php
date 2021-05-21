<?php
ob_start();
$title = "Add New Teacher";
include  "includes/header.php";



if (isset($_POST['submit']))
{
    include  "includes/db.php";
    $id =$_POST['id'];
    $fullname =$_POST['fullname'];
    $phone =$_POST['phone'];
    $address =$_POST['address'];
    $password =$_POST['password'];
    $class =$_POST['course11'];
    $status="teacher";

    
    
    
        if (empty($id)or empty($fullname)or empty($phone)or  empty($address)or empty($password))
            {
                header("location: add_parent.php?message=2");
            }
            else {
    
    
    
    
    
    
    
                    $query = "select * from student where s_id ='$id'";
                $row = mysqli_query($con, $query);

                $count = mysqli_num_rows($row);
                
                
                $query1 = "select * from parent where p_id ='$id'";
                $row1 = mysqli_query($con, $query1);

                $count1 = mysqli_num_rows($row1);
                
                 $query2 = "select * from teacher where t_id ='$id'";
                $row2 = mysqli_query($con, $query2);

                $count2 = mysqli_num_rows($row2);
                
                
                
                
                 if ($count)
                {
                    header("location: add_teacher.php?message=1");
                } 
                
                 else if ($count1)
                {
                    header("location: add_teacher.php?message=1");
                } 
                
                
                
                else if ($count2)
                {
                    header("location: add_teacher.php?message=1");
                } else {
    
    
    
    
    
    
    

        $query = "INSERT INTO teacher(t_id, t_name, t_phone,password,address,status,c_id)";
        $query .= "VALUES('{$id}','{$fullname}','{$phone}','{$password}','{$address}','{$status}','{$class}') ";
        $create_teacher = mysqli_query($con, $query);
        header("location: add_teacher.php?message=0");
        comfirm($create_teacher);


}}}

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
                                            <span>Add New Teacher</span>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="card-body">
                                                <form action="" method="post">
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==1){ ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> The National ID already exists.
                                                    </div>
                                                        <?php } else if (isset($_GET['message']) and $_GET["message"]==0){?>
                                                        <div class="alert alert-success" role="alert">
                                                            <strong>Well done!</strong> You successfully add the teacher.
                                                        </div>
                                                        <?php } ?>
                                                    
                                                        <?php  if (isset($_GET['message']) and $_GET["message"]==2){?>
                                                        <div class="alert alert-danger" role="alert">
                                                            <strong>Wrong!</strong> Please Fill all fields.
                                                        </div>
                                                    <?php } ?>
                                                    
                                                    
                                                    
                                                    
                                             <div class="form-group">
                                                 <label for="example-text-input" class="col-form-label">ID</label>
                                                   <input class="form-control"  maxlength="10" type="text" name="id" value="" id="example-text-input">
                                              </div>
                                                <div class="form-group">
                                                    <label for="example-search-input" class="col-form-label">Full Name</label>
                                                    <input class="form-control" type="search" name="fullname" value="" id="example-search-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-email-input" class="col-form-label">Phone</label>
                                                    <input class="form-control" type="text" name="phone" value="" id="example-email-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-tel-input" class="col-form-label">Address</label>
                                                    <input class="form-control" type="text" name="address" value="" id="example-tel-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword" class="">Password</label>
                                                    <input type="password" class="form-control" name="password" id="inputPassword" value="" placeholder="Password">
                                                </div>
                                                    
                                                 <div class="form-group">
                                                    <label class="col-form-label">Select Course</label>
                                                    <select name="course11" class="form-control">
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