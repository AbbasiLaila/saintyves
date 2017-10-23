<!-- Main content -->

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/gallery/videos/add') ?>" method="post" enctype="multipart/form-data">
        
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header">
             <h3 class="box-title">Add Video</h3>

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
              
             
              <div class="col-md-6">
              <div class="form-group">
                <label for="category_id">Category</label>
                 <select class="form-control" name="category_id">
                  <?php foreach ($categories as $category) {?>
                    <option  <?php  if(@$_POST['category_id'] == $category['id']){ $checked="selected"; }else{$checked="";} ?> <?=$checked;?>  value="<?=$category['id']?>" ><?=$category['en_title']?></option>
                  <?php } ?>
                  </select>
              </div>
            

              <div class="form-group">
                <label for="image">Thumbnail</label>
                <input type="file" name="image" id="image">
                
                  <?=@$upload_response?>
                
              </div>

               <div class="form-group">
                <label for="video">Video</label>
                <input type="file" name="video" id="video">
                   <p class="help-block red"><?=@$req?></p>
                  <?=@$upload_response2?>
                
              </div>
            </div>

            <!-- /.box-body --> 
            
      <div class="clear"></div>
          
      <div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Add</button>
          <a href="<?php echo base_url('admin/gallery/videos')?>" class="btn btn-info">Back</a> </div>
        </div>
      </form>
    </div>
  </div>
</section>
