<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'ITAssets')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
<!-- Css for Drop down Manu -->
    <style>
.dropbtn {
  background-color: black;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
<!-- End Css for Drop down Manu -->

</head>
<body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">

                       
                        <ul class="nav navbar-nav">
                        <?php if(auth()->guard()->guest()): ?>
                          <li></li>
                            <li></li>
                            <li></li>
                        <?php else: ?>
                           </ul>
                       

          <ul class="nav navbar-nav">
          <li>
          <a class="active" href="/home"><b>Home</b></a>
          </li>

  
            <li><a class="active" href="<?php echo e(url('/auditschema')); ?>"><b>Audit Assignments</b></a></li>
          
            

          </ul>




 <ul class="nav navbar-nav navbar-right">
                      <?php endif; ?>
                        <?php if(auth()->guard()->guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>"><b>Login</b></a></li>
                            <li><a href="<?php echo e(route('register')); ?>"><b>Register</b></a></li>
                        <?php else: ?>
            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                <?php echo e(Auth::user()->fname); ?>  <?php echo e(Auth::user()->lname); ?> <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
<div class="container">
<?php echo $__env->make('partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partials.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

     <div class="row">
        <?php echo $__env->yieldContent('content'); ?>
         </div>
         <footer>
        <p>© 2019 INNOVEX.</p>
      </footer>
        </div>
        
    </div>
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    
</body>
</html>
