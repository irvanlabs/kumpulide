<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('clean_export')){
	function clean_export($val) : string {
		return '<div class="dump-box">'.preg_replace(['/\&lt;\?php\&nbsp;/','/\?\&gt;/'],'',highlight_string('<?php '.var_export($val,true).' ?>',true)).'</div>';
	}
}

if(!function_exists('clean_dump')){
	function clean_dump($val) : string {
		ob_start();var_dump($val);
		return '<div class="dump-box">'.preg_replace(['/\&lt;\?php\&nbsp;/','/\?\&gt;/'],'',highlight_string('<?php '.trim(ob_get_clean()).' ?>',true)).'</div>';
	}
}

if(!function_exists('clean_print')){
	function clean_print($val) : string {
		return '<div class="dump-box">'.preg_replace(['/\&lt;\?php\&nbsp;/','/\?\&gt;/'],'',highlight_string('<?php '.print_r($val,true).' ?>',true)).'</div>';
	}
}