
<div class="col-md-9 col-lg-9 col-sm-9 pull-left">



      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->

      <!-- Jumbotron -->
      <div class="jumbotron">
      <h2>NIMR-Mbeya Medical Research center<BR>
      ICT Department</h2>
      <p> <h3> Leasing out  of {{$Item->ItemName}} Agreement <BR> <BR>
      This Laptop Lease Agreement(Hereinafter ''Agreement'') is a legal agreement between:
      <b>NIMR-Mbeya Medical Research center and {{$Item->LeaseeName}}</b>
      </h3></p>
        <!--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
      </div>

<table class="table table-bordered table-striped" >
<thead>
  <tr>
    <th>Information of the Item</th>
    <th></th>
  </tr>
  </thead>
  <tbody>
  <tr><td>ID </td><td>{{$Item->id}}</td>
  <td>Asset Number:</td><td><b>{{$Item->AssetNumber}}</b></td>
  </tr>
  <tr><td>Leasee Name:</td><td><b>{{$Item->LeaseeName}}</b></td>
  <td>Keyboard Condition:</td><td><b>{{$Item->Keyboard}}</b></td>
  </tr>
  <tr><td>Leasee Department:</td><td><b>{{$Item->LeaseeDepartment}}</b></td>
  <td>Battery Condition:</td><td><b>{{$Item->Battery}}</b></td>
  </tr>
  <tr><td>Item Category:</td><td><b>{{$Item->ItemCategory}}</b></td>
  <td>Touchpad Condition:</td><td><b>{{$Item->Touchpad}}</b></td>
  </tr>
  <tr><td>Iterm Brand:</td><td><b>{{$Item->ItermBrand}}</b></td>
  <td>OS:</td><td><b>{{$Item->os}}</b></td>
  </tr>
  <tr><td>Item Name:</td><td><b>{{$Item->ItemName}}</b>&nbsp;&nbsp;</td>
  <td>Purchased Date:</td><td><b>{{$Item->PurchasedDate}}</b></td>
  </tr>
  <tr><td>serial Number:</td><td><b>{{$Item->serialNumber}}</b></td>
  <td>Lease Date:</td><td><b>{{$Item->LeaseDate}}</b></td>
  </tr>
  <tr><td>Item Model:</td><td><b>{{$Item->ItemModel}}</b></td>
  <td>General Item Condition:</td><td><b>{{$Item->ItemCondition}}</b></td>
  </tr>
  <tr><td>RAM:</td><td><b>{{$Item->RAM}}</b></td>
  <td>Comments:</td><td><b>{{$Item->Comments}}</b></td>
  </tr>
  <tr><td>HDD:</td><td><b>{{$Item->HDD}}</b></td>
  <td>UpdatedBy:</td><td><b>{{$Item->UpdatedBy}}</b></td>
  </tr>
  <tr><td>Screen Condition:</td><td><b>{{$Item->Screen}}</b></td>
  <td>updated at:</td><td><b>{{$Item->updated_at}}</b></td>
  </tr>
 
 
  
  </tbody>
</table>
<p>The Employer and the Employee do hereby agree to abide to the terms set out on this Agreement.
The terms of this Agreement are as follows:<br><br>

The Employee shall use the laptop for Working purpose the time during which the Employee will be working at MMRC.<br><br>

The Employee agrees that once the Contract is over or when the employee resigns the laptop shall and must be returned and handed over to the Employer in good working condition as it was on the day that it was leased out. Failure to do so the employee would have to be penalized as per the cost of the said Laptop according to the Market Price.
</p>
<div class="jumbotron">
        <h4>Leasee Signature....................................  Date ..................................</h4>
       <h4>IT Staff Signature....................................  Date ..................................</h4>
       <h4>Return Date....................................  (To be filled on Retun Date)</h4>
        <!--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
      </div>







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