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
  <tr><td>Day of week</td><td>{{$Office->DayOfWeek}}</td></tr>
  <tr><td>Date</td><td>{{$Office->ActivityDate}}</td></tr>
  <tr><td>Office work</td><td>{{$Office->OfficeWork}}</td></tr>
  <tr><td>Staff Meeting</td><td>{{$Office->staffMeeting}}</td></tr>
  <tr><td>Inhouse Training</td><td>{{$Office->staffTraining}}</td></tr>
  <tr><td>Outside Training</td><td>{{$Office->OutTraining}}</td></tr>
  <tr><td>continuing Education</td><td>{{$Office->Schooling}}</td></tr>
  <tr><td>Study Leave</td><td>{{$Office->StudyLeave}}</td></tr>
  <tr><td>Travelling</td><td>{{$Office->Travelling}}</td></tr>
  <tr><td>Total Hours</td><td>{{$Office->TotalHour}}</td></tr>
  <tr><td>updated at</td><td>{{$Office->updated_at}}</td></tr>
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
            <a href="/officeedit/{{$Office->id}}" class="list-group-Office">Edit</a>
              <a class="list-group-Office"
              href="#"
                   onclick="
                   var result = confirm('Are you sure you wish to delete this study? Note that all the information for this study will be deleted! and you will not be able to recover later on. Click Okay to continue or click Cancel to stop.');
                           if (result){
                             event.preventDefault();
                             document.getElementById('delete-form').submit();
                           }"
                >

              Delete</a>
              <form id="delete-form" action="{{route('office.destroy',[$Office->id])}}"
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