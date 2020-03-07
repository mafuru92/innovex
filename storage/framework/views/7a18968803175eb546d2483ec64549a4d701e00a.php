<?php $__env->startSection('content'); ?>
<br><br><br><br><br>

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background:white;">




<!-- Example row of columns -->
<h1><p align="center">Add a new Assignment details</p> </h1>
      <div class="row col-sm-12 col-md-12 col-lg-12" style="background:white; margin: 10px">
      
      <form method="post" action="<?php echo e(route('auditschema.store')); ?>">

                           <?php echo e(csrf_field()); ?>

                          
                            <div class="form-group">
                                <label for="AssignmentName">Assignment Name</label>
                                <input placeholder="Eg.Baylor IT Audit end 31 Dec 2019"
                                       id="AssignmentName"
                                       name="AssignmentName"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 

                            <div class="form-group">
                                <label for="AssignmentSupervisor">Manager</label>
                                <input placeholder="Name"
                                       id="AssignmentSupervisor"
                                       name="AssignmentSupervisor"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 
                            
                            <div class="form-group">
                                <label for="StaffAssigned">Team Leader</label>
                                <input placeholder="Name"
                                       id="StaffAssigned"
                                       name="StaffAssigned"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 

                            <div class="form-group">
                                <label for="PlanningMeeting">Planning meeting date</label>
                                <input placeholder="Date"
                                       id="PlanningMeeting"
                                       name="PlanningMeeting"
                                       type="date"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 

                            <div class="form-group">
                                <label for="KickoffMeeting">Kickoff meeting date</label>
                                <input placeholder="Date"
                                       id="KickoffMeeting"
                                       name="KickoffMeeting"
                                       type="date"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 


                            <div class="form-group">
                                <label for="EntryMeeting">Entry meeting date</label>
                                <input placeholder="Date"
                                       id="EntryMeeting"
                                       name="EntryMeeting"
                                       type="date"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 

                            <div class="form-group">
                                <label for="AuditExecution">Audit Execution date</label>
                                <input placeholder="Date"
                                       id="AuditExecution"
                                       name="AuditExecution"
                                       type="date"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 

                            <div class="form-group">
                                <label for="DraftReport">Draft Report date</label>
                                <input placeholder="Date"
                                       id="DraftReport"
                                       name="DraftReport"
                                       type="date"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 


                            <div class="form-group">
                                <label for="ExitMeeting">Exit Meeting</label>
                                <input placeholder="Date"
                                       id="ExitMeeting"
                                       name="ExitMeeting"
                                       type="date"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 

                            <div class="form-group">
                                <label for="FinalReport">Final Report</label>
                                <input placeholder="Date"
                                       id="FinalReport"
                                       name="FinalReport"
                                       type="date"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
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