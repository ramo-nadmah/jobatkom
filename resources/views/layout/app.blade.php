
<!doctype html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Jobatkom</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/colors/blue.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header Container
    ================================================== -->
    <header id="header-container" class="fullwidth">

        <!-- Header -->
        <div id="header">
            <div class="container">

                <!-- Left Side Content -->
                <div class="left-side">

                    <!-- Logo -->
                    <div id="logo">
                        <a href="/"><img src="/images/logo.png" alt="site logo"  style="height:199px;width:199px;"></a>
                    </div>

                    <!-- Main Navigation -->
                    <nav id="navigation">
                        <ul id="responsive">

                            <li><a href="/" class="current">Home</a>

                            </li>

                            <li><a href="#">Glance</a>
                                <ul class="dropdown-nav">
                                    <li><a href="/browse-jobs">Browse Jobs</a></li>
                                    <li><a href="/browse-tasks">Browse Tasks</a></li>
                                    <li><a href="/browse-freelancers">Browse Freelancers</a></li>
                                    <li><a href="/browse-employers">Browse Companies</a></li>


                                </ul>
                            </li>
                            @if (Auth::check())
                                @if(Auth::user()->type == 'employer')
                                    <li><a href="#">Privileges</a>
                                        <ul class="dropdown-nav">

                                            <li><a href="/post-job">Post a Job</a></li>
                                            <li><a href="/post-task">Post a Task</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="#">Dashboard</a>
                                        <ul class="dropdown-nav">
                                            <li><a href="/employer-info">Settings</a></li>
                                            <li><a href="/manage-jobs">Manage Jobs</a></li>
                                            <li><a href="/manage-tasks">Manage Tasks</a></li>

                                        </ul>
                                    </li>

                                    {{--<li><a href="#">Pages</a>
                                        <ul class="dropdown-nav">
                                            <li><a href="pages-blog.html">Blog</a></li>
                                            <li><a href="pages-pricing-plans.html">Pricing Plans</a></li>
                                            <li><a href="pages-checkout-page.html">Checkout Page</a></li>
                                            <li><a href="pages-invoice-template.html">Invoice Template</a></li>
                                            <li><a href="pages-user-interface-elements.html">User Interface Elements</a></li>
                                            <li><a href="pages-icons-cheatsheet.html">Icons Cheatsheet</a></li>
                                            <li><a href="pages-login.html">Login & Register</a></li>
                                            <li><a href="pages-404.html">404 Page</a></li>
                                            <li><a href="pages-contact.html">Contact</a></li>
                                        </ul>
                                    </li>--}}
                                @elseif(Auth::user()->type == 'freelancer')


                                    <li><a href="#">Dashboard</a>
                                        <ul class="dropdown-nav">
                                            <li><a href="/freelancer-info">Settings</a></li>
                                            <li><a href="/freelancer-bids">Manage Task Bids</a></li>
                                            <li><a href="/freelancer-applications">Manage Job Applications</a></li>

                                        </ul>
                                    </li>
                                @endif
                            @endif
                            <li><a href="/contact" >Contact US</a>

                        </ul>
                    </nav>
                    <div class="clearfix"></div>
                    <!-- Main Navigation / End -->

                </div>
                <!-- Left Side Content / End -->
                @if(Auth::check())
                    @if(Auth::user()->type =="freelancer" && App\Freelancer::where('user_id',Auth::user()->id)->count())
                    <!-- Right Side Content / End -->
                    <div class="right-side">

    {{--                    <!--  User Notifications -->--}}
    {{--                    <div class="header-widget hide-on-mobile">--}}

    {{--                        <!-- Notifications -->--}}
    {{--                        <div class="header-notifications">--}}

    {{--                            <!-- Trigger -->--}}
    {{--                            <div class="header-notifications-trigger">--}}
    {{--                                <a href="#"><i class="icon-feather-bell"></i><span>4</span></a>--}}
    {{--                            </div>--}}

    {{--                            <!-- Dropdown -->--}}
    {{--                            <div class="header-notifications-dropdown">--}}

    {{--                                <div class="header-notifications-headline">--}}
    {{--                                    <h4>Notifications</h4>--}}
    {{--                                    <button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">--}}
    {{--                                        <i class="icon-feather-check-square"></i>--}}
    {{--                                    </button>--}}
    {{--                                </div>--}}

    {{--                                <div class="header-notifications-content">--}}
    {{--                                    <div class="header-notifications-scroll" data-simplebar>--}}
    {{--                                        <ul>--}}
    {{--                                            <!-- Notification -->--}}
    {{--                                            <li class="notifications-not-read">--}}
    {{--                                                <a href="dashboard-manage-candidates.html">--}}
    {{--                                                    <span class="notification-icon"><i class="icon-material-outline-group"></i></span>--}}
    {{--                                                    <span class="notification-text">--}}
    {{--													<strong>Michael Shannah</strong> applied for a job <span class="color">Full Stack Software Engineer</span>--}}
    {{--												</span>--}}
    {{--                                                </a>--}}
    {{--                                            </li>--}}

    {{--                                            <!-- Notification -->--}}
    {{--                                            <li>--}}
    {{--                                                <a href="dashboard-manage-bidders.html">--}}
    {{--                                                    <span class="notification-icon"><i class=" icon-material-outline-gavel"></i></span>--}}
    {{--                                                    <span class="notification-text">--}}
    {{--													<strong>Gilbert Allanis</strong> placed a bid on your <span class="color">iOS App Development</span> project--}}
    {{--												</span>--}}
    {{--                                                </a>--}}
    {{--                                            </li>--}}

    {{--                                            <!-- Notification -->--}}
    {{--                                            <li>--}}
    {{--                                                <a href="dashboard-manage-jobs.html">--}}
    {{--                                                    <span class="notification-icon"><i class="icon-material-outline-autorenew"></i></span>--}}
    {{--                                                    <span class="notification-text">--}}
    {{--													Your job listing <span class="color">Full Stack PHP Developer</span> is expiring.--}}
    {{--												</span>--}}
    {{--                                                </a>--}}
    {{--                                            </li>--}}

    {{--                                            <!-- Notification -->--}}
    {{--                                            <li>--}}
    {{--                                                <a href="dashboard-manage-candidates.html">--}}
    {{--                                                    <span class="notification-icon"><i class="icon-material-outline-group"></i></span>--}}
    {{--                                                    <span class="notification-text">--}}
    {{--													<strong>Sindy Forrest</strong> applied for a job <span class="color">Full Stack Software Engineer</span>--}}
    {{--												</span>--}}
    {{--                                                </a>--}}
    {{--                                            </li>--}}
    {{--                                        </ul>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}

    {{--                            </div>--}}

    {{--                        </div>--}}

    {{--                        <!-- Messages -->--}}
    {{--                        <div class="header-notifications">--}}
    {{--                            <div class="header-notifications-trigger">--}}
    {{--                                <a href="#"><i class="icon-feather-mail"></i><span>3</span></a>--}}
    {{--                            </div>--}}

    {{--                            <!-- Dropdown -->--}}
    {{--                            <div class="header-notifications-dropdown">--}}

    {{--                                <div class="header-notifications-headline">--}}
    {{--                                    <h4>Messages</h4>--}}
    {{--                                    <button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">--}}
    {{--                                        <i class="icon-feather-check-square"></i>--}}
    {{--                                    </button>--}}
    {{--                                </div>--}}

    {{--                                <div class="header-notifications-content">--}}
    {{--                                    <div class="header-notifications-scroll" data-simplebar>--}}
    {{--                                        <ul>--}}
    {{--                                            <!-- Notification -->--}}
    {{--                                            <li class="notifications-not-read">--}}
    {{--                                                <a href="dashboard-messages.html">--}}
    {{--                                                    <span class="notification-avatar status-online"><img src="/images/user-avatar-small-03.jpg" alt=""></span>--}}
    {{--                                                    <div class="notification-text">--}}
    {{--                                                        <strong>David Peterson</strong>--}}
    {{--                                                        <p class="notification-msg-text">Thanks for reaching out. I'm quite busy right now on many...</p>--}}
    {{--                                                        <span class="color">4 hours ago</span>--}}
    {{--                                                    </div>--}}
    {{--                                                </a>--}}
    {{--                                            </li>--}}

    {{--                                            <!-- Notification -->--}}
    {{--                                            <li class="notifications-not-read">--}}
    {{--                                                <a href="dashboard-messages.html">--}}
    {{--                                                    <span class="notification-avatar status-offline"><img src="/images/user-avatar-small-02.jpg" alt=""></span>--}}
    {{--                                                    <div class="notification-text">--}}
    {{--                                                        <strong>Sindy Forest</strong>--}}
    {{--                                                        <p class="notification-msg-text">Hi Tom! Hate to break it to you, but I'm actually on vacation until...</p>--}}
    {{--                                                        <span class="color">Yesterday</span>--}}
    {{--                                                    </div>--}}
    {{--                                                </a>--}}
    {{--                                            </li>--}}

    {{--                                            <!-- Notification -->--}}
    {{--                                            <li class="notifications-not-read">--}}
    {{--                                                <a href="dashboard-messages.html">--}}
    {{--                                                    <span class="notification-avatar status-online"><img src="/images/user-avatar-placeholder.png" alt=""></span>--}}
    {{--                                                    <div class="notification-text">--}}
    {{--                                                        <strong>Marcin Kowalski</strong>--}}
    {{--                                                        <p class="notification-msg-text">I received payment. Thanks for cooperation!</p>--}}
    {{--                                                        <span class="color">Yesterday</span>--}}
    {{--                                                    </div>--}}
    {{--                                                </a>--}}
    {{--                                            </li>--}}
    {{--                                        </ul>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}

    {{--                                <a href="dashboard-messages.html" class="header-notifications-button ripple-effect button-sliding-icon">View All Messages<i class="icon-material-outline-arrow-right-alt"></i></a>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                    </div>--}}
    {{--                    <!--  User Notifications / End -->--}}

                        <!-- User Menu -->
                        <div class="header-widget">

                            <!-- Messages -->
                            <div class="header-notifications user-menu">
                                <div class="header-notifications-trigger">
                                    <a href="/freelancer-info" ><div class="user-avatar status-online"><img src="{{Auth::user()->freelancers[0]->logo}}" alt="freelancer logo"></div></a>
                                </div>

                                <!-- Dropdown -->
                                <div class="header-notifications-dropdown">

                                    <!-- User Status -->
                                    <div class="user-status">

                                        <!-- User Name / Avatar -->
                                        <div class="user-details">
                                            <div class="user-avatar status-online"><img src="{{Auth::user()->freelancers[0]->logo}}" alt="freelancer logo"></div>
                                            <div class="user-name">
                                                {{Auth::user()->freelancers[0]->first_name}} {{Auth::user()->freelancers[0]->last_name}} <span>Freelancer</span>
                                            </div>
                                        </div>


                                    </div>

                                    <ul class="user-menu-small-nav">
                                        <li><a href="/freelancer-bids"><i class="icon-material-outline-dashboard"></i> Task Bids</a></li>
                                        <li><a href="/freelancer-applications"><i class="icon-material-outline-dashboard"></i>Job Applications</a></li>

                                        <li><a href="/freelancer-info"><i class="icon-material-outline-settings"></i> Settings</a></li>
                                        <li><a href="/logout"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
                                    </ul>

                                </div>
                            </div>

                        </div>
                        <!-- User Menu / End -->

                        <!-- Mobile Navigation Button -->
                        <span class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </span>

                    </div>
                    <!-- Right Side Content / End -->
                    @elseif(Auth::user()->type =="employer" && App\Employer::where('user_id',Auth::user()->id)->count())

                        <!-- Right Side Content / End -->
                            <div class="right-side">

                            {{--                    <!--  User Notifications -->--}}
                            {{--                    <div class="header-widget hide-on-mobile">--}}

                            {{--                        <!-- Notifications -->--}}
                            {{--                        <div class="header-notifications">--}}

                            {{--                            <!-- Trigger -->--}}
                            {{--                            <div class="header-notifications-trigger">--}}
                            {{--                                <a href="#"><i class="icon-feather-bell"></i><span>4</span></a>--}}
                            {{--                            </div>--}}

                            {{--                            <!-- Dropdown -->--}}
                            {{--                            <div class="header-notifications-dropdown">--}}

                            {{--                                <div class="header-notifications-headline">--}}
                            {{--                                    <h4>Notifications</h4>--}}
                            {{--                                    <button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">--}}
                            {{--                                        <i class="icon-feather-check-square"></i>--}}
                            {{--                                    </button>--}}
                            {{--                                </div>--}}

                            {{--                                <div class="header-notifications-content">--}}
                            {{--                                    <div class="header-notifications-scroll" data-simplebar>--}}
                            {{--                                        <ul>--}}
                            {{--                                            <!-- Notification -->--}}
                            {{--                                            <li class="notifications-not-read">--}}
                            {{--                                                <a href="dashboard-manage-candidates.html">--}}
                            {{--                                                    <span class="notification-icon"><i class="icon-material-outline-group"></i></span>--}}
                            {{--                                                    <span class="notification-text">--}}
                            {{--													<strong>Michael Shannah</strong> applied for a job <span class="color">Full Stack Software Engineer</span>--}}
                            {{--												</span>--}}
                            {{--                                                </a>--}}
                            {{--                                            </li>--}}

                            {{--                                            <!-- Notification -->--}}
                            {{--                                            <li>--}}
                            {{--                                                <a href="dashboard-manage-bidders.html">--}}
                            {{--                                                    <span class="notification-icon"><i class=" icon-material-outline-gavel"></i></span>--}}
                            {{--                                                    <span class="notification-text">--}}
                            {{--													<strong>Gilbert Allanis</strong> placed a bid on your <span class="color">iOS App Development</span> project--}}
                            {{--												</span>--}}
                            {{--                                                </a>--}}
                            {{--                                            </li>--}}

                            {{--                                            <!-- Notification -->--}}
                            {{--                                            <li>--}}
                            {{--                                                <a href="dashboard-manage-jobs.html">--}}
                            {{--                                                    <span class="notification-icon"><i class="icon-material-outline-autorenew"></i></span>--}}
                            {{--                                                    <span class="notification-text">--}}
                            {{--													Your job listing <span class="color">Full Stack PHP Developer</span> is expiring.--}}
                            {{--												</span>--}}
                            {{--                                                </a>--}}
                            {{--                                            </li>--}}

                            {{--                                            <!-- Notification -->--}}
                            {{--                                            <li>--}}
                            {{--                                                <a href="dashboard-manage-candidates.html">--}}
                            {{--                                                    <span class="notification-icon"><i class="icon-material-outline-group"></i></span>--}}
                            {{--                                                    <span class="notification-text">--}}
                            {{--													<strong>Sindy Forrest</strong> applied for a job <span class="color">Full Stack Software Engineer</span>--}}
                            {{--												</span>--}}
                            {{--                                                </a>--}}
                            {{--                                            </li>--}}
                            {{--                                        </ul>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}

                            {{--                            </div>--}}

                            {{--                        </div>--}}

                            {{--                        <!-- Messages -->--}}
                            {{--                        <div class="header-notifications">--}}
                            {{--                            <div class="header-notifications-trigger">--}}
                            {{--                                <a href="#"><i class="icon-feather-mail"></i><span>3</span></a>--}}
                            {{--                            </div>--}}

                            {{--                            <!-- Dropdown -->--}}
                            {{--                            <div class="header-notifications-dropdown">--}}

                            {{--                                <div class="header-notifications-headline">--}}
                            {{--                                    <h4>Messages</h4>--}}
                            {{--                                    <button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">--}}
                            {{--                                        <i class="icon-feather-check-square"></i>--}}
                            {{--                                    </button>--}}
                            {{--                                </div>--}}

                            {{--                                <div class="header-notifications-content">--}}
                            {{--                                    <div class="header-notifications-scroll" data-simplebar>--}}
                            {{--                                        <ul>--}}
                            {{--                                            <!-- Notification -->--}}
                            {{--                                            <li class="notifications-not-read">--}}
                            {{--                                                <a href="dashboard-messages.html">--}}
                            {{--                                                    <span class="notification-avatar status-online"><img src="/images/user-avatar-small-03.jpg" alt=""></span>--}}
                            {{--                                                    <div class="notification-text">--}}
                            {{--                                                        <strong>David Peterson</strong>--}}
                            {{--                                                        <p class="notification-msg-text">Thanks for reaching out. I'm quite busy right now on many...</p>--}}
                            {{--                                                        <span class="color">4 hours ago</span>--}}
                            {{--                                                    </div>--}}
                            {{--                                                </a>--}}
                            {{--                                            </li>--}}

                            {{--                                            <!-- Notification -->--}}
                            {{--                                            <li class="notifications-not-read">--}}
                            {{--                                                <a href="dashboard-messages.html">--}}
                            {{--                                                    <span class="notification-avatar status-offline"><img src="/images/user-avatar-small-02.jpg" alt=""></span>--}}
                            {{--                                                    <div class="notification-text">--}}
                            {{--                                                        <strong>Sindy Forest</strong>--}}
                            {{--                                                        <p class="notification-msg-text">Hi Tom! Hate to break it to you, but I'm actually on vacation until...</p>--}}
                            {{--                                                        <span class="color">Yesterday</span>--}}
                            {{--                                                    </div>--}}
                            {{--                                                </a>--}}
                            {{--                                            </li>--}}

                            {{--                                            <!-- Notification -->--}}
                            {{--                                            <li class="notifications-not-read">--}}
                            {{--                                                <a href="dashboard-messages.html">--}}
                            {{--                                                    <span class="notification-avatar status-online"><img src="/images/user-avatar-placeholder.png" alt=""></span>--}}
                            {{--                                                    <div class="notification-text">--}}
                            {{--                                                        <strong>Marcin Kowalski</strong>--}}
                            {{--                                                        <p class="notification-msg-text">I received payment. Thanks for cooperation!</p>--}}
                            {{--                                                        <span class="color">Yesterday</span>--}}
                            {{--                                                    </div>--}}
                            {{--                                                </a>--}}
                            {{--                                            </li>--}}
                            {{--                                        </ul>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}

                            {{--                                <a href="dashboard-messages.html" class="header-notifications-button ripple-effect button-sliding-icon">View All Messages<i class="icon-material-outline-arrow-right-alt"></i></a>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}

                            {{--                    </div>--}}
                            {{--                    <!--  User Notifications / End -->--}}

                            <!-- User Menu -->
                                <div class="header-widget">

                                    <!-- Messages -->
                                    <div class="header-notifications user-menu">
                                        <div class="header-notifications-trigger">
                                            <a href="/employer-info"><div class="user-avatar status-online"><img src="{{Auth::user()->employers[0]->logo}}" alt="employer logo"></div></a>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="header-notifications-dropdown">

                                            <!-- User Status -->
                                            <div class="user-status">

                                                <!-- User Name / Avatar -->
                                                <div class="user-details">
                                                    <div class="user-avatar status-online "><img src="{{Auth::user()->employers[0]->logo}}" alt="employers logo"></div>
                                                    <div class="user-name">
                                                        {{Auth::user()->employers[0]->first_name}} {{Auth::user()->employers[0]->last_name}} <span>Employer</span>
                                                    </div>
                                                </div>

                                                <!-- User Status Switcher -->

                                            </div>

                                            <ul class="user-menu-small-nav">
                                                <li><a href="/post-task"><i class="icon-material-outline-dashboard"></i> Post a task</a></li>
                                                <li><a href="/post-job"><i class="icon-material-outline-dashboard"></i> Post a job</a></li>

                                                <li><a href="/employer-info"><i class="icon-material-outline-settings"></i> Settings</a></li>
                                                <li><a href="/logout"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
                                            </ul>

                                        </div>
                                    </div>

                                </div>
                                <!-- User Menu / End -->

                                <!-- Mobile Navigation Button -->
                                <span class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </span>

                            </div>
                            <!-- Right Side Content / End -->
                    @endif
                @else
                    <!-- Right Side Content / End -->
                    <div class="right-side">

                        <div class="header-widget">
                            <a href="/login" class=" log-in-button"><i class="icon-feather-log-in"></i> <span>Log In </span></a>
                        </div>

                        <div class="header-widget">
                            <a href="/register" class=" log-in-button"><i class="icon-line-awesome-key"></i> <span>Register </span></a>
                        </div>

                        <!-- Mobile Navigation Button -->
                        <span class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </span>
                    </div>
                    <!-- Right Side Content / End -->
                @endif
            </div>
        </div>
        <!-- Header / End -->

    </header>
    <div class="clearfix"></div>
    <!-- Header Container / End -->






    @yield('content')









    <div id="footer">

        <!-- Footer Top Section -->
        <div class="footer-top-section left-side">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">

                        <!-- Footer Rows Container -->
                        <div class="footer-rows-container">

                            <!-- Left Side -->
                            <div class="footer-rows-left">
                                <div class="footer-row">
                                    <div class="footer-row-inner footer-logo">
                                        <img src="/images/logo2.png" alt="site logo" style="height:199px;width:199px;margin-top: -8vh;">
                                    </div>
                                </div>
                            </div>

                            <!-- Right Side -->
                            <div class="footer-rows-right">

                                <!-- Social Icons -->
                                <div class="footer-row">
                                    <div class="footer-row-inner">
                                        <ul class="footer-social-links">
                                            <li>
                                                <a href="#" title="Facebook" data-tippy-placement="bottom" data-tippy-theme="light">
                                                    <i class="icon-brand-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Twitter" data-tippy-placement="bottom" data-tippy-theme="light">
                                                    <i class="icon-brand-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Google Plus" data-tippy-placement="bottom" data-tippy-theme="light">
                                                    <i class="icon-brand-google-plus-g"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="LinkedIn" data-tippy-placement="bottom" data-tippy-theme="light">
                                                    <i class="icon-brand-linkedin-in"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <!-- Footer Rows Container / End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Top Section / End -->

        <!-- Footer Middle Section -->
        <div class="footer-middle-section">
            <div class="container">
                <div class="row">

                    <!-- Links -->
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="footer-links">
                            <h3>For Candidates</h3>
                            <ul>
                                <li><a href="#"><span>Browse Jobs</span></a></li>
                                <li><a href="#"><span>Add Resume</span></a></li>
                                <li><a href="#"><span>Job Alerts</span></a></li>
                                <li><a href="#"><span>My Bookmarks</span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Links -->
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="footer-links">
                            <h3>For Employers</h3>
                            <ul>
                                <li><a href="#"><span>Browse Candidates</span></a></li>
                                <li><a href="#"><span>Post a Job</span></a></li>
                                <li><a href="#"><span>Post a Task</span></a></li>
                                <li><a href="#"><span>Plans & Pricing</span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Links -->
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="footer-links">
                            <h3>Helpful Links</h3>
                            <ul>
                                <li><a href="#"><span>Contact</span></a></li>
                                <li><a href="#"><span>Privacy Policy</span></a></li>
                                <li><a href="#"><span>Terms of Use</span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Links -->
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="footer-links">
                            <h3>Account</h3>
                            <ul>
                                <li><a href="#"><span>Log In</span></a></li>
                                <li><a href="#"><span>My Account</span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Newsletter -->
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <h3><i class="icon-feather-mail"></i> Sign Up For a Newsletter</h3>
                        <p>Weekly breaking news, analysis and cutting edge advices on job searching.</p>
                        <form action="#" method="get" class="newsletter">
                            <input type="text" name="fname" placeholder="Enter your email address">
                            <button type="submit"><i class="icon-feather-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Middle Section / End -->

        <!-- Footer Copyrights -->
        <div class="footer-bottom-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        © 2020 <strong>Jobatkom</strong>. All Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Copyrights / End -->

    </div>
    <!-- Footer / End -->

</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/jquery-migrate-3.0.0.min.js"></script>
<script src="/js/mmenu.min.js"></script>
<script src="/js/tippy.all.min.js"></script>
<script src="/js/simplebar.min.js"></script>
<script src="/js/bootstrap-slider.min.js"></script>
<script src="/js/bootstrap-select.min.js"></script>
<script src="/js/snackbar.js"></script>
<script src="/js/clipboard.min.js"></script>
<script src="/js/counterup.min.js"></script>
<script src="/js/magnific-popup.min.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/custom.js"></script>

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
    // Snackbar for user status switcher
    $('#snackbar-user-status label').click(function() {
        Snackbar.show({
            text: 'Your status has been changed!',
            pos: 'bottom-center',
            showAction: false,
            actionText: "Dismiss",
            duration: 3000,
            textColor: '#fff',
            backgroundColor: '#383838'
        });
    });
</script>


<!-- Google Autocomplete -->
<script>
    function initAutocomplete() {
        var options = {
            types: ['(cities)'],
            // componentRestrictions: {country: "us"}
        };

        var input = document.getElementById('autocomplete-input');
        var autocomplete = new google.maps.places.Autocomplete(input, options);
    }

    // Autocomplete adjustment for homepage
    if ($('.intro-banner-search-form')[0]) {
        setTimeout(function(){
            $(".pac-container").prependTo(".intro-search-field.with-autocomplete");
        }, 300);
    }

</script>

<!-- Google API -->
@yield("scripts")
</body>
</html>
