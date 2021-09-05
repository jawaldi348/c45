<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mlogin');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function masuk()
	{
		$post = $this->input->post(null, TRUE);
		$check_user = $this->Mlogin->check_user($post);
		$this->form_validation->set_rules('username', 'Username', 'callback_username_check[' . $check_user->num_rows() . ']');
		if ($this->form_validation->run() == TRUE) {
			$post = $this->input->post(null, TRUE);
			$json = [
				'status' => true
			];
		} else {
			$json = array(
				'status' => false,
				'username_error' => form_error('username')
			);
		}
		echo json_encode($json);
	}
	public function username_check($username, $recordCount)
	{
		if ($username == null) {
			$this->form_validation->set_message('username_check', 'Username tidak boleh kosong.');
			return false;
		} else if ($recordCount == 0) {
			$this->form_validation->set_message('username_check', 'Username yang anda masukkan salah.');
			return false;
		} else {
			return true;
		}
	}
}
