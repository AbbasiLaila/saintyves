<!-- Main content -->
 <script src="<?php echo base_url('assets/adminPanel/scripts/bootstrap-datepicker.min.js')?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/adminPanel/css/bootstrap-datepicker.min.css')?>">
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/programs/add') ?>" method="post" enctype="multipart/form-data">
        
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header">
             <h3 class="box-title">Add Program</h3>

            </div>
            
            <!-- form start -->
            <div class="box-body">
              <div class="col-md-6">
                 <div class="form-group">
                <label for="en_title">English Title</label>
                <input type="text" class="form-control" name="en_title" id="en_title"  value="<?=@$_POST['en_title']?>" >
              </div>
               <p class="help-block red"><?=@$errors['en_title']?></p> 

               
                <div class="form-group">
                <label for="en_description">English Description</label>
                <textarea  class="form-control ckeditor"  value="<?=@$_POST['en_description']?>" name="en_description"><?=@$_POST['en_description']?>
                </textarea>
               
              </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                <label for="ar_title">Arabic Title</label>
                <input type="text" class="form-control" name="ar_title" id="ar_title"  value="<?=@$_POST['ar_title']?>" >
              </div>
               <p class="help-block red"><?=@$errors['ar_title']?></p> 

          
                <div class="form-group">
                <label for="ar_description">Arabic Description</label>
                <textarea  class="form-control ckeditor"  value="<?=@$_POST['ar_description']?>" name="ar_description"><?=@$_POST['ar_description']?>
                </textarea>
                
              </div>
              </div>
              <div class="form-group single col-md-6">
                <label>Date</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control datePicker" name="date" id="date"  value="<?=@$_POST['date']?>">
                <!-- /.input group -->
              </div>               
              <div class="clear"></div>              
               </div>
               <div class="clear"></div>
             
              <div class="col-md-6">
              
            

              <div class="form-group">
                <label for="image">Thumbnail</label>
                <input type="file" name="image" id="image">
                
                  <?=@$upload_response?>
                
              </div>
            </div>

            <!-- /.box-body --> 
            
      <div class="clear"></div>
          
      <div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Add</button>
          <a href="<?php echo base_url('admin/programs')?>" class="btn btn-info">Back</a> </div>
        </div>
      </form>
    </div>
  </div>
</section>

     <script>
    $('.datePicker').datepicker({
    format: 'yyyy/mm/dd',
    todayHighlight:true,
});
    </script>