<?php

class angularTheme {

	function __construct() {
		add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts' ) );
	}

	function enqueue_scripts() {

		wp_enqueue_script( 'angular-core', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js', array(), '1.5', true );
		wp_enqueue_script( 'angular-router', 'https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.18/angular-ui-router.min.js', array('angular-core'), '0.2.18', true);
		wp_enqueue_script( 'angular-app', get_template_directory_uri () . '/assets/js/app.js', array('angular-core', 'angular-router'), '0.1', true );

	}

}

new angularTheme();

?>