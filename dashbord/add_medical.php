<?php
ob_start();
$title = "Add New Medical";
include  "includes/header.php";
        if (isset($_POST['submit']))
        {
            include  "includes/db.php";
            $s_id =$_POST['s_id'];
            $allergies =$_POST['allergies'];
            $medication =$_POST['medication'];
            $blood_type =$_POST['blood_type'];
            $parent = $_SESSION['parent_id'];
            
            $query12 = "Select * from student where s_id = $s_id";
                     $select_teacher= mysqli_query($con,$query12);
                      $row12=mysqli_fetch_assoc($select_teacher);
                        $fullname = $row12['s_name'];
            
            
            if (empty($s_id)or empty($allergies)or empty($medication)or empty($blood_type))
            {
                header("location: add_medical.php?message=2");
            }
            else {
                $query = "select * from medical where s_id ='$s_id'";
                $row = mysqli_query($con, $query);

                $count = mysqli_num_rows($row);
                if ($count)
                {
                    header("location: add_medical.php?message=1");
                } else {


                    $query = "INSERT INTO medical(s_name, s_id, allergies,medication,blood_type,p_id)";
                    $query .= "VALUES('{$fullname}','{$s_id}','{$allergies}','{$medication}','{$blood_type}',{$parent}) ";
                    $create_student = mysqli_query($con, $query);
                    header("location: add_medical.php?message=0");
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
                                            <span>Add New Medical History</span>
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
                                                         
                                                         
                                                         <label for="s_id" class="col-form-label">Student name</label>
                                                             <select name="s_id" class="form-control" id="s_id">
                                                            <?php
                                                           
                                                            $student = "Select * from student where p_id = {$_SESSION['parent_id']}";
                                                            $select_student= mysqli_query($con,$student);
                                                            $row2=mysqli_fetch_assoc($select_student);
    
                                                                 $a = $row2['s_id'];
                                                            
                                                            
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
                                                    
                                                    
                                                    
                                                   
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    

                                                <div class="form-group">
                                                    <label for="example-email-input" class="col-form-label">Blood Type</label>
                                                    
                                                    
                                                    
                                                    
                                                       <select name="blood_type" class="form-control" id="s_id">
                                                         
                                                           
                                                           
                                                                       <option value="A+">A+</option>
                                                                     <option value="B+">B+</option>
                                                                     <option value="AB+">AB+</option>
                                                                     <option value="O+">O+</option>
                                                                     <option value="A-">A-</option>
                                                                        <option value="B-">B-</option>
                                                                       <option value="AB-">AB-</option>
                                                                      <option value="O-">O-</option>
                                                           
                                                           
                                                           
                                                           
                                                        </select>
                                                    
                                                 
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Medication Takken</label>
                                                    <input class="form-control" type="text" name="medication" value="" id="example-url-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-tel-input" class="col-form-label">Allergies</label>
                                                    <input class="form-control" type="text" name="allergies" value="" id="example-tel-input">
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