<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ikhwan Jalil Dashboard</title>
   
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/backend/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link href="<?=base_url('assets/backend/css/font-awesome.min.css');?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url('assets/backend/vendors/nprogress/nprogress.css');?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?=base_url('assets/backend/vendors/iCheck/skins/flat/green.css');?>" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?=base_url('assets/backend/vendors/google-code-prettify/bin/prettify.min.css');?>" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?=base_url('assets/backend/vendors/select2/dist/css/select2.min.css');?>" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?=base_url('assets/backend/vendors/switchery/dist/switchery.min.css');?>" rel="stylesheet">
    <!-- starrr -->
    <link href="<?=base_url('assets/backend/vendors/starrr/dist/starrr.css');?>" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?=base_url('assets/backend/vendors/bootstrap-daterangepicker/daterangepicker.css');?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?=base_url('assets/backend/css/custom.min.css');?>" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Ikhwan Jalil</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url('assets/backend/img/labureke.jpg');?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Labureke Blamss</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>OPERASIONAL</h3>
          <ul class="nav side-menu">
            <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-home"></i> Dashboard </a>
            <li><a href="<?=base_url('dashberita');?>"><i class="fa fa-edit"></i> Berita </a>
            <li><a href="<?=base_url('dashvideo');?>"><i class="fa fa-desktop"></i> Video </a>
            <li><a href="<?=base_url('dashagenda');?>"><i class="fa fa-table"></i> Agenda </a>
            <li><a href="<?=base_url('dashuser');?>"><i class="fa fa-users"></i> User </a>  
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
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        
        <!-- /top navigation -->

        <!-- content -->
        	<div class="right_col" role="main">
    				<div class="">
    					<?php echo $contents;?>
    				</div>
    			</div>
        <!-- /content -->

        <!-- footer content -->
       	<footer>
    			<div class="pull-right">
    				Software as System by <a href="http://friendstech.co.id"> &copy; <span style="color: darkred">Ikhwan Jalil</span></a>
    			</div>
    			<div class="clearfix"></div>
    		</footer>
        <!-- /footer content -->
      </div>
    </div>
    
    <!-- jQuery -->
    <script src="<?=base_url('assets/backend/js/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
    <script src="<?=base_url('assets/backend/js/bootstrap.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/backend/vendors/fastclick/lib/fastclick.js');?>"></script>
    <!-- NProgress -->
    <script src="<?=base_url('assets/backend/vendors/nprogress/nprogress.js');?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?=base_url('assets/backend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js');?>"></script>
    <!-- iCheck -->
    <script src="<?=base_url('assets/backend/vendors/iCheck/icheck.min.js');?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?=base_url('assets/backend/vendors/moment/min/moment.min.js');?>"></script>
    <script src="<?=base_url('assets/backend/vendors/bootstrap-daterangepicker/daterangepicker.js');?>"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?=base_url('assets/backend/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js');?>"></script>
    <script src="<?=base_url('assets/backend/vendors/jquery.hotkeys/jquery.hotkeys.js');?>"></script>
    <script src="<?=base_url('assets/backend/vendors/google-code-prettify/src/prettify.js');?>"></script>
    <!-- jQuery Tags Input -->
    <script src="<?=base_url('assets/backend/vendors/jquery.tagsinput/src/jquery.tagsinput.js');?>"></script>
    <!-- Switchery -->
    <script src="<?=base_url('assets/backend/vendors/switchery/dist/switchery.min.js');?>"></script>
    <!-- Select2 -->
    <script src="<?=base_url('assets/backend/vendors/select2/dist/js/select2.full.min.js');?>"></script>
    <!-- Parsley -->
    <script src="<?=base_url('assets/backend/vendors/parsleyjs/dist/parsley.min.js');?>"></script>
    <!-- Autosize -->
    <script src="<?=base_url('assets/backend/vendors/autosize/dist/autosize.min.js');?>"></script>
    <!-- jQuery autocomplete -->
    <script src="<?=base_url('assets/backend/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js');?>"></script>
    <!-- starrr -->
    <script src="<?=base_url('assets/backend/vendors/starrr/dist/starrr.js');?>"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?=base_url('assets/backend/js/custom.min.js')?>"></script>
	
  </body>
</html>
