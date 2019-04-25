<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends MY_Controller
{
	protected $captcha;
	public function __construct()
	{
		parent::__construct();
		$this->captcha = $this->get_captcha();
	}
	public function login()
	{
		$data = [
			"title" => __FUNCTION__,
			"captcha" => &$this->captcha
		];
		$this->load->view("pages/login",$data);
	}
}