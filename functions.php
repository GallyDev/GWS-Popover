<?php
	// this file will be included by GWS-Debugian automatically

	add_action('wp_footer', 'gws_test_footer');
	function gws_test_footer() {
		echo 'Nur ein Testi :)';
	}
