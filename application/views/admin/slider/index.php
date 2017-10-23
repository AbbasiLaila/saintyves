<!-- Main content -->
<section class="content">
   <?=@$this->session->flashdata('slideAdded') ?>
   <di class="row">
   <div class="col-md-12">
      <div class="box box-info">
         <div class="box-header">
            <h3 class="box-title">Slides</h3>
            <div class="text-center">
               <a href="<?php echo base_url('admin/slider/add')?>" class="btn btn-primary">Add New Slide</a>
            </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <table id="data-table" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>Image</th>
                     <th>Title</th>
                     <th>Description</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($slides as $slide): ?>
                  <tr id="<?php echo $slide['id']  ?>">
                     <td>  <img class="minimge" src="<?= base_url('uploads/'.$slide['image'] )?>" /></td>
                     <td>  <?php echo $slide['en_title']  ?></td>
                     <td>  <?php echo $slide['en_description']  ?></td>
                     <td>
                        <a href="<?php echo base_url('admin/slider/edit/'.$slide['id'])?>"><span class="label label-primary">Edit  <i class="fa fa-pencil "></i></span></a>
                        <a href="" data-toggle="modal" data-target="#deleteModal" ><span data-id="<?php echo $slide['id']?>"  class="trash label label-danger">Delete  <i class="fa fa-trash "></i></span></a>
                     </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
   </div>
</section>

<div id="deleteModal" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Delete Slide</h4>
         </div>
         <div class="modal-body">
            <p>Are you sure you want to delete this slide?</p>
            <p class="text-warning"><small>If you confirm, All slide related information will be deleted.</small></p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="" type="button" type="submit" class="btn btn-danger" id="deleteButton">Delete</a>
         </div>
      </div>
   </div>
</div>
<script>  
   $('.trash').click(function(e){
       //get cover id
       var id=$(this).data('id');
       //set href for cancel button
   
   
       $('#deleteButton').attr({'href':'<?php echo base_url("slider/delete")?>/'+id,'rowid':id});
   });
    $("#deleteButton").click(function(e){
            e.preventDefault(); 
            var href = $(this).attr("href");
            var id = $(this).attr("rowid");
   
           $.ajax({
             type: "POST",
             url: href,
             success:function(response){
   $('#deleteModal').modal('hide');
   
    $("#" + id).fadeTo("slow",0.7, function(){
               $(this).remove();
           })
   
                       },
                       error:function (xhr, ajaxOptions, thrownError){
                           alert(thrownError);
                       }
               
                            });
   
      });
</script>