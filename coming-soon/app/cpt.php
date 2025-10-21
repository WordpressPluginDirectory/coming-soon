<?php

/**
 * Reguster seedprod custom post type.
 *
 * @return void
 */
function seedprod_lite_post_type() {

	$args = array(
		'supports'           => array( 'title', 'editor', 'revisions' ),
		'public'             => false,
		'capability_type'    => 'page',
		'show_ui'            => false,
		'publicly_queryable' => true,
		'can_export'         => false,
	);

	register_post_type( 'seedprod', $args );

}
$sedprod_pt = post_type_exists( 'seedprod' );
if ( false === $sedprod_pt ) {
	add_action( 'init', 'seedprod_lite_post_type', 0 );
}

/**
 * Add custom rewrite rules for special SeedProd pages
 */
function seedprod_lite_custom_rewrite_rules() {
	// Add rewrite rule for login page
	add_rewrite_rule( '^sp-login/?$', 'index.php?post_type=seedprod&name=sp-login', 'top' );
}
add_action( 'init', 'seedprod_lite_custom_rewrite_rules' );