<!-- Main content -->

<section class="content">
  <?=@$this->session->flashdata('faqEdited')?>
  <div class="row">
    <div class="col-md-12">
      <form role="form"  action="<?php echo base_url('admin/faq/edit/'.$question->id) ?>" method="post" enctype="multipart/form-data">
        
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header">
             <h3 class="box-title">Edit Question</h3>

            </div>
            
            <!-- form start -->
            <div class="box-body">
              <div class="col-md-6">
            
              <div class="form-group">
                <label for="en_question">English Question</label>
                <textarea  class="form-control"  rows="6" name="en_question"><?php 
                        if(@$_POST){
                          echo @$_POST['en_question']; 
                        } else{
                          echo $question->en_question;
                        } ?> 
              </textarea>
              
              </div>
               <p class="help-block red"><?=@$errors['en_question']?></p> 

              <div class="form-group">
                <label for="en_answer">English Answer</label>
                <textarea  class="form-control" rows="6"  name="en_answer"><?php 
                        if(@$_POST){
                          echo @$_POST['en_answer']; 
                        } else{
                          echo $question->en_answer;
                        } ?> 
              </textarea>
              
              </div>
               <p class="help-block red"><?=@$errors['en_answer']?></p> 
              </div>

             <div class="col-md-6">
              
              <div class="form-group">
                <label for="ar_question">Arabic Question</label>
                <textarea  class="form-control ckeditor"  name="ar_question"><?php 
                        if(@$_POST){
                          echo @$_POST['ar_question']; 
                        } else{
                          echo $question->ar_question;
                        } ?> 
              </textarea>
              
              </div>
               <p class="help-block red"><?=@$errors['ar_question']?></p> 

                <div class="form-group">
                <label for="ar_answer">Arabic Answer</label>
                <textarea  class="form-control ckeditor"  name="ar_answer"><?php 
                        if(@$_POST){
                          echo @$_POST['ar_answer']; 
                        } else{
                          echo $question->ar_answer;
                        } ?> 
              </textarea>
              
              </div>
               <p class="help-block red"><?=@$errors['ar_answer']?></p> 
              </div>
         
            <!-- /.box-body --> 
        <div class="clear"></div>
        <div class="loader"><img src="<?=base_url('assets/adminPanel/images/loader.gif')?>" alt=""></div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="<?php echo base_url('admin/faq')?>" class="btn btn-info">Back</a> </div>
      </form>
    </div>
  </div>
</section>
