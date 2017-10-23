<!-- Main content -->

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/gallery/categories/add') ?>" method="post" enctype="multipart/form-data">
        
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header">
             <h3 class="box-title">Add Category</h3>

            </div>
            
            <!-- form start -->
            <div class="box-body">
              <div class="col-md-6">
                 <div class="form-group">
                <label for="en_title">English Title</label>
                <input type="text" class="form-control" name="en_title" id="en_title"  value="<?=@$_POST['en_title']?>" >
              </div>
               <p class="help-block red"><?=@$errors['en_title']?></p> 

              
              </div>


              <div class="col-md-6">
                <div class="form-group">
                <label for="ar_title">Arabic Title</label>
                <input type="text" class="form-control" name="ar_title" id="ar_title"  value="<?=@$_POST['ar_title']?>" >
              </div>
               <p class="help-block red"><?=@$errors['ar_title']?></p> 

              
              </div>
             
              

            <!-- /.box-body --> 
            
      <div class="clear"></div>
          
       <div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Add</button>
          <a href="<?php echo base_url('admin/gallery/categories')?>" class="btn btn-info">Back</a> </div>

      </form>
    </div>
  </div>
</section>
