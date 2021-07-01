<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_karakter extends CI_Model {

    public function import_data($tingkatan2, $siswa2,$tanggungJawab, $disiplin, $kepemimpinan, $sopansantun, $kejujuran)
    {
        $karakter = array('id_tingkatan'=> $tingkatan2, 'id_siswa' => $siswa2, 'tanggungjawab' => $tanggungJawab, 
        'disiplin' => $disiplin, 'kepemimpinan' => $kepemimpinan, 'sopansantun' => $sopansantun, 
        'kejujuran' => $kejujuran);

        $this->db->replace('fact_karakter_siswa', $karakter);
    }


    public function getDataSiswa()
    {
        return $this->db->get('fact_karakter_siswa')->result_array();
    }

}