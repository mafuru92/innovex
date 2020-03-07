@extends('layouts.app')
@section('content')
<br><br><br><br><br>

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background:white;">




<!-- Example row of columns -->
<h1><p align="center">Add new details</p> </h1>
      <div class="row col-sm-12 col-md-12 col-lg-12" style="background:white; margin: 10px">
      
      <form method="post" action="{{route('office.store')}}">

                           {{csrf_field()}}
                          
                           <div class="form-group">
                                <label for="DayOfWeek">Day Of Week</label>
                                <select placeholder="Day of the week" id="DayOfWeek" required name="DayOfWeek" class="form-control"/>
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
                                       value=""
                                       />
                            </div> 
                           

                           <div class="form-group">
                           <label for="OfficeWork">Office Work</label>
                                <input placeholder="Eg preparing Audit report/proposal"
                                       id="OfficeWork"
                                       name="OfficeWork"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 

                            <div class="form-group">
                            <label for="staffMeeting">Staff Meeting</label>
                                <input placeholder="Number of Hours"
                                       id="staffMeeting"
                                       name="staffMeeting"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 
                            
                            <div class="form-group">
                            <label for="staffTraining">Staff Training</label>
                                <input placeholder="Eg. Forensic Audit "
                                       id="staffTraining"
                                       name="staffTraining"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 

                            <div class="form-group">
                            <label for="OutTraining">Outside Training</label>
                                <input placeholder="hours"
                                       id="OutTraining"
                                       name="OutTraining"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 

                            <div class="form-group">
                            <label for="Schooling">Continuing Education</label>
                                <input placeholder="Eg CISA"
                                       id="Schooling"
                                       name="Schooling"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 


                            <div class="form-group">
                            <label for="StudyLeave">Study Leave</label>
                                <input placeholder="Eg MBA UDSM"
                                       id="StudyLeave"
                                       name="StudyLeave"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 

                            <div class="form-group">
                            <label for="Travelling">Travelling</label>
                                <input placeholder="Eg. Dodoma"
                                       id="Travelling"
                                       name="Travelling"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 


                            <div class="form-group">
                            <label for="TotalHour">Total Hours</label>
                                <input placeholder="Max 8 hours"
                                       id="TotalHour"
                                       name="TotalHour"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary"
                                       value="submit"/>
</div>  
 
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