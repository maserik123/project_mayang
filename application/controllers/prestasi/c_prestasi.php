<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/AutoLoader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class C_prestasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('prestasi/m_prestasi');
        $this->load->model('tingkatan/m_tingkatan');
    }
	public function index()
	{
        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
        $this->load->view('prestasi/v_prestasi');
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
                        //dim waktu absen
                        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
                        // $now = date('Y-m-d H:i:s');
                        $waktu = $row->getCellAtIndex(1);
                        $this->m_prestasi->getWaktuPrestasi($waktu);

                        $pecah= explode("/", $waktu);

                        $tanggal= $pecah[0];
                        $bulan= $pecah[1];
                        $tahun= $pecah[2];

                        $tanggalFix = $tahun . "-" . $bulan . "-" . $tanggal;

                        $query = $this->db->query("SELECT * FROM dim_waktu;");

                        $this->db->where('tahun', $tahun);


                        foreach ($query->result() as $waktuPrestasi)
                        {
                        $waktu2 =$waktuPrestasi->id_waktu; 
                        }
                        //akhir import waktu

                        //import awal dimensi prestasi
                        $namaPrestasi = $row->getCellAtIndex(2);
                        $kategoriPrestasi = $row->getCellAtIndex(3);
                        $this->m_prestasi->getPrestasi($namaPrestasi, $kategoriPrestasi);

                        $query1 = $this->db->query("SELECT * FROM dim_prestasi WHERE nama_prestasi = '$namaPrestasi'")->result();

                        foreach ($query1 as $prestasi)
                        {
                        $fact_prestasi =$prestasi->id_prestasi;
                        }

                        //dim tingkatan
                        $dataTingkatan = $row->getCellAtIndex(0);
                        $this->m_tingkatan->import_data($dataTingkatan);

                        $query2 = $this->db->query("SELECT * FROM dim_tingkatan WHERE tingkatan = '$dataTingkatan'")->result();

                        foreach ($query2 as $ting)
                        {
                        $fact_tingkatan =$ting->id_tingkatan;
                        }
                        //import fact prestasi
                        $this->m_prestasi->getfact_prestasi($fact_prestasi, $fact_tingkatan, $waktu2);

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
