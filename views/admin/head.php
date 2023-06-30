<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - WebSurvey</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/public/assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Template Main CSS File -->
    <link href="/public/assets/css/style.css" rel="stylesheet">


</head>

<body>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
<!--            <img src="public/assets/img/logo.png" alt="">-->
            <span class="d-none d-lg-block">WebSurvey</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

<!--    <div class="search-bar">-->
<!--        <form class="search-form d-flex align-items-center" method="POST" action="#">-->
<!--            <input type="text" name="query" placeholder="Search" title="Enter search keyword">-->
<!--            <button type="submit" title="Search"><i class="bi bi-search"></i></button>-->
<!--        </form>-->
<!--    </div>-->
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

<!--            <li class="nav-item dropdown">-->
<!---->
<!--                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">-->
<!--                    <i class="bi bi-bell"></i>-->
<!--                    <span class="badge bg-primary badge-number">4</span>-->
<!--                </a>-->
<!---->
<!--                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">-->
<!--                    <li class="dropdown-header">-->
<!--                        You have 4 new notifications-->
<!--                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <hr class="dropdown-divider">-->
<!--                    </li>-->
<!---->
<!--                    <li class="notification-item">-->
<!--                        <i class="bi bi-exclamation-circle text-warning"></i>-->
<!--                        <div>-->
<!--                            <h4>Lorem Ipsum</h4>-->
<!--                            <p>Quae dolorem earum veritatis oditseno</p>-->
<!--                            <p>30 min. ago</p>-->
<!--                        </div>-->
<!--                    </li>-->
<!---->
<!--                    <li>-->
<!--                        <hr class="dropdown-divider">-->
<!--                    </li>-->
<!---->
<!--                    <li class="notification-item">-->
<!--                        <i class="bi bi-x-circle text-danger"></i>-->
<!--                        <div>-->
<!--                            <h4>Atque rerum nesciunt</h4>-->
<!--                            <p>Quae dolorem earum veritatis oditseno</p>-->
<!--                            <p>1 hr. ago</p>-->
<!--                        </div>-->
<!--                    </li>-->
<!---->
<!--                    <li>-->
<!--                        <hr class="dropdown-divider">-->
<!--                    </li>-->
<!---->
<!--                    <li class="notification-item">-->
<!--                        <i class="bi bi-check-circle text-success"></i>-->
<!--                        <div>-->
<!--                            <h4>Sit rerum fuga</h4>-->
<!--                            <p>Quae dolorem earum veritatis oditseno</p>-->
<!--                            <p>2 hrs. ago</p>-->
<!--                        </div>-->
<!--                    </li>-->
<!---->
<!--                    <li>-->
<!--                        <hr class="dropdown-divider">-->
<!--                    </li>-->
<!---->
<!--                    <li class="notification-item">-->
<!--                        <i class="bi bi-info-circle text-primary"></i>-->
<!--                        <div>-->
<!--                            <h4>Dicta reprehenderit</h4>-->
<!--                            <p>Quae dolorem earum veritatis oditseno</p>-->
<!--                            <p>4 hrs. ago</p>-->
<!--                        </div>-->
<!--                    </li>-->
<!---->
<!--                    <li>-->
<!--                        <hr class="dropdown-divider">-->
<!--                    </li>-->
<!--                    <li class="dropdown-footer">-->
<!--                        <a href="#">Show all notifications</a>-->
<!--                    </li>-->
<!---->
<!--                </ul>-->
<!---->
<!--            </li>-->

<!--            <li class="nav-item dropdown">-->
<!---->
<!--                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">-->
<!--                    <i class="bi bi-chat-left-text"></i>-->
<!--                    <span class="badge bg-success badge-number">3</span>-->
<!--                </a>-->
<!---->
<!--                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">-->
<!--                    <li class="dropdown-header">-->
<!--                        You have 3 new messages-->
<!--                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <hr class="dropdown-divider">-->
<!--                    </li>-->
<!---->
<!--                    <li class="message-item">-->
<!--                        <a href="#">-->
<!--                            <img src="public/assets/img/messages-1.jpg" alt="" class="rounded-circle">-->
<!--                            <div>-->
<!--                                <h4>Maria Hudson</h4>-->
<!--                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>-->
<!--                                <p>4 hrs. ago</p>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <hr class="dropdown-divider">-->
<!--                    </li>-->
<!---->
<!--                    <li class="message-item">-->
<!--                        <a href="#">-->
<!--                            <img src="public/assets/img/messages-2.jpg" alt="" class="rounded-circle">-->
<!--                            <div>-->
<!--                                <h4>Anna Nelson</h4>-->
<!--                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>-->
<!--                                <p>6 hrs. ago</p>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <hr class="dropdown-divider">-->
<!--                    </li>-->
<!---->
<!--                    <li class="message-item">-->
<!--                        <a href="#">-->
<!--                            <img src="public/assets/img/messages-3.jpg" alt="" class="rounded-circle">-->
<!--                            <div>-->
<!--                                <h4>David Muldon</h4>-->
<!--                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>-->
<!--                                <p>8 hrs. ago</p>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <hr class="dropdown-divider">-->
<!--                    </li>-->
<!---->
<!--                    <li class="dropdown-footer">-->
<!--                        <a href="#">Show all messages</a>-->
<!--                    </li>-->
<!---->
<!--                </ul>-->
<!---->
<!--            </li>-->
            <!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
<!--                    <img src="public/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">-->
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo user()->name ?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?php echo user()->name ?></h6>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed"  href="/admin/survey/all">
                <i class="bi bi-menu-button-wide"></i><span>Surveys</span>
            </a>

        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i>
                <span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/admin/users/all">
                        <i class="bi bi-circle"></i><span>All</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/users/create">
                        <i class="bi bi-circle"></i><span>New</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->



    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

    <?php $message = $_SESSION['msg'] ?? null; ?>
    <?php if ($message): ?>
        <div class="alert alert-<?php echo $message['type'] ?? 'info' ?> alert-dismissible fade show" role="alert">
            <?php echo $message['message'] ?? '' ?>;
            <?php unset($_SESSION['msg']); ?>
        </div>
    <?php endif; ?>

