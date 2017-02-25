<section id="ccr-left-section" class="col-md-8">
	<style type="text/css">
	.glleryTitile{
		color: #00f !important;
		margin-top: 5px;
		text-transform: capitalize;
	}
	.current-page{
		text-transform: capitalize;
		color: #000;
		font-weight: bold;
	}
	.current-page a{
		text-decoration: underline;
		color: #000;
	}.albumThumbs{
		height:320px;
	}
	</style>
	<div class="current-page">
		<a href="<?php echo base_url(); ?>">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>&nbsp;&nbsp;Gallery
	</div> <!-- / .current-page -->
	<?php 
	if(isset($gallery) && count($gallery)>0){
	foreach($gallery as  $single):	?>
		<div class="col-xs-6 col-md-4 albumThumbs" style="padding:5px 5px 10px 5px">
			<a href="<?php echo base_url();?>gallery/photos/<?php echo $single->id; ?>">
                            <img width="200" height="250" src="<?php echo base_url();?>/useruploadfiles/galleryimages/<?php echo $single->image; ?>"  title="<?php echo $single->title; ?>" onError="this.onerror=null;this.src='<?php echo asset_url(); ?>img/noimage.png';"/>
			</a>
			<div class="caption">
			<h3 class="glleryTitile text-center">
			<a style="color:#00f;" href="<?php echo base_url();?>gallery/photos/<?php echo $single->id; ?>">

			<?php echo (strlen($single->title)>45)?substr($single->title, 0,45).'....':$single->title;  ?></h3>
			</a>
			</div>
		</div> 
	<?php	endforeach; } ?>
	<nav class="nav-paging ">
		<ul>
		 <?php echo isset($pagination_helper)?$pagination_helper->create_links():""; ?> 
		</ul>
	</nav>		
		<?php  $this->load->view('addsensecode');?>

</section>
            