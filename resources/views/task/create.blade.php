@extends('layouts.app')
@section('content')
<br><br><br><br><br>

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">




<!-- Example row of columns -->
<h1><p align="center">Add a new Assignment</p> </h1>
      <div class="row col-sm-12 col-md-12 col-lg-12" style="background:white; margin: 10px">
      
      <form method="post" action="{{route('task.store')}}">

                           {{csrf_field()}}
                          
                           <div class="form-group">
                                <label for="UserId">UserId<span class="required">*</span></label>
                                   <select placeholder="UserId" id="UserId" required name="UserId" class="form-control"/>
                                       <option value=""></option>
                                       @foreach($Users as $User)
                                       <option value="{{$User->email}}">{{$User->email}}</option>
                                    @endforeach
                                  
                                       </select>
                            </div>  

                            <div class="form-group">
                                <label for="AssignmentName">Assignment Name<span class="required">*</span></label>
                                <select placeholder="Assignment Name" id="AssignmentName" required name="AssignmentName" class="form-control"/>
                                       <option value=""></option>
                                       @foreach($assignments as $assignment)
                                       <option value="{{$assignment->AssignmentName}}">{{$assignment->AssignmentName}}</option>
                                    @endforeach
                                  
                                       </select>
                            </div> 

                            <div class="form-group">
                                <label for="AssignedTime">staff Assigned Time(Days)<span class="required">*</span></label>
                                <input placeholder="User Assigned Time"
                                       id="AssignedTime"
                                       required
                                       name="AssignedTime"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 
                             

                            <div class="form-group">
                                <label for="StartDate">Assignment start Date</label>
                                <input type="date" placeholder="Enter Assignment Date"
                                       id="StartDate"
                                       name="StartDate"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div>   

                            <div class="form-group">
                                <label for="EndDate">End of Assignment</label>
                                <input type="date" placeholder="Enter  End of Assignment Date"
                                       id="EndDate"
                                       name="EndDate"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div>
                            <div class="form-group">
                                <label for="Status">Status</label>
                                       <select placeholder="Status" id="Status" name="Status" class="form-control"/>
                                       <option value=""></option>
                                       <option value="in progress">On assignment</option>
                                       <option value="Off assignment">Off assignment</option>
                                       </select>
                                       />
                            </div>



                            <div class="form-group">
                                <input type="submit" class="btn btn-primary"
                                       value="submit"/>
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
            <a href="/assignment" class="list-group-item">All Assignments</a>
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