<?php

class angularTheme {

	function __construct() {
		add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts' ) );
	}

	function enqueue_scripts() {

		wp_enqueue_script( 'angular-core', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js',  array( 'jquery' ), '1.5', false );
		wp_enqueue_script( 'angular-resource', '//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-resource.js', array('angular-core'), '1.0', false );
		wp_enqueue_script( 'angular-router', 'https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.18/angular-ui-router.min.js', array('angular-core'), '0.2.18', false);
		wp_enqueue_script( 'angular-app', get_template_directory_uri () . '/assets/js/app.js', array('angular-core', 'angular-router', 'angular-sanitize'), '0.1', true );
		wp_enqueue_script( 'angular-sanitize', get_template_directory_uri () . '/assets/lib/ngsanitize.js', array('angular-core', 'angular-router'), '0.1', false );
		wp_localize_script( 'angular-app', 'wPApp', array(
				
				'api_url'			 => rest_get_url_prefix() . '/wp/v2/',
				'template_directory' => get_template_directory_uri() . '/',
				//'nonce'				 => wp_create_nonce( 'wp_rest' ),
				//'is_admin'			 => current_user_can('administrator')
				
			)
		);
	}

}

new angularTheme();

?>