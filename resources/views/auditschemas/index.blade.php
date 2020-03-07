@extends('layouts.app')
@section('content')
<br><br><br>
<div class="col-md-15 col-lg-15">
<div class="panel panel-primary">
  <div class="jumbotron"style="height: 100px;"><b><p align="center">Audit Assignments</b><a class="pull-right btn btn-primary btn-sm" href="/auditschema/create">Create new</a></div>
  <div class="panel-body">

    <form action="/auditschema" method="get">
      {{ csrf_field() }}
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
  @foreach($Auditschemas as $Auditschema)
      <tr>
        
        <td><a href="/auditschemas/{{$Auditschema->id}}">{{$Auditschema->AssignmentName}}</a></td>
        <td><a href="/auditschemas/{{$Auditschema->id}}">{{$Auditschema->AssignmentSupervisor}}</a></td>
        <td><a href="/auditschemas/{{$Auditschema->id}}">{{$Auditschema->StaffAssigned}}</a></td>
        <td><a href="/auditschemas/{{$Auditschema->id}}">{{$Auditschema->PlanningMeeting}}</a></td>
        <td><a href="/auditschemas/{{$Auditschema->id}}">{{$Auditschema->KickoffMeeting}}</a></td>
        <td><a href="/auditschemas/{{$Auditschema->id}}">{{$Auditschema->EntryMeeting}}</a></td>
        <td><a href="/auditschemas/{{$Auditschema->id}}">{{$Auditschema->AuditExecution}}</a></td>
        <td><a href="/auditschemas/{{$Auditschema->id}}">{{$Auditschema->DraftReport}}</a></td>
        <td><a href="/auditschemas/{{$Auditschema->id}}">{{$Auditschema->ExitMeeting}}</a></td>
        <td><a href="/auditschemas/{{$Auditschema->id}}">{{$Auditschema->FinalReport}}</a></td>
        <td><a href="/auditschemas/{{$Auditschema->id}}">{{$Auditschema->updated_at}}</a></td>
      </tr>
      @endforeach
  </tbody>
</table>
{{$Auditschemas->links()}}
<!--**************************       Out of Search     ************************************-->
</div>
</div>
</div>
@endsection