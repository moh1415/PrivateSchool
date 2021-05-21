<?php
ob_start();
$title ="List of schedule";
include  "includes/header.php";



?>
<?php
function class_name($id_class)
{
    global $con;
    $query = "Select * from class where c_id =$id_class";
    $select_class= mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($select_class);
    $id = $row['c_id'];$name = $row['c_name'];

    echo "<option value='{$id}' >{$name}</option>";
}

if (isset($_GET['delete']))
{

    $the_user_id = mysqli_real_escape_string($con,$_GET['delete']);
    $query = "Delete from schedule where sched_no = $the_user_id";
    $delete_query = mysqli_query($con, $query);
    header("location: list_schedule.php");


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
                                        <span>Schedule LIST</span>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title"></h4>
                                                <a href="add_schedule.php"><button type="button"  class="btn btn-rounded btn-primary mb-3">Add New Schedule</button></a>
                                                
                                                
                                                 <a href="list_schedule.php?message=0"><button type="button"  class="btn btn-rounded btn-primary mb-3">Search Schedule</button></a>
                                                
                                                 <?php if (isset($_GET['message']) and $_GET["message"]==0){ ?>
                                                    
                                                        <form action="list_schedule.php?message=1" method="post">
                                                           <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label ti-search">ID</label>
                                                    <input class="form-control" maxlength="10" type="text" name="search_id" value="" id="example-text-input">
                                                               <div class="form-group col-6">
                                                        <a href="list_schedule.php?message=1"><button type="submit"  class="btn btn-rounded btn-primary mb-3">Search</button></a>
                                                              
                                                    </div>
                                                </div>
                                                </form>
                                                
                                                
                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">
                                                                <th><input id="select" type="checkbox"></th>
                                                                <th scope="col">Schedule number</th>
                                                                <th scope="col">Class level</th>
                                                                <th scope="col">Class number</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                    $query = "select * from schedule";
                                                                    $list_student =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_student))
                                                                    {
                                                                        $id =$row['sched_no'];
                                                                        $name =$row['sch_level'];
                                                                        $phone =$row['sche_class'];



                                                                ?>
                                                               <?php echo "<td><input class='checkboxes' type='checkbox' name='checkboxarray[]' value='$id'></td>";?>
                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $phone;?></td>
                                                                <th scope="col">Action</th>
                                                                <td><a href='list_scedule.php?delete=<?php echo $id;?>'><i class="ti-trash"></a></i><a href='view_schedule.php?edit=<?php echo $id;?>'><i class="ti-pencil"></a></i></td>
                                                            </tr>
                                                            <?php } ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                 <?php } else if (isset($_GET['message']) and $_GET["message"]==1){ ?>
                                                
                                                    <div class="single-table">
                                                    <div class="table-responsive">
                                                        <form method="post" action="">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">
                                                                <th><input id="select" type="checkbox"></th>
                                                            <th scope="col">Schedule number</th>
                                                                <th scope="col">Class level</th>
                                                                <th scope="col">Class number</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                    $search_id = $_REQUEST['search_id'];
                                                                    $query = "select * from schedule where sched_no = $search_id";
                                                                    $list_student =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_student))
                                                                    {
                                                                        $id =$row['sched_no'];
                                                                        $name =$row['sch_level'];
                                                                        $phone =$row['sche_class'];


                                                                ?>
                                                               <?php echo "<td><input class='checkboxes' type='checkbox' name='checkboxarray[]' value='$id'></td>";?>
                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $phone;?></td>
                                                          
                                                                <td><a href='list_schedule.php?delete=<?php echo $id;?>'><i class="ti-trash"></a></i><a href='view_schedule.php?edit=<?php echo $id;?>'><i class="ti-pencil"></a></i></td>
                                                            </tr>
                                                            <?php } ?>

                                                            </tbody>

                                                        </table>
                                                        <br>
<!--                                                        <div class="form-group col-sm-2">-->
<!--                                                            <div style="padding: 4px" id="bulkOptionContainer" class="col-xs-4">-->
<!--                                                                <select name="bulk_options" id="" class="form-control">-->
<!---->
<!--                                                                    <option value="">Assign Class</option>-->
<!--                                                                    --><?php
//                                                                    $query = "Select * from class ";
//                                                                    $select_class= mysqli_query($con,$query);
//                                                                    while ($row=mysqli_fetch_assoc($select_class)) {
//                                                                        $id = $row['c_id'];
//                                                                        $name = $row['c_name'];
//
//
//                                                                        echo "<option value='{$id}' >{$name}</option>";
//                                                                    }
//
//                                                                    ?>
<!--                                                                </select></div>-->
<!--                                                            <div class="col-sm-2">-->
<!---->
<!--                                                                <input type="submit" name="submit" class="btn btn-success" value="Apply">-->
<!--                                                            </div>-->
<!--                                                        </div>-->
                                                    </div>
                                                </div>
                                                 
                                                  <?php } else { ?>
                            
                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <form method="post" action="">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">
                                                                <th><input id="select" type="checkbox"></th>
                                                                 <th scope="col">Schedule number</th>
                                                                <th scope="col">Class level</th>
                                                                <th scope="col">Class number</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                   $query = "select * from schedule";
                                                                    $list_student =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_student))
                                                                    {
                                                                          $id =$row['sched_no'];
                                                                        $name =$row['sch_level'];
                                                                        $phone =$row['sche_class'];


                                                                ?>
                                                               <?php echo "<td><input class='checkboxes' type='checkbox' name='checkboxarray[]' value='$id'></td>";?>
                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $name;?></td>
                                                                <td><?php echo $phone;?></td>
                                                        
                                                                <td><a href='list_schedule.php?delete=<?php echo $id;?>'><i class="ti-trash"></a></i><a href='view_schedule.php?edit=<?php echo $id;?>'><i class="ti-pencil"></a></i></td>
                                                            </tr>
                                                            <?php }} ?>
                                                     

                                                            </tbody>
                                                        </table>
                                                        <br>
                                                        <div
                                                                class="form-group col-sm-2">
                                                            
                                                         
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
</div>


<?php include  "includes/footer.php"; ?>