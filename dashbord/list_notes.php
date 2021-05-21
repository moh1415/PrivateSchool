<?php
ob_start();
$title ="List of Notes";
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
if (isset($_GET['delete']))
{


    $the_user_id = mysqli_real_escape_string($con,$_GET['delete']);
    $query = "Delete from class_note where note_id = $the_user_id";
    $delete_query = mysqli_query($con, $query);
    header("location: list_notes.php");


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
                                        <span>Notes LIST</span>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title"></h4>
                                                <a href="add_class_note.php"><button type="button"  class="btn btn-rounded btn-primary mb-3">Add New Class Note</button></a>

                                                <div class="single-table">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">
                                                            <thead class="text-uppercase bg-dark">
                                                            <tr class="text-white">
                                                                <th scope="col">Note ID</th>
                                                                <th scope="col">Note</th>
                                                                <th scope="col">Date</th>
                                                                <th scope="col">Course Name</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>

                                                                <?php
                                                                    $query = "select * from class_note where t_id={$_SESSION['teacher_id']}";
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
                                                                <td><a href='list_notes.php?delete=<?php echo $id;?>'><i class="ti-trash"></a></i></td>
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