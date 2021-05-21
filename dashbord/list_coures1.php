<?php
ob_start();
$title ="List of course";
include  "includes/header.php";
if (isset($_GET['delete']))
{

    $the_user_id = mysqli_real_escape_string($con,$_GET['delete']);
    $query = "Delete from course where crn = $the_user_id";
    $delete_query = mysqli_query($con, $query);
    header("location: list_coures.php");

}



                               
                                                    if (isset($_GET['id']))
{

    $student_id =$_GET['id'];
    //$course_name =$_GET['course_name'];
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
                                        <span>Course LIST</span>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title"></h4>
                                                
                                                <?php                          if ($_SESSION['role']=='admin')     { ?>
                                                
                                                <a href="add_course.php"><button type="button"  class="btn btn-rounded btn-primary mb-3">Add New Course</button></a>
                                                
                                                <?php } ?>
                                                
                                                 <a href="list_coures.php?message=0"><button type="button"  class="btn btn-rounded btn-primary mb-3">Search course</button></a>
                                                
                                                
                                                <?php if (isset($_GET['message']) and $_GET["message"]==0){ ?>
                                                
                                                
                                                    <form action="list_coures.php?message=1" method="post">
                                                           <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label ti-search">ID</label>
                                                    <input class="form-control" maxlength="10" type="text" name="search_id" value="" id="example-text-input">
                                                               <div class="form-group col-6">
                                                        <a href="list_coures.php?message=1"><button type="submit"  class="btn btn-rounded btn-primary mb-3">Search</button></a>
                                                              
                                                    </div>
                                                </div>
                                                </form>
                                                
                                                
                                                
                                                
                                                
                                                
                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">
                                                                <th><input id="select" type="checkbox"></th>
                                                                <th scope="col">course CRN</th>
                                                                <th scope="col">course Name</th>
                                                                <th scope="col">course Level</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
    
    
                                                 if ($_SESSION['role']=='student')     {
                                                 
                                                 $student = "Select * from student where s_id = {$_SESSION['student_id']}";
                                                            $select_student= mysqli_query($con,$student);
                                                            $row2=mysqli_fetch_assoc($select_student);
    
                                                                 $a = $row2['level'];
                                                 }
                                                 
    
    
                                                      
                                                      else if ($_SESSION['role']=='parent')     {
                                                 $parent = "Select * from student where s_id = $student_id";
                                                            $select_parent= mysqli_query($con,$parent);
                                                            $row2=mysqli_fetch_assoc($select_parent);
    
                                                                 $a1 = $row2['level'];
    
                                                   }
                                                 
                                                           if ($_SESSION['role']=='student')     {
                                                 
                                                                    $query = "select * from course where c_level = $a";
                                                           }    else if ($_SESSION['role']=='parent')     {
                                                               $query = "select * from course where c_level = $a1";
                                                           }
    
    
    
    
                                                            else if ($_SESSION['role']=='teacher')     {
                                                               $query = "select * from course where t_id = {$_SESSION['teacher_id']}";
                                                           }
    
    
                                                          
                                                           else {
                                                              $query = "select * from course"; 
                                                           }
                                                                    $list_student =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_student))
                                                                    {
                                                                        $id =$row['crn'];
                                                                        $name =$row['c_name'];
                                                                        $level =$row['c_level'];

                                                                    
    
                                                          


                                                                ?>
                                                               <?php echo "<td><input class='checkboxes' type='checkbox' name='checkboxarray[]' value='$id'></td>";?>
                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $level;?></td>
                                                                <?php                          if ($_SESSION['role']=='admin')     { ?>
                                                                <td><a href='list_coures.php?delete=<?php echo $id;?>'><i class="ti-trash"></a></i><a href='edit_course.php?edit=<?php echo $id;?>'><i class="ti-pencil"></a></i></td> <?php } ?>
                                                            </tr>
                                                            <?php } ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                
                                                
                                                <?php } else if (isset($_GET['message']) and $_GET["message"]==1){ ?>
                                                
                                                
                                                
                                                
                                                
                                                
                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">
                                                                <th><input id="select" type="checkbox"></th>
                                                                <th scope="col">course CRN</th>
                                                                <th scope="col">course Name</th>
                                                                <th scope="col">course Level</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
    
    
    
    
    
                                                             $search_id = $_REQUEST['search_id'];
    
    
    
    
                                                                   if ($_SESSION['role']=='student')     {
                                                 
                                                 $student = "Select * from student where s_id = {$_SESSION['student_id']}";
                                                            $select_student= mysqli_query($con,$student);
                                                            $row2=mysqli_fetch_assoc($select_student);
    
                                                                 $a = $row2['level'];
                                                 }
                                                 
    
    
                                                      
                                                      else if ($_SESSION['role']=='parent')     {
                                                 $parent = "Select * from student where s_id = $student_id";
                                                            $select_parent= mysqli_query($con,$parent);
                                                            $row2=mysqli_fetch_assoc($select_parent);
    
                                                                 $a1 = $row2['level'];
    
                                                   }
                                                 
                                                           if ($_SESSION['role']=='student')     {
                                                 
                                                                    $query = "select * from course where c_level = $a AND crn = $search_id ";
                                                           }    else if ($_SESSION['role']=='parent')     {
                                                               $query = "select * from course where c_level = $a1 AND crn = $search_id";
                                                           }
    
    
    
    
                                                       else if ($_SESSION['role']=='teacher')     {
                                                               $query = "select * from course where t_id = {$_SESSION['teacher_id']}";
                                                           }
    
    
    
    
    
    
    
                                                           else {
                                                              $query = "select * from course where crn = $search_id"; 
                                                           }
                                                                    $list_student =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_student))
                                                                    {
                                                                        $id =$row['crn'];
                                                                        $name =$row['c_name'];
                                                                        $level =$row['c_level'];

                                                                    
    
                                                                                                                        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
//                                                                    $search_id = $_REQUEST['search_id'];
//                                                                    $query = "select * from course where crn = $search_id ";
//                                                                    $list_student =mysqli_query($con,$query);
//                                                                    while ($row=mysqli_fetch_assoc($list_student))
//                                                                    {
//                                                                        $id =$row['crn'];
//                                                                        $name =$row['c_name'];
//                                                                        $level =$row['c_level'];




                                                                ?>
                                                               <?php echo "<td><input class='checkboxes' type='checkbox' name='checkboxarray[]' value='$id'></td>";?>
                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $level;?></td>
                                                                
                                                                <?php                          if ($_SESSION['role']=='admin')     { ?>
                                                                
                                                                <td><a href='list_coures.php?delete=<?php echo $id;?>'><i class="ti-trash"></a></i><a href='edit_course.php?edit=<?php echo $id;?>'><i class="ti-pencil"></a></i></td> <?php } ?>
                                                            </tr>
                                                            <?php } ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                
                                                <?php } else { ?>
                                                
                                                
                                                
                                                
                                                
                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">
                                                                <th><input id="select" type="checkbox"></th>
                                                                <th scope="col">course CRN</th>
                                                                <th scope="col">course Name</th>
                                                                <th scope="col">course Level</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                   
                                                 if ($_SESSION['role']=='student')     {
                                                 
                                                 $student = "Select * from student where s_id = {$_SESSION['student_id']}";
                                                            $select_student= mysqli_query($con,$student);
                                                            $row2=mysqli_fetch_assoc($select_student);
    
                                                                 $a = $row2['level'];
                                                 }
                                                 
    
    
                                                      
                                                      else if ($_SESSION['role']=='parent')     {
                                                 $parent = "Select * from student where s_id = $student_id";
                                                            $select_parent= mysqli_query($con,$parent);
                                                            $row2=mysqli_fetch_assoc($select_parent);
    
                                                                 $a1 = $row2['level'];
    
                                                   }
                                                 
                                                           if ($_SESSION['role']=='student')     {
                                                 
                                                                    $query = "select * from course where c_level = $a";
                                                           }    else if ($_SESSION['role']=='parent')     {
                                                               $query = "select * from course where c_level = $a1";
                                                           }
    
    
    
    
    
                                                         else if ($_SESSION['role']=='teacher')     {
                                                               $query = "select * from course where t_id = {$_SESSION['teacher_id']}";
                                                           }
    
    
    
    
    
    
    
                                                           else {
                                                              $query = "select * from course"; 
                                                           }
                                                                    $list_student =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_student))
                                                                    {
                                                                        $id =$row['crn'];
                                                                        $name =$row['c_name'];
                                                                        $level =$row['c_level'];




                                                                ?>
                                                               <?php echo "<td><input class='checkboxes' type='checkbox' name='checkboxarray[]' value='$id'></td>";?>
                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $level;?></td>
                                                                
                                                                <?php                          if ($_SESSION['role']=='admin')     { ?>
                                                                
                                                                <td><a href='list_coures.php?delete=<?php echo $id;?>'><i class="ti-trash"></i></a><a href='edit_course.php?edit=<?php echo $id;?>'><i class="ti-pencil"></i></a></td> <?php } ?>
                                                            </tr>
                                                            <?php }} ?>

                                                            </tbody>
                                                        </table>
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
<?php

//if (isset($_GET['delete']))
//{
//    if (isset($_SESSION['role']))
//    {
//        if($_SESSION['role']== 'admin')
//        {
//
//
//            $the_user_id = mysqli_real_escape_string($con,$_GET['delete']);
//            $query = "Delete from student where s_id = $the_user_id";
//            $delete_query = mysqli_query($con, $query);
//
//            header("location: list_students.php");
//        }
//    }
//}
?>

<?php include  "includes/footer.php"; ?>