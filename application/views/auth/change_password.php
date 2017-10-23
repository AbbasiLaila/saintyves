<section class="content">
  <div class="row">

  <div class="col-md-12">

<h3><?php echo lang('change_password_heading');?></h3>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/change_password");?>
<div class="col-md-6">

              <!-- general form elements -->

              <div class="box box-primary">

             

                <!-- form start -->

                  <div class="box-body">

                    <div class="form-group">
      
            <label>Old Password</label>
            <input type="password" name="old" value="" id="old" class="form-control">
     </div>

      <p>
          <div class="form-group">
      
            <label>New Password (at least 8 characters long)</label>
<input type="password" name="new" value="" id="new"  class="form-control">      
</div>

      <div class="form-group">
      
            <label>Confirm New Password</label>
<input type="password" name="new_confirm" value="" id="new_confirm"  class="form-control">      
</div>
<div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>
      <?php echo form_input($user_id);?>
<input type="submit" class="btn btn-primary" value="Change"/>
<?php echo form_close();?>
</div></div></section>