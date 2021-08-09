<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visualisasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model(['Visualisasi_model', 'User']);
    }


    public function index($tahun)
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

            // TingkatanTkPerempuan
            $view['getTingkatanTkPerempuan'] = $this->Visualisasi_model->getTingkatanTkPerempuan($tahun);
            $view['getTingkatanSDPerempuan'] = $this->Visualisasi_model->getTingkatanSDPerempuan($tahun);
            $view['getTingkatanSMPPerempuan'] = $this->Visualisasi_model->getTingkatanSMPPerempuan($tahun);

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
            $view['getPerbandinganKarakterTK'] = $this->Visualisasi_model->getPerbandinganKarakterPerTingkatan('TK');
            $view['getPerbandinganKarakterSD'] = $this->Visualisasi_model->getPerbandinganKarakterPerTingkatan('SD');
            $view['getPerbandinganKarakterSMP'] = $this->Visualisasi_model->getPerbandinganKarakterPerTingkatan('SMP');

            // End of karakter bagian 3

            // getPerbAbsensi
            $view['getPerbAbsensi'] = $this->Visualisasi_model->getPerbAbsensi();
            // End getPerbAbsensi


            $this->load->view('templates/header', $view);
            $this->load->view('templates/sidebar', $view);
            $this->load->view('visualisasi', $view);
            $this->load->view('templates/footer');
        }
    }

    public function performanceIndicators($param = "", $id = "")
    {
        if (!empty($tahun)) {
            $view['tahun'] = $tahun;
        }
        $view['title'] = 'Halaman Visualisasi';
        $view['active_kpi'] = 'active';
        $view['getKPIAbsensi'] = $this->Visualisasi_model->getKPIAbsensi();
        $view['getKPIPrestasiAkademik'] = $this->Visualisasi_model->getKPIPrestasi('Akademik');
        $view['getKPIPrestasiNonAkademik'] = $this->Visualisasi_model->getKPIPrestasi('Non-Akademik');

        $view['getNilaiKPIAbsensi'] = $this->Visualisasi_model->getNilaiKpiAbsensi();
        $view['getNilaiKpiPrestasi'] = $this->Visualisasi_model->getNilaiKpiPrestasi();


        if ($param == 'addKPIAbsensi') {
            $data['nilai_target'] = htmlspecialchars($this->input->post('nilai_target1'));
            $data['tahun']        = htmlspecialchars($this->input->post('tahun1'));

            if ($data['nilai_target'] == '') {
                $this->session->set_flashdata('alert', 'Nilai Target tidak boleh kosong !');
                redirect('visualisasi/performanceIndicators');
            } else if ($data['tahun'] == '') {
                $this->session->set_flashdata('alert', 'Tahun tidak boleh kosong !');
                redirect('visualisasi/performanceIndicators');
            } else {
                $this->Visualisasi_model->addDataKpiAbsensi($data);
                $this->session->set_flashdata('success', 'Berhasil Menambahkan data !');
                redirect('visualisasi/performanceIndicators');
            }
        } else if ($param == 'addKPIPrestasi') {
            $data['nilai_target'] = htmlspecialchars($this->input->post('nilai_target2'));
            $data['tahun']        = htmlspecialchars($this->input->post('tahun2'));
            $data['jenis']        = htmlspecialchars($this->input->post('jenis'));

            if ($data['nilai_target'] == '') {
                $this->session->set_flashdata('alert', 'Nilai Target tidak boleh kosong !');
                redirect('visualisasi/performanceIndicators');
            } else if ($data['tahun'] == '') {
                $this->session->set_flashdata('alert', 'Tahun tidak boleh kosong !');
                redirect('visualisasi/performanceIndicators');
            } else if ($data['jenis'] == '') {
                $this->session->set_flashdata('alert', 'Jenis Kategori tidak boleh kosong !');
                redirect('visualisasi/performanceIndicators');
            } else {
                $this->Visualisasi_model->addDataKpiPrestasi($data);
                $this->session->set_flashdata('success', 'Berhasil Menambahkan data !');
                redirect('visualisasi/performanceIndicators');
            }
        } else if ($param == 'deleteKPIAbsensi') {
            $this->Visualisasi_model->delete_kpiAbsensi($id);
            $this->session->set_flashdata('success', 'Berhasil Menghapus data !');
            redirect('visualisasi/performanceIndicators');
        } else if ($param == 'deleteKPIPrestasi') {
            $this->Visualisasi_model->delete_kpiPrestasi($id);
            $this->session->set_flashdata('success', 'Berhasil Menghapus data !');
            redirect('visualisasi/performanceIndicators');
        }

        $this->load->view('templates/header', $view);
        $this->load->view('templates/sidebar', $view);
        $this->load->view('visualisasi_kpi', $view);
        $this->load->view('templates/footer');
    }
}

/* End of file Visualisasi.php */
