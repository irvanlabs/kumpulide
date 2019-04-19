<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
	protected $captcha;
	public function __construct()
	{
		parent::__construct();
		$this->captcha = $this->get_captcha();
	}
	protected function get_captcha()
	{
		$ret = create_captcha([
			'word'          => random_string('alnum', 8),
			'img_path'      => FCPATH.'captcha/',
			'img_url'       => base_url('captcha'),
			'font_path'     => BASEPATH.'fonts/captcha.ttf',
			'img_width'     => 300,
			'img_height'    => 75,
			'expiration'    => 7200,
			'word_length'   => 16,
			'font_size'     => 64,
			'img_id'        => 'kumpulide_captcha',
			'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
			
			'colors' => [
				'background' => [200,75,255],
				'border' => [0,255,0],
				'text' => [255,0,0],
				'grid' => [0,0,200]
			]
		]);
		$ret["image"] = '<img src="data:image/'.pathinfo($ret["filename"],PATHINFO_EXTENSION).';base64, '.base64_encode(file_get_contents(FCPATH.'captcha/'.$ret["filename"])).'" alt="captcha image" id="captcha_image" >';
		$data = [
			'captcha_time'	=> $ret['time'],
			'ip_address'	=> $this->input->ip_address(),
			'word'			=> $ret['word']
		];
		$query = $this->db->insert_string("captcha",$data);
		$this->db->query($query);
		unset($data);unset($query);
		return $ret;
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