<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mlogin extends CI_Model
{
    public function check_user($post)
    {
        return $this->db->where('username', $post['username'])->get('user');
    }
}

/* End of file Mlogin.php */
