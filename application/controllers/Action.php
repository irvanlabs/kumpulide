<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Action extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function login()
	{
		$expiration = time() - 7200;
		$this->db->where('captcha_time < ', $expiration)->delete('captcha');
		$sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
		$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		
		if ($row->count == 0)
		{
			echo 'You must submit the word that appears in the image.';
		}
		echo clean_print($_POST);
	}
}