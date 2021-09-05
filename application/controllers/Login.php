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
		$this->form_validation->set_rules('password', 'Password', 'callback_password_check[' . $post['username'] . ']');
		if ($this->form_validation->run() == TRUE) {
			$post = $this->input->post(null, TRUE);
			$data = $this->Mlogin->check_user($post)->row_array();
			$user_data = array(
				'login_auth' => TRUE,
				'status_login' => 'success',
				'iduser' => $data['id']
			);
			$this->session->set_userdata('userData', $user_data);
			$json = [
				'status' => true
			];
		} else {
			$json = array(
				'status' => false,
				'username_error' => form_error('username'),
				'password_error' => form_error('password')
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
	public function password_check($pass, $username)
	{
		$data = $this->Mlogin->check_pass($username);
		$password = $data['password'];
		if ($pass == null) {
			$this->form_validation->set_message('password_check', 'Password tidak boleh kosong.');
			return false;
		} else {
			if (password_verify($pass, $password)) {
				return true;
			} else {
				$this->form_validation->set_message('password_check', 'Password yang anda masukkan salah.');
				return false;
			}
		}
	}
}
