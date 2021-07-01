<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/AutoLoader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class C_guru extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('guru/m_guru');
        $this->load->model('tingkatan/m_tingkatan');

    }
	public function index()
	{
        // $data['title'] = 'Data Bahan Baku';
        // $data['dataTingkatan'] = $this->m_tingkatan->getDataTingkatan();
        // $data['dataSiswa'] = $this->m_siswa->getDataSiswa();

        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
        $this->load->view('guru/v_guru');
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
                        $dataTingkatan = $row->getCellAtIndex(4);
                        $this->m_tingkatan->import_data($dataTingkatan);

                        $query = $this->db->query("SELECT * FROM dim_tingkatan WHERE tingkatan = '$dataTingkatan'")->result();

                        foreach ($query as $ting)
                        {
                        $absen_tingkatan =$ting->id_tingkatan; // access attributes
                        }

                        //mengambil data excel per index untuk di insert ke db
                        $nipGuru = $row->getCellAtIndex(0);
                        $namaGuru    = $row->getCellAtIndex(1);
                        $mapelDiampu = $row->getCellAtIndex(2);
                        $ketRelevan = $row->getCellAtIndex(3);
                        $this->m_guru->getMapelGuru($nipGuru,$namaGuru, $mapelDiampu, $ketRelevan); //arahkan variabel ke model di folder guru -> m_guru

                        $query2 = $this->db->query("SELECT * FROM dim_guru;");

                        $this->db->where('nip_guru', $nipGuru);

                        foreach ($query2->result() as $guru)
                        {
                        $guruFact =$guru->id_guru; // access attributes
                        }
                        $this->m_guru->getMapelGuruFact($absen_tingkatan, $guruFact); 
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
