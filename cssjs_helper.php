<?php
/**
 * Ruta: /application/helpers/cssjs_helper.php
 */

if(!function_exists('add_css')) {
	function add_css($Arch = null) {
		if(empty($Arch)) {
			return;
		}
		$CI  = &get_instance();
		$CSS = $CI->config->item('header_css');
		$CI->config->set_item('header_css', array_merge($CSS, (array)$Arch));
	}
}

if(!function_exists('add_js')) {
	function add_js($Arch = null, $Header = false) {
		if(empty($Arch)) {
			return;
		}
		$CI = &get_instance();
		if($Header) {
			$JS = $CI->config->item('header_js');
			$CI->config->set_item('header_js', array_merge($JS, (array)$Arch));
		}
		else {
			$JS = $CI->config->item('footer_js');
			$CI->config->set_item('footer_js', array_merge($JS, (array)$Arch));
		}
	}
}

if(!function_exists('render_arch_header')) {
	function render_arch_header() {
		$CI  = &get_instance();
		$CSS = $CI->config->item('header_css');
		$JS  = $CI->config->item('header_js');
		foreach($CSS as $V) {
			if(!in_array(parse_url($V, PHP_URL_SCHEME), ['http', 'https', 'ftp'])) {
				$V = base_url($V);
			}
			echo '<link rel="stylesheet" href="'.$V.'">'.PHP_EOL;
		}
		foreach($JS as $V) {
			if(!in_array(parse_url($V, PHP_URL_SCHEME), ['http', 'https', 'ftp'])) {
				$V = base_url($V);
			}
			echo '<script src="'.$V.'"></script>'.PHP_EOL;
		}
	}
}

if(!function_exists('render_arch_footer')) {
	function render_arch_footer() {
		$CI  = &get_instance();
		$JS  = $CI->config->item('footer_js');
		foreach($JS as $V) {
			if(!in_array(parse_url($V, PHP_URL_SCHEME), ['http', 'https', 'ftp'])) {
				$V = base_url($V);
			}
			echo '<script src="'.$V.'"></script>'.PHP_EOL;
		}
	}
}
