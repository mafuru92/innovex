@extends('layouts.app')
@section('content')
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
  <tr><td>No </td><td>{{$Auditschema->id}}</td></tr>
  <tr><td>Assignment Name</td><td>{{$Auditschema->AssignmentName}}</td></tr>
  <tr><td>Manager</td><td>{{$Auditschema->AssignmentSupervisor}}</td></tr>
  <tr><td>Team Leader</td><td>{{$Auditschema->StaffAssigned}}</td></tr>
  <tr><td>Planning Meeting</td><td>{{$Auditschema->PlanningMeeting}}</td></tr>
  <tr><td>Kickoff Meeting</td><td>{{$Auditschema->KickoffMeeting}}</td></tr>
  <tr><td>Entry Meeting</td><td>{{$Auditschema->EntryMeeting}}</td></tr>
  <tr><td>Audit Execution</td><td>{{$Auditschema->AuditExecution}}</td></tr>
  <tr><td>Draft Report</td><td>{{$Auditschema->DraftReport}}</td></tr>
  <tr><td>Exit Meeting</td><td>{{$Auditschema->ExitMeeting}}</td></tr>
  <tr><td>Final Report</td><td>{{$Auditschema->FinalReport}}</td></tr>
  <tr><td>updated By</td><td>{{$Auditschema->UpdatedBy}}</td></tr>
  <tr><td>updated at</td><td>{{$Auditschema->updated_at}}</td></tr>
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
            <a href="/assignment" class="list-group-Auditschema">All Assignments</a>
            <a href="/home" class="list-group-Auditschema">Home</a>
            <a href="/auditschemaedit/{{$Auditschema->id}}" class="list-group-Auditschema">Edit</a>
            <a href="/exportpdf/{{$Auditschema->id}}" class="list-group-Auditschema">ExportToPDF</a>
              <a class="list-group-Auditschema"
              href="#"
                   onclick="
                   var result = confirm('Are you sure you wish to delete this study? Note that all the information for this study will be deleted! and you will not be able to recover later on. Click Okay to continue or click Cancel to stop.');
                           if (result){
                             event.preventDefault();
                             document.getElementById('delete-form').submit();
                           }"
                >

              Delete</a>
              <form id="delete-form" action="{{route('auditschema.destroy',[$Auditschema->id])}}"
                    method="POST" style="display:none;">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
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

@endsection