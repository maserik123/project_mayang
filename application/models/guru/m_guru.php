<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_guru extends CI_Model {

    public function getMapelGuru($nipGuru, $namaGuru, $mapelDiampu, $ketRelevan) //dari controller
    {
        //misahkan nama dan gelar (keperluan db)
        $pecah= explode(",", $namaGuru);
     
        $nama= $pecah[0];
        $gelar = $pecah[1];

        $pecahmp = explode(",",$mapelDiampu);
        $hitung = count($pecahmp);

        for($i=0;$i<=$hitung-1;$i++)
        {
            //insert
            $dim_guru = array('nip_guru'=> $nipGuru, 'nama_guru'=> $nama, 'gelar_pendidikan' => $gelar, 'mapel_diampu'=> $pecahmp[$i], 'relevan'=> $ketRelevan); 
            $this->db->replace('dim_guru', $dim_guru);    
        } 
    }

    public function getMapelGuruFact($absen_tingkatan, $guruFact)
    {
        $fact_guru = array('id_guru'=> $guruFact, 'id_tingkatan' => $absen_tingkatan); 

        $this->db->replace('fact_guru_ajar', $fact_guru);    
    }

}