<!-- Main content -->

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/board/add') ?>" method="post" enctype="multipart/form-data">
        
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header">
             <h3 class="box-title">Add Board Member</h3>

            </div>
            
            <!-- form start -->
            <div class="box-body">
              <div class="col-md-6">
                 <div class="form-group">
                <label for="en_name">English Name</label>
                <input type="text" class="form-control" name="en_name" id="en_name"  value="<?=@$_POST['en_name']?>" >
              </div>
               <p class="help-block red"><?=@$errors['en_name']?></p> 

               <div class="form-group">
                <label for="en_position">English Position</label>
                <input type="text" class="form-control" name="en_position" id="en_position"  value="<?=@$_POST['en_position']?>" >
              </div>

                <div class="form-group">
                <label for="en_description">English Description</label>
                <textarea  class="form-control ckeditor"  value="<?=@$_POST['en_description']?>" name="en_description"><?=@$_POST['en_description']?>
                </textarea>
               
              </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                <label for="ar_name">Arabic Name</label>
                <input type="text" class="form-control" name="ar_name" id="ar_name"  value="<?=@$_POST['ar_name']?>" >
              </div>
               <p class="help-block red"><?=@$errors['ar_name']?></p> 

               <div class="form-group">
                <label for="ar_position">Arabic Position</label>
                <input type="text" class="form-control" name="ar_position" id="ar_position"  value="<?=@$_POST['ar_position']?>" >
              </div>

                <div class="form-group">
                <label for="ar_description">Arabic Description</label>
                <textarea  class="form-control ckeditor"  value="<?=@$_POST['ar_description']?>" name="ar_description"><?=@$_POST['ar_description']?>
                </textarea>
                
              </div>
              </div>
             
              <div class="col-md-6">
              
              <div class="form-group">
                <label for="image">Board Member Image</label>
                <input type="file" name="image" id="image">
                
                  <?=@$upload_response?>
                
              </div>
            </div>

            <!-- /.box-body --> 
            
      <div class="clear"></div>
          
          <div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>
        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Add</button>
          <a href="<?=base_url('board')?>" class="btn btn-info">Back</a>
        </div>
      </form>
    </div>
  </div>
</section>
