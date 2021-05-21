<?php
include "includes/db.php";
?>
<?php
if(isset($_POST['submit']))
{
    $user = $_POST['exampleInputEmail1'];
    $pass = $_POST['exampleInputPassword1'];
    if (empty($user) or empty($pass))
    {
        header('location: login.php?s=0');

    }


    
    
    

else {
    $query = "select * from parent where p_id = $user AND password = $pass ";

    $query1 = "select * from teacher where t_id = $user AND password = $pass ";

    $query2 = "select * from student where s_id = $user AND password = $pass ";

    $result = mysqli_query($con,$query);

    $result1 = mysqli_query($con,$query1);

    $result2 = mysqli_query($con,$query2);

    $q = mysqli_fetch_assoc($result);

    $q1 = mysqli_fetch_assoc($result1);

    $q2 = mysqli_fetch_assoc($result2);

    //parent

    if($q['status'] == "parent"){



        if(mysqli_num_rows($result))
        {
            session_start();
            $_SESSION['parent_id'] = $q['p_id'];
            $_SESSION['role'] = $q['status'];
            $_SESSION['name'] = $q['p_name'];
            header('location: index.php');
            exit();
        }
        else
        {
            header('location: login.php?s=0');
            exit();

        }}


    //teacher

    if($q1['status'] == "teacher"){



        if(mysqli_num_rows($result1))
        {
            session_start();
            $_SESSION['teacher_id'] = $q1['t_id'];
            $_SESSION['role'] = $q1['status'];
            $_SESSION['name'] = $q1['t_name'];
            header('location: index.php');
            exit();
        }
        else
        {
            header('location: login.php?s=1');
            exit();

        }}



    //teacher

    if($q1['status'] == "admin"){



        if(mysqli_num_rows($result1))
        {
            session_start();
            $id = $q['t_id'];
            $_SESSION['teacher_id'] = $q1['t_id'];
            $_SESSION['role'] = $q1['status'];
            $_SESSION['name'] = $q1['t_name'];
            header('location: index.php');
            exit();
        }

        else {
            header('location: login.php?s=1');
            exit();
        }}




    //student

    if($q2['status'] == "student"){



        if(mysqli_num_rows($result2))
        {
            session_start();
            $_SESSION['student_id'] = $q2['s_id'];
            $_SESSION['class'] = $q2['class'];
            $_SESSION['role'] = $q2['status'];
            $_SESSION['name'] = $q2['s_name'];
            header('location: index.php');
            exit();
        }
        else
        {
            header('location: login.php?s=1');
            exit();

        }}


}}

?>





<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login </title>
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="../css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="../style.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<div class="container-fluid">
    <header class="site-header">
        <div class="row align-items-center">
            <div class="col-4 col-sm-4 col-lg-2 order-lg-1">
                <div class="site-branding">
                    <h1 style="color: #2b2e31" class="site-title">School</h1>
                </div><!-- .site-branding -->
            </div><!-- .col-8 -->

            <div class="col-8 col-sm-8 col-lg-10 order-3 order-md-3 order-lg-2">
                <nav class="site-navigation flex align-items-center justify-content-end">
                    <div class="hamburger-menu d-lg-none order-2">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div><!-- .hamburger-menu -->

                    <ul>
                        <li class="current-menu-item"><a href="../index.php">Home</a></li>
                        <li><a href="login.php">Login</a></li>
<!--                        <li><a href="register_student.php">Register as Student</a></li>-->
<!--                        <li><a href="blog.html">Register as Parent</a></li>-->
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">About</a></li>

                    </ul>


                </nav><!-- .site-navigation -->
            </div><!-- .col-2 -->
        </div><!-- .row -->
    </header><!-- .site-header -->
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->
<!-- login area start -->
<div class="login-area login-s2">
    <div class="container">
        <div class="login-box ptb--100">

            <form name="sample" action="login.php" method="post">
                <div class="login-form-head">
                    <h4>Sign In</h4>
                    <p>Hello there, Sign in and start managing your Account</p>
                    <?php if (isset($_GET['s']) and $_GET["s"]==0){ ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Wrong!</strong> Please Fill all fields.
                        </div>
                    <?php } else if (isset($_GET['s']) and $_GET["s"]==1){?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Wrong!</strong> You ID or password wrong.
                        </div>
                    <?php } ?>
                </div>
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="exampleInputEmail1">ID</label>
                        <input type="text" id="exampleInputEmail1" name="exampleInputEmail1">
                        <i class="ti-email"></i>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" id="exampleInputPassword1" name="exampleInputPassword1">
                        <i class="ti-lock"></i>
                    </div>
                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <a href="#">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="submit-btn-area">
                        <button name="submit" id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                    </div>
<!--                    <div class="form-footer text-center mt-5">-->
<!--                        <p class="text-muted">Don't have an account? <a href="register.html">Sign up</a></p>-->
<!--                    </div>-->
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->

<!-- jquery latest version -->
<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>

<!-- others plugins -->
<script src="assets/js/plugins.js"></script>
<script src="assets/js/scripts.js"></script>
</body>

</html>