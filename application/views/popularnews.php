	<section id="ccr-left-section" class="col-md-8">			<div class="current-page">				<a href="<?php echo base_url();?>"><i class="fa fa-home"></i> <i class="fa fa-angle-double-right"></i></a>                 Latest Popular News <i class="fa fa-angle-double-right"></i>			</div> <!-- / .current-page --><?php  if(isset($id)){ $popularNewsbyId=isset($popularnewsById[0])?$popularnewsById[0]:header("Location: ".base_url('popularnews/'));  ?>			<article id="ccr-article"  class="clearfix">				<h1><a href="<?php echo base_url('popularnews/single/'.$popularNewsbyId->id); ?>" ><?php echo $popularNewsbyId->title; ?></a></h1><div class="clearfix" align="center">				<img src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $popularNewsbyId->image; ?>" alt="1st Image"></div><br/>				<?php echo $popularNewsbyId->description; ?><?php  $this->load->view('addsensecode');?>			</article> <!-- /#ccr-single-post --><?php } ?>			<section id="ccr-article-related-post">			 <?php if(isset($id)){?>	<div class="ccr-gallery-ttile">						<span class="bottom"></span>						Related Posts				</div> <!-- .ccr-gallery-ttile --><?php } ?>				<ul>                	<?php 					//$k=0;					foreach($allpopularnews as $popular):					if(isset($id)&&$id==$popular->id){						continue;					}					?>                    <li>                                                <div class="ccr-thumbnail movieThumbs">                            <img src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php echo $popular->image; ?>" >                            <p><a href="<?php echo base_url('popularnews/single/'.$popular->id); ?>">Read More</a></p>                        </div>                        <h5><a href="<?php echo base_url('popularnews/single/'.$popular->id); ?>"><?php echo substr($popular->title,0,150); ?></a></h5>                    </li>					<?php //$k++;/					endforeach;?>					</ul>			</section>			<!--<section class="bottom-border"></section>  /#bottom-border --><nav class="nav-paging ">					<ul> <?php echo $pagination_helper->create_links(); ?> 											</ul>				</nav>		</section>