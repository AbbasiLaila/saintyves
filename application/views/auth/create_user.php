
<section class="content">
  <div class="row">

  <div class="col-md-12">

<h3><?php echo lang('create_user_heading');?></h3>
<p><?php echo lang('create_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_user");?>
<div class="col-md-6">

              <!-- general form elements -->

              <div class="box box-primary">

             

                <!-- form start -->
  <div class="box-body">

                    <div class="form-group">
                     <label><?=lang('create_user_fname_label', 'first_name');?></label>
            <input type="text" name="first_name" value="<?=@$_POST['first_name']?>" id="first_name" class="form-control">
     </div>

              <div class="form-group">
                     <label><?=lang('create_user_lname_label', 'last_name');?></label>
            <input type="text" name="last_name" value="<?=@$_POST['last_name']?>" id="last_name" class="form-control">
     </div>


      
      
      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>

      
     
     
<div class="form-group">
                     <label><?= lang('create_user_email_label', 'email');?></label>
            <input type="text" name="email" value="<?=@$_POST['email']?>" id="email" class="form-control">
     </div>
     
     
     
     
<div class="form-group">
                     <label><?= lang('create_user_phone_label', 'phone');?></label>
            <input type="text" name="phone" value="<?=@$_POST['phone']?>" id="phone" class="form-control">
     </div>


<div class="form-group">
                     <label><?= lang('create_user_password_label', 'password');?></label>
            <input type="password" name="password" value="" id="password" class="form-control">
     </div>
     
 


<div class="form-group">
                     <label><?=lang('create_user_password_confirm_label', 'password_confirm');?></label>
            <input type="password" name="password_confirm" value="" id="password_confirm" class="form-control">
     </div>

<div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>


<input type="submit" class="btn btn-primary" value="Create User"/>

<?php echo form_close();?>
</div></div></section>