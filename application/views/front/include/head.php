<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#651a1f">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#651a1f">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#651a1f">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/swiper.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>" type="text/css" />
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/styves-logo.png')?>">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri:300,400,500,600,700" rel="stylesheet">

    <!-- Scripts -->
    <script src="<?php echo base_url('assets/scripts/jquery-3.2.1.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/scripts/swiper.jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/scripts/script.js')?>"></script>
    <title><?=$seo->$seo_title?> </title>
    <meta name="description" content="<?=$seo->$seo_description?>">
    <meta name="keywords" content="<?=$seo->$keys?>">

</head>

<body>
    <div class="wrapper">
        <?php $headrClass=""; if(current_url()!=base_url()){$headrClass="innerHeader";}?>

    <header class="<?= $headrClass ?>">
        <div class="shaded_bg lang">
            <ul>
                <li><a href="" class="small_icon"><img src="<?=base_url('assets/images/search.png')?>"></a></li>
                <li class="verticalBorder"></li>
                <li><a class="arabicFont" href="">عربي</a></li>
            </ul>
        </div><!-- End lang shaded bg  -->

        <div class="shaded_bg leftFloat rightRadius">
            <a href="" class="small_icon"><img src="<?=base_url('assets/images/issues.png')?>"> Main issues</a>
        </div><!-- End main usses button -->


        <nav>        
            <ul class="main_menu leftFloat">
                <li class="dropdown">
                    <a href="<?=base_url('about')?>"><?=lang('about')?></a>
                    <ul class="dropdown_list">
                        <?php foreach ($aboutPages as $page) {?>
                        <li><a href="<?php echo base_url('about/'.$page['name'])?>"><?=$page['en_title']?></a></li>
                        <?php } ?>
                    </ul>   
                </li>
                <li class="dropdown"><a href="<?=base_url('work')?>"><?=lang('ourWork')?></a>
                <ul class="dropdown_list">
                        <?php foreach ($workPages as $page) {?>
                        <li><a href="<?php echo base_url('work/'.$page['name'])?>"><?=$page['en_title']?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a href="<?=base_url('news')?>"><?=lang('news')?></a></li>
                <li><a href="<?=base_url('publications')?>"><?=lang('publications')?></a></li>
            </ul>
            <div class="logo"><a href="<?=base_url()?>"><img src="<?=base_url('assets/images/styves-logo.png')?>"></a></div>
            <ul class="main_menu rightFloat">

                <li><a href="<?=base_url('donors')?>"><?=lang('donors')?></a></li>
                <li><a href="<?=base_url('gallery')?>"><?=lang('gallery')?></a></li>
                <li><a href="<?=base_url('faq')?>"><?=lang('faq')?></a></li>
                <li><a href="<?=base_url('contact')?>"><?=lang('contact')?></a></li>
            </ul>
            <div class="clear"></div>
        </nav>
    </header>    
