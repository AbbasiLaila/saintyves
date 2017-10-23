<!-- Main content -->
 <script src="<?php echo base_url('assets/adminPanel/scripts/bootstrap-datepicker.min.js')?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/adminPanel/css/bootstrap-datepicker.min.css')?>">
<section class="content">
  <?=@$this->session->flashdata('vacancyEdited')?>
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/vacancies/edit/'.$vacancy->id) ?>" method="post" enctype="multipart/form-data">
        
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header">
             <h3 class="box-title">Edit Vcancy</h3>

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
                          echo $vacancy->en_title;
                        } ?>">
               
              </div>
               <p class="help-block red"><?=@$errors['en_title']?></p> 

                 
              <div class="form-group">
                <label for="en_description">English Description</label>
                <textarea  class="form-control ckeditor"  name="en_description"><?php 
                        if(@$_POST){
                          echo @$_POST['en_description']; 
                        } else{
                          echo $vacancy->en_description;
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
                          echo $vacancy->ar_title;
                        } ?>">
               
              </div>
              <p class="help-block red"><?=@$errors['ar_title']?></p> 

                <div class="form-group">
                <label for="ar_description">Arabic Description</label>
                <textarea  class="form-control ckeditor"  name="ar_description"><?php 
                        if(@$_POST){
                          echo @$_POST['ar_description']; 
                        } else{
                          echo $vacancy->ar_description;
                        } ?> 
              </textarea>
              
              </div>
              </div>
              <div class="form-group single col-md-6">
                <label>Deadline</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control datePicker" name="deadline" id="deadline"  value="<?php 
                        if(@$_POST){
                          echo @$_POST['deadline']; 
                        } else{
                          echo $vacancy->deadline;
                        } ?> ">
                <!-- /.input group -->
              </div>               
              <p class="help-block red"><?=@$errors['deadline']?></p>  
              <div class="clear"></div>              
               </div>
               <div class="clear"></div>

        <div class="col-md-6">
          <div class="form-group">
                <label for="office">Duty station</label>
                  <select class="form-control" name="office">
                      <?php foreach ($offices as $office) {?>
                      <option  <?php  
                      $checked="";
                      if(@$_POST){
                       if(@$_POST['office'] == $office['en_name']){ $checked="selected"; }
                     }
                     else{
                       if($vacancy->office== $office['en_name']){
                        $checked="selected";
                      }
                    }?>
                    <?=$checked;?>  value="<?=$office['en_name']?>" ><?=$office['en_name']?></option>
                    <?php } ?>
                  </select>
              </div>
          
              <div class="form-group">
                <label for="logo">Image</label>
                <input type="file" name="image" id="image">
                  <?=@$upload_response?>
                
                <img class="minimge" src="<?= base_url('uploads/'.$vacancy->image)?>" /> </div>
            </div>
            <!-- /.box-body --> 
            
        <div class="clear"></div>
<div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>        <div class="text-center">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="<?php echo base_url('admin/vacancies')?>" class="btn btn-info">Back</a> </div>
      </form>
    </div>
  </div>
</section>
     <script>
    $('.datePicker').datepicker({
    format: 'yyyy/mm/dd',
    todayHighlight:true,
    startDate:new Date(),
});
    </script>