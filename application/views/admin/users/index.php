 
        <!-- Main content -->
        <section class="content">
            <?php
        if($this->session->flashdata('userAdded')){
            echo $this->session->flashdata('userAdded')
            ;
        } ?>
<di class="row">
<div class="col-md-12">
  
  <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Admin Users</h3>
                   <div class="text-center">
                                <a href="<?php echo base_url('admin/users/add')?>" class="btn btn-primary">Add New user</a></div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="users" class="table table-bordered table-striped">
                     <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email Address</th>
                        
                        <th>Actions</th>
                      </tr>
                    </thead>
 <tbody>
           <?php foreach ($users as $user): ?>
           <tr id="<?php echo $user->id  ?>">
           
           
             <td> <?=$user->first_name?></td>
            <td> <?=$user->email?></td>
                       
             
         <td>
                        
                  
               <a href="<?php echo base_url('admin/users/edit/').'/'.$user->id ?>" class="trash label label-info">Edit <i class="fa fa-pencil"></i></span></a>
               <a href="" data-toggle="modal" data-target="#deleteModal" ><span data-id="<?php echo $user->id?>"  class="trash label label-danger">Delete  <i class="fa fa-trash "></i></span></a>
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
       <script>
      $(function () {
        $('#users').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  <div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete File</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this Admin user?</p>
               
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


    $('#deleteButton').attr({'href':'<?php echo base_url("admin/delete_user")?>/'+id,'rowid':id});
});
 $("#deleteButton").click(function(e){
       //alert("Delete?");
         e.preventDefault(); 
         var href = $(this).attr("href");
         var id = $(this).attr("rowid");

        $.ajax({
          type: "POST",
          url: href,
          success:function(response){
                        //on success, hide  element user wants to delete.
$('#deleteModal').modal('hide');

 $("#" + id).fadeTo("slow",0.7, function(){
            $(this).remove();
        })

                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        //On error, we alert user
                        alert(thrownError);
                    }
            
                         });

   });
</script>