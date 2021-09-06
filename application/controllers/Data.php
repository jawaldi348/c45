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
    public function simpan()
    {
        $post = $this->input->post(null, TRUE);
        $data = array(
            'nama' => $post['nama'],
            'jumlah' => $post['jumlah'],
            'periksa' => $post['periksa'],
            'lama' => $post['lama'],
            'kondisi' => $post['kondisi'],
        );
        $this->db->insert('data', $data);
        $json['status'] = true;
        echo json_encode($json);
    }
    public function edit()
    {
        $kode = $this->input->get('kode');
        $data['data'] = $this->db->where('id', $kode)->get('data')->row_array();
        $this->load->view('data/edit', $data);
    }
    public function update()
    {
        $post = $this->input->post(null, TRUE);
        $data = array(
            'nama' => $post['nama'],
            'jumlah' => $post['jumlah'],
            'periksa' => $post['periksa'],
            'lama' => $post['lama'],
            'kondisi' => $post['kondisi'],
        );
        $this->db->where('id', $post['kode'])->update('data', $data);
        $json['status'] = true;
        echo json_encode($json);
    }
}

/* End of file Data.php */
