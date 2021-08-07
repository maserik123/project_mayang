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

        // Start Tingkatan TK
        $view['tanggungJawabTK'] = $this->Visualisasi_model->tanggungJawabTK();
        $view['disiplinTK'] = $this->Visualisasi_model->disiplinTK();
        $view['kepemimpinanTK'] = $this->Visualisasi_model->kepemimpinanTK();
        $view['sopanSantunTK'] = $this->Visualisasi_model->sopanSantunTK();
        $view['kejujuranTK'] = $this->Visualisasi_model->kejujuranTK();
        // 
        $view['tanggungJawab_TK'] = $this->Visualisasi_model->tanggungJawab_TK();
        $view['disiplin_TK'] = $this->Visualisasi_model->disiplin_TK();
        $view['kepemimpinan_TK'] = $this->Visualisasi_model->kepemimpinan_TK();
        $view['sopanSantun_TK'] = $this->Visualisasi_model->sopanSantun_TK();
        $view['kejujuran_TK'] = $this->Visualisasi_model->kejujuran_TK();
        // End Tingkatan TK


        // Start Tingkatan SD
        $view['tanggungJawabSD'] = $this->Visualisasi_model->tanggungJawabSD();
        $view['disiplinSD'] = $this->Visualisasi_model->disiplinSD();
        $view['kepemimpinanSD'] = $this->Visualisasi_model->kepemimpinanSD();
        $view['sopanSantunSD'] = $this->Visualisasi_model->sopanSantunSD();
        $view['kejujuranSD'] = $this->Visualisasi_model->kejujuranSD();
        // 
        $view['tanggungJawab_SD'] = $this->Visualisasi_model->tanggungJawab_SD();
        $view['disiplin_SD'] = $this->Visualisasi_model->disiplin_SD();
        $view['kepemimpinan_SD'] = $this->Visualisasi_model->kepemimpinan_SD();
        $view['sopanSantun_SD'] = $this->Visualisasi_model->sopanSantun_SD();
        $view['kejujuran_SD'] = $this->Visualisasi_model->kejujuran_SD();
        // End Tingkatan SD

        // Start tingkat SMP
        $view['tanggungJawabSMP'] = $this->Visualisasi_model->tanggungJawabSMP();
        $view['disiplinSMP'] = $this->Visualisasi_model->disiplinSMP();
        $view['kepemimpinanSMP'] = $this->Visualisasi_model->kepemimpinanSMP();
        $view['sopanSantunSMP'] = $this->Visualisasi_model->sopanSantunSMP();
        $view['kejujuranSMP'] = $this->Visualisasi_model->kejujuranSMP();
        // 
        $view['tanggungJawab_SMP'] = $this->Visualisasi_model->tanggungJawab_SMP();
        $view['disiplin_SMP'] = $this->Visualisasi_model->disiplin_SMP();
        $view['kepemimpinan_SMP'] = $this->Visualisasi_model->kepemimpinan_SMP();
        $view['sopanSantun_SMP'] = $this->Visualisasi_model->sopanSantun_SMP();
        $view['kejujuran_SMP'] = $this->Visualisasi_model->kejujuran_SMP();
        // End tingkat SMP

        // Start Status Relevan
        $view['getGuruAjarRelevanTK'] = $this->Visualisasi_model->getGuruAjarRelevanTK();
        $view['getGuruAjarTidakRelevanTK'] = $this->Visualisasi_model->getGuruAjarTidakRelevanTK();
        $view['getGuruAjarRelevanSD'] = $this->Visualisasi_model->getGuruAjarRelevanSD();
        $view['getGuruAjarTidakRelevanSD'] = $this->Visualisasi_model->getGuruAjarTidakRelevanSD();
        $view['getGuruAjarRelevanSMP'] = $this->Visualisasi_model->getGuruAjarRelevanSMP();
        $view['getGuruAjarTidakRelevanSMP'] = $this->Visualisasi_model->getGuruAjarTidakRelevanSMP();

        $view['getGuruAjarRelevan_TK'] = $this->Visualisasi_model->getGuruAjarRelevan_TK();
        $view['getGuruAjarTidakRelevan_TK'] = $this->Visualisasi_model->getGuruAjarTidakRelevan_TK();
        $view['getGuruAjarRelevan_SD'] = $this->Visualisasi_model->getGuruAjarRelevan_SD();
        $view['getGuruAjarTidakRelevan_SD'] = $this->Visualisasi_model->getGuruAjarTidakRelevan_SD();
        $view['getGuruAjarRelevan_SMP'] = $this->Visualisasi_model->getGuruAjarRelevan_SMP();
        $view['getGuruAjarTidakRelevan_SMP'] = $this->Visualisasi_model->getGuruAjarTidakRelevan_SMP();
        // End Status Relevan


        $view['getAkademik'] = $this->Visualisasi_model->getAkademikNonAkademik('Akademik');
        $view['getNonAkademik'] = $this->Visualisasi_model->getAkademikNonAkademik('Non-Akademik');

        $view['getAllAkademikNonAkademik'] = $this->Visualisasi_model->getAllAkademikNonAkademik();

        // Perbandingan Absensi dan Prestasi
        $view['getPerbandinganAbsensi'] = $this->Visualisasi_model->getPerbandinganAbsensi();
        $view['getPerbandinganPrestasi'] = $this->Visualisasi_model->getPerbandinganPrestasi();
        // end Perbandingan Absensi dan Prestasi

        // Karakter Bagian 3
        $view['getPerbandinganKarakter'] = $this->Visualisasi_model->getPerbandinganKarakter();
        // End of karakter bagian 3

        // getPerbAbsensi
        $view['getPerbAbsensi'] = $this->Visualisasi_model->getPerbAbsensi();
        // End getPerbAbsensi


        $this->load->view('templates/header', $view);
        $this->load->view('templates/sidebar', $view);
        $this->load->view('visualisasi', $view);
        $this->load->view('templates/footer');
    }

    public function performanceIndicators($param = "", $id = "")
    {
        if (!empty($tahun)) {
            $view['tahun'] = $tahun;
        }
        $view['title'] = 'Halaman Visualisasi';
        $view['active_kpi'] = 'active';
        $view['getKPIAbsensi'] = $this->Visualisasi_model->getKPIAbsensi();

        $this->load->view('templates/header', $view);
        $this->load->view('templates/sidebar', $view);
        $this->load->view('visualisasi_kpi', $view);
        $this->load->view('templates/footer');
    }
}

/* End of file Visualisasi.php */
