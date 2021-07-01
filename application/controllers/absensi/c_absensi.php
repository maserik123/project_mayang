<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/AutoLoader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class C_absensi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('absensi/m_absensi');
        $this->load->model('tingkatan/m_tingkatan');

    }
	public function index()
	{
        // $data['title'] = 'Data Bahan Baku';
        // $data['dataTingkatan'] = $this->m_tingkatan->getDataTingkatan();
        // $data['dataSiswa'] = $this->m_siswa->getDataSiswa();

        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
        $this->load->view('absensi/v_absensi');
        $this->load->view('templates/footer');
    }
    
    public function uploaddata()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'bahan_baku' .time();
        $this->load->library('upload', $config);
        if($this->upload->do_upload('importexcel')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();
            $reader->setShouldFormatDates(true);

            $reader->open('uploads/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet)
            {
                $numRow = 1;
                foreach($sheet->getRowIterator() as $row)
                {
                    if($numRow >1)
                    {
                        //dim tingkatan
                        $dataTingkatan = $row->getCellAtIndex(3);
                        $this->m_tingkatan->import_data($dataTingkatan);

                        $query3 = $this->db->query("SELECT * FROM dim_tingkatan WHERE tingkatan = '$dataTingkatan'")->result();

                        foreach ($query3 as $ting)
                        {
                        $absen_tingkatan =$ting->id_tingkatan; // access attributes
                        }


                        //dim waktu absen
                        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
                        // $now = date('Y-m-d H:i:s');
                        $waktu = $row->getCellAtIndex(0);
                        $this->m_absensi->getWaktuAbsen($waktu);

                        $pecah= explode("-", $waktu);

                        $tanggal= $pecah[2];
                        $bulan= $pecah[1];
                        $tahun= $pecah[0];

                        // $tanggalFix = $tahun . "-" . $bulan . "-" . $tanggal;

                        $query = $this->db->query("SELECT * FROM dim_waktu;");

                        $this->db->where('tahun', $tahun);

                        foreach ($query->result() as $waktuAbsen)
                        {
                        $waktu2 =$waktuAbsen->id_waktu; // access attributes
                        }
                        //akhir import waktu

                        // import awal dimensi absensi
                        $absensi = $row->getCellAtIndex(1);
                        $this->m_absensi->getAbsen($absensi);

                        $query2 = $this->db->query("SELECT * FROM dim_absensi WHERE absensi = '$absensi'")->result();
                        // $this->db->where('absensi', $absensi);

                        foreach ($query2 as $absen)
                        {
                        $fact_absen =$absen->id_absensi;
                        }

                        //akhir import absensi

                        //import fact absen
                        $absen_siswa = $row->getCellAtIndex(2);
                        $this->m_absensi->getfact_absen($waktu2, $absen_tingkatan,  $absen_siswa, $fact_absen);
                    }
                    $numRow++;
                }
                $reader->close();
                unlink('uploads/' . $file['file_name']);
                $this->session->set_flashdata('pesan', 'Import Data Berhasil');
                redirect('home');
            }
        } else{
            echo "Error:" . $this->upload->display_error();
        };
    }
}
