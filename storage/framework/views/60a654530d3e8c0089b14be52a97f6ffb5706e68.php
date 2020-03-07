<?php $__env->startSection('content'); ?>
<br><br><br>
<div class="col-md-12 col-lg-12">
<div class="panel panel-primary">
  <div class="jumbotron"style="height: 100px;"><b><p align="center">Office Work</b><a class="pull-right btn btn-primary btn-sm" href="/office/create">Create new</a></div>
  <div class="panel-body">

<!-- *********** END Search Form    *********************-->
<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>Day of week</th>
    <th>Date</th>
    <th>Office work</th>
    <th>Staff Meeting</th>
    <th>Inhouse Training</th>
    <th>Outside Training</th>
    <th>continuing Education</th>
    <th>Study Leave</th>
    <th>Travelling</th>
    <th>Total Hours</th>
    <th>Updated Date</th>
    
  </tr>
  </thead>
  <tbody>
  <?php $__currentLoopData = $Offices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Office): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><a href="/offices/<?php echo e($Office->id); ?>"><?php echo e($Office->DayOfWeek); ?></a></td>
        <td><a href="/offices/<?php echo e($Office->id); ?>"><?php echo e($Office->ActivityDate); ?></a></td>
        <td><a href="/offices/<?php echo e($Office->id); ?>"><?php echo e($Office->OfficeWork); ?></a></td>
        <td><a href="/offices/<?php echo e($Office->id); ?>"><?php echo e($Office->staffMeeting); ?></a></td>
        <td><a href="/offices/<?php echo e($Office->id); ?>"><?php echo e($Office->staffTraining); ?></a></td>
        <td><a href="/offices/<?php echo e($Office->id); ?>"><?php echo e($Office->OutTraining); ?></a></td>
        <td><a href="/offices/<?php echo e($Office->id); ?>"><?php echo e($Office->Schooling); ?></a></td>
        <td><a href="/offices/<?php echo e($Office->id); ?>"><?php echo e($Office->StudyLeave); ?></a></td>
        <td><a href="/offices/<?php echo e($Office->id); ?>"><?php echo e($Office->Travelling); ?></a></td>
        <td><a href="/offices/<?php echo e($Office->id); ?>"><?php echo e($Office->TotalHour); ?></a></td>
        <td><a href="/offices/<?php echo e($Office->id); ?>"><?php echo e($Office->updated_at); ?></a></td>
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