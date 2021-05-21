<?php
$title ="List of teachers";
include  "includes/header.php";

if (isset($_GET['delete']))
{
    $the_user_id = mysqli_real_escape_string($con,$_GET['delete']);
    
    $query1 = "select * from teacher where t_id = $the_user_id AND status ='admin'";
    

      $list_teacher1 =mysqli_query($con,$query1);
       //$row3 = mysqli_fetch_assoc($list_teacher1);

           if($row3 = mysqli_fetch_assoc($list_teacher1)){
               
               //header("location: list_teachers.php?s=7");
               
            
               
           }
           else {
               
                   $query = "Delete from teacher where t_id = $the_user_id";
    $delete_query = mysqli_query($con, $query);
   //header("location:list_teachers.php"); 
            
               
               
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
                                        <span>Teachers LIST</span>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title"></h4>
                                                    <a href="add_teacher.php"><button type="button"  class="btn btn-rounded btn-primary mb-3">Add New Teacher</button></a>
                                                    
                                                
                                                      <?php  if (isset($_GET['s']) and $_GET["s"]==7){?>
                                                        <div class="alert alert-danger" role="alert">
                                                            <strong>Wrong!</strong> you can not delete the Admin.
                                                        </div>
                                                    <?php } ?>
                                                
                                                
                                                
                                                
                                                            <a href="list_teachers.php?message=0"><button type="button"  class="btn btn-rounded btn-primary mb-3">Search Teacher</button></a>
                                                
                                                 <?php if (isset($_GET['message']) and $_GET["message"]==0){ ?>
                                                    
                                                        <form action="list_teachers.php?message=1" method="post">
                                                           <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label ti-search">ID</label>
                                                    <input class="form-control" maxlength="10" type="text" name="search_id" value="" id="example-text-input">
                                                               <div class="form-group col-6">
                                                        <a href="list_teachers.php?message=1"><button type="submit"  class="btn btn-rounded btn-primary mb-3">Search</button></a>
                                                              
                                                    </div>
                                                </div>
                                                </form>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">
                                                                <th><input id="select" type="checkbox"></th>
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Teacher Name</th>
                                                                <th scope="col">Teacher Phone</th>
                                                                <th scope="col">Teacher Address</th>
                                                                <th scope="col">Teacher Course</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                    $query = "select * from teacher";
                                                                    $list_teacher =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_teacher))
                                                                    {
                                                                        $id =$row['t_id'];
                                                                        $name =$row['t_name'];
                                                                        $phone =$row['t_phone'];
                                                                        $address =$row['address'];
                                                                        $class =$row['c_id'];
                                                                        
                                                                         $query99 = "select * from course where crn = $class";
                                                                    $list_teacher99 =mysqli_query($con,$query99);
                                                                    while ($row99=mysqli_fetch_assoc($list_teacher99))
                                                                    {
                                                                        
                                                                        
                                                                        $vvv = $row99["c_name"];
                                                                        
                                                                        


                                                                ?>
                                                               <?php echo "<td><input class='checkboxes' type='checkbox' name='checkboxarray[]' value='$id'></td>";?>
                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $phone;?></td>
                                                                <td><?php echo $address;?></td>
                                                                <td><?php echo $vvv;?></td>
                                                                <td><a href='list_teachers.php?delete=<?php echo $id;?>'><i class="ti-trash"></a></i><a href='edit_teacher.php?edit=<?php echo $id;?>'><i class="ti-pencil"></a></i></td>
                                                            </tr>
                                                            <?php } }?>

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
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Teacher Name</th>
                                                                <th scope="col">Teacher Phone</th>
                                                                <th scope="col">Teacher Address</th>
                                                                <th scope="col">Teacher Course</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                       $search_id = $_REQUEST['search_id'];
                                                                    $query = "select * from teacher where t_id = $search_id ";
                                                                    $list_teacher =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_teacher))
                                                                    {
                                                                        $id =$row['t_id'];
                                                                        $name =$row['t_name'];
                                                                        $phone =$row['t_phone'];
                                                                        $address =$row['address'];
                                                                        $class =$row['c_id'];
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                             $query99 = "select * from course where crn = $class";
                                                                    $list_teacher99 =mysqli_query($con,$query99);
                                                                    while ($row99=mysqli_fetch_assoc($list_teacher99))
                                                                    {
                                                                        
                                                                        
                                                                        $vvv = $row99["c_name"];
                                                                        
                                                                        
                                                                        
                                                                        


                                                                ?>
                                                               <?php echo "<td><input class='checkboxes' type='checkbox' name='checkboxarray[]' value='$id'></td>";?>
                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $phone;?></td>
                                                                <td><?php echo $address;?></td>
                                                                <td><?php echo $vvv;?></td>
                                                                <td><a href='list_teachers.php?delete=<?php echo $id;?>'><i class="ti-trash"></a></i><a href='edit_teacher.php?edit=<?php echo $id;?>'><i class="ti-pencil"></a></i></td>
                                                            </tr>
                                                            <?php }} ?>

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
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Teacher Name</th>
                                                                <th scope="col">Teacher Phone</th>
                                                                <th scope="col">Teacher Address</th>
                                                                <th scope="col">Teacher Course</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                    $query = "select * from teacher";
                                                                    $list_teacher =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_teacher))
                                                                    {
                                                                        $id =$row['t_id'];
                                                                        $name =$row['t_name'];
                                                                        $phone =$row['t_phone'];
                                                                        $address =$row['address'];
                                                                        $class =$row['c_id'];
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                             $query99 = "select * from course where crn = $class";
                                                                    $list_teacher99 =mysqli_query($con,$query99);
                                                                    while ($row99=mysqli_fetch_assoc($list_teacher99))
                                                                    {
                                                                        
                                                                        
                                                                        $vvv = $row99["c_name"];
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        


                                                                ?>
                                                               <?php echo "<td><input class='checkboxes' type='checkbox' name='checkboxarray[]' value='$id'></td>";?>
                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $phone;?></td>
                                                                <td><?php echo $address;?></td>
                                                                <td><?php echo $vvv;?></td>
                                                                <td><a href='list_teachers.php?delete=<?php echo $id;?>'><i class="ti-trash"></a></i><a href='edit_teacher.php?edit=<?php echo $id;?>'><i class="ti-pencil"></a></i></td>
                                                            </tr>
                                                            <?php }} }?>

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