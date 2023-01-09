<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_learning extends CI_Controller{
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
        $this->table 		=('calendar');
		  $this->load->model('Globalmodel','modeldb'); 
    }
  /*================ GURU ================*/

  public function halamanGuru()
  {

    $data = [
      'user' => $this->get_datasess,
      'dataapp' => $this->get_datasetupapp
    ];
    $query = $this->ModelAdmin->TampilGuru();
    $data['guru'] = $query->result_array();
    $query = $this->ModelAdmin->TampilMapel();
		$data['mapel'] = $query->result_array();

    $data['title'] = 'POT | Data Guru';
    

    $this->load->view('layout/header', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('layout-pot/sidebar_admin', $data);
		$this->load->view('admin_halaman_guru', $data);
    $this->load->view('layout/footer', $data);
  }

  public function prosesTambahGuru()
	{
    $data = [
      'user' => $this->get_datasess,
      'dataapp' => $this->get_datasetupapp
    ];
		$this->form_validation->set_rules('NIP','NIP','required');
		$this->form_validation->set_rules('idMapel','Mapel','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('hp','No HP','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $password = random_string('alnum', 8);

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'idGuru'=>NULL,
				'NIP'=>$this->input->post('NIP'),
				'idMapel'=>$this->input->post('idMapel'),
				'namaGuru'=>$this->input->post('nama'),
				'password'=>$password,
				'noHP'=>$this->input->post('hp'),
        'alamat'=>$this->input->post('alamat')
			);
			$this->ModelAdmin->InsertGuru($insertData);
			redirect('Admin_learning/halamanGuru');
		} else {
      $this->load->view('layout/header', $data);
      $this->load->view('layout/navbar', $data);
      $this->load->view('layout-pot/sidebar_admin', $data);
			$this->load->view('admin_halaman_guru');
      $this->load->view('layout/footer', $data);
		}
	}

  public function halamanUbahGuru($id)
  {
    $data = [
      'user' => $this->get_datasess,
      'dataapp' => $this->get_datasetupapp
    ];
    $data['title'] = "POT | Ubah Guru";
    $query = $this->ModelAdmin->LihatGuru($id);
		$data['guru'] = $query->result_array();
    $query = $this->ModelAdmin->TampilMapel();
		$data['mapel'] = $query->result_array();

    $this->load->view('layout/header', $data);
    $this->load->view('layout/navbar', $data);
    $this->load->view('layout-pot/sidebar_admin', $data);
    $this->load->view('admin_ubah_guru', $data);
    $this->load->view('layout/footer', $data);
  }

  public function hapusGuru($id)
  {
    $data = [
      'user' => $this->get_datasess,
      'dataapp' => $this->get_datasetupapp
    ];
    $this->ModelAdmin->HapusGuru($id);

    $this->load->view('layout/header', $data);
    $this->load->view('layout/navbar', $data);
    $this->load->view('layout-pot/sidebar_admin', $data);
    redirect('Admin_learning/halamanGuru');
    $this->load->view('layout/footer', $data);
  }

  /*================ SISWA ================*/

  public function halamanSiswa()
  {
    $data = [
      'user' => $this->get_datasess,
      'dataapp' => $this->get_datasetupapp
    ];
    $query = $this->ModelAdmin->TampilSiswa();
    $data['siswa'] = $query->result_array();
    $query = $this->ModelAdmin->TampilKelas();
		$data['kelas'] = $query->result_array();

		$data['title'] = 'POT | Data Siswa';

    $this->load->view('layout/header', $data);
    $this->load->view('layout/navbar', $data);
    $this->load->view('layout-pot/sidebar_admin', $data);
		$this->load->view('admin_halaman_siswa', $data);
    $this->load->view('layout/footer', $data);
  }

  public function prosesTambahSiswa()
	{
    $data = [
      'user' => $this->get_datasess,
      'dataapp' => $this->get_datasetupapp
    ];
		$this->form_validation->set_rules('NIS','NIS','required');
		$this->form_validation->set_rules('idKelas','Kelas','required');
		$this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $password = random_string('alnum', 8);

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'idSiswa'=>NULL,
				'NIS'=>$this->input->post('NIS'),
				'idKelas'=>$this->input->post('idKelas'),
				'namaSiswa'=>$this->input->post('nama'),
				'password'=>$password,
        'alamatSiswa'=>$this->input->post('alamat')
			);
			$this->ModelAdmin->InsertSiswa($insertData);
			redirect('Admin_learning/halamanSiswa');
		} else {
      $this->load->view('layout/header', $data);
      $this->load->view('layout/navbar', $data);
      $this->load->view('layout-pot/sidebar_admin', $data);
			$this->load->view('admin_halaman_siswa');
      $this->load->view('layout/footer', $data);
		}
	}

  public function halamanUbahSiswa($id)
  {
    $data = [
      'user' => $this->get_datasess,
      'dataapp' => $this->get_datasetupapp
    ];
    $data['title'] = "POT | Ubah Siswa";
    $query = $this->ModelAdmin->LihatSiswa($id);
		$data['siswa'] = $query->result_array();
    $query = $this->ModelAdmin->TampilKelas();
		$data['kelas'] = $query->result_array();

    $this->load->view('layout/header', $data);
    $this->load->view('layout/navbar', $data);
    $this->load->view('layout-pot/sidebar_admin', $data);
    $this->load->view('admin_ubah_siswa', $data);
    $this->load->view('layout/footer', $data);
  }

  public function hapusSiswa($id)
  {
    $this->ModelAdmin->HapusSiswa($id);
		redirect('Admin_learning/halamanSiswa');
  }

  /*================ KONTRAK ================*/

  public function halamanKontrak()
  {
    $data = [
      'user' => $this->get_datasess,
      'dataapp' => $this->get_datasetupapp
    ];
    $query = $this->ModelAdmin->TampilKontrak();
    $data['kontrak'] = $query->result_array();
    $query = $this->ModelAdmin->TampilKelas();
    $data['kelas'] = $query->result_array();
    $query = $this->ModelAdmin->TampilMapel();
    $data['mapel'] = $query->result_array();

    $data['title'] = 'POT | Data Kontrak';

    $this->load->view('layout/header', $data);
    $this->load->view('layout/navbar', $data);
    $this->load->view('layout-pot/sidebar_admin', $data);
    $this->load->view('admin_halaman_kontrak', $data);
    $this->load->view('layout/footer', $data);
  }

  public function prosesTambahKontrak()
	{
    $data = [
      'user' => $this->get_datasess,
      'dataapp' => $this->get_datasetupapp
    ];
		$this->form_validation->set_rules('idMapel','Mapel','required');
		$this->form_validation->set_rules('idKelas','Kelas','required');

		if($this->form_validation->run() === TRUE)
		{
      $idKelas = $this->input->post('idKelas');
      $idMapel = $this->input->post('idMapel');

      $data_kelas = $this->ModelAdmin->GetKelas($idKelas)->result();
      $data_mapel = $this->ModelAdmin->GetMapel($idMapel)->result();
      foreach ($data_kelas as $kelas) {
        $namaKelas = $kelas->namaKelas;
      }
      foreach ($data_mapel as $mapel) {
        $namaMapel = $mapel->namaMapel;
      }
      if($this->ModelAdmin->check_kontrak($idKelas,$idMapel) == FALSE)
      {
        $insertData = array(
  				'idKontrak'=>NULL,
  				'idMapel'=>$this->input->post('idMapel'),
  				'idKelas'=>$this->input->post('idKelas')
  			);
  			$this->ModelAdmin->InsertKontrak($insertData);
  			redirect('Admin_learning/halamanKontrak');
      }else{
        $data = [
          'user' => $this->get_datasess,
          'dataapp' => $this->get_datasetupapp
        ];
        $data['message'] = "Kelas ".$namaKelas." sudah mengontrak mata pelajaran ".$namaMapel;

        $query = $this->ModelAdmin->TampilKontrak();
        $data['kontrak'] = $query->result_array();
        $query = $this->ModelAdmin->TampilKelas();
        $data['kelas'] = $query->result_array();
        $query = $this->ModelAdmin->TampilMapel();
        $data['mapel'] = $query->result_array();

        $data['title'] = 'POT | Data Kontrak';

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout-pot/sidebar_admin', $data);
        $this->load->view('admin_halaman_kontrak',$data);
        $this->load->view('layout/footer', $data);
      }
		} else {
      $data = [
        'user' => $this->get_datasess,
        'dataapp' => $this->get_datasetupapp
      ];

      $this->load->view('layout/header', $data);
      $this->load->view('layout/navbar', $data);
      $this->load->view('layout-pot/sidebar_admin', $data);
			$this->load->view('admin_halaman_kontrak');
      $this->load->view('layout/footer', $data);
		}
	}

  public function hapusKontrak($id)
  {
    $this->ModelAdmin->HapusKontrak($id);
		redirect('Admin_learning/halamanKontrak');
  }

  /* DIPAKAI========================================================*/


  public function halamanAkun()
  {
    $data = [
      'user' => $this->get_datasess,
      'dataapp' => $this->get_datasetupapp
    ];
    $query = $this->ModelAdmin->TampilDataGuru();
    $data['guru'] = $query->result_array();

    $query = $this->ModelAdmin->TampilDataSiswa();
		$data['siswa'] = $query->result_array();

    $this->load->view('layout/header', $data);
    $this->load->view('layout/navbar', $data);
    $this->load->view('layout-pot/sidebar_admin', $data);
		$this->load->view('admin_halaman_akun', $data);
    $this->load->view('layout/footer', $data);
  }

  public function halamanTambahSiswa()
  {
    $data['title'] = "POT | Tambah Siswa";

    $query = $this->ModelAdmin->TampilKelas();
		$data['kelas'] = $query->result_array();

    $this->load->view('admin_tambah_siswa', $data);
  }

  public function halamanTambahKontrak()
  {
    $data = [
      'user' => $this->get_datasess,
      'dataapp' => $this->get_datasetupapp
    ];
    $data['title'] = "POT | Tambah Kontrak";
    $query = $this->ModelAdmin->TampilKelas();
		$data['kelas'] = $query->result_array();

    $query = $this->ModelAdmin->TampilMapel();
		$data['mapel'] = $query->result_array();

    $this->load->view('layout/header', $data);
    $this->load->view('layout/navbar', $data);
    $this->load->view('layout-pot/sidebar_admin', $data);
    $this->load->view('admin_tambah_kontrak', $data);
    $this->load->view('layout/footer', $data);
  }

  public function halamanUbahPasswordGuru($id)
  {
    $data = [
      'user' => $this->get_datasess,
      'dataapp' => $this->get_datasetupapp
    ];
    $data['title'] = "POT | Ubah Guru";
    $query = $this->ModelAdmin->LihatGuru($id);
		$data['guru'] = $query->result_array();

    $this->load->view('layout/header', $data);
    $this->load->view('layout/navbar', $data);
    $this->load->view('layout-pot/sidebar_admin', $data);
    $this->load->view('admin_ubah_password_guru', $data);
    $this->load->view('layout/footer', $data);
  }

  public function halamanUbahPasswordSiswa($id)
  {
    $data = [
      'user' => $this->get_datasess,
      'dataapp' => $this->get_datasetupapp
    ];
    $data['title'] = "POT | Ubah Siswa";
    $query = $this->ModelAdmin->LihatSiswa($id);
		$data['siswa'] = $query->result_array();

    $this->load->view('layout/header', $data);
    $this->load->view('layout/navbar', $data);
    $this->load->view('layout-pot/sidebar_admin', $data);
    $this->load->view('admin_ubah_password_siswa', $data);
    $this->load->view('layout/footer', $data);
  }











  public function prosesUbahGuru()
	{
    $id = $this->input->post('id');
		$this->form_validation->set_rules('NIP','NIP','required');
		$this->form_validation->set_rules('idMapel','Mapel','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('hp','No HP','required');
    $this->form_validation->set_rules('alamat','Alamat','required');

		if($this->form_validation->run() === TRUE)
		{  
      $data = [
      'user' => $this->get_datasess,
      'dataapp' => $this->get_datasetupapp
    ];
      $insertData = array(
				'NIP'=>$this->input->post('NIP'),
				'idMapel'=>$this->input->post('idMapel'),
				'namaGuru'=>$this->input->post('nama'),
				'noHP'=>$this->input->post('hp'),
        'alamat'=>$this->input->post('alamat')
			);
			$this->ModelAdmin->UbahGuru($insertData,$id);
			redirect('Admin_learning/halamanGuru');
		} else {
      
      $this->load->view('layout/header', $data);
      $this->load->view('layout/navbar', $data);
      $this->load->view('layout-pot/sidebar_admin', $data);
			$this->load->view('admin_ubah_guru');
      $this->load->view('layout/footer', $data);
		}
	}

  public function prosesUbahPasswordGuru()
	{
    $data = [
      'user' => $this->get_datasess,
      'dataapp' => $this->get_datasetupapp
    ];
    $id = $this->input->post('id');
		$this->form_validation->set_rules('NIP','NIP','required');
		$this->form_validation->set_rules('password','Pasword','required');

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'NIP'=>$this->input->post('NIP'),
				'password'=>$this->input->post('password')
			);
			$this->ModelAdmin->UbahPasswordGuru($insertData,$id);
			redirect('Admin_learning/halamanAkun');
		} else {
      $this->load->view('layout/header', $data);
      $this->load->view('layout/navbar', $data);
      $this->load->view('layout-pot/sidebar_admin', $data);
			$this->load->view('admin_ubah_password_guru');
      $this->load->view('layout/footer', $data);
		}
	}

  public function prosesUbahPasswordSiswa()
	{
    $data = [
      'user' => $this->get_datasess,
      'dataapp' => $this->get_datasetupapp
    ];
    $id = $this->input->post('id');
		$this->form_validation->set_rules('NIS','NIS','required');
		$this->form_validation->set_rules('password','Pasword','required');

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'NIS'=>$this->input->post('NIS'),
				'password'=>$this->input->post('password')
			);
			$this->ModelAdmin->UbahPasswordSiswa($insertData,$id);
			redirect('Admin_learning/halamanAkun');
		} else {
      $this->load->view('layout/header', $data);
      $this->load->view('layout/navbar', $data);
      $this->load->view('layout-pot/sidebar_admin', $data);
			$this->load->view('admin_ubah_password_siswa');
      $this->load->view('layout/footer', $data);
		}
	}

  public function prosesUbahSiswa()
	{
    $data = [
      'user' => $this->get_datasess,
      'dataapp' => $this->get_datasetupapp
    ];
    $id = $this->input->post('id');
		$this->form_validation->set_rules('NIS','NIS','required');
		$this->form_validation->set_rules('idKelas','Kelas','required');
		$this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('alamat','Alamat','required');

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'NIS'=>$this->input->post('NIS'),
				'idKelas'=>$this->input->post('idKelas'),
				'namaSiswa'=>$this->input->post('nama'),
        'alamatSiswa'=>$this->input->post('alamat')
			);
			$this->ModelAdmin->UbahSiswa($insertData,$id);
			redirect('Admin_learning/halamanSiswa');
		} else {
      $this->load->view('layout/header', $data);
      $this->load->view('layout/navbar', $data);
      $this->load->view('layout-pot/sidebar_admin', $data);
			$this->load->view('admin_ubah_siswa');
      $this->load->view('layout/footer', $data);
		}
	}

  public function halaman404()
  {
    $data['title'] = "POT | Halaman tidak ditemukan";
    $this->load->view('404', $data);
  }


}
