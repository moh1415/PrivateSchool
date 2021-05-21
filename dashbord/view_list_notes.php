<?php
ob_start();
$title ="View List of Notes";
include  "includes/header.php";



?>
<?php
                                    function find_course($crn)
                                    {
                                        global $con;
                                        $query = "select * from course where crn=$crn";
                                        $list_course =mysqli_query($con,$query);
                                        $row=mysqli_fetch_assoc($list_course);
                                        if ($row)
                                        {

                                            return $row['c_name']." Level ".$row['c_level'];
                                        } else {
                                            $mag ="No course assign yet";
                                            return $mag;
                                        }
                                    }





                                                    if (isset($_GET['id']))
{

    $student_id =$_GET['id'];
    //$course_name =$_GET['course_name'];
}  












?>





<?php


if ($_SESSION['role']=='student')     {


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
                                        <span>Notes LIST</span>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title"></h4>
                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">
                                                                <th scope="col">Note ID</th>
                                                                <th scope="col">Note</th>
                                                                <th scope="col">Date</th>
                                                                <th scope="col">Course Name</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                    $query = "select * from class_note where c_id={$_SESSION['class']}";
                                                                    $list_parent =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_parent))
                                                                    {
                                                                        $id =$row['note_id'];
                                                                        $date =$row['datee'];
                                                                        $note =$row['note'];
                                                                        $course_id =$row['course_id'];


                                                                ?>

                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $note;?></td>
                                                                <td><?php echo $date;?></td>
                                                                <td><?php echo find_course($course_id) ;?></td>

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





































<?php

}
if ($_SESSION['role']=='parent')     {


?>


 <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-area">
                            <div class="invoice-head">
                                <div class="row">
                                    <div class="iv-left col-6">
                                        <span>Notes LIST</span>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title"></h4>
                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">
                                                                <th scope="col">Note ID</th>
                                                                <th scope="col">Note</th>
                                                                <th scope="col">Date</th>
                                                                <th scope="col">Course Name</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
    
    
                                                     
    
                                               $parent = "Select * from student where s_id = $student_id";
                                                            $select_parent= mysqli_query($con,$parent);
                                                            $row2=mysqli_fetch_assoc($select_parent);
    
                                                                 $a1 = $row2['class'];
    
                                                   
    
    
    
    
    
    
    
    
    
    
    
    
                                                                    $query = "select * from class_note where c_id=$a1";
                                                                    $list_parent =mysqli_query($con,$query);
                                                                    while ($row=mysqli_fetch_assoc($list_parent))
                                                                    {
                                                                        $id =$row['note_id'];
                                                                        $date =$row['datee'];
                                                                        $note =$row['note'];
                                                                        $course_id =$row['course_id'];


                                                                ?>

                                                                <th scope="row"><?php echo $id;?></th>
                                                                <td><?php echo $note;?></td>
                                                                <td><?php echo $date;?></td>
                                                                <td><?php echo find_course($course_id) ;?></td>

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










<?php
}


?>











<?php include  "includes/footer.php"; ?>