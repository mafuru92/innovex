@extends('layouts.app')
@section('content')
<br><br><br><br><br>

<div class="col-md-9 col-lg-9 col-sm-9 pull-left" style="background: white;">




<!-- Example row of columns -->
<h1><p align="center">Add a new item</p> </h1>
      <div class="row col-sm-12 col-md-12 col-lg-12" style="background:white; margin: 10px">
      
      <form method="post" action="{{route('items.store')}}">

                           {{csrf_field()}}
                          
                            <div class="form-group">
                                <label for="LeaseeName">Leasee Name</label>
                                <input placeholder="Enter Leasee Name"
                                       id="LeaseeName"
                                       name="LeaseeName"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 
                            
                            <div class="form-group">
                                <label for="LeaseeDepartment">Leasee Department<span class="required">*</span></label>
                                   <select placeholder="LeaseeDepartment" id="LeaseeDepartment" required name="LeaseeDepartment" class="form-control"/>
                                       <option value=""></option>
                                       @foreach($Department as $Departments)
                                       <option value="{{$Departments->DepartmentName}}">{{$Departments->DepartmentName}}</option>
                                    @endforeach
                                  
                                       </select>
                            </div>  
                            <div class="form-group">
                                <label for="ItemName">Item Name<span class="required">*</span></label>
                                <input placeholder="Enter Item Name"
                                       id="ItemName"
                                       required
                                       name="ItemName"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div> 
                            <div class="form-group">
                                <label for="ItemCategory">Item Category<span class="required">*</span></label>
                                   <select placeholder="Item Category" id="ItemCategory" required name="ItemCategory" class="form-control"/>
                                   <option value=""></option>
                                   @foreach($Itemcategory as $Itemcategories)
                                       <option value="{{$Itemcategories->Category}}">{{$Itemcategories->Category}}</option>
                                    @endforeach
                                       </select>
                            </div>            
                            <div class="form-group">
                                <label for="ItermBrand">Item Brand<span class="required">*</span></label>
                                   <select placeholder="Item Brand" id="ItermBrand" required name="ItermBrand" class="form-control"/>
                                   <option value=""></option>
                                   @foreach($Itembrand as $Itembrands)
                                       <option value="{{$Itembrands->Brands}}">{{$Itembrands->Brands}}</option>
                                    @endforeach
                                       </select>
                            </div>      
                            <div class="form-group">
                                <label for="serialNumber">serial Number</label>
                                <input placeholder="Enter serial Number"
                                       id="serialNumber"
                                       name="serialNumber"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div>  

                            <div class="form-group">
                                <label for="AssetNumber">Asset Number</label>
                                <input placeholder="Enter Asset Number"
                                       id="AssetNumber"
                                       name="AssetNumber"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div>  

                            <div class="form-group">
                                <label for="ItemModel">Item Model</label>
                                <input placeholder="Enter Item Model"
                                       id="ItemModel"
                                       name="ItemModel"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div>  

                            <div class="form-group">
                                <label for="RAM">RAM</label>
                                <input placeholder="Enter RAM"
                                       id="RAM"
                                       name="RAM"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div>  

                            <div class="form-group">
                                <label for="HDD">HDD</label>
                                <input placeholder="Enter HDD"
                                       id="HDD"
                                       name="HDD"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div>  

                            <div class="form-group">
                                <label for="Screen">Screen Condition</label>
                                   <select placeholder="Screen" id="Screen" name="Screen" class="form-control"/>
                                       <option value="NA">NA</option>
                                       <option value="Good">Good</option>
                                       <option value="Bad">Bad</option>
                                       </select>
                            </div>  

                            <div class="form-group">
                                <label for="Keyboard">Keyboard Condition</label>
                                   <select placeholder="Keyboard" id="Keyboard" name="Keyboard" class="form-control"/>
                                       <option value="NA">NA</option>
                                       <option value="Good">Good</option>
                                       <option value="Bad">Bad</option>
                                       </select>
                            </div>  

                            <div class="form-group">
                                <label for="Battery">Battery Condition</label>
                                   <select placeholder="Battery" id="Battery" name="Battery" class="form-control"/>
                                       <option value="NA">NA</option>
                                       <option value="Good">Good</option>
                                       <option value="Bad">Bad</option>
                                       </select>
                            </div>  

                            <div class="form-group">
                                <label for="Touchpad">Touchpad Condition</label>
                                   <select placeholder="Touchpad" id="Touchpad" name="Touchpad" class="form-control"/>
                                       <option value="NA">NA</option>
                                       <option value="Good">Good</option>
                                       <option value="Bad">Bad</option>
                                       </select>
                            </div>  
                            <div class="form-group">
                                <label for="os">Operating System<span class="required">*</span></label>
                                   <select placeholder="os" id="os" required name="os" class="form-control"/>
                                       <option value=""></option>
                                       <option value="Windows 7">Windows 7</option>
                                       <option value="Windows 10">Windows 10</option>
                                       <option value="Windows xp">Windows xp</option>
                                       <option value="Windows Server 2003">Windows Server 2003</option>
                                       <option value="Windows Server 2008">Windows Server 2008</option>
                                       <option value="Windows Server 2012">Windows Server 2012</option>
                                       <option value="Linux/Ubuntu server">Linux/Ubuntu server</option>
                                       <option value="Linux/Ubuntu Client">Linux/Ubuntu Client</option>
                                       </select>
                            </div>     
                            <div class="form-group">
                                <label for="ItemType">Server type (Fill this question only if it is a server)</label>
                                   <select placeholder="ItemType" id="ItemType" name="ItemType" class="form-control"/>
                                       <option value=""></option>
                                       <option value="Virtual Machine">Virtual Machine</option>
                                       <option value="Physical Machine">Physical Machine</option>
                                       </select>
                            </div>    
                            <div class="form-group">
                                <label for="PhysicalMachineServers">Virtual Machine In which Physical Machine (Fill this question only if you selected Virtual Machine in above Question)</label>
                                   <select placeholder="PhysicalMachineServers" id="PhysicalMachineServers" name="PhysicalMachineServers" class="form-control"/>
                                       <option value=""></option>
                                       @foreach($Server as $Servers)
                                       <option value="{{$Servers->ServerName}}">{{$Servers->ServerName}}</option>
                                    @endforeach
                                       </select>
                            </div>  
                            <div class="form-group">
                                <label for="PurchasedDate">Purchased Date</label>
                                <input type="date" placeholder="Enter Purchased Date"
                                       id="PurchasedDate"
                                       name="PurchasedDate"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div>     
                            <div class="form-group">
                                <label for="LeaseDate">Lease Date</label>
                                <input type="date" placeholder="Enter Lease Date"
                                       id="LeaseDate"
                                       name="LeaseDate"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div>   
                            <div class="form-group">
                                <label for="IpAddress">Ip Address</label>
                                <input placeholder="Enter Ip Address"
                                       id="IpAddress"
                                       name="IpAddress"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div>   
                            <div class="form-group">
                                <label for="MACAdress">MAC Adress</label>
                                <input placeholder="Enter MAC Adress"
                                       id="MACAdress"
                                       name="MACAdress"
                                       spellcheck="false"
                                       class="form-control"
                                       value=""
                                       />
                            </div>   
                            <div class="form-group">
                                <label for="ItemCondition">General Item Condition<span class="required">*</span></label>
                                   <select placeholder="ItemCondition" id="ItemCondition" required name="ItemCondition" class="form-control"/>
                                       <option value=""></option>
                                       <option value="Good">Good</option>
                                       <option value="Bad">Bad</option>
                                       </select>
                            </div>  

                            <div class="form-group">
                                <label for="returned">Item Returned?</label>
                                   <select placeholder="returned" id="returned" name="returned" class="form-control"/>
                                       <option value="NA">NA</option>
                                       <option value="No">No</option>
                                       <option value="Yes">Yes</option>
                                       </select>
                            </div>  
                            <div class="form-group">
                                 <label for="Comments">Comments</label>
                                 <textarea placeholder="Enter Comments"
                                           style="resize:Vertical"
                                           id="company-content"
                                           name="Comments"
                                           spellcheck="true"
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
            <a href="/items" class="list-group-item">All Items</a>
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