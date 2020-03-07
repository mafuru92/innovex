<?php $__env->startSection('content'); ?>
<br><br><br><br>
<div class="col-md-12 col-lg-12">
<div class="panel panel-primary">
  <div class="jumbotron"style="height: 100px;"><b><p align="center">Users Information</b></div>
  <div class="panel-body">
  
  <form action="/user" method="get">
    <?php echo e(csrf_field()); ?>

    <div class="input-group">
        <input type="text" class="form-control" name="Search"
            placeholder="Search"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default" name="find">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>

<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>User Role</th>
    <th>User Active</th>
    <th>Email</th>

  </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
      
        <td><a href="/user/<?php echo e($user->id); ?>/edit"><?php echo e($user->id); ?></a></td>
        <td><a href="/user/<?php echo e($user->id); ?>/edit"><?php echo e($user->fname); ?></a></td>
        <td><a href="/user/<?php echo e($user->id); ?>/edit"><?php echo e($user->lname); ?></a></td>
        <td><a href="/user/<?php echo e($user->id); ?>/edit"><?php echo e($user->UserLevel); ?></a></td>
        <td><a href="/user/<?php echo e($user->id); ?>/edit"><?php echo e($user->Active); ?></a></td>
        <td><?php echo e($user->email); ?></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>


</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>