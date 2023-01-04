<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
	is_logged_in();
	$this->get_datasess = $this->db->get_where('user', ['username' =>
	$this->session->userdata('username')])->row_array();
	$this->load->model('M_Front');
	$this->load->model('M_Admin');
	$this->load->model('ModelAdmin');
	$this->load->model('ModelGuru');
	$this->load->model('ModelSiswa');
	$this->get_datasetupapp = $this->M_Front->fetchsetupapp();
	}
  

  public function index()
  {
	$data = [
		'title' => 'Chart',
		'user' => $this->get_datasess,
		'dataapp' => $this->get_datasetupapp
	];

    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
			$data['title'] = 'POT | Beranda';
			$data['username'] = $this->session->userdata('username');

			$this->load->view('layout/header', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('layout-pot/sidebar_admin', $data);
			$this->load->view('admin_dashboard', $data);
			$this->load->view('layout/footer', $data);

		}else if($this->session->userdata('role') == 'guru' && $this->session->userdata('login') == TRUE) {
			$data['title'] = 'POT | Beranda';
			$data['username'] = $this->session->userdata('username');

			$this->load->view('layout/header', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('layout-pot/sidebar_guru', $data);
			$this->load->view('guru_dashboard', $data);
			$this->load->view('layout/footer', $data);

		}else if($this->session->userdata('role') == 'siswa' && $this->session->userdata('login') == TRUE) {
			$data['title'] = 'POT | Beranda';
			$data['username'] = $this->session->userdata('username');

			$this->load->view('layout/header', $data);
			$this->load->view('layout/navbar', $data);
			$this->load->view('layout-pot/sidebar_siswa', $data);
			$this->load->view('siswa_dashboard', $data);
			$this->load->view('layout/footer', $data);

		}else{
			$data['title'] = 'POT | Halaman Login';
			$this->load->view('login_form', $data);
		}
  }


}
