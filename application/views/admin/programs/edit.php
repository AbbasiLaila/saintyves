<!-- Main content -->
 <script src="<?php echo base_url('assets/adminPanel/scripts/bootstrap-datepicker.min.js')?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/adminPanel/css/bootstrap-datepicker.min.css')?>">
<section class="content">
  <?=@$this->session->flashdata('programsEdited')?>
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/programs/edit/'.$post->id) ?>" method="post" enctype="multipart/form-data">
        
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header">
             <h3 class="box-title">Edit Program</h3>

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
                          echo $post->en_title;
                        } ?>">
               
              </div>
               <p class="help-block red"><?=@$errors['en_title']?></p> 

                 
              <div class="form-group">
                <label for="en_description">English Description</label>
                <textarea  class="form-control ckeditor"  name="en_description"><?php 
                        if(@$_POST){
                          echo @$_POST['en_description']; 
                        } else{
                          echo $post->en_description;
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
                          echo $post->ar_title;
                        } ?>">
               
              </div>
              <p class="help-block red"><?=@$errors['ar_title']?></p> 

                <div class="form-group">
                <label for="ar_description">Arabic Description</label>
                <textarea  class="form-control ckeditor"  name="ar_description"><?php 
                        if(@$_POST){
                          echo @$_POST['ar_description']; 
                        } else{
                          echo $post->ar_description;
                        } ?> 
              </textarea>
              
              </div>
              </div>
              <div class="form-group single col-md-6">
                <label>Date</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control datePicker" name="date" id="date"  value="<?php 
                        if(@$_POST){
                          echo @$_POST['date']; 
                        } else{
                          echo $post->date;
                        } ?> ">
                <!-- /.input group -->
              </div>               
              <div class="clear"></div>              
               </div>
               <div class="clear"></div>

        <div class="col-md-6">
         
              <div class="form-group">
                <label for="logo">Thumbnail</label>
                <input type="file" name="image" id="image">
                  <?=@$upload_response?>
                
                <img class="minimge" src="<?= base_url('uploads/'.$post->image)?>" /> </div>
            </div>
            <!-- /.box-body --> 
        <div class="clear"></div>
<div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>        <div class="text-center">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="<?php echo base_url('admin/programs')?>" class="btn btn-info">Back</a> </div>
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