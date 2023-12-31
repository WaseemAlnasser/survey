<?php
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="<?php echo public_path('style.css');?>" rel="stylesheet">
</head>
<body>
<?php
   $url = Request::uri();
?>
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="/">WebSurvey</a></h1>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto <?php echo $url == '' ? 'active' : ''; ?>" href="/">Home</a></li>
                <?php if(user_check() && user() != null):
                    if (user()->admin == 1):
                    ?>
                    <li><a class="nav-link scrollto <?php echo $url == 'dashboard' ? 'active' : ''; ?>" href="/admin">Dashboard</a></li>
                    <?php endif;?>
                    <li class="nav-link dropdown">
                        <a class="nav-link  d-flex align-items-center " href="#" data-bs-toggle="dropdown">
                            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo user()->name ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start dropdown-menu-arrow profile">
                            <li>
                                <a class="dropdown-item " href="/account">
                                    <i class="bi bi-gear"></i>
                                    <span>Account Settings</span>
                                </a>
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
                <?php else:?>
                    <li><a class="nav-link scrollto <?php echo $url == 'register' ? 'active' : ''; ?>" href="/register">Register</a></li>
                    <li><a class="nav-link scrollto <?php echo $url == 'login' ? 'active' : ''; ?>" href="/login">Login</a></li>
                <?php endif;?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header><!-- End Header -->


