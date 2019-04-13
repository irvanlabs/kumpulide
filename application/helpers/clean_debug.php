<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('clean_export')){
	function clean_export($val) : string {
		return highlight_string('<?php '.var_export($val,true).' ?>',true);
	}
}

if(!function_exists('clean_dump')){
	function clean_dump($val) : string {
		ob_start();var_dump($val);
		return highlight_string('<?php '.trim(ob_get_clean()).' ?>',true);
	}
}

if(!function_exists('clean_print')){
	function pretty_var($val) : string {
		return highlight_string('<?php '.print_r($val,true).' ?>',true);
	}
}