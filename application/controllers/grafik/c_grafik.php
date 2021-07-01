<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_grafik extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('grafik/M_grafik');
    }
    
    public function absentingkatan()
    {
        $data['queryAbsenTingkatan'] = $this->M_grafik->getAbsensiPertingkatan();
        $data['queryJenisPrestasi'] = $this->M_grafik->getPrestasi();

        //$this->load->view('templates/header');
		//$this->load->view('templates/sidebar');
        $this->load->view('grafik/v_grafik', $data);
        $this->load->view('templates/footer');
    }
}