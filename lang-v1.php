<?php
/* Template name: lang-select */
/* Pageid is the id of the content, which has both the english and spanish versions */
/* Use referer for the url, since we're coming from a page that has called this page (lang) */ 
$lang = $_GET['lang'];
$referer = wp_get_referer();
$parsed = wp_parse_url($referer);
$path = $parsed['path'];
$host = $parsed['host'];
$page_post = get_page_by_path($slug);
$pageid = $page_post->ID;
/*
 echo 'Referer = ' . $referer;
 echo 'Path = ' . $path;
*/
/* If we're on one of the home pages, just switch to the othet one */
 if ( $path == '/' ) {
	wp_redirect('http://vavp.it4causeshosting.org/home-page-espanol/?lang=spanish');
	exit;
	}
if ( $path == '/home-page-espanol/' ) {
	wp_redirect('http://vavp.it4causeshosting.org/?lang=english');
	exit;
	}
/* If coming from a content page, get the slug from the parm field */
/* If it's a page, format will be /mission, and the slug is in the 2nd position */
/* If it's a post (blog), format will be /category/news-update-cat, and the slug is */
/*   in the 3rd position */
list($sep1,$cat,$slug) = explode('/',$path);
if ( $cat == 'category' ) :
else:
	$slug = $cat;
endif;
if (( $slug == 'english-page') || ($slug == 'spanish-page')) :
	list($sep1,$slug) = explode('?slug=',$referer);
	switchLang($lang,$slug);
/* If coming from a selection on the navbar, the slug is in the url path */
elseif ( $cat == 'category') :
	else:
		list($sep1,$slug) = explode('/',$path);
		switchLang($lang,$slug);
endif;
function switchLang ($lang, $slug) {
if ( $lang == 'english' ) :
	wp_redirect('http://vavp.it4causeshosting.org/spanish-page' . '/?slug=' . $slug);
	exit;
	endif;
if ( $lang == 'spanish' ) :
	wp_redirect('http://vavp.it4causeshosting.org/english-page' . '/?slug=' . $slug);
	exit;
	endif;
}
/* If coming from a content post (blog), get the slug from the parm field */
list($sep1,$cat,$slug) = explode('/',$path);
if ( $cat == 'category' ) :
	if ( $lang == 'english' ) :
		wp_redirect('http://vavp.it4causeshosting.org/category/' . $slug . '/?lang=spanish');
		exit;
		endif;
	if ( $lang == 'spanish' ) :
		wp_redirect('http://vavp.it4causeshosting.org/category/' . $slug . '/?lang=english');
		exit;
		endif;
endif;
?>