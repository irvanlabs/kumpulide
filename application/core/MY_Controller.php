<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
	protected function cek_captcha()
	{
		$expiration = (microtime(true) - 1800);
		$this->db->where('captcha_time < ', $expiration)->delete('captcha');
		$sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
		$binds = [$_POST['captcha'], $this->input->ip_address(), $expiration];
		$query = $this->db->query($sql, $binds);
		return $query->row();
	}
    protected function get_captcha()
    {
        return create_captcha([
            'word'          => random_string('alnum', 8),
            'img_path'      => FCPATH.'captcha/',
            'img_url'       => base_url('captcha'),
            'font_path'     => BASEPATH.'fonts/captcha.ttf',
            'img_width'     => 300,
            'img_height'    => 75,
            'expiration'    => time(),
            'word_length'   => 8,
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
    }
}