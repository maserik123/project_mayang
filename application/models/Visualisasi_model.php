<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visualisasi_model extends CI_Model
{

    // Start Tab 1

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

    public function getTingkatanPertahun($tahun)
    {
        $this->db->select('dt.tingkatan, count(fa.id_fact_absensi) as tot_absen');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fa.id_waktu', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->group_by('fa.id_tingkatan');
        $this->db->where('fa.jenis_kelamin', 'L');
        $this->db->where('dw.tahun', $tahun);
        return $this->db->get()->result();
    }

    public function getTingkatan()
    {
        $this->db->select('*');
        $this->db->from('dim_tingkatan');
        $this->db->order_by('id_tingkatan', 'desc');
        return $this->db->get()->result();
    }

    function getTingkatanByTingkatanJmlAbsen()
    {
        $this->db->select('count(fa.id_fact_absensi) as tot_absen, dt.tingkatan, dw.tahun');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fa.id_waktu', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->group_by('dt.tingkatan');
        $this->db->group_by('dw.tahun');
        $this->db->where('fa.jenis_kelamin', 'L');
        $this->db->where('da.absensi', 'Alpa');
        return $this->db->get()->result();
    }

    public function getAbsensiLakiAllTahun()
    {
        $this->db->select('count(fa.id_fact_absensi) as tot_absen, dt.tingkatan, dw.tahun');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fa.id_waktu', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->group_by('dw.tahun');
        $this->db->where('fa.jenis_kelamin', 'L');
        $this->db->where('da.absensi', 'Alpa');
        return $this->db->get()->result();
    }

    public function getTingkatanTkLaki($tahun)
    {
        $this->db->select('count(id_fact_absensi) as total_tk, dt.tingkatan');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fa.id_waktu', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->group_by('fa.id_tingkatan');
        $this->db->where('dt.tingkatan', 'TK');
        $this->db->where('fa.jenis_kelamin', 'L');
        $this->db->where('da.absensi', 'Alpa');
        $this->db->where('dw.tahun', $tahun);
        return $this->db->get()->row();
    }

    public function getTingkatanSDLaki($tahun)
    {
        $this->db->select('count(id_fact_absensi) as total_sd, dt.tingkatan');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fa.id_waktu', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->group_by('fa.id_tingkatan');
        $this->db->where('dt.tingkatan', 'SD');
        $this->db->where('fa.jenis_kelamin', 'L');
        $this->db->where('da.absensi', 'Alpa');
        $this->db->where('dw.tahun', $tahun);
        return $this->db->get()->row();
    }

    public function getTingkatanSMPLaki($tahun)
    {
        $this->db->select('count(id_fact_absensi) as total_smp, dt.tingkatan');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fa.id_waktu', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->group_by('fa.id_tingkatan');
        $this->db->where('dt.tingkatan', 'SMP');
        $this->db->where('fa.jenis_kelamin', 'L');
        $this->db->where('da.absensi', 'Alpa');
        $this->db->where('dw.tahun', $tahun);
        return $this->db->get()->row();
    }

    public function getAbsensiPerempuanAllTahun()
    {
        $this->db->select('count(fa.id_fact_absensi) as tot_absen, dt.tingkatan, dw.tahun');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fa.id_waktu', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->group_by('dw.tahun');
        $this->db->where('fa.jenis_kelamin', 'P');
        $this->db->where('da.absensi', 'Alpa');
        return $this->db->get()->result();
    }

    public function getTingkatanTkPerempuan($tahun)
    {
        $this->db->select('count(id_fact_absensi) as total_tk, dt.tingkatan');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fa.id_waktu', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->group_by('fa.id_tingkatan');
        $this->db->where('dt.tingkatan', 'TK');
        $this->db->where('fa.jenis_kelamin', 'P');
        $this->db->where('da.absensi', 'Alpa');
        $this->db->where('dw.tahun', $tahun);
        return $this->db->get()->row();
    }

    public function getTingkatanSDPerempuan($tahun)
    {
        $this->db->select('count(id_fact_absensi) as total_sd, dt.tingkatan');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fa.id_waktu', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->group_by('fa.id_tingkatan');
        $this->db->where('dt.tingkatan', 'SD');
        $this->db->where('fa.jenis_kelamin', 'P');
        $this->db->where('da.absensi', 'Alpa');
        $this->db->where('dw.tahun', $tahun);
        return $this->db->get()->row();
    }

    public function getTingkatanSMPPerempuan($tahun)
    {
        $this->db->select('count(id_fact_absensi) as total_smp, dt.tingkatan');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fa.id_waktu', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->group_by('fa.id_tingkatan');
        $this->db->where('dt.tingkatan', 'SMP');
        $this->db->where('fa.jenis_kelamin', 'P');
        $this->db->where('da.absensi', 'Alpa');
        $this->db->where('dw.tahun', $tahun);
        return $this->db->get()->row();
    }
    // End of Tab 1

    // Bagian Tab 2

    public function getPerbandinganPrestasiAbsensi()
    {
        $this->db->select('count(fp.id_fact_prestasi) as total_prestasi, count(fa.id_fact_absensi) as total_absensi, dw_fa.tahun');
        $this->db->from('fact_absensi fa');
        $this->db->join('fact_prestasi fp', 'fp.id_waktu = fa.id_waktu', 'left');
        $this->db->join('dim_waktu dw_fa', 'dw_fa.id_waktu = fa.id_waktu', 'left');
        $this->db->join('dim_tingkatan dt_fa', 'dt_fa.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->join('dim_prestasi dp_fp', 'dp_fp.id_prestasi = fp.id_prestasi', 'left');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->group_by('dw_fa.tahun');
        $this->db->where('da.absensi', 'Alpa');
        $this->db->where('fa.jenis_kelamin = "L"');
        return $this->db->get()->result();
    }

    public function getDataPrestasi()
    {
        $this->db->select('nama_prestasi');
        $this->db->from('dim_prestasi');
        $this->db->order_by('id_prestasi');
        return $this->db->get()->result();
    }

    public function getOlimpiadeKimia($tahun)
    {
        $this->db->select('count(fp.id_fact_prestasi) as total_prestasi, count(fa.id_fact_absensi) as total_absensi, dw_fa.tahun');
        $this->db->from('fact_absensi fa');
        $this->db->join('fact_prestasi fp', 'fp.id_waktu = fa.id_waktu', 'left');
        $this->db->join('dim_waktu dw_fa', 'dw_fa.id_waktu = fa.id_waktu', 'left');
        $this->db->join('dim_tingkatan dt_fa', 'dt_fa.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->join('dim_prestasi dp_fp', 'dp_fp.id_prestasi = fp.id_prestasi', 'left');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->group_by('dt_fa.tingkatan');
        $this->db->where('da.absensi', 'Alpa');
        $this->db->where('dp_fp.id_prestasi = fp.id_prestasi');
        $this->db->where('dw_fa.tahun', $tahun);
        return $this->db->get()->result();
    }
}

/* End of file Visualisasi_model.php */
