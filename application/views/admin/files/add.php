

        <!-- Main content -->

       <section class="content">

          <div class="row">







        <form role="form"  action="<?php echo base_url('admin/files/add') ?>" method="post" enctype="multipart/form-data">

            <!-- left column -->

          <div class="col-md-6">

              <!-- general form elements -->

              <div class="box box-primary">

             

                <!-- form start -->

                  <div class="box-body">

          

         		 <div class="form-group">

                      <label for="">File name</label>

                      <input type="text" class="form-control" name="name" id="name"  value="<?=@$_POST['name']?>" >

                    </div>

                    

                    <div class="form-group">

                      <label for="file"> File</label>

                      <input type="file" name="file" id="file">

                   <p class="help-block red"><?=@$req?></p>

                    <p class="help-block red"><?=@$upload_response?></p>
<span class="help-block warninglabel">Allowed file types to upload: pdf|doc|docx|png|jpg</span>


                    </div>  

                    </div></div>
<div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>

            <div class="text-center">

                  <button type="submit" class="btn btn-primary">Add</button></div> 
</div>
                </form>

