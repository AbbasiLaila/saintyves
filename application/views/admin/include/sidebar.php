<li class="header">MAIN NAVIGATION</li>
<li class="active"><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
<?php if ($this->ion_auth->in_group('super')){?>
<li><a href="<?php echo base_url('admin/users')?>"><i class="fa fa-users"></i> <span>CMS Users</span></a></li>
<?php } ?>

<li><a href="<?php echo base_url('admin/slider')?>"><i class="fa fa-image "></i> <span>Silder</span></a></li>


<li class="treeview"> <a href="#"> <i class="fa fa-info"></i> <span>About</span> <i class="fa fa-angle-left pull-right"></i> </a>
  <ul class="treeview-menu">
    <?php foreach ($aboutPages as $page) {?>
        <li><a href="<?php echo base_url('admin/page/'.$page['name'])?>"><span><?=$page['en_title']?></span></a></li>
   <?php } ?>
  <li><a href="<?php echo base_url('admin/departments')?>"> <span>Departments</span></a></li>

  </ul>
</li>


<li class="treeview"> <a href="#"> <i class="fa fa-suitcase"></i> <span>Our Work</span> <i class="fa fa-angle-left pull-right"></i> </a>
  <ul class="treeview-menu">
    <?php foreach ($workPages as $page) {?>
        <li><a href="<?php echo base_url('admin/page/'.$page['name'])?>"><span><?=$page['en_title']?></span></a></li>
   <?php } ?>

  </ul>
</li>

<li><a href="<?php echo base_url('admin/categories')?>"><i class="fa fa-tags "></i> <span>Issues Categories</span></a></li>

<li><a href="<?php echo base_url('admin/issues')?>"><i class="fa fa-tags "></i> <span>Main Issues</span></a></li>

<li class="treeview"> <a href="#"> <i class="fa fa-image"></i> <span>Gallery</span> <i class="fa fa-angle-left pull-right"></i> </a>
  <ul class="treeview-menu">
    <li><a href="<?php echo base_url('admin/gallery/categories')?>"><span>Gallery Categories</span></a></li>
    <li><a href="<?php echo base_url('admin/gallery/albums')?>"><span>Photo Gallery Albums</span></a></li>
    <li><a href="<?php echo base_url('admin/gallery/images')?>"><span>Album Images</span></a></li>

    <li><a href="<?php echo base_url('admin/gallery/videos')?>"> <span>Video Gallery</span></a></li>

  </ul>
</li>



<li><a href="<?php echo base_url('admin/news')?>"><i class="fa fa-newspaper-o "></i> <span>News</span></a></li>


<li><a href="<?php echo base_url('admin/programs')?>"><i class="fa fa-file "></i> <span>Programs</span></a></li>



<li><a href="<?php echo base_url('admin/donors')?>"><i class="fa fa-money "></i> <span>Donors</span></a></li>
<li><a href="<?php echo base_url('admin/faq')?>"><i class="fa fa-question-circle "></i> <span>FAQ</span></a></li>
<li><a href="<?php echo base_url('admin/content/links')?>"><i class="fa fa-link "></i> <span>Links</span></a></li>


<li><a href="<?php echo base_url('admin/files')?>"><i class="fa fa-file "></i> <span>Upload Files</span></a></li>
<li><a href="<?php echo base_url('admin/contact')?>"><i class="fa fa-info-circle "></i> <span>Contact Us</span></a></li>
<li class="treeview"> <a href="#"><i class="fa fa-cog"></i><span>SEO Pages</span><i class="fa fa-angle-left pull-right"></i></a>
  <ul class="treeview-menu">
    <?php foreach($pages as $page){?>
    <li><a href="<?php echo base_url('admin/seo/'.$page['en_title'])?>"><i class="fa fa-file-text-o"></i>
      <?=$page['name']?>
      </a></li>
    <?php } ?>
  </ul>
</li>
<li><a href="<?php echo base_url('admin/support')?>"><i class="fa fa-phone "></i> <span>Support</span></a></li>
