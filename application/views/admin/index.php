<section class="content">

      <!-- row -->
      <div class="row">
             <div class="col-md-12">

       <ul class="timeline">
      
            <li>
              <i class="fa fa-user bg-aqua"></i>

              <div class="timeline-item">

                <h3 class="timeline-header no-border">Welcome to <a href="<?php echo base_url('admin')?>" target="_blank">The Society of St. Yves website CMS Template</a>,  <?= $this->ion_auth->user()->row()->first_name.' '.$this->ion_auth->user()->row()->last_name?>.</h3>
               	<div class="timeline-body">
                 	Through St. Yves CMS, Admin will be able to manage and take control of <a href="<?php echo base_url('')?>" target="_blank">The Society of St. Yves</a> website's content without having to touch the code.
                </div>
               
                   <div class="timeline-footer">
                  <a class="btn btn-info btn-xs" href="<?php echo base_url('auth/change_password')?>">Account Settings</a>
                </div>
              </div>
          
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            
            
            <li>
              <i class="fa fa-envelope bg-yellow"></i>

              <div class="timeline-item">

                <h3 class="timeline-header">For any questions please contact Media Clouds <a href="<?php echo base_url('auth/support')?>">Support Team</a></h3>

                <div class="timeline-body">
                  Our support consists of conducting routinely checks on the website, apps interface, Contenet Management System and database. The purpose of the tests is to look for bugs, crashes or malfunctions. In the event of any bug/crash... <a href="http://media-clouds.com/support" target="_blank">read more</a>
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs" href="<?php echo base_url('admin/support')?>">Contact Support</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            
            
            
             <li>
              <i class="fa fa-phone bg-red"></i>

              <div class="timeline-item">

                <h3 class="timeline-header">Media Clouds Contact Information</h3>

                <div class="timeline-body contactinfo">
                  <div>
              			<i class="fa fa-envelope"></i>
              			<p>   info@media-clouds.com</p>
            		</div>
                     <div>
              			<i class="fa fa-phone"></i>
              			<p>   +972 2 296 4544
</p>
            		</div>
                     <div>
              			<i class="fa fa-map-marker"></i>
              			<p>   Tiger Commercial Center. Irsal St. <br> Ramallah, Palestine.</p>
            		</div>
                    
                     <div>
              			<i class="fa fa-link"></i>
              			<p>  <a href="http://media-clouds.com" target="_blank"> https://media-clouds.com</a></p>
            		</div>
  
  
                </div>
               
              </div>
            </li>
        
            
            
            <!-- END timeline item -->
            <!-- timeline time label -->
           
         
           
          </ul>

      </div></div></section>