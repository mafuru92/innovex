<?php $__env->startSection('content'); ?>
<br><br><br>
<div class="col-md-12 col-lg-12">
<div class="panel panel-primary">
  <div class="jumbotron"style="height: 100px;"><b><p align="center">Staffs retail</b><a class="pull-right btn btn-primary btn-sm" href="/task/create">Create new</a></div>
  <div class="panel-body">

<!-- *********** END Search Form    *********************-->
<table class="table table-bordered table-striped" >
<thead>
  <tr>

    <th>Staff</th>
    <th>Assignment Name</th>
    <th>staff Assigned Time(Days)</th>
    <th>Assignment start Date</th>
    <th>End of Assignment</th>
    <th>Status</th>
    <th>Updated By</th>
    <th>Date</th>
  
  </tr>
  </thead>
  <tbody>
  <?php $__currentLoopData = $Tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><a href="/assignments/<?php echo e($Task->id); ?>"><?php echo e($Task->UserId); ?></a></td>
        <td><a href="/assignments/<?php echo e($Task->id); ?>"><?php echo e($Task->AssignmentName); ?></a></td>
        <td><a href="/assignments/<?php echo e($Task->id); ?>"><?php echo e($Task->AssignedTime); ?></a></td>
        <td><a href="/assignments/<?php echo e($Task->id); ?>"><?php echo e($Task->StartDate); ?></a></td>
        <td><a href="/assignments/<?php echo e($Task->id); ?>"><?php echo e($Task->EndDate); ?></a></td>
        <td><a href="/assignments/<?php echo e($Task->id); ?>"><?php echo e($Task->Status); ?></a></td>
        <td><a href="/assignments/<?php echo e($Task->id); ?>"><?php echo e($Task->UpdatedBy); ?></a></td>
        <td><a href="/assignments/<?php echo e($Task->id); ?>"><?php echo e($Task->updated_at); ?></a></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<?php echo e($Tasks->links()); ?>

<!-- **************************       Out of Search     ************************************-->
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>