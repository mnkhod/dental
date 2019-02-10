<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MonFamily</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    

    
    
    
    
    <link rel="stylesheet" href="<?php echo e(asset('font/iconsmind/style.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('font/simple-line-icons/css/simple-line-icons.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/vendor/perfect-scrollbar.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/dore.light.orange.min.css')); ?>" />
    <?php echo $__env->yieldContent('header'); ?>
</head>

<body id="app-container" class="menu-sub-hidden show-spinner">
<nav class="navbar fixed-top">
    <div class="d-flex align-items-center navbar-left">
        <a href="#" class="menu-button d-none d-md-block">
            <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                <rect x="0.48" y="0.5" width="7" height="1" />
                <rect x="0.48" y="7.5" width="7" height="1" />
                <rect x="0.48" y="15.5" width="7" height="1" />
            </svg>
            <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                <rect x="1.56" y="0.5" width="16" height="1" />
                <rect x="1.56" y="7.5" width="16" height="1" />
                <rect x="1.56" y="15.5" width="16" height="1" />
            </svg>
        </a>

        <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                <rect x="0.5" y="0.5" width="25" height="1" />
                <rect x="0.5" y="7.5" width="25" height="1" />
                <rect x="0.5" y="15.5" width="25" height="1" />
            </svg>
        </a>

        <div class="search">
            <form action="<?php echo e(url('/reception/search')); ?>" method="get" role="search">
                <?php echo csrf_field(); ?>
                <input placeholder="Хайх..." name="key">
                <span class="search-icon">
                    <i class="simple-icon-magnifier"></i>
                </span>
            </form>

        </div>
    </div>


    <a class="navbar-logo">
        <span class="d-none d-xs-block"><img src="<?php echo e(asset('img/logo-black.png')); ?>"></span>
        <span class="logo-mobile d-block d-xs-none"></span>
    </a>

    <div class="navbar-right">
        <div class="header-icons d-inline-block align-middle">
            

           



        </div>

        <div class="user d-inline-block">
            <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                <span class="name">Цэлмэг</span>
            </button>

            <div class="dropdown-menu dropdown-menu-right mt-3">
                <a class="dropdown-item" href="<?php echo e(url('/logout')); ?>">Гарах</a>
            </div>
        </div>
    </div>
</nav>
<div class="sidebar">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <?php echo $__env->yieldContent('menu'); ?>
            </ul>
        </div>
    </div>


</div>
<main>
    <div class="container-fluid">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</main>






<script src="<?php echo e(asset('js/vendor/jquery-3.3.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/vendor/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/vendor/perfect-scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/vendor/mousetrap.min.js')); ?>"></script>
<?php echo $__env->yieldContent('footer'); ?>
<script src="<?php echo e(asset('js/dore.script.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts.single.theme.js')); ?>"></script>
</body>

</html>