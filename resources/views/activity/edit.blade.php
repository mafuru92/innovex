@extends('layouts.app')
@section('content')
<br><br><br><br><br>

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">




<!-- Example row of columns -->

<h1><p align="center">Edit your Timesheet</p> </h1>
     <form method="post" action="{{route('activity.update',[$Activity->id])}}">
     
                           {{csrf_field()}}
                           <input type="hidden" name="_method" value="put">
                           <input type="hidden" name="id" value="{{$Activity->id}}">
                           

                           <div class="form-group">
                                <label for="DayOfWeek">Day Of Week</label>
                                <select placeholder="Day of the week" id="DayOfWeek" required name="DayOfWeek" class="form-control"  value="{{$Activity->DayOfWeek}}"/>
                                       <option value=""></option>
                                       <option value="Monday">Monday</option>
                                       <option value="Tuesday">Tuesday</option>
                                       <option value="Wednesday">Wednesday</option>
                                       <option value="Thursday">Thursday</option>
                                       <option value="Friday">Friday</option>
                                       <option value="Saturday">Saturday</option>
                                       <option value="Sunday">Sunday</option>
                                       </select>
                          
                                
                            </div> 
                                        

                            <div class="form-group">
                                <label for="ActivityDate">Date</label>
                                <input placeholder="Date"
                                       id="ActivityDate"
                                       name="ActivityDate"
                                       type="date"
                                       spellcheck="false"
                                       class="form-control"
                                       value="{{$Activity->ActivityDate}}"
                                       />
                            </div> 
                            
                            <div class="form-group">
                                <label for="AssignmentName">Assignment Name</label>
                                <input placeholder="Assignment Name"
                                       id="AssignmentName"
                                       name="AssignmentName"
                                       spellcheck="false"
                                       class="form-control"
                                       value="{{$Activity->AssignmentName}}"
                                       />
                            </div> 

                            <div class="form-group">
                                <label for="SubAssignment"> Sub assignment</label>
                                <input placeholder=""
                                       id="SubAssignment"
                                       name="SubAssignment"                                       
                                       spellcheck="false"
                                       class="form-control"
                                       value="{{$Activity->SubAssignment}}"
                                       />
                            </div> 

                            <div class="form-group">
                                <label for="SubAssignmentTwo">Task</label>
                                <input placeholder=""
                                       id="SubAssignmentTwo"
                                       name="SubAssignmentTwo"                                       
                                       spellcheck="false"
                                       class="form-control"
                                       value="{{$Activity->SubAssignmentTwo}}"
                                       />
                            </div> 


                            <div class="form-group">
                                <label for="SubassignmentThree">Sub Task</label>
                                <input placeholder=""
                                       id="SubassignmentThree"
                                       name="SubassignmentThree"                                     
                                       spellcheck="false"
                                       class="form-control"
                                       value="{{$Activity->SubassignmentThree}}"
                                       />
                            </div> 

                            <div class="form-group">
                                <label for="DurationHours">Time in Hours</label>
                                <input placeholder="Eg 2"
                                       id="DurationHours"
                                       name="DurationHours"                                    
                                       spellcheck="false"
                                       class="form-control"
                                       value="{{$Activity->DurationHours}}"
                                       />
                            </div> 

                           


                     
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary"
                                       value="submit"/>
</div>  
</form>  
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