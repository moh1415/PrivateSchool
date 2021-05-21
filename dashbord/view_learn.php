<?php
ob_start();
$title = "View Learning Resource";
include  "includes/header.php";



                        if ($_SESSION['role']=='parent')
                        {
                            
                            
                            
                                                    if (isset($_GET['id']))
{

    $student_id =$_GET['id'];
    //$course_name =$_GET['course_name'];
}   
                            
                            
                            
                            
                            
                            
                            


        if (isset($_POST['submit']))
        {
            include  "includes/db.php";
            $id = $_POST['c_id'];
           // settype($id,'int');
           // $i = 1;
            if (empty($id))
            {
                header("location: view_learn.php?message=0");
            }
            else {
                $query = "Select * from learning where c_id =$id";
                $row = mysqli_query($con, $query);
                    $vw = mysqli_fetch_assoc($row);
    
                  $a = $vw['content'];

               // $count = mysqli_num_rows($row);
                if ($vw){
                    
                    
 header("location: view_learn.php?message=$id");
                    
                } else {

                    header("location: view_learn.php?message=0");

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
                                            <span>View Learning Resource</span>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="card-body">
                                                <form action="" method="post">
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==0){ ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> the learning resource not exists.
                                                    </div>
                                                        <?php } else if (isset($_GET['message'])){?>
                                                        <div class="alert alert-success" role="alert">
                                                           
                                                            <?php 
                                                                                                                          
                                                                        
    
                                                                                     
                                                           $id2 = $_GET["message"];                                                               
                                                                                                                          
              $query = "Select * from learning where c_id =$id2";
                $row = mysqli_query($con, $query);
                    $vw = mysqli_fetch_assoc($row);
    
                  $a1 = $vw['content'];
                                                            
                                      if($vw){       
    
 
                   
                                                            
                                                            
                                         ?>                   
                                                            
                                                            
                              <strong>Well done!</strong>   <a href="<?php echo $a1 ?>"><h1>  Click here to download the syllabus </h1></a>
                                                        </div>
                                                        <?php }} ?>


                                                        <div class="form-group">
                                                        <label class="col-form-label">Select the course</label>
                                                        <select name="c_id" class="form-control">
                                                            <?php
                                                           
                                                            $student = "Select * from student where s_id = $student_id";
                                                            $select_student= mysqli_query($con,$student);
                                                            $row2=mysqli_fetch_assoc($select_student);
    
                                                                 $a = $row2['level'];
                                                            
                                                            
                                                            $query = "Select * from course where c_level = '$a' ";
                                                            $select_teacher= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_teacher)) {
                                                                $id = $row['crn'];
                                                                $name = $row['c_name'];


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




<?php  } else {      
        if (isset($_POST['submit']))
        {
            include  "includes/db.php";
            $id = $_POST['c_id'];
           // settype($id,'int');
           // $i = 1;
            if (empty($id))
            {
                header("location: view_learn.php?message=0");
            }
            else {
                $query = "Select * from learning where c_id =$id";
                $row = mysqli_query($con, $query);
                    $vw = mysqli_fetch_assoc($row);
    
                  $a = $vw['content'];

               // $count = mysqli_num_rows($row);
                if ($vw){
                    
                    
 header("location: view_learn.php?message=$id");
                    
                } else {

                    header("location: view_learn.php?message=0");

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
                                            <span>View Learning Resource</span>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="card-body">
                                                <form action="" method="post">
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==0){ ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> the learning resource not exists.
                                                    </div>
                                                        <?php } else if (isset($_GET['message'])){?>
                                                        <div class="alert alert-success" role="alert">
                                                           
                                                            <?php 
                                                                                                                          
                                                                        
    
                                                                                     
                                                           $id2 = $_GET["message"];                                                               
                                                                                                                          
              $query = "Select * from learning where c_id =$id2";
                $row = mysqli_query($con, $query);
                    $vw = mysqli_fetch_assoc($row);
    
                  $a1 = $vw['content'];
                                                            
                                      if($vw){       
    
 
                   
                                                            
                                                            
                                         ?>                   
                                                            
                                                            
                              <strong>Well done!</strong>   <a href="<?php echo $a1 ?>"><h1>  Click here to download the syllabus </h1></a>
                                                        </div>
                                                        <?php }} ?>


                                                        <div class="form-group">
                                                        <label class="col-form-label">Select the course</label>
                                                        <select name="c_id" class="form-control">
                                                            <?php
                                                           
                                                            $student = "Select * from student where s_id = {$_SESSION['student_id']}";
                                                            $select_student= mysqli_query($con,$student);
                                                            $row2=mysqli_fetch_assoc($select_student);
    
                                                                 $a = $row2['level'];
                                                            
                                                            
                                                            $query = "Select * from course where c_level = '$a' ";
                                                            $select_teacher= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_teacher)) {
                                                                $id = $row['crn'];
                                                                $name = $row['c_name'];


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




<?php } include  "includes/footer.php"; ?>