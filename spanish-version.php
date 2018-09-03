<?php
/* Template name: spanish-version */
/* Copy of Divi page.php to display custom fields for Spanish version of blog */
get_header();
$pageid = $_GET['pageid'];
/* echo 'Page ID = ' . $pageid; */
?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php $val = get_post_meta($pageid, 'spanish_title', true); ?>
				<h2><?php echo $val; ?></h2>
				<?php $val = get_post_meta($pageid, 'spanish_content', true);
				echo nl2br($val); ?>
				</article> <!-- .et_pb_post -->
			</div> <!-- #left-area -->		
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>