<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		userlogin();
	}
	public function index()
	{
		$data = [
			'title' => 'Dashboard'
		];
		$this->layouts->display('layout/content', $data);
	}
}
