<?php
/* Template name: lang-select */
/* Pageid is the id of the content, which has both the english and spanish versions */
/* Use referer, since we're coming from a page that calls this page (lang) */ 
$lang = $_GET['lang'];
/* $pageid = $_GET['pageid']; */
$referer = wp_get_referer();
$parsed = wp_parse_url($referer);
$path = $parsed['path'];
$host = $parsed['host'];
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
	if ( $lang == 'english' ) :
		wp_redirect('http://vavp.it4causeshosting.org/category/' . $slug . '/?lang=spanish');
		exit;
		endif;
	if ( $lang == 'spanish' ) :
		wp_redirect('http://vavp.it4causeshosting.org/category/' . $slug . '/?lang=english');
		exit;
		endif;
else:
	$slug = $cat;
endif;
switch ( $slug ) :
	case 'english-page' :
	case 'spanish-page' :
		list($sep1,$slug) = explode('?slug=',$referer);
		switchLang($lang,$slug);
		break;
	case 'english-version' :
	case 'spanish-version' :
		list($sep1,$pageid) = explode('?pageid=',$referer);
		switchLangPost($lang,$pageid);
		break;
	default :
		/* If coming from a selection on the navbar, the slug is in the url path */
		list($sep1,$slug) = explode('/',$path);
		/* Test whether the slug is for a page or post */
		$page_post = get_page_by_path($slug);
		$pageid = $page_post->ID;
		/* If it's a page, $pageid will be valid, but if post, try again */
		if ( is_null( $pageid )) :
			$page_post = get_page_by_path($slug,'','post');
			$pageid = $page_post->ID;
			switchLangPost($lang,$pageid);
		else :
			switchLang($lang,$slug);
			endif;
endswitch;
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
function switchLangPost ($lang, $pageid) {
if ( $lang == 'english' ) :
	wp_redirect('http://vavp.it4causeshosting.org/spanish-version' . '/?pageid=' . $pageid);
	exit;
	endif;
if ( $lang == 'spanish' ) :
	wp_redirect('http://vavp.it4causeshosting.org/english-version' . '/?pageid=' . $pageid);
	exit;
	endif;
}
?>