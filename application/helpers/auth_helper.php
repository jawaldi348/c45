<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('userlogin')) {
    function userlogin()
    {
        $CI = &get_instance();
        $session = $CI->session->userdata('userData');
        if ($session['status_login'] != 'success') {
            redirect('login/logout');
        }
    }
}
