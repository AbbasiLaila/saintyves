<!-- Main content -->

<section class="content">
  <?=@$this->session->flashdata('categoryEdited')?>
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/categories/edit/'.$category->id) ?>" method="post" enctype="multipart/form-data">
        
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header">
             <h3 class="box-title">Edit Category</h3>

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
                          echo $category->en_title;
                        } ?>">
               
              </div>
               <p class="help-block red"><?=@$errors['en_title']?></p> 

              
              </div>

             <div class="col-md-6">
              <div class="form-group">
                <label for="ar_name">Arabic Title</label>
                <input type="text" class="form-control" name="ar_title" id="ar_title"  value="<?php 
                        if(@$_POST){
                          echo @$_POST['ar_title']; 
                        } else{
                          echo $category->ar_title;
                        } ?>">
               
              </div>
               <p class="help-block red"><?=@$errors['ar_title']?></p> 
        </div>
            <!-- /.box-body --> 
        <div class="clear"></div>
        <div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="<?php echo base_url('admin/categories')?>" class="btn btn-info">Back</a> </div>
      </form>
    </div>
  </div>
</section>
