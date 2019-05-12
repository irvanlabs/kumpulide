<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends MY_Controller
{
    public function login()
    {
        $captcha = (empty($captcha)) ? $this->get_captcha() : $captcha;
        $data = [
            "title" => ucfirst(__FUNCTION__),
            "captcha" => [$captcha["type"],$captcha["image"]]
        ];
        $db = [
            'captcha_time'  => $captcha['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'          => $captcha['word']
        ];
        $this->db->insert('captcha', $db);
        $this->load->view("pages/login", $data);
    }
}