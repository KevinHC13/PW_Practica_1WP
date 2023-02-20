<?php 
$spicepress_dark_latest_news_section_enable = get_theme_mod('latest_news_section_enable','on');
if($spicepress_dark_latest_news_section_enable !='off')
{
?>
<!-- Latest News section -->
<section class="blog-section home-news" id="blog">
	<div class="container">
		<?php
		$spicepress_dark_home_news_section_title = get_theme_mod('home_news_section_title',__('Turpis mollis','spicepress-dark'));
		$spicepress_dark_home_news_section_description = get_theme_mod('home_news_section_discription',__('Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.','spicepress-dark'));
		
		if(($spicepress_dark_home_news_section_title) || ($spicepress_dark_home_news_section_description)!='' ) { 
		?>
	    <!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-header">
					<?php if($spicepress_dark_home_news_section_title) {?>
					<h1 class="widget-title wow fadeInUp animated animated" data-wow-duration="500ms" data-wow-delay="0ms">
					<?php echo esc_html($spicepress_dark_home_news_section_title); ?>
					</h1>
					<?php } ?>
					<div class="widget-separator"><span></span></div>
					<?php if($spicepress_dark_home_news_section_description) {?>
					<p class="wow fadeInDown animated">
					<?php echo esc_html($spicepress_dark_home_news_section_description); ?>
					</p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		<?php } ?>
	
		<div class="row blog-list-layout">
		<?php 
		$spicepress_dark_args = array( 'post_type' => 'post','posts_per_page' => 3,'post__not_in'=>get_option("sticky_posts")) ; 	
						query_posts( $spicepress_dark_args );
						if(query_posts( $spicepress_dark_args ))
					{	
						while(have_posts()):the_post();
					{ ?>
			
			<div class="col-md-12 col-sm-12 col-xs-12">
				<article class="post wow fadeInDown animated" data-wow-delay="0.4s">
					<div class="media">
						<?php if(has_post_thumbnail()){ ?>
							<figure class="post-thumbnail thumb-width thumb-align-left"><?php $spicepress_dark_defalt_arg =array('class' => "img-responsive");?>
								<?php if(has_post_thumbnail()){?>
								<a  class="post-thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('',$spicepress_dark_defalt_arg);?></a>
								<?php } ?>
							</figure>
						<?php } ?>
						<div class="media-body">
						<?php
						if(get_theme_mod('blog_meta_section_enable',true) == true ):?>
							<div class="entry-meta">
                                    <span class="entry-date">
                                        <a href="<?php echo esc_url(get_month_link(get_post_time('Y'), get_post_time('m'))); ?>"><time datetime=""><?php echo esc_html(get_the_date()); ?></time></a>
                                    </span>
                            </div>
                        <?php endif;?>
                            <header class="entry-header">
								<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php
								if(get_theme_mod('blog_meta_section_enable',true) == true ):?>
                                    <div class="entry-meta">
                                        <span class="author"><?php esc_html_e('By', 'spicepress-dark'); ?> <a rel="tag" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html(get_the_author()); ?></a>
                                        </span>
                                        <?php
                                        $spicepress_dark_cat_list = get_the_category_list();
                                        if (!empty($spicepress_dark_cat_list)) {
                                            ?>
                                            <span class="cat-links"><?php esc_html_e('in', 'spicepress-dark'); ?> <?php the_category(', '); ?></span>
                                            <?php
                                        }

                                        $spicepress_dark_tag_list = get_the_tag_list();
                                        if (!empty($spicepress_dark_tag_list)) {
                                            ?>
                                            <span class="tag-links"><?php esc_html_e('Tag', 'spicepress-dark'); ?> <?php the_tags('', ', ', ''); ?></span>
                                        <?php }
                                        ?>
                                    </div> 
                             <?php endif;?>                                         
							</header>		
							
							<div class="entry-content">
								<?php the_content(__('Read More','spicepress-dark')); ?>
							</div>	
						</div>	
					</div>				
				</article>
			</div>
			<?php }  endwhile; } ?>
		</div>
	</div>	
</section>
<!-- /Latest News Section -->
<div class="clearfix"></div>
<?php }