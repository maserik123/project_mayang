<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visualisasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model(['Visualisasi_model']);
    }


    public function index($tahun)
    {
        if (!empty($tahun)) {
            $view['tahun'] = $tahun;
        }

        $view['title'] = 'Halaman Visualisasi';
        $view['active_visualisasi'] = 'active';
        $view['getAbsensiLakiLaki'] = $this->Visualisasi_model->getAbsensiLakiLaki($tahun);
        $view['getAbsensiPerempuan'] = $this->Visualisasi_model->getAbsensiPerempuan($tahun);
        $view['getJenisKelaminAlpaPertahun'] = $this->Visualisasi_model->getJenisKelaminAlpaPertahun($tahun);
        $view['getAbsensiLakiAllTahun'] = $this->Visualisasi_model->getAbsensiLakiAllTahun();
        $view['getTingkatan'] = $this->Visualisasi_model->getTingkatan();
        $view['getTingkatanByTingkatanJmlAbsen'] = $this->Visualisasi_model->getTingkatanByTingkatanJmlAbsen();
        $view['getAbsensiPerempuanAllTahun'] = $this->Visualisasi_model->getAbsensiPerempuanAllTahun();
        $this->load->view('templates/header', $view);
        $this->load->view('templates/sidebar', $view);
        $this->load->view('visualisasi', $view);
        $this->load->view('templates/footer');
    }
}

/* End of file Visualisasi.php */
