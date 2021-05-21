<?php
ob_start();
$title = "Add New Student";
include  "includes/header.php";
        if (isset($_POST['submit']))
        {
            include  "includes/db.php";
            $id =$_POST['id'];
            $fullname =$_POST['fullname'];
            $phone =$_POST['phone'];
            $em_number =$_POST['em_number'];
            $address =$_POST['address'];
            $password =$_POST['password'];
            $level =$_POST['level'];
            $status="student";
            $parent_id=$_POST['parent_id'];
            $year =$_POST['year'];
            if (empty($id)or empty($fullname)or empty($phone)or empty($em_number)or empty($address)or empty($password)or empty($level) or empty($parent_id))
            {
                header("location: add_student.php?message=2");
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
                    header("location: add_student.php?message=1");
                } 
                
                 else if ($count1)
                {
                    header("location: add_student.php?message=1");
                } 
                
                
                
                else if ($count2)
                {
                    header("location: add_student.php?message=1");
                } else {


                    $query = "INSERT INTO student(s_id, s_name, s_phone, level,emg_num,password,address,class,status,p_id,year)";
                    $query .= "VALUES({$id},'{$fullname}','{$phone}','{$level}','{$em_number}','{$password}', '{$address}','0' ,'{$status}','{$parent_id}','{$year}') ";
                    $create_student = mysqli_query($con, $query);
                    header("location: add_student.php?message=0");
                    comfirm($create_student);

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
                                            <span>Add New Student</span>
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
                                                            <strong>Well done!</strong> You successfully add the student.
                                                        </div>
                                                        <?php } ?>
                                                    <?php  if (isset($_GET['message']) and $_GET["message"]==2){?>
                                                        <div class="alert alert-danger" role="alert">
                                                            <strong>Wrong!</strong> Please Fill all fields.
                                                        </div>
                                                    <?php } ?>
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">ID</label>
                                                    <input class="form-control" maxlength="10" type="text" name="id" value="" id="example-text-input">
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
                                                    <label for="example-url-input" class="col-form-label">Emergency Number</label>
                                                    <input class="form-control" type="text" name="em_number" value="" id="example-url-input">
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
                                                    <label class="col-form-label">Select Level</label>
                                                    <select name="level" class="form-control">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Parent National ID </label>
                                                        <input class="form-control" maxlength="10" type="text" name="parent_id" value="" id="example-text-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Year of Join </label>
                                                        <input class="form-control" maxlength="10" type="date" name="year" value="" id="example-text-input">
<!--                                                        --><?php
//                                                        $currently_selected = date('Y');
//                                                        // Year to start available options at
//                                                        $earliest_year = 2010;
//                                                        // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
//                                                        $latest_year = date('Y');
//
//                                                        print '<select name="year" class="form-control">';
//                                                        // Loops over each int[year] from current year, back to the $earliest_year [1950]
//                                                        foreach ( range( $latest_year, $earliest_year ) as $i ) {
//                                                            // Prints the option with the next year in range.
//                                                            print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
//                                                        }
//                                                        print '</select>';
//
//                                                        ?>
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