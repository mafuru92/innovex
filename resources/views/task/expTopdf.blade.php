
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
<tr><td>ID </td><td>{{$Tasks->id}}</td></tr>
<tr><td>Staff ID</td><td>{{$Tasks->UserId}}</td></tr>
<tr><td>Assignment Name</td><td>{{$Tasks->AssignmentName}}</td></tr>
<tr><td>Staff Assigned Time</td><td>{{$Tasks->AssignedTime}}</td></tr>
<tr><td>Assignment start Date</td><td>{{$Tasks->StartDate}}</td></tr>
<tr><td>End of Assignment</td><td>{{$Tasks->EndDate}}</td></tr>
<tr><td>Status</td><td>{{$Tasks->Status}}</td></tr>
<tr><td>UpdatedBy</td><td>{{$Tasks->UpdatedBy}}</td></tr>
<tr><td>updated at</td><td>{{$Tasks->updated_at}}</td></tr>
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



<!--
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
            </ol>
          </div>
          -->
        </div>