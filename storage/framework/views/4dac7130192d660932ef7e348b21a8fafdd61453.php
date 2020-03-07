<?php $__env->startSection('content'); ?>
<br><br><br>
<div class="col-md-12 col-lg-12">
<div class="panel panel-primary">
  <div class="jumbotron"style="height: 100px;"><b><p align="center">---------------------Assignments Timesheet-------------------</b><a class="btn btn-primary btn-sm" href="/officework">Other Time</a><a class="pull-left btn btn-primary btn-sm" href="/noproduct">Non Productive Time</a></div>
  <div class="panel-body">

<!-- *********** END Search Form    *********************-->
<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>Day Of Week</th>
    <th>Date</th>
    <th>Assignment Name</th>
    <th>Sub assignment</th>
    <th>Sub AssignmentTwo</th>
    <th>Sub AssignmentThree</th>
    <th>Time in Hours</th>
    <th>updated at</th>
    

    
  </tr>
  </thead>
  <tbody>
  <?php $__currentLoopData = $Activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><a href="/activity/<?php echo e($Activity->id); ?>"><?php echo e($Activity->DayOfWeek); ?></a></td>
        <td><a href="/activity/<?php echo e($Activity->id); ?>"><?php echo e($Activity->ActivityDate); ?></a></td>
        <td><a href="/activity/<?php echo e($Activity->id); ?>"><?php echo e($Activity->AssignmentName); ?></a></td>
        <td><a href="/activity/<?php echo e($Activity->id); ?>"><?php echo e($Activity->SubAssignment); ?></a></td>
        <td><a href="/activity/<?php echo e($Activity->id); ?>"><?php echo e($Activity->SubAssignmentTwo); ?></a></td>
        <td><a href="/activity/<?php echo e($Activity->id); ?>"><?php echo e($Activity->SubassignmentThree); ?></a></td>
        <td><a href="/activity/<?php echo e($Activity->id); ?>"><?php echo e($Activity->DurationHours); ?></a></td>
        <td><a href="/activity/<?php echo e($Activity->id); ?>"><?php echo e($Activity->updated_at); ?></a></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<!-- **************************       Out of Search     ************************************-->
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>