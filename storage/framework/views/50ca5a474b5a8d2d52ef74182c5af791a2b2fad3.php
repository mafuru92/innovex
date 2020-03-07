<?php $__env->startSection('content'); ?>
<br><br><br>
<div class="col-md-12 col-lg-12">
<div class="panel panel-primary">
  <div class="jumbotron"style="height: 100px;"><b><p align="center">STAFF TIMESHEET REPORT</b></div>
  <div class="panel-body">

<!-- *********** END Search Form    *********************-->
<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>Time in Assignments (Days)</th>
    <th>Time in Office (Days)</th>
    <th>Non productive Time (Days)</th>
    <!--<th>% in Assignment Works</th>-->
    <!---<th>% in Office Works</th>-->
    <th>staff productivity (%)</th>
    <th>Staff Non Productivity (%)</th>
    
  </tr>
  </thead>
  <tbody>                        
      <tr>
        <td><?php echo e($SumOfDuration/8); ?></td>
        <td><?php echo e($SumOfDuration3/8); ?></td>
        <td><?php echo e($SumOfDuration2/8); ?></td>
        <td><?php echo e($SumOfDurationperce); ?></td>
        <td><?php echo e($SumOfDuration2perce); ?></td>
      </tr>
  </tbody>
</table>
<!-- **************************       Out of Search     ************************************-->

<table class="table table-bordered table-striped" >
    <thead>
     <div class="jumbotron" style="text-align:center; font-size: 20px; color:black;">STAFF ASSIGNMENT(S) REPORT</div> 
      <tr>
        <th>Assignment Name</th>
        <th>Assigned Time(days)</th>
        <th>Total working time(days)</th>
        <!--<th>% in Assignment Works</th>-->
        <!---<th>% in Office Works</th>-->
        <th></th>
        <th></th> 
      </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($task->assignmentName); ?></td>
                <td><?php echo e($task->assignedTime); ?></td>
                <td><?php echo e($task->workingHours/8); ?></td>
                <td></td>
                <td></td>
              </tr> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                     
      </tbody>
</table>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>