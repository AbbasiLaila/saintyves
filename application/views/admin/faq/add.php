<!-- Main content -->

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/faq/add') ?>" method="post" enctype="multipart/form-data">
        
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header">
             <h3 class="box-title">Add Question</h3>

            </div>
            
            <!-- form start -->
            <div class="box-body">
              <div class="col-md-6">
               

                <div class="form-group">
                <label for="en_question">English Question</label>
                <textarea  class="form-control" rows="6" value="<?=@$_POST['en_question']?>" name="en_question"><?=@$_POST['en_question']?>
                </textarea>
               
              </div>
               <p class="help-block red"><?=@$errors['en_question']?></p> 
              <div class="form-group">
                <label for="en_answer">English Answer</label>
                <textarea  class="form-control" rows="6"  value="<?=@$_POST['en_answer']?>" name="en_answer"><?=@$_POST['en_answer']?>
                </textarea>
               
              </div>
               <p class="help-block red"><?=@$errors['en_answer']?></p> 

              </div>


              <div class="col-md-6">
               
                <div class="form-group">
                <label for="ar_question">Arabic Question</label>
                <textarea  class="form-control ckeditor"  value="<?=@$_POST['ar_question']?>" name="ar_question"><?=@$_POST['ar_question']?>
                </textarea>
               
              </div>
               <p class="help-block red"><?=@$errors['ar_question']?></p> 
              <div class="form-group">
                <label for="en_answer">Arabic Answer</label>
                <textarea  class="form-control ckeditor"  value="<?=@$_POST['ar_answer']?>" name="ar_answer"><?=@$_POST['ar_answer']?>
                </textarea>
               
              </div>
               <p class="help-block red"><?=@$errors['ar_answer']?></p> 
              </div>
             
              
            
      <div class="clear"></div>
<div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>       
        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Add</button>
          <a href="<?php echo base_url('admin/faq')?>" class="btn btn-info">Back</a> </div>
        </div>
      </form>
    </div>
  </div>
</section>
