<?php
ob_start();
$title ="List of medical";
include  "includes/header.php";



?>
<?php

if (isset($_GET['delete']))
{


    $the_user_id = mysqli_real_escape_string($con,$_GET['delete']);
    $query = "Delete from medical where m_id = $the_user_id";
    $delete_query = mysqli_query($con, $query);
    header("location: list_medical.php");


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
                                        <span>Medical LIST</span>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title"></h4>
                                                <?php                          if ($_SESSION['role']=='parent')     { ?>
                                                <a href="add_medical.php"><button type="button"  class="btn btn-rounded btn-primary mb-3">Add New medical history</button></a>
                                               <?php } ?>
                                                <?php                          if ($_SESSION['role']!='parent')     { ?>
                                                 <a href="list_medical.php?message=0"><button type="button"  class="btn btn-rounded btn-primary mb-3">Search Medical</button></a><?php         }?>
                                                
                                                 <?php if (isset($_GET['message']) and $_GET["message"]==0){ ?>
                                                    
                                                        <form action="list_medical.php?message=1" method="post">
                                                           <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label ti-search">ID</label>
                                                    <input class="form-control" maxlength="10" type="text" name="search_id" value="" id="example-text-input">
                                                               <div class="form-group col-6">
                                                        <a href="list_medical.php?message=1"><button type="submit"  class="btn btn-rounded btn-primary mb-3">Search</button></a>
                                                              
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
                                                                <th scope="col">Student Name</th>
                                                                <th scope="col">blood type</th>
                                                                <th scope="col">medication takken currently</th>
                                                                <th scope="col">allergies</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
    
    
    
                             
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
                                                                    $query = "select * from medical";
                                                                    $list_student =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_student))
                                                                    {
                                                                        $id =$row['m_id'];
                                                                        $name =$row['s_name'];
                                                                        $blood =$row['blood_type'];
                                                                        $medication =$row['medication'];
                                                                $allergies =$row['allergies'];


                                                                ?>
                                                               <?php echo "<td><input class='checkboxes' type='checkbox' name='checkboxarray[]' value='$id'></td>";?>
                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $blood;?></td>
                                                                <td><?php echo $medication;?></td>
                                                                <td><?php echo $allergies;?></td>
                                                                 <?php                          if ($_SESSION['role']=='parent')     { ?>
                                                                <td><a href='list_medical.php?delete=<?php echo $id;?>'><li class="ti-trash"></li></a><a href='edit_medical.php?edit=<?php echo $id;?>'><li class="ti-pencil"></li></a></td> <?php } ?>
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
                                                      
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Student Name</th>
                                                                <th scope="col">blood type</th>
                                                                <th scope="col">medication taken currently</th>
                                                                <th scope="col">allergies</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                    $search_id = $_REQUEST['search_id'];
                                                                    $query = "select * from medical where m_id = $search_id ";
                                                                    $list_student =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_student))
                                                                    {
                                                                        $id =$row['m_id'];
                                                                        $name =$row['s_name'];
                                                                        $blood =$row['blood_type'];
                                                                        $medication =$row['medication'];
                                                                $allergies =$row['allergies'];

                                                                ?>
                                                               <?php echo "<td><input class='checkboxes' type='checkbox' name='checkboxarray[]' value='$id'></td>";?>
                                                                              <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $blood;?></td>
                                                                <td><?php echo $medication;?></td>
                                                                <td><?php echo $allergies;?></td>
                                                                 <?php                          if ($_SESSION['role']=='parent')     { ?>
                                                                <td><a href='list_medical.php?delete=<?php echo $id;?>'><li class="ti-trash"></li></a><a href='edit_medical.php?edit=<?php echo $id;?>'><li class="ti-pencil"></li></a></td> <?php } ?>
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
                                                      
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Student Name</th>
                                                                <th scope="col">blood type</th>
                                                                <th scope="col">medication taken currently</th>
                                                                <th scope="col">allergies</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
    if ($_SESSION['role']=='parent')     {
                                                                    //$query11 = "select * from student where p_id = {$_SESSION['parent_id']}";
                                                                    //$list_student11 =mysqli_query($con,$query11);
                                                                    //while($row11=mysqli_fetch_assoc($list_student11)){
                                                                   //$aa = $row11['s_id'];
                                                                    $query = "select * from medical where p_id = {$_SESSION['parent_id']}";
    }
    
    else{
                                                                     
                                                                    $query = "select * from medical";
    }
                                                                    $list_student =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_student))
                                                                    {
                                                                        $id =$row['m_id'];
                                                                        $name =$row['s_name'];
                                                                        $blood =$row['blood_type'];
                                                                        $medication =$row['medication'];
                                                                $allergies =$row['allergies'];

                                                                ?>
                                                               <?php echo "<td><input class='checkboxes' type='checkbox' name='checkboxarray[]' value='$id'></td>";?>
                                                                              <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $blood;?></td>
                                                                <td><?php echo $medication;?></td>
                                                                <td><?php echo $allergies;?></td>
                                                                
                                                                <?php                          if ($_SESSION['role']=='parent')     { ?>
                                                                
                                                                <td><a href='list_medical.php?delete=<?php echo $id;?>'><li class="ti-trash"></li></a><a href='edit_medical.php?edit=<?php echo $id;?>'><li class="ti-pencil"></li></a></td> <?php } ?>
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


<?php include  "includes/footer.php"; ?>