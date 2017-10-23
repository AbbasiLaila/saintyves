<!-- Main content -->

<section class="content">
  <?=@$this->session->flashdata('slideEdited')?>
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/slider/edit/'.$slide->id) ?>" method="post" enctype="multipart/form-data">
        
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header">
             <h3 class="box-title">Edit Slide</h3>

            </div>
            <!-- form start -->
            <div class="box-body">
              <div class="col-md-6">
              <div class="form-group">
                <label for="en_title">English Title</label>
                <input type="text" class="form-control" name="en_title" id="en_title"  value="<?php 
                        if(@$_POST){
                          echo @$_POST['en_title']; 
                        } else{
                          echo $slide->en_title;
                        } ?>">
               
              </div>
             
              <div class="form-group">
                <label for="en_description">English Description</label>
                <textarea  class="form-control ckeditor"  name="en_description"><?php 
                        if(@$_POST){
                          echo @$_POST['en_description']; 
                        } else{
                          echo $slide->en_description;
                        } ?> 
              </textarea>
              
              </div>
              </div>

             <div class="col-md-6">
              <div class="form-group">
                <label for="ar_title">Arabic Title</label>
                <input type="text" class="form-control" name="ar_title" id="ar_title"  value="<?php 
                        if(@$_POST){
                          echo @$_POST['ar_title']; 
                        } else{
                          echo $slide->ar_title;
                        } ?>">
               
              </div>
              
              <div class="form-group">
                <label for="ar_description">Arabic Description</label>
                <textarea  class="form-control ckeditor"  name="ar_description"><?php 
                        if(@$_POST){
                          echo @$_POST['ar_description']; 
                        } else{
                          echo $slide->ar_description;
                        } ?> 
              </textarea>
              
              </div>
              </div>
        <div class="col-md-6">
          <div class="form-group">
                <label for="title">Link</label>
                <input type="text" class="form-control" name="link" id="link"  value="<?php 
                        if(@$_POST){
                          echo @$_POST['link']; 
                        } else{
                          echo $slide->link;
                        } ?>" >
              </div>
              <div class="form-group">
                <label for="logo">Slide Image</label>
                <input type="file" name="image" id="image">
                  <?=@$upload_response?>
                
                <img class="minimge" src="<?= base_url('uploads/'.$slide->image)?>" /> </div>
            </div>
            <!-- /.box-body --> 
        <div class="clear"></div>
          <div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="<?php echo base_url('admin/slider')?>" class="btn btn-info">Back</a> </div>
      </form>
    </div>
  </div>
</section>
