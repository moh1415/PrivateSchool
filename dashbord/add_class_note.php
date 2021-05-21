<?php
ob_start();
$title = "Add New Class note";
include  "includes/header.php";
        if (isset($_POST['submit']))
        {
            include  "includes/db.php";
            $course_id =$_POST['course_note_id'];
            $class_id =$_POST['class_note_id'];
            $date =$_POST['date'];
            $note =$_POST['note'];
            $t_id =$_SESSION['teacher_id'];
            if (empty($note)or empty($course_id) or empty($date))
            {
                header("location: add_class_note.php?message=2");
            }
            else{
                    $query = "INSERT INTO class_note(course_id, datee, note,t_id,c_id)";
                    $query .= "VALUES('{$course_id}','{$date}','{$note}','{$t_id}','{$class_id}') ";
                    $create_note = mysqli_query($con, $query);
                    $noftit_con=$note;
                    $class_id= find_class($course_id);
                    notification($title,$class_id,$noftit_con,$t_id);
                    comfirm($create_note);
                    header("location: add_class_note.php?message=0");
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
                                            <span>Add New Class Note</span>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="card-body">
                                                <form name="test" action="" method="post">
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==1){ ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> The Class Note already exists.
                                                    </div>
                                                        <?php } else if (isset($_GET['message']) and $_GET["message"]==0){?>
                                                        <div class="alert alert-success" role="alert">
                                                            <strong>Well done!</strong> You successfully add the class note.
                                                        </div>
                                                        <?php } ?>
                                                    <?php if (isset($_GET['message']) and $_GET["message"]==2){?>
                                                    <div class="alert alert-success" role="alert">
                                                        <strong>Well done!</strong> Please Fill all fields.
                                                    </div>
                                                    <?php } ?>
                                                <div class="form-group">
                                                    <label for="example-search-input" class="col-form-label">Note</label>
                                                    <input class="form-control" type="text" name="note" value="" id="example-search-input">
                                                </div>
                                                    <div class="form-group">
                                                        <label for="example-search-input" class="col-form-label">Date</label>
                                                        <input class="form-control" type="date" name="date" value="" id="example-search-input">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-form-label">Select Course 1 to assign Note</label>
                                                        <select id="course_note_id" name="course_note_id" class="form-control">
                                                            <?php
                                                            $query = "Select * from course where t_id={$_SESSION['teacher_id']}";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";

                                                            }


                                                            ?>
                                                        </select>
                                                    </div>
                                                    <label class="col-form-label">Select class</label>
                                                    <select name="class_note_id" class="form-control">
                                                        <?php





                                                        $query = "Select * from class ";
                                                        $select_course= mysqli_query($con,$query);

                                                        while ($row=mysqli_fetch_assoc($select_course)) {
                                                            $c_id = $row['c_id'];
                                                            $c_name = $row['c_name'];
                                                            $level = $row['c_level'];

                                                            echo "<option value='{$c_id}' > level {$level} section {$c_name}</option>";
                                                        }

                                                        ?>
                                                    </select>


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
            <script>
                // var id=document.getElementById("course_note_id");
                // var cou=document.test.course_note_id;
                // for (var i in cou)
                // {
                //     if (cou[i].selected)
                //     {
                //         var a=cou[i];
                //         console.log("a");
                //
                //     }
                // }



            </script>
