<?php
/* Template name: spanish-version */
/* Copy of Divi page.php to display custom fields for Spanish version of blog */
get_header();
/* pageid is the id of the content, which has both the english and spanish versions */
$pageid = $_GET['pageid'];
/* echo 'Page ID = ' . $pageid; */
?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
				<div class="spanish-link">
				<?php
				/* get the id for the english version page */
				$english_post = get_page_by_path('english-version');
				$english_id = $english_post->ID;
				/*
				$english_url = add_query_arg('pageid',$pageid,'/english-version/'); ?>
				Click <a href="<?php echo $english_url; ?>">here</a> for English version of this post</div>
				</br>
				*/ ?>
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