<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_siswa extends CI_Model {

    public function import_data($nama_siswa, $jenis_kelamin)
    {
        $dimSiswa = array('nama_siswa'=> $nama_siswa, 'jenis_kelamin' => $jenis_kelamin);

        $this->db->replace('dim_siswa', $dimSiswa);
    }


    public function getDataSiswa()
    {
        return $this->db->get('dim_siswa')->result_array();
    }

}