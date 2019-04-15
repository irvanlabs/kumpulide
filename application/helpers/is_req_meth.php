<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists()){
	function is_req_meth(string $method, callable $true = null, callable $false = null){
		if($_SERVER['REQUEST_METHOD'] == $method){
			return (is_null($true)) ? true : call_user_func($true);
		} else {
			return (is_null($false)) ? exit(http_response_code(405)) : call_user_func($false) ;
		}
	}
}