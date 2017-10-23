<script src='https://www.google.com/recaptcha/api.js'></script>

        <!-- Main content -->

        <section class="content">

          <?php

        if($this->session->flashdata('supportSent')){

            echo'

                <div class="alert alert-success" role="alert">   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

'.$this->session->flashdata('supportSent').'</div>

            

            ';

        }

        



     ?>

          <div class="row">



       <div class="col-md-12">



   	<form  action="<?=base_url('admin/support')?>" method="post"  enctype="multipart/form-data">



            <!-- left column -->

            <div class="col-md-12">

              <!-- general form elements -->

              <div class="box box-primary">

              <div class="box-header with-border">

              <h3 class="box-title">Support Form</h3>

            </div>

                <!-- form start -->

                  <div class="box-body">

                     <div class="form-group col-md-6">

                      <label for="">Name</label>

                      <input type="text" class="form-control" name="name" id=""  value="<?php 

                        if(@$_POST){

                          echo @$_POST['name']; 

                        }?>" >

                                 <p class="help-block red"><?=@$errors['name']?></p> 

                    </div>

                   

                      <div class="form-group col-md-6">

                      <label for="">Organization</label>
						<input type="text" class="form-control" name="organization" id=""  value="<?php 

                        if(@$_POST){

                          echo @$_POST['organization']; 

                        }?>" >

                          

                    <p class="help-block red"><?=@$errors['organization']?></p> 



                </div>

              


           

              <div class="form-group col-md-6">

                      <label for="">Phone Number</label>

                      <input type="text" class="form-control" name="phone" id=""  value="<?php 

                        if(@$_POST){

                          echo @$_POST['phone']; 

                        }?>" >

                                 <p class="help-block red"><?=@$errors['phone']?></p> 

                    </div>

                   

                      <div class="form-group col-md-6">

                      <label for="">Email Address </label>
						<input type="email" class="form-control" name="email" id=""  value="<?php 

                        if(@$_POST){

                          echo @$_POST['email']; 

                        }?>" >

                          

                    <p class="help-block red"><?=@$errors['email']?></p> 



                </div>
                <div class="form-group col-md-6">

                     <label>Project Type</label>
                         <select name="type" class="form-control">
                        <option value="">Select One</option>
                          <option <?php  if(@$_POST['project'] =="Website"){

                                $selected="selected"; 

                              }else{

                                $selected="";

                              }  ?> value="Website" <?=$selected;?>>Website</option>
                              
                                <option <?php  if(@$_POST['type'] =="Mobile Site"){

                                $selected="selected"; 

                              }else{

                                $selected="";

                              }  ?> value="Mobile Site" <?=$selected;?> >Mobile Site</option>
                              
                               <option <?php  if(@$_POST['type'] =="iOS App"){

                                $selected="selected"; 

                              }else{

                                $selected="";

                              }  ?> value="iOS App" <?=$selected;?>>iOS App</option>
                              
                               <option <?php  if(@$_POST['type'] =="Windows Phone App"){

                                $selected="selected"; 

                              }else{

                                $selected="";

                              }  ?> value="Windows Phone App" <?=$selected;?>>Windows Phone App</option>
                              
                                 <option <?php  if(@$_POST['type'] =="Android App"){

                                $selected="selected"; 

                              }else{

                                $selected="";

                              }  ?> value="Android App" <?=$selected;?>>Android App</option>
                              
                        
		
                      </select> 
                  <p class="help-block red"><?=@$errors['type']?></p> 

                </div>
                
                
                
                
                      <div class="form-group col-md-12">

                      <label for="">Issue Category </label>
							<div><label> <input type="radio" name="issue" <?php  if(@$_POST['issue'] =="Content"){

                                $checked="checked"; 

                              }else{

                                $checked="";

                              }  ?> value="Content" <?=$checked;?>> Content</label></div>
                              
                              
                              
  							<div><label><input type="radio" name="issue"   <?php  if(@$_POST['issue'] =="Graphics Design"){

                                $checked="checked"; 

                              }else{

                                $checked="";

                              }  ?> value="Content" <?=$checked;?>  value="Graphics Design" > Graphics Design</label></div>
                              
                              
                         <div> <label>  <input type="radio" name="issue" <?php  if(@$_POST['issue'] =="Code Malfunction"){

                                $checked="checked"; 

                              }else{

                                $checked="";

                              }  ?>  <?=$checked;?> value="Code Malfunction"> Code Malfunction</label></div>
                              
                              
                          <div><label> <input type="radio" name="issue" <?php  if(@$_POST['issue'] =="Content Management System"){

                                $checked="checked"; 

                              }else{

                                $checked="";

                              }  ?> <?=$checked;?> value="Content Management System">  Content Management System<label></div>
                           <p class="help-block red"><?=@$errors['issue']?></p> 

                	</div>
            
                      <div class="form-group col-md-6">

                      <label for="">Issue Details (Please specify what was the issue, how it occurred, etc..) </label>
						
                        <textarea  class="form-control editor" rows="10" placeholder="Issue Details"  name="details"><?php 

                        if(@$_POST){

                          echo @$_POST['details']; 

                        } ?> </textarea>

                    <p class="help-block red"><?=@$errors['details']?></p> 

                	</div>

 						<div class="form-group col-md-12">
                        <div class="g-recaptcha" data-sitekey="6LfXFhMUAAAAABS4GsxpAt3oF9iM4SEL8eqv2mpp"></div>
                          <p class="help-block red"><?=@$errors['g-recaptcha-response']?></p>
						</div>
						
                        



                    

                  </div><!-- /.box-body -->



             

              </div><!-- /.box -->



              <!-- Form Element sizes -->

             

            </div><!--/.col (left) -->

<div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>

              
                 <center>
                  <button type="submit" class="btn btn-primary">Submit</button>
                 </center>
</form>


        </div>

    </section>