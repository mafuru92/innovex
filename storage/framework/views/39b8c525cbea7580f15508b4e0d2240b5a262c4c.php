<?php $__env->startSection('content'); ?>
<br><br><br><br><br>

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background:white;">




<!-- Example row of columns -->
<h1><p align="center">fill your Timesheet</p> </h1>
      <div class="row col-sm-12 col-md-12 col-lg-12" style="background:white; margin: 10px">
      
      <form method="post" action="<?php echo e(route('activity.store')); ?>">

                           <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label for="DayOfWeek">Day Of Week</label>
                                <select placeholder="Day of the week" id="DayOfWeek" required name="DayOfWeek" class="form-control"/>
                                       <option value=""></option>
                                       <option value="Monday">Monday</option>
                                       <option value="Tuesday">Tuesday</option>
                                       <option value="Wednesday">Wednesday</option>
                                       <option value="Thursday">Thursday</option>
                                       <option value="Friday">Friday</option>
                                       <option value="Saturday">Saturday</option>
                                       <option value="Sunday">Sunday</option>
                                       </select>
                          
                                
                            </div> 

                            <div class="form-group">
                                <label for="ActivityDate">Date</label>
                                <input placeholder="Date"
                                       id="ActivityDate"
                                       type="date"
                                       name="ActivityDate"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 
                            
                            <div class="form-group">
                                <label for="AssignmentName">Assignment Name</label>
                                <select placeholder="Assignment Name" id="AssignmentName" required name="AssignmentName" class="form-control"/>
                                       <option value=""></option>
                                       <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($task->AssignmentName); ?>"><?php echo e($task->AssignmentName); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  
                                       </select>
                            </div> 

                            <div class="form-group">
                                <label for="SubAssignment">Sub Assignment</label>
                                <input placeholder="Enter Subassignment"
                                       id="SubAssignment"
                                       name="SubAssignment"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 

                            <div class="form-group">
                                <label for="SubAssignmentTwo">Task</label>
                                <input placeholder="Enter Subassignment"
                                       id="SubAssignmentTwo"
                                       name="SubAssignmentTwo"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 


                            <div class="form-group">
                                <label for="SubassignmentThree">Sub Task</label>
                                <input placeholder="Enter Subassignment"
                                       id="SubassignmentThree"
                                       name="SubassignmentThree"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 

                            <div class="form-group">
                                <label for="DurationHours">Total Hours</label>
                                <input placeholder="Max 8"
                                       id="DurationHours"
                                       name="DurationHours"                                      
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 

                          

                            </div> 
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary"
                                       value="submit"/>
</div>  
</form>  
      </div> 

     </div> 
    
   <div class="col-sm-3 col-md-3 col-lg-3  pull-right">
         <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>-->
<!--
      <div class="sidebar-module">
            <h4>Actions</h4>

            <ol class="list-unstyled">
              <li><a href="/approvalinfors">All Studies</a></li>
              <li><a href="/home">Home</a></li>
              

            </ol>
          </div>
          -->

        
          <div class="list-group">
            <a href="#" class="list-group-item active">Link</a>
            <a href="/home" class="list-group-item">Home</a>
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