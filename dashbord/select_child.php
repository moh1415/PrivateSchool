<?php
ob_start();
$title = "Select your child";
include  "includes/header.php";
        if (isset($_POST['submit']))
        {
            include  "includes/db.php";
            $s_id =$_POST['s_id'];
            if (empty($s_id))
            {
                header("location: select_child.php?message=2");
            }
            else {
                header("location: view_student_grade_3.php?id=$s_id");
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
                                            <span>Select Your Child</span>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="card-body">
                                                <form action="" method="post">
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==1){ ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> The student medical already exists.
                                                    </div>
                                                        <?php } else if (isset($_GET['message']) and $_GET["message"]==0){?>
                                                        <div class="alert alert-success" role="alert">
                                                            <strong>Well done!</strong> You successfully add the student medical history.
                                                        </div>
                                                        <?php } ?>
                                                    <?php  if (isset($_GET['message']) and $_GET["message"]==2){?>
                                                        <div class="alert alert-danger" role="alert">
                                                            <strong>Wrong!</strong> Please Fill all fields.
                                                        </div>
                                                    <?php } ?>
<!--
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">Medical ID</label>
                                                    <input class="form-control" maxlength="10" type="text" name="m_id" value="" id="example-text-input">
                                                </div>
-->
                                                     <div class="form-group">
<!--
                                                    <label for="example-text-input" class="col-form-label">Student ID</label>
                                                    <input class="form-control" maxlength="10" type="text" name="s_id" value="" id="example-text-input">
-->
                                                         
                                                         
                                                         <label for="s_id" class="col-form-label">Student ID</label>
                                                             <select name="s_id" class="form-control" id="s_id">
                                                            <?php
                                                           

                                                            
                                                            
                                                            $query = "Select * from student where p_id = {$_SESSION['parent_id']}";
                                                            $select_teacher= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_teacher)) {
                                                                $id = $row['s_id'];
                                                                $name = $row['s_name'];


                                                                echo "<option value='{$id}' > {$name} </option>";
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