<?php
/*
Plugin Name: Inline Script Test
Plugin URI: https://github.com
Description: Test issue with inline script add shortcode [inline-test] to post and check console logs
Version: 1.0
Update URI: inline-test
Author: alan
Author URI: https://fullworksplugins.com
License: GPL2
*/

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_register_script(
			'inline-test',
			plugin_dir_url( __FILE__ ) . 'script.js',
			array(),
			'1.0',
			false );
	}
);

add_action(
	'init',
	function () {
		add_shortcode(
			'inline-test',
			function () {
				wp_enqueue_script(
					'inline-test'
				);
				$script = <<<END
console.log('>>>>>>>>>>>>>>>>>>>>>inline js');
END;
				wp_add_inline_script( 'inline-test', $script, 'before' );

				return '<p>Inline Test</p>';
			}
		);
	}
);