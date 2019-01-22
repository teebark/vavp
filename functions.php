<?php
/**
 * Functions - Child theme custom functions
 */


/************************************************************************************************
***************** CAUTION: do not remove or edit anything within this section ******************/

/**
 * Makes the Divi Children Engine available for the child theme.
 * Do not remove this, your child theme will not work.
 */
require_once('divi-children-engine/divi_children_engine.php');

/***********************************************************************************************/
/*- You can include any custom code for your child theme below this line -*/
/* Set up the custom menus for Spanish */
function register_my_menus() {
  register_nav_menus (
    array (
	'espanol-menu' => __( 'Espanol Menu' ),
	'espanol-top' => __(' Espanol top' )
	)
  );
}
add_action( 'init', 'register_my_menus' );
/* Set up script for escape functionality */
function load_escape_js() {
	wp_register_script('escape-js','http://vavp.it4causeshosting.org/wp-content/themes/virginia-avp/escape-js.js',array('jquery'),'',false);
	wp_enqueue_script('escape-js');
}
add_action('wp_enqueue_scripts','load_escape_js');
?>