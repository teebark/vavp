<?php
/* Template name: english-page */
/* Copy of Divi page.php to display English version of blog */
get_header();
/* Slug of current page */
$slug = $_GET['slug'];
$page_post = get_page_by_path($slug);
$pageid = $page_post->ID;
/*
 echo 'Referer = ' . $referer;
 echo 'Path = ' . $path;
 echo 'Slug = ' . $slug;
 echo 'Pageid = ' . $pageid;
*/
?>
<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
				<div class="english-link">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
				$val = get_the_title($pageid); ?>
				<h2><?php echo $val; ?></h2>
				<?php 
				$val = get_page($pageid);
				$val = $val->post_content;
				echo nl2br($val); ?>
				</article> <!-- .et_pb_post -->
			</div> <!-- #left-area -->		
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
