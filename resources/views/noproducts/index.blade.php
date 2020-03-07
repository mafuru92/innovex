@extends('layouts.app')
@section('content')
<br><br><br>
<div class="col-md-12 col-lg-12">
<div class="panel panel-primary">
  <div class="jumbotron"style="height: 100px;"><b><p align="center">Non Productive Time</b><a class="pull-right btn btn-primary btn-sm" href="/noproduct/create">Create new</a></div>
  <div class="panel-body">

<!-- *********** END Search Form    *********************-->
<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>Day of Week</th>
    <th>Date</th>
    <th>Public Holiday </th>
    <th>Unoccupied Time</th>
    <th>Annual Leave</th>
    <th>Personal (House search)</th>
    <th>Sick</th>
    <th>Total Time</th>
    <th>Updated Date</th>
    
  </tr>
  </thead>
  <tbody>
  @foreach($Noproducts as $Noproduct)
      <tr>
        <td><a href="/noproducts/{{$Noproduct->id}}">{{$Noproduct->DayOfWeek}}</a></td>
        <td><a href="/noproducts/{{$Noproduct->id}}">{{$Noproduct->ActivityDate}}</a></td>
        <td><a href="/noproducts/{{$Noproduct->id}}">{{$Noproduct->PublicHoliday}}</a></td>
        <td><a href="/noproducts/{{$Noproduct->id}}">{{$Noproduct->UnoccupiedTime}}</a></td>
        <td><a href="/noproducts/{{$Noproduct->id}}">{{$Noproduct->AnnualLeave}}</a></td>
        <td><a href="/noproducts/{{$Noproduct->id}}">{{$Noproduct->HouseSearch}}</a></td>
        <td><a href="/noproducts/{{$Noproduct->id}}">{{$Noproduct->Sick}}</a></td>
        <td><a href="/noproducts/{{$Noproduct->id}}">{{$Noproduct->TotalHour}}</a></td>
        <td><a href="/noproducts/{{$Noproduct->id}}">{{$Noproduct->updated_at}}</a></td>
      </tr>
      @endforeach
  </tbody>
</table>
<!-- **************************       Out of Search     ************************************-->
</div>
</div>
</div>
@endsection