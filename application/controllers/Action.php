<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Action extends CI_Controller
{
	public function login()
	{
		echo clean_dump($this->input->post());
	}
}