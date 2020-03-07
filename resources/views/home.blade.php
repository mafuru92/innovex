@extends('layouts.app')

@section('content')

<br><br><br><br>
    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron list-group-item active" style="height: 230px;" >
            <h2>INNOVEX TIMESHEETS AND AUDIT ASSIGNMENTS MANAGEMENT SYTEM!</h2>
            <p style="font-size: 1.2em;">Welcome! This is INNOVEX online system for staffs to fill Timesheets and manage
            Audit Assignments 
            </p>
          </div>
          <div class="row">
            <div class="col-xs-6 col-lg-4">
              <h2>STAFF TIMESHEET</h2>
              <p>This is an electronic timesheet system for innovex staffs please fill appropriately </p>
              <p><a class="btn btn-default" href="/activity" role="button">View details »</a></p>
            </div><!--/.col-xs-6.col-lg-4-->

            <div class="col-xs-6 col-lg-4">
              <h2>STAFF RETAIN</h2>
              <p>Staffs retail</p>
              <p><a class="btn btn-default" href="/task" role="button">View details »</a></p>
            </div><!--/.col-xs-6.col-lg-4-->

            <div class="col-xs-6 col-lg-4">
              <h2>AUDIT ASSIGNMENTS</h2>
              <p>Review Audit Assignments</p>
              <p><a class="btn btn-default" href="/auditschema" role="button">View details »</a></p>
            </div><!--/.col-xs-6.col-lg-4 -->
			
            <div class="col-xs-6 col-lg-4">
              <h2>MANAGE TIMESHEETS</h2>
              <p>Review Staffs Timesheets</p>
              <p><a class="btn btn-default" href="/managetimesheet" role="button">View details »</a></p>
            </div><!--/.col-xs-6.col-lg-4 -->
			
            <div class="col-xs-6 col-lg-4">
              <h2>MANAGE REPORTS</h2>
              <p>Staffs and Audit Assignments report </p>
              <p><a class="btn btn-default" href="/managereport" role="button">View details »</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
			
            <div class="col-xs-6 col-lg-4">
              <h2>MANAGE USERS</h2>
              <p>Bring the Users Management page</p>
              <p><a class="btn btn-default" href="{{ route('user.index') }}" role="button">View details »</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
            </div><!--/row-->
            </div><!--/.col-xs-12.col-sm-9-->

        



      </div><!--/row-->

      <hr>

      <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif;}

.sidebar {
  height: 100%;
  width: 330px;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: #33B8FF;
  overflow-x: hidden;
  padding-top: 16px;
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  padding: 0px 10px;

}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidebar">
<div class="image">
						<!-- Slideshow 1 -->
            <br> <br>
					    <ul class="rslides" id="slider1">
					      <img src="{{asset('images/image.PNG')}}">
                <img src="{{asset('images/image1.PNG')}}">
					    </ul>
						 <!-- Slideshow 2 -->
					</div>
</div>
     

    </div><!--/.container-->
  

</body>

@endsection
