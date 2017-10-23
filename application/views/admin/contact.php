<section class="content">
   <div class="col-md-12">
      <h4>Contact information </h4>
      <?php foreach ($offices as $office) {?>
      <table class="table">
         <tr><b><?=$office['en_name']?> Contact Info</b></tr>
         <tr>
            <th>Field Name</th>
            <th>Value</th>
         </tr>
         <tr>
            <td class="col-md-2">English Office Name</td>
            </td>
            <td class="col-md-4"><a class="editable_office"  id="en_name"  data-name="en_name"  data-type="text" data-pk="<?php echo $office['id']; ?>"> <?php echo $office['en_name']; ?> </a></td>
         </tr>
         <tr>
            <td class="col-md-2">Arabic Office Name</td>
            </td>
            <td class="col-md-4"><a class="editable_office"  id="ar_name"  data-name="ar_name"  data-type="text" data-pk="<?php echo $office['id']; ?>"> <?php echo $office['ar_name']; ?> </a></td>
         </tr>
         <tr>
            <td class="col-md-2">English Address</td>
            </td>
            <td class="col-md-4"><a class="editable_office"  id="en_location"  data-name="en_location"  data-type="text" data-pk="<?php echo $office['id']; ?>"> <?php echo $office['en_location']; ?> </a></td>
         </tr>
         <tr>
            <td class="col-md-2">Aarabic Address</td>
            </td>
            <td class="col-md-4"><a class="editable_office"  id="ar_location"  data-name="ar_location"  data-type="text" data-pk="<?php echo $office['id']; ?>"> <?php echo $office['ar_location']; ?> </a></td>
         </tr>
         <tr>
            <td class="col-md-2">English P.O Box</td>
            </td>
            <td class="col-md-4"><a class="editable_office"  id="en_box"  data-name="en_box"  data-type="text" data-pk="<?php echo $office['id']; ?>"> <?php echo $office['en_box']; ?> </a></td>
         </tr>
         <tr>
            <td class="col-md-2">Aarabic P.O Box</td>
            </td>
            <td class="col-md-4"><a class="editable_office"  id="ar_box"  data-name="ar_box"  data-type="text" data-pk="<?php echo $office['id']; ?>"> <?php echo $office['ar_box']; ?> </a></td>
         </tr>
         <tr>
            <td class="col-md-2">Fax</td>
            </td>
            <td class="col-md-4"><a class="editable_office"  id="fax"  data-name="fax"  data-type="text" data-pk="<?php echo $office['id']; ?>"> <?php echo $office['fax']; ?> </a></td>
         </tr>
         <tr>
            <td class="col-md-2">Phone Number</td>
            </td>
            <td class="col-md-4"><a class="editable_office"  id="phone"  data-name="phone"  data-type="text" data-pk="<?php echo $office['id']; ?>"> <?php echo $office['phone']; ?> </a></td>
         </tr>
         <tr>
            <td class="col-md-2" >Email Address</td>
            <td class="col-md-4"><a class="editable_office"  id="email"  data-name="email" data-type="email" data-pk="<?php echo $office['id']; ?>"> <?php echo $office['email']; ?> </a></td>
         </tr>
         <?php } ?>
      </table>

 <hr>
      <table>
        <tr>
            <td class="col-md-2" >Press Contact Email Address</td>
            <td class="col-md-4"><a class="editable_contact"  id="pressContactEmail"  data-name="pressContactEmail" data-type="email" data-pk="<?php echo $contact->id; ?>"> <?php echo $contact->pressContactEmail; ?> </a></td>
         </tr>
         <tr>
            <td class="col-md-2" >Contact Form Email Address</td>
            <td class="col-md-4"><a class="editable_contact"  id="contactFormEmail"  data-name="contactFormEmail" data-type="email" data-pk="<?php echo $contact->id; ?>"> <?php echo $contact->contactFormEmail; ?> </a></td>
         </tr>
      </table>
      <div class="clear"></div>
   </div>
   <hr>
   <div class="social col-md-12">
      <h4>Social links </h4>
      <dl class="dl-horizontal">
         <dt><i class="fa fa-facebook-f"></i></dt>
         <dd><a class="editable_contact"  id="facebook"  data-name="facebook"  data-type="text" data-pk="1"> <?php echo $contact->facebook; ?></a> </dd>
      </dl>
      <dl class="dl-horizontal">
         <dt><i class="fa fa-twitter"></i></dt>
         <dd><a class="editable_contact"  id="twitter"  data-name="twitter"  data-type="text" data-pk="<?php echo $contact->id; ?>"> <?php echo $contact->twitter; ?></a> </dd>
      </dl>
      <dl class="dl-horizontal">
         <dt><i class="fa fa-youtube"></i></dt>
         <dd><a class="editable_contact"  id="youtube"  data-name="youtube"  data-type="text" data-pk="<?php echo $contact->id; ?>"> <?php echo $contact->youtube; ?></a> </dd>
      </dl>
   </div>
   <div class="clear"></div>
   </div>
</section>
<script>
   $(document).ready(function() {
      
    $('.editable_office').editable({
   
      type: 'text',
   
      title: 'Edit Field',
   
      url: '<?php echo base_url('admin/update_office')?>',
   
      placement: 'right',
   
    });
   
    $('.editable_contact').editable({
   
      type: 'text',
   
      title: 'Edit Field',
   
      url: '<?php echo base_url('admin/update_contact')?>',
   
      placement: 'right',
   
    });
   

   });
   
   
</script>