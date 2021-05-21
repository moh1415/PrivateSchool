<?php
ob_start();
$title = "View Schedule";
include  "includes/header.php";
        if (isset($_GET['edit']))
        {
            $student_id = $_GET['edit'];
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
                                            <span>View Schedule</span>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="card-body">
                                                <form action="" method="post">
                                                  
                                                    <?php
                                                    if (isset($_GET['edit']))
                                                    {



                                                                    $query = "select * from schedule where sched_no ='$student_id'";
                                                                    $list_student =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_student))
                                                                    {
                                                                      
                                                    
            $id = $student_id;
            $sub1 =$row['sub1'];
            $sub2 =$row['sub2'];
            $sub3 =$row['sub3'];
            $sub4 =$row['sub4'];
            $sub5 =$row['sub5'];
            $sub6 =$row['sub6'];
            $sub7 =$row['sub7'];
            $sub8 =$row['sub8'];
            $sub9 =$row['sub9'];
            $sub10 =$row['sub10'];
            $sub11 =$row['sub11'];
            $sub12 =$row['sub12'];
            $sub13 =$row['sub13'];
            $sub14 =$row['sub14'];
            $sub15 =$row['sub15'];
            $sub16 =$row['sub16'];
            $sub17 =$row['sub17'];
            $sub18 =$row['sub18'];
            $sub19 =$row['sub19'];
            $sub20 =$row['sub20'];
            $sub21 =$row['sub21'];
            $sub22 =$row['sub22'];
            $sub23 =$row['sub23'];
            $sub24 =$row['sub24'];
            $sub25 =$row['sub25'];
            $sub26 =$row['sub26'];
            $sub27 =$row['sub27'];
            $sub28 =$row['sub28'];
            $sub29 =$row['sub29'];
            $sub30 =$row['sub30'];
            $sub31 =$row['sub31'];
            $sub32 =$row['sub32'];
            $sub33 =$row['sub33'];
            $sub34 =$row['sub34'];
            $sub35 =$row['sub35'];
            $class = $row['sche_class'];
            $level = $row['sch_level'];
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        





                                                    ?>

                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">Level</label>
                                                    <input class="form-control" disabled maxlength="10" type="text" name="id" value="<?php echo $level;?>" id="example-text-input">
                                                </div>
                                                    
                                                     <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">Class number</label>
                                                    <input class="form-control" disabled maxlength="10" type="text" name="id" value="<?php echo $class;?>" id="example-text-input">
                                                </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                        <div class="single-table">
                                                    <div class="table-responsive">
                                                        <form method="post" action="">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase bg-dark">
                                                           <tr class="text-white">
                                                                <th><input id="select" type="checkbox"></th>
                                                                
                                                                <th scope="col">7:15</th>
                                                                <th scope="col">8:00</th>
                                                                <th scope="col">8:45</th>
                                                                <th scope="col">10:00</th>
                                                                <th scope="col">10:45</th>
                                                                <th scope="col">11:15</th>
                                                                <th scope="col">12:00</th>
                                                            </tr>
                                                              
                                                            </thead>
                                                            <tbody>
                                                                  <tr>
                                                                    <th scope="col">Sunday</th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                                          
                                                            
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                        
                                                                          
                                                                          
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub2 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                 <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub3 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                           <th scope="col">
                                                                      
                                                                      
                                                                          
                                                            
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub4 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                        
                                                                          
                                                                          
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub5 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                 <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub6 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                        <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub7 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                      
                                                                </tr>
                                                                  <tr>
                                                                    <th scope="col">Monday</th>
                                                                      
                                                                      
                                                                     <th scope="col">
                                                                      
                                                                      
                                                                          
                                                            
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub8 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                        
                                                                          
                                                                          
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub9 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                 <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub10 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                           <th scope="col">
                                                                      
                                                                      
                                                                          
                                                            
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub11 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                        
                                                                          
                                                                          
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub12 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                 <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub13 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                        <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub14 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                      
                                                                      
                                                                </tr>
                                                                  <tr>
                                                                    <th scope="col">Tuesday</th>
                                                                      
                                                                      <th scope="col">
                                                                      
                                                                      
                                                                          
                                                            
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub15 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                        
                                                                          
                                                                          
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub16 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                 <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub17 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                           <th scope="col">
                                                                      
                                                                      
                                                                          
                                                            
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub18 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                        
                                                                          
                                                                          
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub19 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                 <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub20 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                        <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub21 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                      
                                                                </tr>
                                                                  <tr>
                                                                    <th scope="col">Wednesday</th>
                                                                      
                                                                       <th scope="col">
                                                                      
                                                                      
                                                                          
                                                            
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub22 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                        
                                                                          
                                                                          
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub23 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                 <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub24 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                           <th scope="col">
                                                                      
                                                                      
                                                                          
                                                            
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub25 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                        
                                                                          
                                                                          
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub26 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                 <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub27 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                        <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub28 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                </tr>
                                                                  <tr>
                                                                    <th scope="col">Thursday</th>
                                                                      
                                                                       <th scope="col">
                                                                      
                                                                      
                                                                          
                                                            
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub29 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                        
                                                                          
                                                                          
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub30 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                 <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub31 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                           <th scope="col">
                                                                      
                                                                      
                                                                          
                                                            
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub32 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                        
                                                                          
                                                                          
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub33 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                 <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub34 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                        <th scope="col">
                                                                      
                                                                      
                                                            <?php
                                                             
                                                            $query = "Select * from course where crn = $sub35 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                
                                                                $course_name = $row['c_name'];

                                                                echo $course_name;
                                                            }



                                                            ?>
                                                                      
                                                                      </th>
                                                                </tr>
                                                           
                                                           
                                                    

                                                            </tbody>
                                                        </table>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                

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