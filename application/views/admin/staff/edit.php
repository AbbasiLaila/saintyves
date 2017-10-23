<!-- Main content -->

<section class="content">
  <?=@$this->session->flashdata('staffEdited')?>
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/staff/edit/'.$member->id) ?>" method="post" enctype="multipart/form-data">
        
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header">
             <h3 class="box-title">Edit Staff Member</h3>

            </div>
            
            <!-- form start -->
            <div class="box-body">
              <div class="col-md-6">
              <div class="form-group">
                <label for="en_name">English Name</label>
                <input type="text" class="form-control" name="en_name" id="en_name"  value="<?php 
                        if(@$_POST){
                          echo @$_POST['en_name']; 
                        } else{
                          echo $member->en_name;
                        } ?>">
               
              </div>
               <p class="help-block red"><?=@$errors['en_name']?></p> 

               <div class="form-group">
                <label for="en_position">English Position</label>
                <input type="text" class="form-control" name="en_position" id="en_position"  value="<?php 
                        if(@$_POST){
                          echo @$_POST['en_position']; 
                        } else{
                          echo $member->en_position;
                        } ?>">
               
              </div>             
              <div class="form-group">
                <label for="en_description">English Description</label>
                <textarea  class="form-control ckeditor"  name="en_description"><?php 
                        if(@$_POST){
                          echo @$_POST['en_description']; 
                        } else{
                          echo $member->en_description;
                        } ?> 
              </textarea>
              
              </div>
              </div>

             <div class="col-md-6">
              <div class="form-group">
                <label for="ar_name">Arabic Name</label>
                <input type="text" class="form-control" name="ar_name" id="ar_name"  value="<?php 
                        if(@$_POST){
                          echo @$_POST['ar_name']; 
                        } else{
                          echo $member->ar_name;
                        } ?>">
               
              </div>
               <p class="help-block red"><?=@$errors['ar_name']?></p> 
              <div class="form-group">
                <label for="ar_position">Arabic Position</label>
                <input type="text" class="form-control" name="ar_position" id="ar_position"  value="<?php 
                        if(@$_POST){
                          echo @$_POST['ar_position']; 
                        } else{
                          echo $member->ar_position;
                        } ?>">
               
              </div>
              <div class="form-group">
                <label for="ar_description">Arabic Description</label>
                <textarea  class="form-control ckeditor"  name="ar_description"><?php 
                        if(@$_POST){
                          echo @$_POST['ar_description']; 
                        } else{
                          echo $member->ar_description;
                        } ?> 
              </textarea>
              
              </div>
              </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="department_id">Staff Department</label>
                  <select class="form-control" name="department_id">
                      <?php foreach ($departments as $department) {?>
                      <option  <?php  
                      $checked="";
                      if(@$_POST){
                       if(@$_POST['department_id'] == $department['id']){ $checked="selected"; }
                     }
                     else{
                       if($member->department_id== $department['id']){
                        $checked="selected";
                      }
                    }?>
                    <?=$checked;?>  value="<?=$department['id']?>" ><?=$department['en_name']?></option>
                    <?php } ?>
                  </select>
              </div>
               <p class="help-block red"><?=@$errors['department_id']?></p> 
              <div class="form-group">
                <label for="logo">Staff Member Image</label>
                <input type="file" name="image" id="image">
                  <?=@$upload_response?>
                
                <img class="minimge" src="<?= base_url('uploads/'.$member->image)?>" /> </div>
            </div>
            <!-- /.box-body --> 
        <div class="clear"></div>
<div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>        <div class="text-center">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="<?php echo base_url('admin/staff')?>" class="btn btn-info">Back</a> </div>
      </form>
    </div>
  </div>
</section>
