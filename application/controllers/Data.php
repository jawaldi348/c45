<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        userlogin();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Labor',
            'links' => '<li class="active">Data Labor</li>',
        ];
        $this->layouts->display('data/index', $data);
    }
}

/* End of file Data.php */
