<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/AutoLoader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class C_karakter extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('karakter/m_karakter');
        $this->load->model('siswa/m_siswa');
        $this->load->model('tingkatan/m_tingkatan');
        // $this->load->model('dim_waktu_model');

    }
	public function index()
	{
     

        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
        $this->load->view('karakter/v_karakter');
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
                        $dataTingkatan =  $row->getCellAtIndex(0);

                        $this->m_tingkatan->import_data($dataTingkatan);

                        $query1 = $this->db->query("SELECT * FROM dim_tingkatan WHERE tingkatan = '$dataTingkatan'")->result();
                        
                        foreach ($query1 as $tingkatan)
                        {
                        $tingkatan2 =$tingkatan->id_tingkatan; 
                        }
                        
                        //dim siswa
                        $nama_siswa = $row->getCellAtIndex(1);
                        $jenis_kelamin = $row->getCellAtIndex(2);

                        $this->m_siswa->import_data($nama_siswa, $jenis_kelamin);

                        $query2 = $this->db->query("SELECT * FROM dim_siswa;");
                        $this->db->where('nama_siswa', $nama_siswa);

                        foreach ($query2->result() as $siswa)
                        {
                        $siswa2 =$siswa->id_siswa;
                        }
                        //fact karekter

                        $tanggungJawab = $row->getCellAtIndex(3);
                        $disiplin = $row->getCellAtIndex(4);
                        $kepemimpinan = $row->getCellAtIndex(5);
                        $sopansantun = $row->getCellAtIndex(6);
                        $kejujuran = $row->getCellAtIndex(7);
                        $this->m_karakter->import_data($tingkatan2, $siswa2, $tanggungJawab, $disiplin, $kepemimpinan, $sopansantun, $kejujuran);
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
