<?php
ob_start();
$title ="List of student";
include  "includes/header.php";



?>
<?php
if (isset($_POST['submit1'])){
    
    $id1 =$_POST['level'];
    header("location: add_schedule.php?id1=$id1");
    
}




 if (isset($_POST['submit']))
        {
            include  "includes/db.php";
            $id1 =$_GET['id1'];
            //$id =$_POST['id'];
            $sub1 =$_POST['sub1'];
            $sub2 =$_POST['sub2'];
            $sub3 =$_POST['sub3'];
            $sub4 =$_POST['sub4'];
            $sub5 =$_POST['sub5'];
            $sub6 =$_POST['sub6'];
            $sub7 =$_POST['sub7'];
            $sub8 =$_POST['sub8'];
            $sub9 =$_POST['sub9'];
            $sub10 =$_POST['sub10'];
            $sub11 =$_POST['sub11'];
            $sub12 =$_POST['sub12'];
            $sub13 =$_POST['sub13'];
            $sub14 =$_POST['sub14'];
            $sub15 =$_POST['sub15'];
            $sub16 =$_POST['sub16'];
            $sub17 =$_POST['sub17'];
            $sub18 =$_POST['sub18'];
            $sub19 =$_POST['sub19'];
            $sub20 =$_POST['sub20'];
            $sub21 =$_POST['sub21'];
            $sub22 =$_POST['sub22'];
            $sub23 =$_POST['sub23'];
            $sub24 =$_POST['sub24'];
            $sub25 =$_POST['sub25'];
            $sub26 =$_POST['sub26'];
            $sub27 =$_POST['sub27'];
            $sub28 =$_POST['sub28'];
            $sub29 =$_POST['sub29'];
            $sub30 =$_POST['sub30'];
            $sub31 =$_POST['sub31'];
            $sub32 =$_POST['sub32'];
            $sub33 =$_POST['sub33'];
            $sub34 =$_POST['sub34'];
            $sub35 =$_POST['sub35'];
            $class = $_POST['bulk_options'];
      
     
     
     
     
     
     
     
     
     
     
     
     
            if (empty($sub1)or empty($sub2)or empty($sub3)or empty($sub4)or empty($sub5)or empty($sub6) or empty($sub7) or empty($sub8)or empty($sub9)or empty($sub10)or empty($sub11)or empty($sub12)or empty($sub13) or empty($sub14) or empty($sub15)or empty($sub16)or empty($sub17)or empty($sub18)or empty($sub19)or empty($sub20) or empty($sub21) or empty($sub22)or empty($sub23)or empty($sub24)or empty($sub25)or empty($sub26)or empty($sub27) or empty($sub28) or empty($sub29)or empty($sub30)or empty($sub31)or empty($sub32)or empty($sub33)or empty($sub34) or empty($sub35))
            {
                header("location: add_schedule.php?message=2");
            }
           // else {
             //   $query = "select * from schedule where sched_no ='$id'";
              //  $row = mysqli_query($con, $query);

              //  $count = mysqli_num_rows($row);
              //  if ($count)
               // {
               //     header("location: add_student.php?message=1");
              //  } 


    

    
    $query1 = "select * from schedule ";
    $row1 = mysqli_query($con, $query1);
    
      while ($row = mysqli_fetch_assoc($row1))
                  {
                                                                       
          
          
          
          
          
          
          
            $level22 = $row['sch_level'];
            $section = $row['sche_class'];
            $rsub1 =$row['sub1'];
            $rsub2 =$row['sub2'];
            $rsub3 =$row['sub3'];
            $rsub4 =$row['sub4'];
            $rsub5 =$row['sub5'];
            $rsub6 =$row['sub6'];
            $rsub7 =$row['sub7'];
            $rsub8 =$row['sub8'];
            $rsub9 =$row['sub9'];
            $rsub10 =$row['sub10'];
            $rsub11 =$row['sub11'];
            $rsub12 =$row['sub12'];
            $rsub13 =$row['sub13'];
            $rsub14 =$row['sub14'];
            $rsub15 =$row['sub15'];
            $rsub16 =$row['sub16'];
            $rsub17 =$row['sub17'];
            $rsub18 =$row['sub18'];
            $rsub19 =$row['sub19'];
            $rsub20 =$row['sub20'];
            $rsub21 =$row['sub21'];
            $rsub22 =$row['sub22'];
            $rsub23 =$row['sub23'];
            $rsub24 =$row['sub24'];
            $rsub25 =$row['sub25'];
            $rsub26 =$row['sub26'];
            $rsub27 =$row['sub27'];
            $rsub28 =$row['sub28'];
            $rsub29 =$row['sub29'];
            $rsub30 =$row['sub30'];
            $rsub31 =$row['sub31'];
            $rsub32 =$row['sub32'];
            $rsub33 =$row['sub33'];
            $rsub34 =$row['sub34'];
            $rsub35 =$row['sub35'];
          
 
          
      if (($class == $section) or ($sub1 == $rsub1) or ($sub2 == $rsub2) or ($sub3 == $rsub3) or ($sub4 == $rsub4) or ($sub5 == $rsub5) or ($sub6 == $rsub6) or ($sub7 == $rsub7) or ($sub8 == $rsub8) or ($sub9 == $rsub9) or ($sub10 == $rsub10) or ($sub11 == $rsub11) or ($sub12 == $rsub12) or ($sub13 == $rsub13) or ($sub14 == $rsub14) or ($sub15 == $rsub15) or ($sub16 == $rsub16) or ($sub17 == $rsub17) or ($sub18 == $rsub18) or ($sub19 == $rsub19) or ($sub20 == $rsub20) or ($sub21 == $rsub21) or ($sub22 == $rsub22) or ($sub23 == $rsub23) or ($sub24 == $rsub24) or ($sub25 == $rsub25) or ($sub26 == $rsub26) or ($sub27 == $rsub27) or ($sub28 == $rsub28) or ($sub29 == $rsub29) or ($sub30 == $rsub30) or ($sub31 == $rsub31) or ($sub32 == $rsub32) or ($sub33 == $rsub33) or ($sub34 == $rsub34) or ($sub35 == $rsub35)){
          
          
          header("location: add_schedule.php?message=1");
          break;
      }
          
      
      
      
    
      }

      
    
       
             if(($class != $section) and ($sub1 != $rsub1) and ($sub2 != $rsub2) and ($sub3 != $rsub3) and ($sub4 != $rsub4) and ($sub5 != $rsub5) and ($sub6 != $rsub6) and ($sub7 != $rsub7) and ($sub8 != $rsub8) and ($sub9 != $rsub9) and ($sub10 != $rsub10) and ($sub11 != $rsub11) and ($sub12 != $rsub12) and ($sub13 != $rsub13) and ($sub14 != $rsub14) and ($sub15 != $rsub15) and ($sub16 != $rsub16) and ($sub17 != $rsub17) and ($sub18 != $rsub18) and ($sub19 != $rsub19) and ($sub20 != $rsub20) and ($sub21 != $rsub21) and ($sub22 != $rsub22) and ($sub23 != $rsub23) and ($sub24 != $rsub24) and ($sub25 != $rsub25) and ($sub26 != $rsub26) and ($sub27 != $rsub27) and ($sub28 != $rsub28) and ($sub29 != $rsub29) and ($sub30 != $rsub30) and ($sub31 != $rsub31) and ($sub32 != $rsub32) and ($sub33 != $rsub33) and ($sub34 != $rsub34) and ($sub35 != $rsub35)){
    

                    $query = "INSERT INTO schedule(sub1, sub2,sub3,sub4,sub5,sub6,sub7,sub8,sub9,sub10,sub11,sub12,sub13,sub14,sub15,sub16,sub17,sub18,sub19,sub20,sub21,sub22,sub23,sub24,sub25,sub26,sub27,sub28,sub29,sub30,sub31,sub32,sub33,sub34,sub35,sch_level,sche_class)";
                    $query .= "VALUES('{$sub1}', '{$sub2}','{$sub3}','{$sub4}','{$sub5}','{$sub6}','{$sub7}','{$sub8}','{$sub9}','{$sub10}','{$sub11}','{$sub12}','{$sub13}','{$sub14}','{$sub15}','{$sub16}','{$sub17}','{$sub18}','{$sub19}','{$sub20}','{$sub21}','{$sub22}','{$sub23}','{$sub24}','{$sub25}','{$sub26}','{$sub27}','{$sub28}','{$sub29}','{$sub30}','{$sub31}','{$sub32}','{$sub33}','{$sub34}','{$sub35}','{$id1}','{$class}') ";
                    $create_student = mysqli_query($con, $query);
                    
                    header("location: add_schedule.php?message=0");
                    comfirm($create_student);

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
                                        <span>Schedule</span>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title"></h4>
                                                
                           
                                                    
                                                        <form action="" method="post">
                                                   
                                                              <?php if (isset($_GET['message']) and $_GET["message"]==1){ ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> The schedule already exists or have conflction.
                                                    </div>
                                                        <?php } else if (isset($_GET['message']) and $_GET["message"]==0){?>
                                                        <div class="alert alert-success" role="alert">
                                                            <strong>Well done!</strong> You successfully add the schedule.
                                                        </div>
                                                        <?php } ?>
                                                    <?php  if (isset($_GET['message']) and $_GET["message"]==2){?>
                                                        <div class="alert alert-danger" role="alert">
                                                            <strong>Wrong!</strong> Please Fill all fields.
                                                        </div>
                                                    <?php } ?>
                                                            
                                                            
                                                            
                                                </form>
                                           
                                                
                                                
                                                
                                       
                                                  
                            
                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <form method="post" action="">
                                                            
                                                            
                                                            
                                                            
                                                            
                                                              <div style="padding: 4px" id="bulkOptionContainer" class="col-xs-4">
                                                                   <label for="example-search-input" class="col-form-label">Select Level</label>
                                                                <select name="level" id="" class="form-control">
                                                                     
                                                                    <option value="">Level</option >
                                                                    <?php
                                                                  


                                                                        echo "<option value='1' >1</option>";
                                                                        echo "<option value='2' >2</option>";
                                                                        echo "<option value='3' >3</option>";
                                                                   

                                                                    ?>
                                                                </select></div>
                                                            <input type="submit" name="submit1" class="btn btn-success" value="continue">
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                               <?php  if(isset($_GET['id1'])) {  
                                                            
                                                            $level1 = $_GET['id1'];
                                                            ?>
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
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
                                                                      
                                                                      
                                                                          
                                                                            <select name="sub1" class="form-control">
                                                            <?php 
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                          
                                                                          
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                                                         <select name="sub2" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                         <select name="sub3" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                         <select name="sub4" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                         <select name="sub5" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                                                             <select name="sub6" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                             <select name="sub7" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                          
                                                                      
                                                                      </th>
                                                                      
                                                                </tr>
                                                                  <tr>
                                                                    <th scope="col">Monday</th>
                                                                      
                                                                      
                                                                        <th scope="col">
                                                                      
                                                                      
                                                                          
                                                                            <select name="sub8" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                          
                                                                          
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                                                         <select name="sub9" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                         <select name="sub10" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                         <select name="sub11" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                         <select name="sub12" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                                                             <select name="sub13" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                             <select name="sub14" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                          
                                                                      
                                                                      </th>
                                                                      
                                                                      
                                                                </tr>
                                                                  <tr>
                                                                    <th scope="col">Tuesday</th>
                                                                      
                                                                        <th scope="col">
                                                                      
                                                                      
                                                                          
                                                                            <select name="sub15" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                          
                                                                          
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                                                         <select name="sub16" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                         <select name="sub17" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                         <select name="sub18" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                         <select name="sub19" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                                                             <select name="sub20" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                             <select name="sub21" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                          
                                                                      
                                                                      </th>
                                                                      
                                                                </tr>
                                                                  <tr>
                                                                    <th scope="col">Wednesday</th>
                                                                      
                                                                        <th scope="col">
                                                                      
                                                                      
                                                                          
                                                                            <select name="sub22" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                          
                                                                          
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                                                         <select name="sub23" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                         <select name="sub24" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                         <select name="sub25" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                         <select name="sub26" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                                                             <select name="sub27" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                             <select name="sub28" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                          
                                                                      
                                                                      </th>
                                                                </tr>
                                                                  <tr>
                                                                    <th scope="col">Thursday</th>
                                                                      
                                                                        <th scope="col">
                                                                      
                                                                      
                                                                          
                                                                            <select name="sub29" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                          
                                                                          
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                                                         <select name="sub30" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                         <select name="sub31" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                         <select name="sub32" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                         <select name="sub33" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                      
                                                                                             <select name="sub34" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                      
                                                                      
                                                                      
                                                                      </th>
                                                                      <th scope="col">
                                                                      
                                                                                             <select name="sub35" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where c_level = $level1 ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
                                                                          
                                                                      
                                                                      </th>
                                                                </tr>
                                                           
                                                           
                                                    

                                                            </tbody>
                                                        </table>
                                                        <br>
                                                        <div
                                                                class="form-group col-sm-2">
                                                            <label for="example-search-input" class="col-form-label">Select Section</label>
                                                            <div style="padding: 4px" id="bulkOptionContainer" class="col-xs-4">
                                                                <select name="bulk_options" id="" class="form-control">

                                                                    <option value="">Assign Section</option>
                                                                    <?php
                                                                    $query = "Select * from class where c_level = $level1";
                                                                    $select_class= mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($select_class)) {
                                                                        $id = $row['c_id'];
                                                                        $name = $row['c_name'];


                                                                        echo "<option value='{$id}' >{$name}</option>";
                                                                    }

                                                                    ?>
                                                                </select></div>
                                                            <div class="col-sm-2">

                                                                <input type="submit" name="submit" class="btn btn-success" value="add">
                                                            </div>
                                                          <?php  }?>
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
        </div>
    </div>
</div>


<?php include  "includes/footer.php"; ?>

