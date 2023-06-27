<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="<?php echo public_path('vendor/aos/aos.css');?>" rel="stylesheet">
    <link href="<?php echo public_path('vendor/bootstrap-icons/bootstrap-icons.css');?>" rel="stylesheet">
    <link href="<?php echo public_path('vendor/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
    <link href="<?php echo public_path('vendor/glightbox/css/glightbox.min.css');?>" rel="stylesheet">
    <link href="<?php echo public_path('vendor/remixicon/remixicon.css');?>" rel="stylesheet">
    <link href="<?php echo public_path('vendor/swiper/swiper-bundle.min.css');?>" rel="stylesheet">
    <link href="<?php echo public_path('style.css');?>" rel="stylesheet">
</head>
<body>
<?php
   $url = Request::uri();
?>
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.html">Waseem Surveys</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto <?php echo $url == '' ? 'active' : ''; ?>" href="<?php echo url('')?>">Home</a></li>
                <?php if(user_check() && user() != null):
                    if (user()->admin == 1):
                    ?>
                    <li><a class="nav-link scrollto <?php echo $url == 'dashboard' ? 'active' : ''; ?>" href="<?php echo url('/admin')?>">Dashboard</a></li>
                    <?php endif;?>
                    <li><a class="nav-link scrollto <?php echo $url == 'surveys' ? 'active' : ''; ?>" href="<?php echo url('/surveys')?>">surveys</a></li>
                    <li><a class="nav-link scrollto" href="<?php echo url('/logout')?>">logout</a></li>
                <?php else:?>
                    <li><a class="nav-link scrollto <?php echo $url == 'register' ? 'active' : ''; ?>" href="<?php echo url('/register')?>">Register</a></li>
                    <li><a class="nav-link scrollto <?php echo $url == 'login' ? 'active' : ''; ?>" href="<?php echo url('/login')?>">Login</a></li>
                <?php endif;?>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header><!-- End Header -->
<main>

