<?php
/* Template name: vavp page */
/* Copy of Divi page.php to display English version of page */
get_header();
/* pageid is the id of the content, which has both the english and spanish versions */
$pageid = get_queried_object_id();
/* echo 'Page ID = ' . $pageid->id; */
?>
<div id="vavp-page">
<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
				<div class="english-bar">
					<?php
					$english_url = add_query_arg('pageid',get_the_id(),'../english-page'); ?>
					<h2 class="english-title"><a href="<?php echo $english_url; ?>"><?php the_title(); ?></a></h2>
					<?php get_post_meta( $pageid, '_et_pb_use_builder', true ) ;
							truncate_post( 270 ); ?>
							</div> <!-- .english-bar -->
							<div class="spanish-bar">
							<?php
							$val = get_post_meta($pageid, 'spanish_title_page', true); 
							$spanish_url = add_query_arg('pageid',get_the_id(),'spanish-page'); ?>
							<h2 class="spanish-title"><a href="<?php echo $spanish_url; ?>"><?php echo $val; ?></a></h2>	
							<?php
							$val = get_post_meta($pageid, 'spanish_content_page', true);    
							$val = strip_shortcodes( $val );    
							$val = apply_filters('the_content', $val);	    
							$val = str_replace(']]&gt;', ']]&gt;', $val);	    
							$excerpt_length = 40; // 40 words	    
							$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');	  
							$val = wp_trim_words( $val, $excerpt_length, $excerpt_more ); ?>  
							<p class="spanish-meta"><?php echo $val; ?></p>   
							</div> <!-- .spanish-bar -->
				</div <!--  .english-bar -->
			</div> <!-- #left-area -->		
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->
</div> <!-- #vavp-page -->
<?php get_footer(); ?>
