<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    private $filename = "import_data";
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
    public function hapus()
    {
        $kode = $this->input->get('kode');
        $this->db->where('id', $kode)->delete('data');
        $json['status'] = true;
        echo json_encode($json);
    }
    public function upload()
    {
        $this->load->view('data/upload');
    }
    public function upload_file($filename)
    {
        $this->load->library('upload'); // Load librari upload

        $config['upload_path'] = './excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size']  = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;

        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if ($this->upload->do_upload('file')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
    public function import()
    {
        $upload = $this->upload_file($this->filename);
        if ($upload['result'] == "success") {
            include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
            $excelreader = new PHPExcel_Reader_Excel2007();
            $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx');
            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
            $data = array();
            $numrow = 1;
            foreach ($sheet as $row) {
                if ($numrow > 1) {
                    $nama = $row['A'];
                    $jumlah = $row['B'];
                    $periksa = $row['C'];
                    $lama = $row['D'];
                    $kondisi = $row['E'];
                    $data = array(
                        'nama' => $nama,
                        'jumlah' => $jumlah,
                        'periksa' => $periksa,
                        'lama' => $lama,
                        'kondisi' => $kondisi,
                    );
                    $this->db->insert('data', $data);
                }
                $numrow++;
            }
            $json = array(
                'status' => true,
                'pesan' => 'Data berhasil diupload',
                'data' => $data
            );
        } else {
            $json = array(
                'status' => false,
                'upload_error' => $upload['error']
            );
        }
        echo json_encode($json);
    }
}

/* End of file Data.php */
