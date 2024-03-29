<!doctype html>
<html class="sidebar-light sidebar-left-big-icons">
  <head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <meta charset="UTF-8">
        <title>Integrated Pest Management Services</title>
        <meta name="keywords" content="IPM - ECO Services" />
        <meta name="description" content="IPM - ECO Services">
        <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Web Fonts  -->
    <link href="{{ asset('/public/assets/stylesheets/skins/fonts.css')}}" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('/public/assets/vendor/bootstrap/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{ asset('/public/assets/vendor/font-awesome/css/font-awesome.css')}}" />
    <link rel="stylesheet" href="{{ asset('/public/assets/vendor/magnific-popup/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{ asset('/public/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('/public/assets/vendor/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{ asset('/public/assets/vendor/jquery-ui/jquery-ui.theme.css')}}" />
    <link rel="stylesheet" href="{{ asset('/public/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
    <link rel="stylesheet" href="{{ asset('/public/assets/vendor/morris.js/morris.css')}}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('/public/assets/stylesheets/theme.css')}}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('/public/assets/stylesheets/skins/default.css')}}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/public/assets/stylesheets/theme-custom.css')}}">
      <link rel="stylesheet" href="{{ asset('/public/css/daterangepicker.css')}}">

    <!-- Head Libs -->
    <script src="{{ asset('/public/assets/vendor/modernizr/modernizr.js')}}"></script>

        <script src="{{ asset('/public/js/jquery-1.10.1.min.js')}}"></script>
        <script src="{{ asset('/public/assets/vendor/jquery/jquery.js')}}"></script>

  </head>
  <body>
    <section class="body">

      <!-- start: header -->
      <header class="header">
        <div class="logo-container">
          <a href="../1.7.0" class="logo">
            <img src="{{ asset('/public/assets/images/logo.png')}}" width="75" height="35" alt="Porto Admin" />
          </a>
          <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
          </div>
        </div>
      
        <!-- start: search & user box -->
        <div class="header-right">

          <span class="separator"></span>
      
          <ul class="notifications">
            <li>
              <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                <i class="fa fa-tasks"></i>
                <span class="badge">3</span>
              </a>
      
              <div class="dropdown-menu notification-menu large">
                <div class="notification-title">
                  <span class="pull-right label label-default">3</span>
                  Tasks
                </div>
      
                <div class="content">
                  <ul>
                    <li>
                      <p class="clearfix mb-xs">
                        <span class="message pull-left">Generating Sales Report</span>
                        <span class="message pull-right text-dark">60%</span>
                      </p>
                      <div class="progress progress-xs light">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                      </div>
                    </li>
      
                    <li>
                      <p class="clearfix mb-xs">
                        <span class="message pull-left">Importing Contacts</span>
                        <span class="message pull-right text-dark">98%</span>
                      </p>
                      <div class="progress progress-xs light">
                        <div class="progress-bar" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="width: 98%;"></div>
                      </div>
                    </li>
      
                    <li>
                      <p class="clearfix mb-xs">
                        <span class="message pull-left">Uploading something big</span>
                        <span class="message pull-right text-dark">33%</span>
                      </p>
                      <div class="progress progress-xs light mb-xs">
                        <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;"></div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li>
              <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                <i class="fa fa-envelope"></i>
                <span class="badge">4</span>
              </a>
      
              <div class="dropdown-menu notification-menu">
                <div class="notification-title">
                  <span class="pull-right label label-default">230</span>
                  Messages
                </div>
      
                <div class="content">
                  <ul>
                    <li>
                      <a href="#" class="clearfix">
                        <figure class="image">
                          <img src="{{ asset('/public/assets/images/!sample-user.jpg')}}" alt="Joseph Doe Junior" class="img-circle" />
                        </figure>
                        <span class="title">Joseph Doe</span>
                        <span class="message">Lorem ipsum dolor sit.</span>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="clearfix">
                        <figure class="image">
                          <img src="{{ asset('/public/assets/images/!sample-user.jpg')}}" alt="Joseph Junior" class="img-circle" />
                        </figure>
                        <span class="title">Joseph Junior</span>
                        <span class="message truncate">Truncated message. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam, nec venenatis risus. Vestibulum blandit faucibus est et malesuada. Sed interdum cursus dui nec venenatis. Pellentesque non nisi lobortis, rutrum eros ut, convallis nisi. Sed tellus turpis, dignissim sit amet tristique quis, pretium id est. Sed aliquam diam diam, sit amet faucibus tellus ultricies eu. Aliquam lacinia nibh a metus bibendum, eu commodo eros commodo. Sed commodo molestie elit, a molestie lacus porttitor id. Donec facilisis varius sapien, ac fringilla velit porttitor et. Nam tincidunt gravida dui, sed pharetra odio pharetra nec. Duis consectetur venenatis pharetra. Vestibulum egestas nisi quis elementum elementum.</span>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="clearfix">
                        <figure class="image">
                          <img src="{{ asset('/public/assets/images/!sample-user.jpg')}}" alt="Joe Junior" class="img-circle" />
                        </figure>
                        <span class="title">Joe Junior</span>
                        <span class="message">Lorem ipsum dolor sit.</span>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="clearfix">
                        <figure class="image">
                          <img src="{{ asset('/public/assets/images/!sample-user.jpg')}}" alt="Joseph Junior" class="img-circle" />
                        </figure>
                        <span class="title">Joseph Junior</span>
                        <span class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam.</span>
                      </a>
                    </li>
                  </ul>
      
                  <hr />
      
                  <div class="text-right">
                    <a href="#" class="view-more">View All</a>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                <i class="fa fa-bell"></i>
                <span class="badge">3</span>
              </a>
      
              <div class="dropdown-menu notification-menu">
                <div class="notification-title">
                  <span class="pull-right label label-default">3</span>
                  Alerts
                </div>
      
                <div class="content">
                  <ul>
                    <li>
                      <a href="#" class="clearfix">
                        <div class="image">
                          <i class="fa fa-thumbs-down bg-danger"></i>
                        </div>
                        <span class="title">Server is Down!</span>
                        <span class="message">Just now</span>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="clearfix">
                        <div class="image">
                          <i class="fa fa-lock bg-warning"></i>
                        </div>
                        <span class="title">User Locked</span>
                        <span class="message">15 minutes ago</span>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="clearfix">
                        <div class="image">
                          <i class="fa fa-signal bg-success"></i>
                        </div>
                        <span class="title">Connection Restaured</span>
                        <span class="message">10/10/2016</span>
                      </a>
                    </li>
                  </ul>
      
                  <hr />
      
                  <div class="text-right">
                    <a href="#" class="view-more">View All</a>
                  </div>
                </div>
              </div>
            </li>
          </ul>
      
          <span class="separator"></span>
      
          <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
              <figure class="profile-picture">
                <img src="{{ asset('/public/assets/images/!logged-user.jpg')}}" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg')}}" />
              </figure>
              <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                <span class="name">John Doe Junior</span>
                <span class="role">administrator</span>
              </div>
      
              <i class="fa custom-caret"></i>
            </a>
      
            <div class="dropdown-menu">
              <ul class="list-unstyled">
                <li class="divider"></li>
                <li>
                  <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
                </li>
                <li>
                  <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
                </li>
                <li>
                  <a role="menuitem" tabindex="-1" href="{{url('/Logout')}}"><i class="fa fa-power-off"></i> Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- end: search & user box -->
      </header>
      <!-- end: header -->

      <div class="inner-wrapper">
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">
        
            <div class="sidebar-header">
                <div class="sidebar-title">
                    Navigation
                </div>
                <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
        
            <div class="nano">
                <div class="nano-content">

                    @include('Templates/nav')














                    
        
                    <hr class="separator" />
        
                    <div class="sidebar-widget widget-tasks">
                        <div class="widget-header">
                            <h6>Projects</h6>
                            <div class="widget-toggle">+</div>
                        </div>
                        <div class="widget-content">
                            <ul class="list-unstyled m-none">
                                <li><a href="#">Porto HTML5 Template</a></li>
                                <li><a href="#">Tucson Template</a></li>
                                <li><a href="#">Porto Admin</a></li>
                            </ul>
                        </div>
                    </div>
        
                    <hr class="separator" />
        
                    <div class="sidebar-widget widget-stats">
                        <div class="widget-header">
                            <h6>Company Stats</h6>
                            <div class="widget-toggle">+</div>
                        </div>
                        <div class="widget-content">
                            <ul>
                                <li>
                                    <span class="stats-title">Stat 1</span>
                                    <span class="stats-complete">85%</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                            <span class="sr-only">85% Complete</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="stats-title">Stat 2</span>
                                    <span class="stats-complete">70%</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                            <span class="sr-only">70% Complete</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="stats-title">Stat 3</span>
                                    <span class="stats-complete">2%</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                            <span class="sr-only">2% Complete</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        
                <script>
                    // Maintain Scroll Position
                    if (typeof localStorage !== 'undefined') {
                        if (localStorage.getItem('sidebar-left-position') !== null) {
                            var initialPosition = localStorage.getItem('sidebar-left-position'),
                                sidebarLeft = document.querySelector('#sidebar-left .nano-content');
                            
                            sidebarLeft.scrollTop = initialPosition;
                        }
                    }
                </script>
                
        
            </div>
        
        </aside>
        <!-- end: sidebar -->


          {{--<section role="main" class="content-body">--}}
              {{--<header class="page-header">--}}
                  {{--<h2>Integrated Pest Management</h2>--}}
              {{--</header>--}}
