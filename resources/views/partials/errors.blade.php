@if (isset($errors) && count($errors) > 0)
<br><br><br>
     <div class="alert alert-dismissable alert-success col-md-9 col-lg-9">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"> &times; </span>
          </button>
          @foreach ($errors->all() as $error)
    <li><strong>{!! $error !!} </strong></li>
    @endforeach
     </div>
@endif