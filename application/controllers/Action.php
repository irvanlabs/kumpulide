<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Action extends MY_Controller
{
    public function login()
    {
    	$config = array(
	    	array(
		    	'field' => 'captcha',
		    	'label' => 'Captcha',
		    	'rules' => 'required'
	    	),
	    	array(
		    	'field' => 'username',
		    	'label' => 'Username',
		    	'rules' => 'required|min_length[8]|max_length[32]'
	    	),
	    	array(
		    	'field' => 'password',
		    	'label' => 'Password',
		    	'rules' => 'required|min_length[8]|max_length[32]'
	    	),
	    	array(
		    	'field' => 'email',
		    	'label' => 'Email',
		    	'rules' => 'required|valid_email'
	    	)
    	);
    	$this->form_validation->set_rules($config);
    	if($this->form_validation->run() == false)
    	{
    	
    	}
    	else
    	{
	    	$row = $this->cek_captcha();
	        if ($row->count > 0) {
	            $this->db->where('word', $_POST['captcha'])->delete('captcha');
	            echo clean_print($_POST);
	        }
        }
    }
}