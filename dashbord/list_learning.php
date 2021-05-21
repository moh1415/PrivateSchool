<?php
ob_start();
$title ="List of Learning Resource";
include  "includes/header.php";



?>
<?php

if (isset($_GET['delete']))
{


    $the_user_id = mysqli_real_escape_string($con,$_GET['delete']);
    $query = "Delete from learning where learn_id = $the_user_id";
    $delete_query = mysqli_query($con, $query);
    header("location: list_learning.php");


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
                                        <span>Learning Resource LIST</span>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title"></h4>
                                                <a href="add_learning.php"><button type="button"  class="btn btn-rounded btn-primary mb-3">Add New Learning Resource</button></a>
                                                
                                                
                                            
                            
                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">
                                                                <th><input id="select" type="checkbox"></th>
                                                      
                                                                <th scope="col">Learning ID</th>
                                                                <th scope="col">Course Name</th>
                                                                <th scope="col">Course ID</th>
                                                                <th scope="col">File</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                    $query = "select * from learning where t_id = {$_SESSION['teacher_id']}";
                                                                    $list_student =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_student))
                                                                    {
                                                                        $learn_id =$row['learn_id'];
                                                                        $c_name =$row['c_name'];
                                                                        $c_id =$row['c_id'];
                                                                        $content =$row['content'];

                                                                ?>
                                                               <?php echo "<td><input class='checkboxes' type='checkbox' name='checkboxarray[]' value='$learn_id'></td>";?>
                                                                              <th scope="row"><?php echo $learn_id;?></th>
                                                                <td><?php echo $c_name;?></td>
                                                                <td><?php echo $c_id;?></td>
                                                                <td><?php echo $content;?></td>
                                                                <td><a href='list_learning.php?delete=<?php echo $learn_id;?>'><i class="ti-trash"></a></i></i></td>
                                                            </tr>
                                                            <?php } ?>

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