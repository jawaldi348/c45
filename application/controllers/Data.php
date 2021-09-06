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
    public function tampil()
    {
        $query = $this->db->get('data')->result();
        if ($query == null) {
            $data = (int)0;
        } else {
            foreach ($query as $row) {
                $data[] = $row;
            }
        }
        echo json_encode($data);
    }
    public function tambah()
    {
        $this->load->view('data/tambah');
    }
}

/* End of file Data.php */
