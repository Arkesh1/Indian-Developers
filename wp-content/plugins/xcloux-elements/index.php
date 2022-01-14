<?php
/**
* Plugin Name: Cloux Elements
* Plugin URI: http://themeforest.net/user/gloriathemes
* Description: The elements of Cloux theme is exist in the plugin.
* Version: 1.6
* Author: Gloria Themes
* Author URI: http://gloriathemes.com/
*/



/*======
*
* Main Files
*
======*/
	require_once ( dirname( __FILE__ ) . '/vc-elements.php');
	require_once ( dirname( __FILE__ ) . '/core.php');
	require_once ( dirname( __FILE__ ) . '/post-types.php');
	require_once ( dirname( __FILE__ ) . '/term-meta.php');



/*======
*
* Metabox Extensions
*
======*/
	require_once ( dirname( __FILE__ ) . '/meta-box-extensions/meta-box-group/meta-box-group.php');
	require_once ( dirname( __FILE__ ) . '/meta-box-extensions/meta-box-show-hide/meta-box-show-hide.php');
	require_once ( dirname( __FILE__ ) . '/meta-box-extensions/meta-box-tooltip/meta-box-tooltip.php');
	require_once ( dirname( __FILE__ ) . '/meta-box-extensions/mb-term-meta/mb-term-meta.php');
	require_once ( dirname( __FILE__ ) . '/meta-box-extensions/meta-box-columns/meta-box-columns.php');
	require_once ( dirname( __FILE__ ) . '/meta-box-extensions/meta-box-tabs/meta-box-tabs.php');
	require_once ( dirname( __FILE__ ) . '/meta-box-extensions/meta-box-conditional-logic/meta-box-conditional-logic.php');