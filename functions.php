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
function register_my_menus() {
  register_nav_menus (
    array (
	'espanol-menu' => __( 'Espanol Menu' ),
	'espanol-top-menu' => __(' Espanol top' )
	)
  );
}
add_action( 'init', 'register_my_menus' );
?>