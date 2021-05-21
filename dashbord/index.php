<?php $title="Dashbord";?>
<?php include "includes/header.php";?>
        <div class="main-content-inner">
            
            
            <?php                          if ($_SESSION['role']=='admin')     { ?>
            
            <div class="row">
                <!-- seo fact area start -->
                <div class="col-lg-8">
                    <div class="row">
                        
                         
                        <div class="col-md-6 mt-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg1">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="ti-thumb-up"></i> Students</div>
                                        <h2><?php echo all_student(); ?></h2>
                                    </div>
                                    <canvas id="seolinechart1" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-md-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg2">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="ti-share"></i> Parents</div>
                                        <h2><?php echo all_parent(); ?></h2>
                                    </div>
                                    <canvas id="seolinechart2" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 mb-lg-0">
                            <div class="card">
                                <div class="seo-fact sbg3">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon">Teachers</div>
                                        <h2><?php echo all_teacher(); ?></h2>
                                        <canvas id="seolinechart3" height="60"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="seo-fact sbg4">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon">Courses</div>
                                        <h2><?php echo all_course(); ?></h2>
                                        <canvas id="seolinechart4" height="60"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- seo fact area end -->
                <!-- Social Campain area start -->
<!--                <div class="col-lg-4 mt-5">-->
<!--                    <div class="card">-->
<!--                        <div class="card-body pb-0">-->
<!--                            <h4 class="header-title">Social ads Campain</h4>-->
<!--                            <div id="socialads" style="height: 245px;"></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- Social Campain area end -->
                <!-- Statistics area start -->
<!--                <div class="col-lg-8 mt-5">-->
<!--                    <div class="card">-->
<!--                        <div class="card-body">-->
<!--                            <h4 class="header-title">User Statistics</h4>-->
<!--                            <div id="user-statistics"></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- Statistics area end -->
                <!-- Advertising area start -->
<!--                <div class="col-lg-4 mt-5">-->
<!--                    <div class="card h-full">-->
<!--                        <div class="card-body">-->
<!--                            <h4 class="header-title">Advertising & Marketing</h4>-->
<!--                            <canvas id="seolinechart8" height="233"></canvas>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- Advertising area end -->
                <!-- sales area start -->

                <!-- sales area end -->
                <!-- timeline area start -->

                <!-- map area end -->
                <!-- testimonial area start -->

            </div>
            
            <?php                }?>
            
            
            
                <?php                          if ($_SESSION['role']=='student')     { ?>
            
            <h2>Welcome to Private International School System </h2>
            
            
            <img src="../images/4.jpg" class="img-fluid" alt="Responsive image">
            
             <?php                } ?>
            
            
            
            
                <?php                          if ($_SESSION['role']=='teacher')     { ?>
            
            <h2>Welcome to Private International School System </h2>
            
            
            <img src="../images/4.jpg" class="img-fluid" alt="Responsive image">
            
             <?php                } ?>
            
            
            
            
            
            
             <?php                          if ($_SESSION['role']=='parent')     { ?>
            
            <h2>Welcome to Private International School System </h2>
            
            
            <img src="../images/4.jpg" class="img-fluid" alt="Responsive image">
            
             <?php                } ?>
            
            
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
       <?php include "includes/footer.php";?>