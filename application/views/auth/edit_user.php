<section class="content">
  <div class="row">

  <div class="col-md-12">


<h3><?php echo lang('edit_user_heading');?></h3>
<p><?php echo lang('edit_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>
<div class="col-md-6">

              <!-- general form elements -->

              <div class="box box-primary">

             

                <!-- form start -->
  <div class="box-body">

                    <div class="form-group">
                     <label><?=lang('edit_user_fname_label', 'first_name');?></label>
            <input type="text" name="first_name" value="<?php 

                        if(@$_POST){

                          echo @$_POST['first_name']; 

                        } else{

                          echo $user->first_name;

                        } ?>" id="first_name" class="form-control">
     </div>
     
             <div class="form-group">
                     <label><?=lang('edit_user_lname_label', 'last_name');?></label>
            <input type="text" name="last_name" value="<?php 

                        if(@$_POST){

                          echo @$_POST['last_name']; 

                        } else{

                          echo $user->last_name;

                        } ?>" id="last_name" class="form-control">
     </div>

      

     
             <div class="form-group">
                     <label><?=lang('edit_user_phone_label', 'phone');?></label>
            <input type="text" name="phone" value="<?php 

                        if(@$_POST){

                          echo @$_POST['phone']; 

                        } else{

                          echo $user->phone;

                        } ?>" id="phone" class="form-control">
     </div>

     
     
             <div class="form-group">
                     <label><?=lang('edit_user_password_label', 'password');?></label>
            <input type="password" name="password"  id="password" class="form-control">
     </div>




       <div class="form-group">
                     <label><?=lang('edit_user_password_confirm_label', 'password_confirm');?></label>
            <input type="password" name="password_confirm"  id="password_confirm" class="form-control">
     </div>

    

      <?php if ($this->ion_auth->is_admin()): ?>
       <div class="form-group">

          <label><?php echo lang('edit_user_groups_heading');?></label>
          <?php foreach ($groups as $group):?>
              <label style="margin-left:30px;" class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
          <?php endforeach?>

      <?php endif ?>
</div>
      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>
<div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>
<input type="submit" class="btn btn-primary" value="Save"/>

<?php echo form_close();?>
</div></div></section>