<?php
ob_start();
$title = "Add New Syllabus";
include  "includes/header.php";



        if (isset($_POST['submit']))
        {
            include  "includes/db.php";
           // $sy_id =$_POST['sy_id'];
            $c_id =$_POST['c_id'];
                 $t_id = $_SESSION['teacher_id'];
            
                $query1 = "Select * from course where crn = $c_id ";
                $select_course1 = mysqli_query($con,$query1);
                $row1 = mysqli_fetch_assoc($select_course1);
                $c_name = $row1['c_name'];
            
            
            
            
            
      
    $img_name = $_FILES['content']['name'];
    $tmp = $_FILES['content']['tmp_name'];
    $type = $_FILES['content']['type'];
    $size = $_FILES['content']['size'];
    $err = $_FILES['content']['error'];
    
    
    $dir = "file/syllabus/";
    $arr = explode(".", $img_name);
    $ext = end($arr);
    
    
    $dest = $dir.$c_name.".".$ext;
    
    $accept = array("docx","csv", "pdf");
    
    $accepted = in_array($ext, $accept);
    
    
    if($size > 500000 || $err || !($accept))
        
    {
        
        $status = 0;
        
    }
    
    else
    {
        $move = move_uploaded_file($tmp, $dest);
        
        if(!$move)
        {
            $status = 0;
        }
        else 
        {
            
         $query33 = "Select * from syllabus where c_id = $c_id ";
                $select_course33 = mysqli_query($con,$query33);
                $row33 = mysqli_fetch_assoc($select_course33);
            
            if($row33){
                
                header("location:add_syllabus.php?s=0");
            }

    else{


$query = " iNSERT iNTO syllabus 
           SET  c_name = '$c_name' ,
           content = '$dest' ,
           t_id = '$t_id' ,
           c_id = $c_id " ;

$result = mysqli_query($con, $query);

if ($result)
{
$status = 1;
}
else 
{
    $status = 0;

}
            $noftit_con="New Syllabus Added";
            $class_id= find_class($c_id);
            foreach ($class_id as $value)
            {
                notification($title,$value,$noftit_con,$t_id);

            }
            header("location:add_syllabus.php?s=$status");

}}//END of else 
    }//end of else
}//end of if isset

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
                                            <span>Add New Syllabus</span>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="card-body">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <?php if (isset($_GET['s']) and $_GET["s"]==0){ ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Wrong!</strong> The course syllabus already exists.
                                                    </div>
                                                        <?php } else if (isset($_GET['s']) and $_GET["s"]==1){?>
                                                        <div class="alert alert-success" role="alert">
                                                            <strong>Well done!</strong> You successfully add the course syllabus.
                                                        </div>
                                                        <?php } ?>
<!--
                                                <div class="form-group">
                                                    <label for="example-text-input" class="col-form-label">Syllabus ID</label>
                                                    <input class="form-control" maxlength="10" type="text" name="sy_id" value="" id="example-text-input">
                                                </div>
-->
                                                         <label for="c_id" class="col-form-label">Course</label>
                                                         <select name="c_id" class="form-control">
                                                            <?php
                                                             
                                                            $query = "Select * from course where t_id = {$_SESSION['teacher_id']} ";
                                                            $select_course= mysqli_query($con,$query);
                                                            while ($row=mysqli_fetch_assoc($select_course)) {
                                                                $course_id = $row['crn'];
                                                                $course_name = $row['c_name'];
                                                                $course_level = $row['c_level'];

                                                                echo "<option value='{$course_id}' >{$course_name} Level {$course_level}</option>";
                                                            }



                                                            ?>
                                                        </select>
<!--
                                                <div class="form-group">
                                                    <label for="example-search-input" class="col-form-label">Course ID</label>
                                                    <input class="form-control" type="text" name="c_id" value="" id="example-search-input">
                                                </div>
-->
                                                <div class="form-group">
                                                    <label for="example-email-input" class="col-form-label">File</label>
                                                    <input class="form-control" type="file" name="content" value="" id="example-email-input">
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