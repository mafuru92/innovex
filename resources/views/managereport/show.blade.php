@extends('layouts.app')
@section('content')
<br><br><br>
<div class="col-md-12 col-lg-12">
<div class="panel panel-primary">
  <div class="jumbotron"style="height: 100px;"><b><p align="center">STAFF TIMESHEET REPORT</b></div>
  <div class="panel-body">

<!-- *********** END Search Form    *********************-->
<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>Time in Assignments (Days)</th>
    <th>Time in Office (Days)</th>
    <th>Non productive Time (Days)</th>
    <!--<th>% in Assignment Works</th>-->
    <!---<th>% in Office Works</th>-->
    <th>staff productivity (%)</th>
    <th>Staff Non Productivity (%)</th>
    
  </tr>
  </thead>
  <tbody>                        
      <tr>
        <td>{{$SumOfDuration/8}}</td>
        <td>{{$SumOfDuration3/8}}</td>
        <td>{{$SumOfDuration2/8}}</td>
        <td>{{$SumOfDurationperce}}</td>
        <td>{{$SumOfDuration2perce}}</td>
      </tr>
  </tbody>
</table>
<!-- **************************       Out of Search     ************************************-->

<table class="table table-bordered table-striped" >
    <thead>
     <div class="jumbotron" style="text-align:center; font-size: 20px; color:black;">STAFF ASSIGNMENT(S) REPORT</div> 
      <tr>
        <th>Assignment Name</th>
        <th>Assigned Time(days)</th>
        <th>Total working time(days)</th>
        <!--<th>% in Assignment Works</th>-->
        <!---<th>% in Office Works</th>-->
        <th></th>
        <th></th> 
      </tr>
      </thead>
      <tbody>
        @foreach($tasks as $task)
              <tr>
                <td>{{$task->assignmentName}}</td>
                <td>{{$task->assignedTime}}</td>
                <td>{{$task->workingHours/8}}</td>
                <td></td>
                <td></td>
              </tr> 
        @endforeach                     
      </tbody>
</table>
</div>
</div>
</div>
@endsection