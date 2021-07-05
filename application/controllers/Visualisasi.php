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
        $view['getPerbandinganPrestasiAbsensi'] = $this->Visualisasi_model->getPerbandinganPrestasiAbsensi();
        $view['tanggungJawabTK'] = $this->Visualisasi_model->tanggungJawabTK();
        $view['disiplinTK'] = $this->Visualisasi_model->disiplinTK();
        $view['kepemimpinanTK'] = $this->Visualisasi_model->kepemimpinanTK();
        $view['sopanSantunTK'] = $this->Visualisasi_model->sopanSantunTK();
        $view['kejujuranTK'] = $this->Visualisasi_model->kejujuranTK();

        $view['tanggungJawabSD'] = $this->Visualisasi_model->tanggungJawabSD();
        $view['disiplinSD'] = $this->Visualisasi_model->disiplinSD();
        $view['kepemimpinanSD'] = $this->Visualisasi_model->kepemimpinanSD();
        $view['sopanSantunSD'] = $this->Visualisasi_model->sopanSantunSD();
        $view['kejujuranSD'] = $this->Visualisasi_model->kejujuranSD();

        $view['tanggungJawabSMP'] = $this->Visualisasi_model->tanggungJawabSMP();
        $view['disiplinSMP'] = $this->Visualisasi_model->disiplinSMP();
        $view['kepemimpinanSMP'] = $this->Visualisasi_model->kepemimpinanSMP();
        $view['sopanSantunSMP'] = $this->Visualisasi_model->sopanSantunSMP();
        $view['kejujuranSMP'] = $this->Visualisasi_model->kejujuranSMP();

        $this->load->view('templates/header', $view);
        $this->load->view('templates/sidebar', $view);
        $this->load->view('visualisasi', $view);
        $this->load->view('templates/footer');
    }
}

/* End of file Visualisasi.php */
