@extends('layouts.app')
@section('content')
<br><br><br>
<div class="col-md-12 col-lg-12">
<div class="panel panel-primary">
  <div class="jumbotron"style="height: 100px;"><b><p align="center">Staffs retail</b><a class="pull-right btn btn-primary btn-sm" href="/task/create">Create new</a></div>
  <div class="panel-body">

<!-- *********** END Search Form    *********************-->
<table class="table table-bordered table-striped" >
<thead>
  <tr>

    <th>Staff</th>
    <th>Assignment Name</th>
    <th>staff Assigned Time(Days)</th>
    <th>Assignment start Date</th>
    <th>End of Assignment</th>
    <th>Status</th>
    <th>Updated By</th>
    <th>Date</th>
  
  </tr>
  </thead>
  <tbody>
  @foreach($Tasks as $Task)
      <tr>
        <td><a href="/assignments/{{$Task->id}}">{{$Task->UserId}}</a></td>
        <td><a href="/assignments/{{$Task->id}}">{{$Task->AssignmentName}}</a></td>
        <td><a href="/assignments/{{$Task->id}}">{{$Task->AssignedTime}}</a></td>
        <td><a href="/assignments/{{$Task->id}}">{{$Task->StartDate}}</a></td>
        <td><a href="/assignments/{{$Task->id}}">{{$Task->EndDate}}</a></td>
        <td><a href="/assignments/{{$Task->id}}">{{$Task->Status}}</a></td>
        <td><a href="/assignments/{{$Task->id}}">{{$Task->UpdatedBy}}</a></td>
        <td><a href="/assignments/{{$Task->id}}">{{$Task->updated_at}}</a></td>
      </tr>
      @endforeach
  </tbody>
</table>
{{$Tasks->links()}}
<!-- **************************       Out of Search     ************************************-->
</div>
</div>
</div>
@endsection