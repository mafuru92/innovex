<?php $__env->startSection('content'); ?>
<br><br><br>
<div class="col-md-12 col-lg-12">
<div class="panel panel-primary">
  <div class="jumbotron"style="height: 100px;"><b><p align="center">Non Productive Time</b><a class="pull-right btn btn-primary btn-sm" href="/noproduct/create">Create new</a></div>
  <div class="panel-body">

<!-- *********** END Search Form    *********************-->
<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>Day of Week</th>
    <th>Date</th>
    <th>Public Holiday </th>
    <th>Unoccupied Time</th>
    <th>Annual Leave</th>
    <th>Personal (House search)</th>
    <th>Sick</th>
    <th>Total Time</th>
    <th>Updated Date</th>
    
  </tr>
  </thead>
  <tbody>
  <?php $__currentLoopData = $Noproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Noproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><a href="/noproducts/<?php echo e($Noproduct->id); ?>"><?php echo e($Noproduct->DayOfWeek); ?></a></td>
        <td><a href="/noproducts/<?php echo e($Noproduct->id); ?>"><?php echo e($Noproduct->ActivityDate); ?></a></td>
        <td><a href="/noproducts/<?php echo e($Noproduct->id); ?>"><?php echo e($Noproduct->PublicHoliday); ?></a></td>
        <td><a href="/noproducts/<?php echo e($Noproduct->id); ?>"><?php echo e($Noproduct->UnoccupiedTime); ?></a></td>
        <td><a href="/noproducts/<?php echo e($Noproduct->id); ?>"><?php echo e($Noproduct->AnnualLeave); ?></a></td>
        <td><a href="/noproducts/<?php echo e($Noproduct->id); ?>"><?php echo e($Noproduct->HouseSearch); ?></a></td>
        <td><a href="/noproducts/<?php echo e($Noproduct->id); ?>"><?php echo e($Noproduct->Sick); ?></a></td>
        <td><a href="/noproducts/<?php echo e($Noproduct->id); ?>"><?php echo e($Noproduct->TotalHour); ?></a></td>
        <td><a href="/noproducts/<?php echo e($Noproduct->id); ?>"><?php echo e($Noproduct->updated_at); ?></a></td>
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