@extends('layouts.app')
@section('content')
<br><br><br>
<div class="col-md-12 col-lg-12">
<div class="panel panel-primary">
  <div class="jumbotron"style="height: 100px;"><b><p align="center">Office Work</b><a class="pull-right btn btn-primary btn-sm" href="/office/create">Create new</a></div>
  <div class="panel-body">

<!-- *********** END Search Form    *********************-->
<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>Day of week</th>
    <th>Date</th>
    <th>Office work</th>
    <th>Staff Meeting</th>
    <th>Inhouse Training</th>
    <th>Outside Training</th>
    <th>continuing Education</th>
    <th>Study Leave</th>
    <th>Travelling</th>
    <th>Total Hours</th>
    <th>Updated Date</th>
    
  </tr>
  </thead>
  <tbody>
  @foreach($Offices as $Office)
      <tr>
        <td><a href="/offices/{{$Office->id}}">{{$Office->DayOfWeek}}</a></td>
        <td><a href="/offices/{{$Office->id}}">{{$Office->ActivityDate}}</a></td>
        <td><a href="/offices/{{$Office->id}}">{{$Office->OfficeWork}}</a></td>
        <td><a href="/offices/{{$Office->id}}">{{$Office->staffMeeting}}</a></td>
        <td><a href="/offices/{{$Office->id}}">{{$Office->staffTraining}}</a></td>
        <td><a href="/offices/{{$Office->id}}">{{$Office->OutTraining}}</a></td>
        <td><a href="/offices/{{$Office->id}}">{{$Office->Schooling}}</a></td>
        <td><a href="/offices/{{$Office->id}}">{{$Office->StudyLeave}}</a></td>
        <td><a href="/offices/{{$Office->id}}">{{$Office->Travelling}}</a></td>
        <td><a href="/offices/{{$Office->id}}">{{$Office->TotalHour}}</a></td>
        <td><a href="/offices/{{$Office->id}}">{{$Office->updated_at}}</a></td>
      </tr>
      @endforeach
  </tbody>
</table>
<!-- **************************       Out of Search     ************************************-->
</div>
</div>
</div>
@endsection