

        <!-- Main content -->

        <section class="content">

          <?= @$this->session->flashdata('seoUpdated')?>

          <div class="row">


       <div class="col-md-12">


        <form role="form"  action="<?php echo base_url('admin/seo/'.$seo->name) ?>" method="post" enctype="multipart/form-data">



            <!-- left column -->

            <div class="col-md-12">

              <!-- general form elements -->

              <div class="box box-primary">

              <div class="box-header with-border">

              <h3 class="box-title">SEO Data</h3>

            </div>

                <!-- form start -->

                  <div class="box-body">
                    <span class="help-block warninglabel">Meta descriptions should be no longer than 155 characters in length and should be relevant to the page.</span>
                  <div class="col-md-6">

                     <div class="form-group">

                      <label>English SEO Title</label>

                      <input type="text" class="form-control" name="en_seo_title"   value="<?php 

                        if(@$_POST){

                          echo @$_POST['en_seo_title']; 

                        } else{

                          echo $seo->en_seo_title;

                        } ?>" >

                      <p class="help-block red"><?=@$errors['en_seo_title']?></p> 

                    </div>

                   

                      <div class="form-group">

                      <label for="">English SEO Description</label>
                      <textarea  class="form-control" rows="10"  name="en_seo_description"><?php 

                        if(@$_POST){

                          echo @$_POST['en_seo_description']; 

                        } else{

                          echo $seo->en_seo_description;

                        } ?> </textarea>



                </div>

                 <div class="form-group">

                      <label for="">English Keywords</label>



                        <input type="text" class="form-control" name="en_keys"   value="<?php 

                        if(@$_POST){

                          echo @$_POST['en_keys']; 

                        } else{

                          echo $seo->en_keys;

                        } ?>" >




                </div>

</div>

           

             



   <div class="col-md-6">

                     <div class="form-group">

                      <label>Arabic SEO Title</label>

                      <input type="text" class="form-control" name="ar_seo_title"   value="<?php 

                        if(@$_POST){

                          echo @$_POST['ar_seo_title']; 

                        } else{

                          echo $seo->ar_seo_title;

                        } ?>" >

                      <p class="help-block red"><?=@$errors['ar_seo_title']?></p> 

                    </div>

                   

                      <div class="form-group">

                      <label for="">Arabic SEO Description</label>
                      <textarea  class="form-control" rows="10"  name="ar_seo_description"><?php 

                        if(@$_POST){

                          echo @$_POST['ar_seo_description']; 

                        } else{

                          echo $seo->ar_seo_description;

                        } ?> </textarea>



                </div>


                 <div class="form-group">

                      <label for="">Arabic Keywords</label>



                        <input type="text" class="form-control" name="ar_keys"   value="<?php 

                        if(@$_POST){

                          echo @$_POST['ar_keys']; 

                        } else{

                          echo $seo->ar_keys;

                        } ?>" >




                </div>

</div>


                    

                  </div><!-- /.box-body -->



            

              <!-- Form Element sizes -->

             

            </div><!--/.col (left) -->



            

              <!-- Form Element sizes -->

             <div class="clear"></div>
<div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>
            <div class="text-center">

<button type="submit" class="btn btn-primary">Save</button></div>

                                <div class="clear"></div>

            </div><!--/.col (left) -->



            

                </form>

                 </div> 



        </div>

    </section>



