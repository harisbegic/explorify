<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>explorify</title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:600" rel="stylesheet"> 

    <style type="text/css">
        body {
            font-family: 'Titillium Web', sans-serif;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    explorify
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <?php if(Auth::check()): ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/home')); ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/hobbies')); ?>">Hobbies</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/categories')); ?>">Categories</a></li>
                        <li class="nav-item"><a class="nav-link" href="/users/<?php echo e(Auth::user()->id); ?>">My Profile</a></li>
                        <?php endif; ?>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li><a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a></li>
                        <?php else: ?>
                            <li>
                                    <form class="form-inline" method="get" action="/search" role="search">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="search" placeholder="Search.." class="form-control mr-sm-2" name="search">
                                        <button class="form-control btn btn-outline-light my-2 my-sm-0" style="margin-left: -7px;" type="submit">Search</button>
                                    </form> 
                            </li>
                            <li class="nav-item dropdown" style="margin-left: 5px">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
            <?php echo $__env->make('partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <br>
        <hr>
        <!-- FOOTER -->
      <footer style="padding-bottom: 40px; color: black;" class="footer">
      <center>
        <p>&copy; explorify &middot; 2018 &middot; All rights reserved &middot; Yes, all of them &middot; That means you too, Azer</p>
      </center>
      </footer>
    </div>
        </main>
    </div>
s
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
