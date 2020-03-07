<?php if(session()->has('success')): ?>
<br><br><br>
     <div class="alert alert-dismissable alert-success col-md-9 col-lg-9">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"> &times; </span>
          </button>
       
    <strong><?php echo session()->get('success'); ?> </strong>

     </div>
<?php endif; ?>