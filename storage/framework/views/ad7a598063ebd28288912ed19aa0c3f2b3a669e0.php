<?php $__env->startSection('content'); ?>
<br><br><br>
<div class="col-md-12 col-lg-12">
<div class="panel panel-primary">
  <div class="jumbotron"style="height: 100px;"><b><p align="center">List of Assignments</b></div>
  <div class="panel-body">

<!-- *********** Search Form    *********************-->
<form action="/managetimesheet" method="get">
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

<!-- *********** END Search Form    *********************-->
<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>ID</th>
    <th>Assignment Name</th>
  </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $auditschemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auditschema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><a href="/managereportviewa/<?php echo e($auditschema->id); ?>"><?php echo e($auditschema->id); ?></a></td>
        <td><a href="/managereportviewa/<?php echo e($auditschema->id); ?>"><?php echo e($auditschema->AssignmentName); ?></a></td>
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