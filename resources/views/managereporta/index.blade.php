@extends('layouts.app')
@section('content')
<br><br><br>
<div class="col-md-12 col-lg-12">
<div class="panel panel-primary">
  <div class="jumbotron"style="height: 100px;"><b><p align="center">List of Assignments</b></div>
  <div class="panel-body">

<!-- *********** Search Form    *********************-->
<form action="/managetimesheet" method="get">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="Search"
            placeholder="Search"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default" name="find">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>

<!-- *********** END Search Form    *********************-->
<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>ID</th>
    <th>Assignment Name</th>
  </tr>
  </thead>
  <tbody>
    @foreach($auditschemas as $auditschema)
      <tr>
        <td><a href="/managereportviewa/{{$auditschema->id}}">{{$auditschema->id}}</a></td>
        <td><a href="/managereportviewa/{{$auditschema->id}}">{{$auditschema->AssignmentName}}</a></td>
      </tr>
      @endforeach
  </tbody>
</table>
<!-- **************************       Out of Search     ************************************-->
</div>
</div>
</div>
@endsection