<!-- Main content -->

<section class="content">
  <?=@$this->session->flashdata('departmentEdited')?>
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/departments/edit/'.$department->id) ?>" method="post" enctype="multipart/form-data">
        
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header">
             <h3 class="box-title">Edit Department</h3>

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
                          echo $department->en_name;
                        } ?>">
               
              </div>
               <p class="help-block red"><?=@$errors['en_name']?></p> 

              
              </div>

             <div class="col-md-6">
              <div class="form-group">
                <label for="ar_name">Arabic Name</label>
                <input type="text" class="form-control" name="ar_name" id="ar_name"  value="<?php 
                        if(@$_POST){
                          echo @$_POST['ar_name']; 
                        } else{
                          echo $department->ar_name;
                        } ?>">
               
              </div>
               <p class="help-block red"><?=@$errors['ar_name']?></p> 
        </div>
            <!-- /.box-body --> 
        <div class="clear"></div>
<div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>        <div class="text-center">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="<?php echo base_url('admin/departments')?>" class="btn btn-info">Back</a> </div>
      </form>
    </div>
  </div>
</section>
