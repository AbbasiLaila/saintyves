<!-- Main content -->
<section class="content">
   <?=@$this->session->flashdata('categoryAdded') ?>
   <di class="row">
   <div class="col-md-12">
      <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title">Gallery Categories</h3>
            <div class="text-center">
               <a href="<?php echo base_url('admin/gallery/categories/add')?>" class="btn btn-primary">Add New Category</a>
            </div>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
            <table id="data-table" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>Title</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($categories as $category): ?>
                  <tr id="<?php echo $category['id']  ?>">
                     
                     <td>  <?php echo $category['en_title']  ?></td>
                     <td>
                        <a href="<?php echo base_url('admin/gallery/categories/edit/'.$category['id'])?>"><span class="label label-primary">Edit  <i class="fa fa-pencil "></i></span></a>
                        <a href="" data-toggle="modal" data-target="#deleteModal" ><span data-id="<?php echo $category['id']?>"  class="trash label label-danger">Delete  <i class="fa fa-trash "></i></span></a>
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
            <h4 class="modal-title">Delete category</h4>
         </div>
         <div class="modal-body">
            <p>Are you sure you want to delete this category?</p>
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
       var id=$(this).data('id');   
   
       $('#deleteButton').attr({'href':'<?php echo base_url("admin/gallery/categories/delete")?>/'+id,'rowid':id});
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