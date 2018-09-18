<?php
/* Template name: english-version */
/* Copy of Divi page.php to display English version of blog */
get_header();
/* pageid is the id of the content, which has both the english and spanish versions */
$pageid = $_GET['pageid'];
/* echo 'Page ID = ' . $pageid; */
?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
				<div class="english-link">
				<?php
				/* get the id for the spanish version page */
				$spanish_post = get_page_by_path('spanish-version');
				$spanish_id = $spanish_post->ID;
				$spanish_url = add_query_arg('pageid',$pageid,'/spanish-version/'); ?>
				Click <a href="<?php echo $spanish_url; ?>">here</a> for Spanish version of this post</div>
				</br>
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
