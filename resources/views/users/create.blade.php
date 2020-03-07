@extends('layouts.app')
@section('content')
<br><br><br><br><br>

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">




<!-- Example row of columns -->

<h1>Add a new Study</h1>
      <div class="row col-sm-12 col-md-12 col-lg-12" style="background:white; margin: 10px">
      
      <form method="post" action="{{route('approvalinfors.store')}}">

                           {{csrf_field()}}

                            <div class="form-group">
                                <label for="StudyID">Study ID<span class="required">*</span></label>
                                <input placeholder="Enter Study ID"
                                       id="StudyID"
                                       required
                                       name="StudyID"
                                       spellcheck="false"
                                       class="form-control"
                                       />
                            </div>   
                            <div class="form-group">
                                <label for="StudyName">Study Name<span class="required">*</span></label>
                                <input placeholder="Enter Study Name"
                                       id="StudyName"
                                       required
                                       name="StudyName"
                                       spellcheck="false"
                                       class="form-control"
                                       />
                            </div>   
                            <div class="form-group">
                                <label for="SubmissionType">Submission Type<span class="required">*</span></label>
                                   <select placeholder="Submission Type" id="SubmissionType" required name="SubmissionType" class="form-control"/>
                                       <option value=""></option>
                                       <option value="MMREC">MMREC</option>
                                       <option value="NIMR">NIMR</option>
                                       <option value="IRB">IRB</option>
                                       </select>
                            </div>   
                            <div class="form-group">
                                <label for="ApplicationLevel">Application Level<span class="required">*</span></label>
                                   <select placeholder="Application Level" id="ApplicationLevel" required name="ApplicationLevel" class="form-control"/>
                                       <option value=""></option>
                                       <option value="Initial">Initial</option>
                                       <option value="Extension">Extension</option>
                                       <option value="NA">IRB</option>
                                       </select>
                            </div>  
                            <div class="form-group">
                                <label for="SubmissionDate">Submission Date</label>
                                <input type="date" placeholder="Enter Submission Date"
                                       id="SubmissionDate"
                                       required
                                       name="SubmissionDate"
                                       spellcheck="false"
                                       class="form-control"
                                       />
                            </div>    
                            <div class="form-group">
                                <label for="AprovalDate">Aproval Date</label>
                                <input type="date" placeholder="Enter Aproval Date"
                                       id="AprovalDate"
                                       required
                                       name="AprovalDate"
                                       spellcheck="false"
                                       class="form-control"
                                       />
                            </div>  
                            <div class="form-group">
                                <label for="NextSixMonthReportDate">Next Progressive Report Date</label>
                                <input type="date" placeholder="Enter Next Progressive Report Date"
                                       id="NextSixMonthReportDate"
                                       required
                                       name="NextSixMonthReportDate"
                                       spellcheck="false"
                                       class="form-control"
                                       />
                            </div>      
                            <div class="form-group">
                                <label for="ReportReminderDate">Progressive Report Remainder Date</label>
                                <input type="date" placeholder="Enter Progressive Report Reminder Date"
                                       id="ReportReminderDate"
                                       required
                                       name="ReportReminderDate"
                                       spellcheck="false"
                                       class="form-control"
                                       />
                            </div>    
                            <div class="form-group">
                                <label for="ExtansionDate">Extansion Date</label>
                                <input type="date" placeholder="Enter Extansion Date"
                                       id="ExtansionDate"
                                       required
                                       name="ExtansionDate"
                                       spellcheck="false"
                                       class="form-control"
                                       />
                            </div> 
                            <div class="form-group">
                                <label for="ExtensionRemainderDate">Extension Remainder Date</label>
                                <input type="date" placeholder="Enter Extension Remainder Date"
                                       id="ExtensionRemainderDate"
                                       required
                                       name="ExtensionRemainderDate"
                                       spellcheck="false"
                                       class="form-control"
                                       />
                            </div>  
                            <div class="form-group">
                                <label for="ReportSubmitted">Report Submitted</label>
                                   <select placeholder="Report Submitted" id="ReportSubmitted" name="ReportSubmitted" class="form-control"/>
                                       <option value=""></option>
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>
                                       </select>
                            </div>  
                            <div class="form-group">
                                <label for="ReportSubmittedDate">Report Submitted Date</label>
                                <input type="date" placeholder="Enter Report Submitted Date"
                                       id="ReportSubmittedDate"
                                       required
                                       name="ReportSubmittedDate"
                                       spellcheck="false"
                                       class="form-control"
                                       />
                            </div>    
                            <div class="form-group">
                                <label for="NextExtansionDate">Next Extansion Date</label>
                                <input type="date" placeholder="Next Extansion Date"
                                       id="NextExtansionDate"
                                       required
                                       name="NextExtansionDate"
                                       spellcheck="false"
                                       class="form-control"
                                       />
                            </div>  
                            <div class="form-group">
                                <label for="ReportNotification">Do you need the system to send progressive Report Notification if required?</label>
                                   <select placeholder="Report Notification" id="ReportNotification" name="ReportNotification" class="form-control"/>
                                       <option value=""></option>
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>
                                       </select>
                            </div>  
                            <div class="form-group">
                                <label for="ExtensionNotification">Do you need the system to send Extension Notification if required?</label>
                                   <select placeholder="Extension Notification" id="ExtensionNotification" name="ExtensionNotification" class="form-control"/>
                                       <option value=""></option>
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>
                                       </select>
                            </div>  
                            <div class="form-group">
                                <label for="Status">Study Status</label>
                                   <select placeholder="Status" id="Status" name="Status" class="form-control"/>
                                       <option value=""></option>
                                       <option value="Active">Active</option>
                                       <option value="Closed">Closed</option>
                                       </select>
                            </div>  
                            <div class="form-group">
                                <label for="EndDateOfStudy">End Date Of Study</label>
                                <input type="date" placeholder="EndDateOfStudy"
                                       id="EndDateOfStudy"
                                       required
                                       name="EndDateOfStudy"
                                       spellcheck="false"
                                       class="form-control"
                                       />
                            </div>                             

                          

                            <div class="form-group">
                                 <label for="Comments">Comments</label>
                                 <textarea placeholder="Enter Comments"
                                           style="resize:Vertical"
                                           id="company-content"
                                           name="Comments"
                                           spellcheck="false"
                                           rows="5"
                                           class="form-control autosize-target text-left">
                                         </textarea>
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
            <a href="/approvalinfors" class="list-group-item">All Studies</a>
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