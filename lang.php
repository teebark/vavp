<?php
/* Template name: lang-select */
/* pageid is the id of the content, which has both the english and spanish versions */
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
if (( $path == '/english-page/') || ($path == '/spanish-page/')) {
	list($sep1,$slug) = explode('?slug=',$referer);
}
/* If coming from a selection on the navbar, the slug is in the url path */
else {
	list($sep1,$slug) = explode('/',$path);
}
if ( $lang == 'english' ) {
	wp_redirect('http://vavp.it4causeshosting.org/spanish-page' . '/?slug=' . $slug);
	exit;
}
if ( $lang == 'spanish' ) {
	wp_redirect('http://vavp.it4causeshosting.org/english-page' . '/?slug=' . $slug);
	exit;
}
?>