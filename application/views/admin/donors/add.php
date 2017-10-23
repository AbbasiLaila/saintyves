<!-- Main content -->

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/donors/add') ?>" method="post" enctype="multipart/form-data">
        
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header">
             <h3 class="box-title">Add Donor</h3>

            </div>
            <!-- form start -->
            <div class="box-body">
              

             
              <div class="col-md-6">
              <div class="form-group">
                <label for="title">Link</label>
                <input type="text" class="form-control" name="link" id="link"  value="<?=@$_POST['link']?>" >
              </div>
            
              <div class="form-group">
                <label for="image">Donor Logo</label>
                <input type="file" name="image" id="image">
                <p class="help-block red">
                  <?=@$req?>
                </p>
                  <?=@$upload_response?>
                
              </div>
            </div>

            <!-- /.box-body --> 
            
      <div class="clear"></div>
          <div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>
       
        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Add</button>
       <a href="<?php echo base_url('admin/donors')?>" class="btn btn-info">Back</a> </div>

      </form>
    </div>
  </div>
</section>
