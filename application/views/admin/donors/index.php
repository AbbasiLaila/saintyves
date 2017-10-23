<!-- Main content -->
<section class="content">
   <?=@$this->session->flashdata('donorAdded') ?>
   <di class="row">
   <div class="col-md-12">
      <div class="box box-info">
         <div class="box-header">
            <h3 class="box-title">Donors</h3>
            <div class="text-center">
               <a href="<?php echo base_url('admin/donors/add')?>" class="btn btn-primary">Add New Donor</a>
            </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <table id="data-table" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>Image</th>
                     <th>Link</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($donors as $donor): ?>
                  <tr id="<?php echo $donor['id']  ?>">
                     <td>  <img class="minimge" src="<?= base_url('uploads/'.$donor['image'] )?>" /></td>
                     <td>  <a target="_blank" href="<?php echo $donor['link']  ?>"><?php echo $donor['link']  ?></a></td>
                     <td>
                        <a href="<?php echo base_url('admin/donors/edit/'.$donor['id'])?>"><span class="label label-primary">Edit  <i class="fa fa-pencil "></i></span></a>
                        <a href="" data-toggle="modal" data-target="#deleteModal" ><span data-id="<?php echo $donor['id']?>"  class="trash label label-danger">Delete  <i class="fa fa-trash "></i></span></a>
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
            <h4 class="modal-title">Delete Donor</h4>
         </div>
         <div class="modal-body">
            <p>Are you sure you want to delete this donor?</p>
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
   
   
       $('#deleteButton').attr({'href':'<?php echo base_url("donors/delete")?>/'+id,'rowid':id});
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