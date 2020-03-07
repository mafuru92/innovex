@extends('layouts.app')
@section('content')
<br><br><br><br><br>

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">

<!-- Example row of columns -->

<h1>Edit User </h1>
      <div class="row col-sm-12 col-md-12 col-lg-12" style="background:white; margin: 10px">
      
      <form method="post" action="{{route('user.update',[$User->id])}}">
     
                           {{csrf_field()}}
                           <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="fname">First Name<span class="required">*</span></label>
                                <input placeholder="Enter First Name"
                                       id="fname"
                                       required
                                       name="fname"
                                       spellcheck="false"
                                       class="form-control"
                                       value="{{$User->fname}}"
                                       />
                            </div>   
                            <div class="form-group">
                                <label for="lname">Last Name<span class="required">*</span></label>
                                <input placeholder="Enter Last Name"
                                       id="lname"
                                       required
                                       name="lname"
                                       spellcheck="false"
                                       class="form-control"
                                       value="{{$User->lname}}"
                                       />
                            </div>   
                            <div class="form-group">
                                <label for="UserLevel">User Level<span class="required">*</span></label>
                                   <select placeholder="UserLevel" id="UserLevel" required name="UserLevel" class="form-control"/>
                                       <option value="{{$User->UserLevel}}">{{$User->UserLevel}}</option>
                                       <option value="Admin">Admin</option>
                                       <option value="User">User</option>
                                       </select>
                            </div>   
                            <div class="form-group">
                                <label for="Active">Active<span class="required">*</span></label>
                                   <select placeholder="Active" id="Active" required name="Active" class="form-control"/>
                                       <option value="{{$User->Active}}">{{$User->Active}}</option>
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>
                                       </select>
                            </div>  
                            <div class="form-group">
                                <label for="email">Email<span class="required">*</span></label>
                                <input placeholder="Enter Your Email"
                                       id="email"
                                       required
                                       name="email"
                                       spellcheck="false"
                                       class="form-control"
                                       value="{{$User->email}}"
                                       />
                            </div>   
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary"
                                       value="Save"/>
</div>  
</form>  
      </div> 

     </div> 
    


   
   <div class="col-sm-3 col-md-3 col-lg-3  pull-right">
         <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>-->
<!--
      <div class="sidebar-module">
            <h4>Actions</h4>

            <ol class="list-unstyled">
              <li><a href="/approvalinfors">All Studies</a></li>
              <li><a href="/home">Home</a></li>
              

            </ol>
          </div>
          -->

        
          <div class="list-group">
            <a href="#" class="list-group-item active">Link</a>
            <a href="/user" class="list-group-item">All Users</a>
            <a href="/home" class="list-group-item">Home</a>
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