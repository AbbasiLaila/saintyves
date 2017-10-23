<!-- Main content -->

<section class="content">
  <?=@$this->session->flashdata('donorEdited')?>
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/donors/edit/'.$donor->id) ?>" method="post" enctype="multipart/form-data">
        
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header">
             <h3 class="box-title">Edit Donor</h3>

            </div>
            <!-- form start -->
            <div class="box-body">
            
            
        <div class="col-md-6">
          <div class="form-group">
                <label for="title">Link</label>
                <input type="text" class="form-control" name="link" id="link"  value="<?php 
                        if(@$_POST){
                          echo @$_POST['link']; 
                        } else{
                          echo $donor->link;
                        } ?>" >
              </div>
              <div class="form-group">
                <label for="logo">Donor Logo</label>
                <input type="file" name="image" id="image">
                  <?=@$upload_response?>
                
                <img class="minimge" src="<?= base_url('uploads/'.$donor->image)?>" /> </div>
            </div>
            <!-- /.box-body --> 
        <div class="clear"></div>
        <div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="<?php echo base_url('admin/donors')?>" class="btn btn-info">Back</a> </div>
      </form>
    </div>
  </div>
</section>
