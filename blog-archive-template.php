<?php
/* Template for blog pages */
/* Get lang(uage) */
$lang = $_GET['lang'];
/* echo 'Lang=' . $lang; */
if ( is_null($lang) ) :
	$lang = 'english';
endif;
?>
<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
		<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post(); 
					$post_format = et_pb_post_format(); ?>
					
					<article id="post-<?php the_ID(); ?>" 
					<?php post_class( 'et_pb_post' ); ?>>

				<?php
					$thumb = '';

					$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

					$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
					$classtext = 'et_pb_post_main_image';
					$titletext = get_the_title();
					$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
					$thumb = $thumbnail["thumb"];

					et_divi_post_format_content();

					if ( ! in_array( $post_format, array( 'link', 'audio', 'quote' ) ) ) {
						if ( 'video' === $post_format && false !== ( $first_video = et_get_first_video() ) ) :
							printf(
								'<div class="et_main_video_container">
									%1$s
								</div>',
								et_core_esc_previously( $first_video )
							);
						elseif ( ! in_array( $post_format, array( 'gallery' ) ) && 'on' === et_get_option( 'divi_thumbnails_index', 'on' ) && '' !== $thumb ) : ?>
							<a class="entry-featured-image-url" href="
								<?php the_permalink(); ?>">
								<?php print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height ); ?>
							</a>
					<?php
						elseif ( 'gallery' === $post_format ) :
							et_pb_gallery_images();
						endif;
					} ?>

				<?php if ( ! in_array( $post_format, array( 'link', 'audio', 'quote' ) ) ) : ?>
					<?php if ( ! in_array( $post_format, array( 'link', 'audio' ) ) ) : ?>
						<?php
						if ($lang == 'english') : ?>
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php else :
							$val = get_post_meta(get_the_ID(), 'spanish_title', true); 
							$spanish_url = add_query_arg('pageid',get_the_id(),'../../spanish-version'); ?> 
							<h2 class="spanish-title"><a href="<?php echo $spanish_url; ?>"><?php echo $val; ?></a></h2>
						<?php endif; 
					endif; ?>
					
					<?php
						et_divi_post_meta(); 
						
						if ( 'on' !== et_get_option( 'divi_blog_style', 'false' ) || ( is_search() && ( 'on' === 
							get_post_meta( get_the_ID(), '_et_pb_use_builder', true ) ) ) ) :
							if ( $lang == 'english' ) :
								truncate_post( 270 );
							else :
								$val = get_post_meta(get_the_ID(), 'spanish_content', true);    
								$val = strip_shortcodes( $val );    
								$val = apply_filters('the_content', $val);	    
								$val = str_replace(']]&gt;', ']]&gt;', $val);	    
								$excerpt_length = 40; // 40 words	    
								$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');	  
								$val = wp_trim_words( $val, $excerpt_length, $excerpt_more ); ?>  
								<p class="spanish-meta"><?php echo $val; ?></p> 
							<?php endif; 
						else :
							the_content();
						endif;
				endif; ?>

					</article> <!-- .et_pb_post -->
			<?php
					endwhile;

					if ( function_exists( 'wp_pagenavi' ) )
						wp_pagenavi();
					else
						get_template_part( 'includes/navigation', 'index' );
				else :
					get_template_part( 'includes/no-results', 'index' );
				endif;
			?>
			</div> <!-- #left-area -->

			<?php // get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->
</div> <!-- #news-updates -->
<?php get_footer(); ?>