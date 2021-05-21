<?php
ob_start();
$title = "Submit Assignment";
include  "includes/header.php";
if (isset($_GET['id']))
{

    $course_id =$_GET['id'];
}
if (isset($_GET['s_id']))
{

    $s_id =$_GET['s_id'];
}
        if (isset($_POST['submit']))
        {
            include  "includes/db.php";
            $files  = $_FILES['content']['name'];
            $files_temp = $_FILES['content']['tmp_name'];
            if (empty($files) and empty($files_temp))
            {
                header("location: sub_assignment.php?message=2");
            }else{

                move_uploaded_file($files_temp, "file/assignment/$files" );
                $query = "INSERT INTO assignment_sub(s_id, c_id,file)";
                $query .= "VALUES('{$s_id}','{$course_id}','{$files}') ";
                $create_assignment = mysqli_query($con, $query);
                header("location: sub_assignment.php?message=0");
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
                                            <span>Submit Assignment</span>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="card-body">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==1){ ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> the assignment not exists.
                                                    </div>
                                                        <?php } else if (isset($_GET['message']) and $_GET["message"]==0){?>
                                                        <div class="alert alert-success" role="alert">
                                                            <div class="alert alert-success" role="alert">
                                                                <strong>Well done!</strong> You successfully add the assignment.
                                                            </div>
                                                           

                                                    <?php }  if (isset($_GET['message']) and $_GET["message"]==2){?>
                                                        <div class="alert alert-danger" role="alert">
                                                            <strong>Wrong!</strong> Please a choice file.
                                                        </div>
                                                    <?php } ?>

                                                        <div class="form-group">


                                                    </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Upload</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" name="content" id="inputGroupFile01">
                                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                </div>
                                                            </div>

                                                    <div class="form-group col-6">
                                                        <input type="submit" name="submit" class="btn btn-outline-primary mb-3">
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
<?php include  "includes/footer.php"; ?>