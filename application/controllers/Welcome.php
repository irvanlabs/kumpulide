<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Welcome extends CI_Controller
{
    public function index()
    {
        // $this->load->view('welcome_message');
        echo APPPATH.'<hr>';
        $rand = random_string('alnum', 8);
        echo $rand.'<hr>';
        echo FCPATH."<br>";
        
        $vals = array(
	        'word'          => $rand,
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
	        
	        'colors' => array(
		        'background' => array(200,75,255),
		        'border' => array(0,255,0),
		        'text' => array(255,0,0),
		        'grid' => array(0,0,200)
		    )
        );
        $cap = create_captcha($vals);
        echo clean_print($cap);
        echo $cap["image"];
    }
}