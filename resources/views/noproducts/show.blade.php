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
  <tr><td>Day of Week</td><td>{{$Noproduct->DayOfWeek}}</td></tr>
  <tr><td>Date</td><td>{{$Noproduct->ActivityDate}}</td></tr>
  <tr><td>Public Holiday</td><td>{{$Noproduct->PublicHoliday}}</td></tr>
  <tr><td>Unoccupied Time</td><td>{{$Noproduct->UnoccupiedTime}}</td></tr>
  <tr><td>Annual Leave</td><td>{{$Noproduct->AnnualLeave}}</td></tr>
  <tr><td>House Search</td><td>{{$Noproduct->HouseSearch}}</td></tr>
  <tr><td>Sick</td><td>{{$Noproduct->Sick}}</td></tr>
  <tr><td>Total Time</td><td>{{$Noproduct->TotalHour}}</td></tr>
  <tr><td>updated at</td><td>{{$Noproduct->updated_at}}</td></tr>
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
            <a href="/noproductedit/{{$Noproduct->id}}" class="list-group-Noproduct">Edit</a>
              <a class="list-group-Noproduct"
              href="#"
                   onclick="
                   var result = confirm('Are you sure you wish to delete this study? Note that all the information for this study will be deleted! and you will not be able to recover later on. Click Okay to continue or click Cancel to stop.');
                           if (result){
                             event.preventDefault();
                             document.getElementById('delete-form').submit();
                           }"
                >

              Delete</a>
              <form id="delete-form" action="{{route('noproduct.destroy',[$Noproduct->id])}}"
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