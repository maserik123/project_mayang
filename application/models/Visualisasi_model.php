<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visualisasi_model extends CI_Model
{

    public function getData()
    {
        $this->db->select('*');
        $this->db->from('fact_absensi');
        $this->db->order_by('id_fact_absensi', 'desc');
        return $this->db->get()->result();
    }

    public function getAbsensiLakiLaki($tahun)
    {
        $this->db->select('count(fa.id_fact_absensi) as tot_absen, dt.tingkatan, dw.tahun');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fa.id_waktu', 'left');
        $this->db->group_by('fa.id_tingkatan');
        $this->db->where('fa.jenis_kelamin', 'L');
        $this->db->where('da.absensi', 'Alpa');
        $this->db->where('dw.tahun', $tahun);
        return $this->db->get()->result();
    }

    public function getAbsensiPerempuan($tahun)
    {
        $this->db->select('count(fa.id_fact_absensi) as tot_absen, dt.tingkatan, dw.tahun');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fa.id_waktu', 'left');
        $this->db->group_by('fa.id_tingkatan');
        $this->db->where('fa.jenis_kelamin', 'P');
        $this->db->where('da.absensi', 'Alpa');
        $this->db->where('dw.tahun', $tahun);
        return $this->db->get()->result();
    }

    public function getJenisKelaminAlpaPertahun($tahun)
    {
        $this->db->select('count(fa.id_fact_absensi) as tot_absen, dt.tingkatan, fa.jenis_kelamin');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fa.id_waktu', 'left');
        $this->db->group_by('fa.jenis_kelamin');
        $this->db->where('da.absensi', 'Alpa');
        $this->db->where('dw.tahun', $tahun);
        return $this->db->get()->result();
    }


    public function getAlpaByTingkatanPertahun($tahun, $jenis_kelamin)
    {
        $this->db->select('count(fa.id_fact_absensi) as tot_absen, dt.tingkatan, dw.tahun');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fa.id_waktu', 'left');
        $this->db->group_by('fa.id_tingkatan');
        $this->db->where('fa.jenis_kelamin', $jenis_kelamin);
        $this->db->where('da.absensi', 'Alpa');
        $this->db->where('dw.tahun', $tahun);
        return $this->db->get()->result();
    }
}

/* End of file Visualisasi_model.php */
