<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Survey App</title>
    <link rel="apple-touch-icon" sizes="60x60" href="/app-assets/images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/app-assets/images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/app-assets/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/app-assets/images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="/app-assets/images/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="/app-assets/fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-gradient.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <!-- END Custom CSS-->

    <script src="/js/knockout-debug.js"></script>
    <script src="/js/survey.ko.js"></script>
    <script src="/js/surveyeditor.js"></script>

    <link rel="stylesheet" href="/css/survey.css" />
    <link rel="stylesheet" href="/css/surveyeditor.css" />
    <link rel="stylesheet" href="/css/index.css" />
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item">
              <a href="index.html" class="navbar-brand nav-link">
                <img alt="branding logo" 
                src="/app-assets/images/logo/logo.png" 
                data-expand="/app-assets/images/logo/logo.png" 
                data-collapse="/app-assets/images/logo/logo-small.png" 
                class="brand-logo">
              </a>
               <!-- <a href="/" class="navbar-brand nav-link">
                <h1>Survey App</h1>
              </a> -->
            </li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
              <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">
              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="/app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span><span class="user-name"> @guest @else {{ Auth::user()->name }} @endif</span></a>
                  <div class="dropdown-menu dropdown-menu-right">
                    @guest
                      <a href="{{ route('login') }}" class="dropdown-item">
                        <i class="icon-head"></i> 
                        Login
                      </a>
                      <a href="{{ route('register') }}" class="dropdown-item">
                        <i class="icon-head"></i> 
                        Register
                      </a>
                    @else
                      <a href="#" class="dropdown-item">
                        <i class="icon-head"></i> 
                        Edit Profile
                      </a>
                      <div class="dropdown-divider"></div><a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-power3"></i> Logout </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    @endif
                  </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <div class="main-menu-header">
        <input type="text" placeholder="Search" class="menu-search form-control round"/>
      </div>
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <li class=" nav-item"><a href="/dashboard"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span></a>
            <!-- <ul class="menu-content">
              <li ><a href="/survey" data-i18n="nav.dash.main" class="menu-item">Survey lists</a>
              </li>
              <li><a href="/create/question" data-i18n="nav.dash.main" class="menu-item">Create questions</a>
              </li>
            </ul> -->
          </li>


          <li class=" nav-item"><a href="#"><i class="icon-paper"></i><span data-i18n="nav.survey.main" class="menu-title">Survey</span></a>
            <ul class="menu-content">
              <li><a href="/create/question" data-i18n="nav.survey.create" class="menu-item">Create Survey</a></li>
              <li><a href="/survey/results" data-i18n="nav.survey.create" class="menu-item">Survey Results</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            @yield('content')
        </div>
      </div>
    </div>


    <!-- BEGIN VENDOR JS-->
    <script src="/app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="/app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
    <script src="/app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="/app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="/app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="/app-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
    <script src="/js/editor.js"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>
