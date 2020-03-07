@extends('layouts.app')
@section('content')
<br><br><br><br><br>

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">




<!-- Example row of columns -->

<h1><p align="center">Edit Audit Details</p> </h1>
     <form method="post" action="{{route('noproduct.update',[$Noproduct->id])}}">
     
                           {{csrf_field()}}
                           <input type="hidden" name="_method" value="put">
                           <input type="hidden" name="id" value="{{$Noproduct->id}}">

                           <div class="form-group">
                                <label for="DayOfWeek">Day Of Week</label>
                                <select placeholder="Day of the week" id="DayOfWeek" required name="DayOfWeek" class="form-control"  value="{{$Noproduct->DayOfWeek}}"/>
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
                                       value="{{$Noproduct->ActivityDate}}"
                                       />
                            </div> 
                           

                           <div class="form-group">
                           <label for="PublicHoliday">Public Holiday</label>
                                <input placeholder="Eg. Nanenane"
                                       id="PublicHoliday"
                                       name="PublicHoliday"
                                       spellcheck="false"
                                       class="form-control"
                                       value="{{$Noproduct->PublicHoliday}}"
                                       />
                            </div> 

                            <div class="form-group">
                            <label for="UnoccupiedTime">Unoccupied Time</label>
                                <input placeholder="Number of Hours"
                                       id="UnoccupiedTime"
                                       name="UnoccupiedTime"
                                       spellcheck="false"
                                       class="form-control"
                                       value="{{$Noproduct->UnoccupiedTime}}"
                                       />
                            </div> 
                            
                            <div class="form-group">
                            <label for="AnnualLeave">Annual Leave</label>
                                <input placeholder="Leave"
                                       id="AnnualLeave"
                                       name="AnnualLeave"
                                       spellcheck="false"
                                       class="form-control"
                                       value="{{$Noproduct->AnnualLeave}}"
                                       />
                            </div> 

                            <div class="form-group">
                            <label for="HouseSearch">Person (House Search)</label>
                                <input placeholder="hours"
                                       id="HouseSearch"
                                       name="HouseSearch"
                                       spellcheck="false"
                                       class="form-control"
                                       value="{{$Noproduct->HouseSearch}}"
                                       />
                            </div> 

                            <div class="form-group">
                            <label for="Sick">Sick</label>
                                <input placeholder="Sick"
                                       id="Sick"
                                       name="Sick"
                                       spellcheck="false"
                                       class="form-control"
                                       value="{{$Noproduct->Sick}}"
                                       />
                            </div> 


                            <div class="form-group">
                            <label for="TotalHour">Total Time</label>
                                <input placeholder="total hours"
                                       id="TotalHour"
                                       name="TotalHour"
                                       spellcheck="false"
                                       class="form-control"
                                       value="{{$Noproduct->TotalHour}}"
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