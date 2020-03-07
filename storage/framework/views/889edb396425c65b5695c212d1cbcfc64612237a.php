<?php $__env->startSection('content'); ?>
<br><br><br>
<div class="col-md-15 col-lg-15">
<div class="panel panel-primary">
  <div class="jumbotron"style="height: 100px;"><b><p align="center">Audit Assignments</b><a class="pull-right btn btn-primary btn-sm" href="/auditschema/create">Create new</a></div>
  <div class="panel-body">

    <form action="/auditschema" method="get">
      <?php echo e(csrf_field()); ?>

      <div class="form-group">
        <table>
          <tr>
            <td>
           <br>
          <input type="text" class="" name="Search" placeholder="Search  by Assignment Name">
            </td>
            <td align="center">
              Search by Excution Date<br>
            <label for="start_date">Start Date</label><input name="start_date" type="date"  value=""/>
            <label for="end_date">End Date</label><input name="end_date" type="date"  value=""/>  
              <button type="submit" class="btn btn-primary" name="find">
                Search
              </button>
            </td>
            </tr>
              </table>
      </div>
  </form>
<!-- *********** END Search Form    *********************-->
<table class="table table-bordered table-striped" >
<thead>
  <tr>
    
    <th>Assignment Name</th>
    <th>Manager</th>
    <th>Team Leader</th>
    <th>Planning Meeting</th>
    <th>Kickoff Meeting</th>
    <th>Entry Meeting</th>
    <th>Audit Execution</th>
    <th>Draft report</th>
    <th>Exit Meeting</th>
    <th>Final Report</th>
    <th>Updated Date</th>
    
  </tr>
  </thead>
  <tbody>
  <?php $__currentLoopData = $Auditschemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Auditschema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        
        <td><a href="/auditschemas/<?php echo e($Auditschema->id); ?>"><?php echo e($Auditschema->AssignmentName); ?></a></td>
        <td><a href="/auditschemas/<?php echo e($Auditschema->id); ?>"><?php echo e($Auditschema->AssignmentSupervisor); ?></a></td>
        <td><a href="/auditschemas/<?php echo e($Auditschema->id); ?>"><?php echo e($Auditschema->StaffAssigned); ?></a></td>
        <td><a href="/auditschemas/<?php echo e($Auditschema->id); ?>"><?php echo e($Auditschema->PlanningMeeting); ?></a></td>
        <td><a href="/auditschemas/<?php echo e($Auditschema->id); ?>"><?php echo e($Auditschema->KickoffMeeting); ?></a></td>
        <td><a href="/auditschemas/<?php echo e($Auditschema->id); ?>"><?php echo e($Auditschema->EntryMeeting); ?></a></td>
        <td><a href="/auditschemas/<?php echo e($Auditschema->id); ?>"><?php echo e($Auditschema->AuditExecution); ?></a></td>
        <td><a href="/auditschemas/<?php echo e($Auditschema->id); ?>"><?php echo e($Auditschema->DraftReport); ?></a></td>
        <td><a href="/auditschemas/<?php echo e($Auditschema->id); ?>"><?php echo e($Auditschema->ExitMeeting); ?></a></td>
        <td><a href="/auditschemas/<?php echo e($Auditschema->id); ?>"><?php echo e($Auditschema->FinalReport); ?></a></td>
        <td><a href="/auditschemas/<?php echo e($Auditschema->id); ?>"><?php echo e($Auditschema->updated_at); ?></a></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<?php echo e($Auditschemas->links()); ?>

<!--**************************       Out of Search     ************************************-->
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>