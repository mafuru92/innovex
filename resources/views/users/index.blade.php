@extends('layouts.app')
@section('content')
<br><br><br><br>
<div class="col-md-12 col-lg-12">
<div class="panel panel-primary">
  <div class="jumbotron"style="height: 100px;"><b><p align="center">Users Information</b></div>
  <div class="panel-body">
  
  <form action="/user" method="get">
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

<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>User Role</th>
    <th>User Active</th>
    <th>Email</th>

  </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <tr>
      
        <td><a href="/user/{{$user->id}}/edit">{{$user->id}}</a></td>
        <td><a href="/user/{{$user->id}}/edit">{{$user->fname}}</a></td>
        <td><a href="/user/{{$user->id}}/edit">{{$user->lname}}</a></td>
        <td><a href="/user/{{$user->id}}/edit">{{$user->UserLevel}}</a></td>
        <td><a href="/user/{{$user->id}}/edit">{{$user->Active}}</a></td>
        <td>{{$user->email}}</td>
      </tr>
      @endforeach
  </tbody>
</table>


</div>
</div>
</div>
@endsection