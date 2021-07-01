<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_prestasi extends CI_Model {

    public function getWaktuPrestasi($waktu)
    {
     
        $pecah= explode("/", $waktu);
     

        $bulan= $pecah[0];
        $tanggal= $pecah[1];
        $tahun= $pecah[2];

        $tanggalFix = $tahun . "-" .  $bulan . "-" . $tanggal;

        // print_r($tanggalFix);
        // exit;

        // $fix = date("Y-m-d", strtotime($tanggalFix));
       

        $WaktuPrestasi = array('waktu_full' => $tanggalFix, 'tahun' => $tahun);

        $this->db->replace('dim_waktu', $WaktuPrestasi);
    }

    public function getPrestasi($namaPrestasi, $kategoriPrestasi)
    {
        $priority= $this->db->query("select * from dim_prestasi where nama_prestasi = '$namaPrestasi'")->result();

        if (empty($priority))
        {
            $dim_prestasi = array('nama_prestasi'=> $namaPrestasi, 'kategori' => $kategoriPrestasi);

            $this->db->replace('dim_prestasi', $dim_prestasi);
        }

       
    }

    public function getfact_prestasi($fact_prestasi, $fact_tingkatan, $waktu2)
    {
        $prestasi = array('id_prestasi' => $fact_prestasi,'id_tingkatan'=>$fact_tingkatan, 'id_waktu'=> $waktu2);

        $this->db->replace('fact_prestasi', $prestasi);
    }

}