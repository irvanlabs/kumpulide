<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Action extends MY_Controller
{
	public function login()
	{
		$expiration = (microtime(TRUE) - 1800);
		$this->db->where('captcha_time < ', $expiration)->delete('captcha');
		
		$sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
		$binds = [$_POST['captcha'], $this->input->ip_address(), $expiration];
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		
		if ($row->count > 0)
		{
			$this->db->where('word', $_POST['captcha'])->delete('captcha');
			echo clean_print($_POST);
		}
	}
}