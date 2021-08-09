<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model(['Visualisasi_model', 'User']);
	}


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$userOnById = $this->User->getOnlineUserById($this->session->userdata('id'));
		$temp       = $this->User->getuserById($this->session->userdata('id'));
		if (!$this->session->userdata('loggedIn')) {
			$this->session->set_flashdata('result_login', 'Silahkan Log in untuk mengakses sistem !');
			redirect('/auth/');
		} else if ($temp[0]->online_status != "online") {
			$this->session->set_flashdata('result_login', 'Silahkan Log in kembali untuk mengakses sistem !');
			redirect('auth/force_logout');
		} else if (count_time_since(strtotime($userOnById[0]->time_online)) > 7100) {
			$this->session->set_flashdata('result_login', 'Silahkan Log in kembali untuk mengakses sistem !');
			redirect('auth/force_logout');
		} else {
			$view['title'] = 'Halaman Beranda';
			$view['active_home'] = 'active';
			$view['getBerandaAbsensi'] = $this->Visualisasi_model->getBerandaAbsensi();
			$view['getBerandaKarakter'] = $this->Visualisasi_model->getBerandaKarakter();
			$view['getBerandaPrestasi'] = $this->Visualisasi_model->getBerandaPrestasi();
			$view['getKomparasiDataKarakterBeranda'] = $this->Visualisasi_model->getKomparasiDataKarakterBeranda();
			$view['totalKeteranganAlpa'] = $this->Visualisasi_model->totalKeterangan('Alpa');
			$view['totalKeteranganIzin'] = $this->Visualisasi_model->totalKeterangan('Izin');
			$view['totalKeteranganSakit'] = $this->Visualisasi_model->totalKeterangan('Sakit');

			$this->load->view('templates/header', $view);
			$this->load->view('templates/sidebar', $view);
			$this->load->view('dashboard');
			$this->load->view('templates/footer');
		}
	}

	public function pimpinan()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('home_pimpinan');
		$this->load->view('layout/footer');
	}
}
