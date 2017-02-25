<section id="ccr-left-section" class="col-md-8">
	<style type="text/css">
	.glleryTitile{
		color: #00f !important;
		margin-top: 5px 0px 5px 0px;
		text-transform: capitalize;
	}
	.thumb_container{
		 border: 1px solid #e0e0e0;
	    color: #000000;
	    cursor: pointer;
	    display: block;
	    float: left;
	    padding: 8px 15px 0 15px;
	    text-decoration: none;
		height:245px;
	}
	.caption {
    margin-bottom: 20px;
    margin-top: 12px;
}
.current-page{
		text-transform: capitalize;
		color: #000;
		font-weight: bold;
	}
	.current-page a{
		text-decoration: underline;
		color: #000;
	}
	</style>	
	<div class="current-page">
		<a href="<?php echo base_url('gallery'); ?>" >Home</a>&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i>&nbsp;&nbsp;<?php echo $cat[0]->category; ?> Albums
	</div> <!-- / .current-page -->
	<?php 
	if(isset($gallery) && count($gallery)>0){
	foreach($gallery as  $single):	?>
		<div class="col-xs-6 col-md-3 thumb_container" >
			<a href="<?php echo base_url();?>gallery/photos/<?php echo $single->id; ?>" alt="<?php echo $single->title; ?>">
				<img width="120" height="150" src="<?php echo base_url();?>/useruploadfiles/galleryimages/<?php echo $single->image; ?>"  title="<?php echo $single->title; ?>" alt="<?php echo $single->title; ?>" onError="this.onerror=null;this.src='<?php echo asset_url(); ?>img/noimage.png';"/>
			</a>
			<div class="caption">
			<h3 class="glleryTitile text-center"><?php echo (strlen($single->title)>30)?substr($single->title,0, 30).'..':$single->title;  ?></h3>
			<h6 class="text-center">( <?php echo $single->cnt;  ?> ) Images</h6>
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

            