<?php
ob_start();
$title ="List of parents";
include  "includes/header.php";



?>
<?php

if (isset($_GET['delete']))
{


    $the_user_id = mysqli_real_escape_string($con,$_GET['delete']);
    $query = "Delete from parent where p_id = $the_user_id";
    $delete_query = mysqli_query($con, $query);
    header("location: list_parents.php");


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
                                        <span>Parents LIST</span>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title"></h4>
                                                <a href="add_parent.php"><button type="button"  class="btn btn-rounded btn-primary mb-3">Add New Parent</button></a>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                  
                                                 <a href="list_parents.php?message=0"><button type="button"  class="btn btn-rounded btn-primary mb-3">Search parent</button></a>
                                                
                                                 <?php if (isset($_GET['message']) and $_GET["message"]==0){ ?>
                                                    
                                                        <form action="list_parents.php?message=1" method="post">
                                                           <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label ti-search">ID</label>
                                                    <input class="form-control" maxlength="10" type="text" name="search_id" value="" id="example-text-input">
                                                               <div class="form-group col-6">
                                                        <a href="list_parents.php?message=1"><button type="submit"  class="btn btn-rounded btn-primary mb-3">Search</button></a>
                                                              
                                                    </div>
                                                </div>
                                                </form>
                                                
                                                
                                                
                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Parent Name</th>
                                                                <th scope="col">Parent Phone</th>
                                                                <th scope="col">Parent Work number</th>
                                                                <th scope="col">Student ID</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                    $query = "select * from parent";
                                                                    $list_parent =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_parent))
                                                                    {
                                                                        $id =$row['p_id'];
                                                                        $name =$row['p_name'];
                                                                        $phone =$row['phone_num'];
                                                                        $work_num =$row['work_num'];
                                                                        $student_id =$row['s_id'];


                                                                ?>

                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $phone;?></td>
                                                                <td><?php echo $work_num;?></td>
                                                                <td><?php echo $student_id;?></td>
                                                                <td><a href='list_parents.php?delete=<?php echo $id;?>'><i class="ti-trash"></a></i><a href='edit_parent.php?edit=<?php echo $id;?>'><i class="ti-pencil"></a></i></td>
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
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Parent Name</th>
                                                                <th scope="col">Parent Phone</th>
                                                                <th scope="col">Parent Work number</th>
                                                                <th scope="col">Student ID</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                    $search_id = $_REQUEST['search_id'];
                                                                    $query = "select * from parent where p_id = $search_id ";
                                                                    $list_parent =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_parent))
                                                                    {
                                                                        $id =$row['p_id'];
                                                                        $name =$row['p_name'];
                                                                        $phone =$row['phone_num'];
                                                                        $work_num =$row['work_num'];
                                                                        $student_id =$row['s_id'];


                                                                ?>

                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $phone;?></td>
                                                                <td><?php echo $work_num;?></td>
                                                                <td><?php echo $student_id;?></td>
                                                                <td><a href='list_parents.php?delete=<?php echo $id;?>'><i class="ti-trash"></a></i><a href='edit_parent.php?edit=<?php echo $id;?>'><i class="ti-pencil"></a></i></td>
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
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Parent Name</th>
                                                                <th scope="col">Parent Phone</th>
                                                                <th scope="col">Parent Work number</th>
                                                                <th scope="col">Student ID</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                    $query = "select * from parent";
                                                                    $list_parent =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_parent))
                                                                    {
                                                                        $id =$row['p_id'];
                                                                        $name =$row['p_name'];
                                                                        $phone =$row['phone_num'];
                                                                        $work_num =$row['work_num'];
                                                                        $student_id =$row['s_id'];


                                                                ?>

                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $phone;?></td>
                                                                <td><?php echo $work_num;?></td>
                                                                <td><?php echo $student_id;?></td>
                                                                <td><a href='list_parents.php?delete=<?php echo $id;?>'><i class="ti-trash"></a></i><a href='edit_parent.php?edit=<?php echo $id;?>'><i class="ti-pencil"></a></i></td>
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