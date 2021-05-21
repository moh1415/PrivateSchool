<?php session_start(); ?>
<!doctype html>
<html class="no-js" lang="en">
<?php include "db.php";?>
<?php include "funcation.php";?>
<?php
if(isset($_SESSION['role'])) {

} else {

    header("location: login.php");


}?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->
<!-- page container area start -->
<div class="page-container">
    <!-- sidebar menu area start -->
    <div class="sidebar-menu">
        <div class="sidebar-header">
            <div class="logo">
                <a href="index.php"><img src="assets/images/icon/school.png" alt="logo"></a>
            </div>
        </div>
        <div class="main-menu">
            <div class="menu-inner">
                <nav>
                    <ul class="metismenu" id="menu">
                        <li class="active">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                            <ul class="collapse">
                                <li class="active"><a href="index.php">dashboard</a></li>
                            </ul>
                        </li>
                        <?php
                        if ($_SESSION['role']=='admin')
                        {

                        ?>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Users</span></a>
                            <ul class="collapse">
                                <li><a href="list_students.php">Students</a></li>
                                <li><a href="list_parents.php">Parents</a></li>
                                <li><a href="list_teachers.php">Teachers</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Classes</span></a>
                            <ul class="collapse">
                                <li><a href="classes.php">Classes</a></li>
                                <li><a href="list_coures.php">Courses</a></li>
                                <li><a href="list_schedule.php">Time Table</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Attendance</span></a>
                            <ul class="collapse">
                                <li><a href="attendance.php">Students Attendance</a></li>
                                <li><a href="list_medical.php">Medical History</a></li>

                            </ul>
                        </li><?php }?>
                        <?php
                        if ($_SESSION['role']=='parent')
                        {

                        ?>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>My kids</span></a>
                            <ul class="collapse">
                                <li><a href="#">Class info</a></li>
                              <li>  <a href="list_medical.php">Medical history</a></li>
                                <li>  <a href="view_assignment.php">Assignment</a></li>
                                <li>  <a href="view_syllabus.php">Syllabus</a></li>
                                <li>  <a href="view_learn.php">Learning Resource</a></li>
                                <li><a href="list_coures.php">Courses</a></li>
                                <li><a href="test_schedule.php">Time Table</a></li>

                            </ul>
                        </li><?php }?>
                        <?php
                        if ($_SESSION['role']=='student')
                        {

                            ?>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>My Class</span></a>
                                <ul class="collapse">
                                    <li><a href="#">Class info</a></li>
                                     <li><a href="view_syllabus.php">view syllabus</a></li>
                                    <li><a href="view_assignment.php">view Assignment</a></li>
                                    <li><a href="view_learn.php">view Learning Resource</a></li>
                                    <li><a href="list_coures.php">Courses</a></li>
                                    <li><a href="test_schedule.php">Time Table</a></li>

                                </ul>
                            </li><?php }?>
                        <?php
                        if ($_SESSION['role']=='student')
                        {

                            ?>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>My Courses</span></a>
                                <ul class="collapse">
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

                                    $query = "Select * from class where c_id={$_SESSION['class']}";
                                    $select_class= mysqli_query($con,$query);
                                    while ($row=mysqli_fetch_assoc($select_class)) {
                                        $id = $row['c_id'];
                                        $sub1 = $row['sub1'];
                                        $sub2 = $row['sub2'];
                                        $sub3 = $row['sub3'];
                                        $sub4 = $row['sub4'];
                                    ?>

                                        <li class=""><a href='#'><?php echo find_course($sub1); ?></a></li>
                                        <li><a href='#'><?php echo find_course($sub2); ?></a></li>
                                        <li><a href='#'><?php echo find_course($sub3); ?></a></li>
                                        <li><a href='#'><?php echo find_course($sub4); ?></a></li>

                                <?php    }

                                    ?>


                                </ul>
                            </li><?php }?>
                        <?php
                        if ($_SESSION['role']=='teacher')
                        {

                        ?>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Courses</span></a>
                            <ul class="collapse">
                                <li><a href="list_assignment.php">Assignments</a></li>
                                <li><a href="list_syllabus.php">Syllabus</a></li>
                                <li><a href="list_learning.php">Learning Resources</a></li>
                                <li><a href="list_notes.php">Class Notes</a></li>
                                <li><a href="list_courses_grade.php">Grade</a></li>
                                <li><a href="list_coures.php">Courses</a></li>
                            </ul>
                        </li>
                        
                                                <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Student</span></a>
                            <ul class="collapse">
                                <li><a href="list_medical.php">Medical History</a></li>

                            </ul>
                        </li>
                        
                        <?php }?>

                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>UI Features</span></a>
                            <ul class="collapse">
                                <li><a href="accordion.html">Accordion</a></li>
                                <li><a href="alert.html">Alert</a></li>
                                <li><a href="badge.html">Badge</a></li>
                                <li><a href="button.html">Button</a></li>
                                <li><a href="button-group.html">Button Group</a></li>
                                <li><a href="cards.html">Cards</a></li>
                                <li><a href="dropdown.html">Dropdown</a></li>
                                <li><a href="list-group.html">List Group</a></li>
                                <li><a href="media-object.html">Media Object</a></li>
                                <li><a href="modal.html">Modal</a></li>
                                <li><a href="pagination.html">Pagination</a></li>
                                <li><a href="popovers.html">Popover</a></li>
                                <li><a href="progressbar.html">Progressbar</a></li>
                                <li><a href="tab.html">Tab</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="form.html">Form</a></li>
                                <li><a href="grid.html">grid system</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>icons</span></a>
                            <ul class="collapse">
                                <li><a href="fontawesome.html">fontawesome icons</a></li>
                                <li><a href="themify.html">themify icons</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                                <span>Tables</span></a>
                            <ul class="collapse">
                                <li><a href="table-basic.html">basic table</a></li>
                                <li><a href="table-layout.html">table layout</a></li>
                                <li><a href="datatable.html">datatable</a></li>
                            </ul>
                        </li>
                        <li><a href="maps.html"><i class="ti-map-alt"></i> <span>maps</span></a></li>

                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layers-alt"></i> <span>Pages</span></a>
                            <ul class="collapse">
                                <li><a href="login.html">Login</a></li>
                                <li><a href="register.html">Register</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-align-left"></i> <span>Multi
                                        level menu</span></a>
                            <ul class="collapse">
                                <li><a href="#">Item level (1)</a></li>
                                <li><a href="#">Item level (1)</a></li>
                                <li><a href="#" aria-expanded="true">Item level (1)</a>
                                    <ul class="collapse">
                                        <li><a href="#">Item level (2)</a></li>
                                        <li><a href="#">Item level (2)</a></li>
                                        <li><a href="#">Item level (2)</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Item level (1)</a></li>
                            </ul>
                        </li>
                    </ul>

                </nav>
            </div>
        </div>
    </div>
    <!-- sidebar menu area end -->
    <!-- main content area start -->
    <div class="main-content">
        <!-- header area start -->
        <div class="header-area">
            <div class="row align-items-center">
                <!-- nav and search button -->
                <div class="col-md-6 col-sm-8 clearfix">
                    <div class="nav-btn pull-left">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="search-box pull-left">
                        <form action="#">
                            <input type="text" name="search" placeholder="Search..." required>
                            <i class="ti-search"></i>
                        </form>
                    </div>
                </div>
                <!-- profile info & task notification -->

                <div class="col-md-6 col-sm-4 clearfix">
                    <ul class="notification-area pull-right">
                        <li id="full-view"><i class="ti-fullscreen"></i></li>
                        <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                        <li class="dropdown">
                            <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                                <span>2</span>
                            </i>
                            <div class="dropdown-menu bell-notify-box notify-box">
                                <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                <div class="nofity-list">
                                    <a href="#" class="notify-item">
                                        <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                        <div class="notify-text">
                                            <p>You have Changed Your Password</p>
                                            <span>Just Now</span>
                                        </div>
                                    </a>
                                    <a href="#" class="notify-item">
                                        <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                        <div class="notify-text">
                                            <p>New Commetns On Post</p>
                                            <span>30 Seconds ago</span>
                                        </div>
                                    </a>
                                    <a href="#" class="notify-item">
                                        <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                        <div class="notify-text">
                                            <p>Some special like you</p>
                                            <span>Just Now</span>
                                        </div>
                                    </a>
                                    <a href="#" class="notify-item">
                                        <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                        <div class="notify-text">
                                            <p>New Commetns On Post</p>
                                            <span>30 Seconds ago</span>
                                        </div>
                                    </a>
                                    <a href="#" class="notify-item">
                                        <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                        <div class="notify-text">
                                            <p>Some special like you</p>
                                            <span>Just Now</span>
                                        </div>
                                    </a>
                                    <a href="#" class="notify-item">
                                        <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                        <div class="notify-text">
                                            <p>You have Changed Your Password</p>
                                            <span>Just Now</span>
                                        </div>
                                    </a>
                                    <a href="#" class="notify-item">
                                        <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                        <div class="notify-text">
                                            <p>You have Changed Your Password</p>
                                            <span>Just Now</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>3</span></i>
                            <div class="dropdown-menu notify-box nt-enveloper-box">
                                <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                <div class="nofity-list">
                                    <a href="#" class="notify-item">
                                        <div class="notify-thumb">
                                            <img src="assets/images/author/author-img1.jpg" alt="image">
                                        </div>
                                        <div class="notify-text">
                                            <p>Aglae Mayer</p>
                                            <span class="msg">Hey I am waiting for you...</span>
                                            <span>3:15 PM</span>
                                        </div>
                                    </a>
                                    <a href="#" class="notify-item">
                                        <div class="notify-thumb">
                                            <img src="assets/images/author/author-img2.jpg" alt="image">
                                        </div>
                                        <div class="notify-text">
                                            <p>Aglae Mayer</p>
                                            <span class="msg">When you can connect with me...</span>
                                            <span>3:15 PM</span>
                                        </div>
                                    </a>
                                    <a href="#" class="notify-item">
                                        <div class="notify-thumb">
                                            <img src="assets/images/author/author-img3.jpg" alt="image">
                                        </div>
                                        <div class="notify-text">
                                            <p>Aglae Mayer</p>
                                            <span class="msg">I missed you so much...</span>
                                            <span>3:15 PM</span>
                                        </div>
                                    </a>
                                    <a href="#" class="notify-item">
                                        <div class="notify-thumb">
                                            <img src="assets/images/author/author-img4.jpg" alt="image">
                                        </div>
                                        <div class="notify-text">
                                            <p>Aglae Mayer</p>
                                            <span class="msg">Your product is completely Ready...</span>
                                            <span>3:15 PM</span>
                                        </div>
                                    </a>
                                    <a href="#" class="notify-item">
                                        <div class="notify-thumb">
                                            <img src="assets/images/author/author-img2.jpg" alt="image">
                                        </div>
                                        <div class="notify-text">
                                            <p>Aglae Mayer</p>
                                            <span class="msg">Hey I am waiting for you...</span>
                                            <span>3:15 PM</span>
                                        </div>
                                    </a>
                                    <a href="#" class="notify-item">
                                        <div class="notify-thumb">
                                            <img src="assets/images/author/author-img1.jpg" alt="image">
                                        </div>
                                        <div class="notify-text">
                                            <p>Aglae Mayer</p>
                                            <span class="msg">Hey I am waiting for you...</span>
                                            <span>3:15 PM</span>
                                        </div>
                                    </a>
                                    <a href="#" class="notify-item">
                                        <div class="notify-thumb">
                                            <img src="assets/images/author/author-img3.jpg" alt="image">
                                        </div>
                                        <div class="notify-text">
                                            <p>Aglae Mayer</p>
                                            <span class="msg">Hey I am waiting for you...</span>
                                            <span>3:15 PM</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="settings-btn">
                            <i class="ti-settings"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- header area end -->
        <!-- page title area start -->
        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">Dashboard</h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="index.php">Home</a></li>
                            <li><span><?php echo $title; ?></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 clearfix">
                    <div class="user-profile pull-right">
                        <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['name'];?> <i class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Message</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <a class="dropdown-item" href="includes/logout.php">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>