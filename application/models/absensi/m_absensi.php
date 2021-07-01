<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_absensi extends CI_Model {

    public function getWaktuAbsen($waktu)
    {
        $pecah= explode("-", $waktu);

        $tanggal= $pecah[2];
        $bulan= $pecah[1];
        $tahun= $pecah[0];

        // $tanggalFix = $tahun . "-" . $bulan . "-" . $tanggal;

        $WaktuAbsen = array('waktu_full'=> $waktu, 'tahun' => $tahun);

        $this->db->replace('dim_waktu', $WaktuAbsen);
    }

    public function getAbsen($absensi)
    {
        // $this->db->distinct();
        // $dim_absensi = array('absensi'=> $absensi);

        // $this->db->replace('dim_absensi', $dim_absensi);

        // $hasil= $this->db->query("INSERT INTO dim_absensi ($absensi)
        // SELECT absensi
        // FROM dim_absensi
        // GROUP BY absensi");

        // $this->db->from('dim_absensi');
        // $this->db->where('absensi', $absensi); 
        // $query = $this->db->get();
        // if($query->num_rows() != 0){
        //     $data = array(
        //                 'absensi'=>$absensi
        //              );
        //  $this->db->where('absensi', $absensi);
        //  $this->db->update('dim_absensi', $data); 
        // }else{
        //     $data = array(
        //     'absensi'=>$absensi
        //     );
        //    $this->db->insert('dim_absensi',$data);
        // }
        $priority= $this->db->query("select absensi from dim_absensi where absensi = '$absensi'")->result();

        if (empty($priority)){
            $dim_absensi = array('absensi'=> $absensi);

            $this->db->replace('dim_absensi', $dim_absensi);
        }
    }

    public function getfact_absen($waktu2, $absen_tingkatan,  $absen_siswa, $fact_absen)
    {
        $Absensi = array('id_waktu'=> $waktu2, 'id_tingkatan' => $absen_tingkatan, 
        'jenis_kelamin'=>$absen_siswa, 'id_absensi' => $fact_absen);

        $this->db->replace('fact_absensi', $Absensi);
    }

}