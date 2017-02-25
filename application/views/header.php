<!doctype html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="keywords" content="hyderabad news, telangana news, vizag, kaburluguru online, breaking news in telugu,weather news in telugu,cricket news in telugu" >
        <?php 
        $socialmediaimage=asset_url().'img/fbimage.png'; 
        if(isset($articleimage)){
            if($articleimage!=""){
                $socialmediaimage=base_url().'useruploadfiles/postimages/'.$articleimage;
            }
        } ?>

        

        <meta property="og:image" content="<?php echo $socialmediaimage; ?>"/>
        <meta itemprop="image" content="<?php echo $socialmediaimage; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <title><?php echo  $title; ?></title>
        <meta name="author" content="">
        <meta name="description" content="<?php echo isset($description)?$description:''; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/jquery.social-buttons.css">
        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/jquery.share.css">
        <link href='http://fonts.googleapis.com/css?family=Yesteryear' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset-context/cssreset-context-min.css">


        <!--[if lt IE 9]>
                <script src="js/html5shiv.js"></script>
        <![endif]-->
           
        <script type="text/javascript">
             var current_url="<?php echo current_url(); ?>";
        </script>
   

  <script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "6899304c-c4f2-4cce-9c22-e359dcdf1d68", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    </head>

    <body >
        
        <header id="ccr-header">
            <section id="ccr-site-title">

                <div class="container main" style="background:#F0F0F0;">
                    <div class="col-md-12 col-ms-12 col-sm-12 col-xs-12" style="padding:0px !important;" >
                        <div class="col-md-3 col-xs-12 logodiv"> 
                          <a href="<?php echo base_url(); ?>" class="navbar-brand">
                            <img class="logotag" src="<?php echo asset_url(); ?>img/APNN copy.png" alt="Site Logo" />
                            </a>
                        </div>
                        <div class="col-md-9 padding0 headeradd"  style="padding-left: 25px !important;" >
                            <div class="col-md-12 padding0" style="position:relative;padding:0px !important;">
                                <!-- <img style="height:140px;" src="<?php echo asset_url(); ?>img/add1.jpg" alt="Site Logo" /> -->
                                

<div data-WRID="WRID-147339412255768969" data-widgetType="staticBanner" data-responsive="yes" data-class="affiliateAdsByFlipkart" height="90" width="728"></div><script async src="//affiliate.flipkart.com/affiliate/widgets/FKAffiliateWidgets.js"></script>
                            </div>
                        </div>
                         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div id="great_main_menu_panel-mobile"  style="z-index: 2;"><!-- great_main_menu_panel -->
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse padding0" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li><a class="<?php echo active_link('home'); ?>" href="<?php echo base_url(); ?>"><i class="fa fa-home fa-lg"></i></a></li>
                                        <li><a class="<?php echo active_link('latestupdates'); ?> " href="<?php echo base_url('latestupdates'); ?>">Latest News</a></li>
                                        <li><a class="<?php echo active_link('videos'); ?> " href="<?php echo base_url('videos'); ?>">Video News</a></li>
                                        <li><a class="<?php echo active_link('political'); ?> " href="<?php echo base_url('political'); ?>">Politics</a></li>
                                        <li><a class="<?php echo active_link('movienews'); ?> " href="<?php echo base_url('movienews'); ?>">Movie News</a></li>
                                        <li><a class="<?php echo active_link('moviereviews'); ?> " href="<?php echo base_url('moviereviews'); ?>">Movie Reviews</a></li>
                                        <li><a class="<?php echo active_link('gallery'); ?> " href="<?php echo base_url('gallery'); ?>">Gallery</a></li>
                                        <li><a class="<?php echo active_link('editorchoice'); ?> " href="<?php echo base_url('editorchoice'); ?>">Editorial News</a></li>
                                        <li><a class="<?php echo active_link('contactus'); ?> " href="<?php echo base_url('home/contactus'); ?>">Contact Us</a></li>
                                   </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>     
                    </div>
                    </div>
                </div>
            </section> <!-- / #ccr-site-title -->

        </header> <!-- /#ccr-header -->

        <section id="ccr-main-section" >
            <div class="container main">
                <?php $this->load->view('partials/nav'); ?>
            </div>
            <?php $lastupdates = getLatestUpdates(); ?>
            <div class="container headerupdate" id="breaking"  >
                <div class="update-ribon col-md-2" style="background:darkgreen;">Latest News</div>
                <span class="glyphicon glyphicon-bullhorn latestnewsicon"></span>
                <div class="mar col-md-10 falshnewsscroll" >
                    <marquee style="line-height: 36px;" behavior="scroll" scrollamount="4" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                        <?php foreach ($lastupdates as $update):
                            $articletitle = url_title($update->title, 'dash', TRUE);
                         ?>
                            <i class="fa fa-arrow-right"></i> <a  class="latestupdate" href="<?php echo base_url('latestupdates/single/' . $update->id.'/'.$articletitle); ?>"><?php echo $update->title; ?></a>
                        <?php endforeach; ?> 
                    </marquee>
                </div>
            </div>
            <div class="container">
