<?php $__env->startSection('content'); ?>
<br><br><br><br>
<div class="col-md-9 col-lg-9 col-sm-9 pull-left">



      <!-- The justified navigation menu is meant for single line per list Tasks.
           Multiple lines will require custom code not provided by Bootstrap. -->

      <!-- Jumbotron -->
      <div class="jumbotron">
       <h2>INNOVEX</h2>
     
        <!--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
      </div>

<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>VARIABLE NAME</th>
    <th>VARIABLE VALUE</th>
  </tr>
  </thead>
  <tbody>
  <tr><td>Date Of Week</td><td><?php echo e($Activity->DayOfWeek); ?></td></tr>
  <tr><td>Date</td><td><?php echo e($Activity->ActivityDate); ?></td></tr>
  <tr><td>Assignment Name</td><td><?php echo e($Activity->AssignmentName); ?></td></tr>
  <tr><td>Sub Assignment</td><td><?php echo e($Activity->SubAssignment); ?></td></tr>
  <tr><td>Task</td><td><?php echo e($Activity->SubAssignmentTwo); ?></td></tr>
  <tr><td>Sub Task</td><td><?php echo e($Activity->SubassignmentThree); ?></td></tr>
  <tr><td>Total Hours</td><td><?php echo e($Activity->DurationHours); ?></td></tr>
  <tr><td>updated at</td><td><?php echo e($Activity->updated_at); ?></td></tr>
  </tbody>
</table>









      <!-- Example row of columns -->
      <div class="row" style="background:white; margin: 10px">

     
      
      </div> 

    </div>
    

   <div class="col-sm-3 col-md-3 col-lg-3  pull-right">
         <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>-->

    <div class="list-group">
            <a href="#" class="list-group-Auditschemas active">Link</a>
            <a href="/home" class="list-group-Activity">Home</a>
            <a href="/activityedit/<?php echo e($Activity->id); ?>" class="list-group-Activity">Edit</a>
            <a href="/exportpdf/<?php echo e($Activity->id); ?>" class="list-group-Activity">ExportToPDF</a>
              <a class="list-group-Activity"
              href="#"
                   onclick="
                   var result = confirm('Are you sure you wish to delete this study? Note that all the information for this study will be deleted! and you will not be able to recover later on. Click Okay to continue or click Cancel to stop.');
                           if (result){
                             event.preventDefault();
                             document.getElementById('delete-form').submit();
                           }"
                >

              Delete</a>
              <form id="delete-form" action="<?php echo e(route('activity.destroy',[$Activity->id])); ?>"
                    method="POST" style="display:none;">
                        <input type="hidden" name="_method" value="delete">
                        <?php echo e(csrf_field()); ?>

                        </form>
              
          </div>


<!--
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
            </ol>
          </div>
          -->
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>