<?php
ob_start();
$title = "Edit Medical";
include  "includes/header.php";
        if (isset($_GET['edit']))
        {
            $student_id = $_GET['edit'];
        }


        if (isset($_POST['update']))
        {
            include  "includes/db.php";
            $m_id =$_POST['m_id'];
            $fullname =$_POST['fullname'];
            $s_id =$_POST['s_id'];
            $allergies =$_POST['allergies'];
            $medication =$_POST['medication'];
            $blood_type =$_POST['blood_type'];

            if (empty($fullname)or empty($s_id)or empty($allergies)or empty($medication)or empty($blood_type))
            {
                header("location: edit_medical.php?message=2&edit=$student_id");
            } else{
                $query = "UPDATE medical SET ";
                $query .="s_name  = '{$fullname}', ";
                $query .="s_id = '{$s_id}', ";
                $query .="allergies = '{$allergies}', ";
                $query .="medication = '{$medication}', ";
                $query .="blood_type   = '{$blood_type}' ";
                $query .= " WHERE m_id = {$student_id} ";
                $edit_student = mysqli_query($con, $query);
                header("location: edit_medical.php?message=0");
                
                
                
                
                
                
                
                
                
                
                

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
                                            <span>Edit New Medical History</span>
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
                                                            <strong>Well done!</strong> You successfully update the medical history <a href="list_medical.php" class="alert-link"> back to medical list</a>.

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



                                                                    $query = "select * from medical where m_id='$student_id'";
                                                                    $list_student =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_student))
                                                                    {
                                                                        $m_id =$row['m_id'];
                                                                        $name =$row['s_name'];
                                                                        $s_id =$row['s_id'];
                                                                        $allergies =$row['allergies'];
                                                                        $medication =$row['medication'];
                                                                        $blood_type =$row['blood_type'];





                                                    ?>

                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">ID</label>
                                                    <input class="form-control" disabled maxlength="10" type="text" name="m_id" value="<?php echo $m_id;?>" id="example-text-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-search-input" class="col-form-label">Full Name</label>
                                                    <input class="form-control" type="search" name="fullname" value="<?php echo $name;?>" id="example-search-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-email-input" class="col-form-label">Student ID</label>
                                                    <input class="form-control" type="text" name="s_id" value="<?php echo $s_id;?>" id="example-email-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">Allergies</label>
                                                    <input class="form-control" type="text" name="allergies" value="<?php echo $allergies;?>" id="example-url-input">
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-tel-input" class="col-form-label">Medication</label>
                                                    <input class="form-control" type="text" name="medication" value="<?php echo $medication;?>" id="example-tel-input">
                                                </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-group">
                                                    <label for="example-email-input" class="col-form-label">Blood Type</label>
                                                    
                                                    
                                                    
                                                    
                                                       <select name="blood_type" class="form-control" id="s_id">
                                                         
                                                           
                                                                       <option value="<?php echo $blood_type;?>">Now it is <?php echo $blood_type;?></option>
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