<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/AutoLoader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class C_karakter extends CI_Controller {
    public function index()
    {

        $this->load->view('templates/header');
		$this->load->view('templates/sidebar');
        $this->load->view('latihan/V_latihan');
        $this->load->view('templates/footer');
    }

}