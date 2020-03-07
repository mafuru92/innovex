@extends('layouts.app')
@section('content')
<br><br><br>
<div class="col-md-12 col-lg-12">
<div class="panel panel-primary">
  <div class="jumbotron"style="height: 100px;"><b><p align="center">---------------------Assignments Timesheet-------------------</b><a class="btn btn-primary btn-sm" href="/officework">Other Time</a><a class="pull-left btn btn-primary btn-sm" href="/noproduct">Non Productive Time</a></div>
  <div class="panel-body">

<!-- *********** END Search Form    *********************-->
<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>Day Of Week</th>
    <th>Date</th>
    <th>Assignment Name</th>
    <th>Sub assignment</th>
    <th>Sub AssignmentTwo</th>
    <th>Sub AssignmentThree</th>
    <th>Time in Hours</th>
    <th>updated at</th>
    

    
  </tr>
  </thead>
  <tbody>
  @foreach($Activities as $Activity)
      <tr>
        <td><a href="/activity/{{$Activity->id}}">{{$Activity->DayOfWeek}}</a></td>
        <td><a href="/activity/{{$Activity->id}}">{{$Activity->ActivityDate}}</a></td>
        <td><a href="/activity/{{$Activity->id}}">{{$Activity->AssignmentName}}</a></td>
        <td><a href="/activity/{{$Activity->id}}">{{$Activity->SubAssignment}}</a></td>
        <td><a href="/activity/{{$Activity->id}}">{{$Activity->SubAssignmentTwo}}</a></td>
        <td><a href="/activity/{{$Activity->id}}">{{$Activity->SubassignmentThree}}</a></td>
        <td><a href="/activity/{{$Activity->id}}">{{$Activity->DurationHours}}</a></td>
        <td><a href="/activity/{{$Activity->id}}">{{$Activity->updated_at}}</a></td>
      </tr>
      @endforeach
  </tbody>
</table>
<!-- **************************       Out of Search     ************************************-->
</div>
</div>
</div>
@endsection