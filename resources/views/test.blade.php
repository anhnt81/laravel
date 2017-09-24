<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Quản Lý Hồ Sơ Sinh Viên</title>
        <link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
        <!-- Bootstrap -->
        <link href="QUANLYHOSO/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="QUANLYHOSO/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress --> 
        <link href="QUANLYHOSO/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="QUANLYHOSO/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- bootstrap-progressbar -->
        <link href="QUANLYHOSO/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="QUANLYHOSO/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="QUANLYHOSO/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
        <link href="QUANLYHOSO/build/css/custom.min.css" rel="stylesheet">
    </head>
    <body class="nav-md"> 
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="admin.php" class="site_title"><i class="fa fa-wrench"></i> <span>Manage Admin</span></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="QUANLYHOSO/hssv/images/vu.jpg" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Xin Chào,</span>
                <h2>&nbsp;&nbsp;&nbsp;Admin</h2>
              </div>
            </div>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home</a>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Sản Phẩm <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add-admin.php">Thêm Sản Phẩm</a></li>
                      <li><a href="viewall-admin.php">Danh Sách Sản Phẩm</a></li>
                    </ul> 
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Quản Lý Loại Sản Phẩm <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add-nganh.php">Thêm Loại Sản Phẩm</a></li>
                      <li><a href="viewnganh.php">Xem Các Loại Sản Phẩm</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Quản Lý Đơn Hàng <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add-lop.php">Danh Sách Đơn Hàng</a></li>
                    </ul>
                  </li>
                  <li><a href="index.php"><i class="fa fa-edit"></i> Thoát <!-- <span class="fa fa-chevron-down"></span> --></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
                </div>
        <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                     <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img src="images/vu.jpg" alt="">ADMIN<span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Quay về trang chủ</a></li>
                                <li><a href="javascript:;">Help</a></li>
                                <li><a href="index.php"><i class="fa fa-sign-out pull-right"></i> Thoát</a></li>
                            </ul>
                        </li> 
                    </ul>
                </nav>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
    <!-- jQuery -->
    <script src="QUANLYHOSO/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="QUANLYHOSO/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="QUANLYHOSO/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="QUANLYHOSO/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="QUANLYHOSO/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="QUANLYHOSO/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="QUANLYHOSO/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="QUANLYHOSO/vendors/iCheck/icheck.min.js"></script>
    <script src="QUANLYHOSO/vendors/skycons/skycons.js"></script>
    <script src="QUANLYHOSO/vendors/Flot/jquery.flot.js"></script>
    <script src="QUANLYHOSO/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="QUANLYHOSO/vendors/Flot/jquery.flot.time.js"></script>
    <script src="QUANLYHOSO/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="QUANLYHOSO/vendors/Flot/jquery.flot.resize.js"></script>
    <script src="QUANLYHOSO/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="QUANLYHOSO/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="QUANLYHOSO/vendors/flot.curvedlines/curvedLines.js"></script>
    <script src="QUANLYHOSO/vendors/DateJS/build/date.js"></script>
    <script src="QUANLYHOSO/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="QUANLYHOSO/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="QUANLYHOSO/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="QUANLYHOSO/vendors/moment/min/moment.min.js"></script>
    <script src="QUANLYHOSO/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="QUANLYHOSO/build/js/custom.min.js"></script>
