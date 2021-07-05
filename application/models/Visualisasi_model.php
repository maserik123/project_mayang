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
        $this->db->select('count(fa.id_fact_absensi) as total_absensi, count(fp.id_fact_prestasi) as total_prestasi, dw.tahun');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fa.id_waktu', 'left');
        $this->db->join('fact_prestasi fp', 'fp.id_waktu = dw.id_waktu', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fp.id_tingkatan', 'left');
        $this->db->group_by('dw.tahun');
        // $this->db->where('fa.id_waktu = fp.id_waktu');
        // $this->db->where('dt.tingkatan = "SD"');
        return $this->db->get()->result();
    }

    // End of Tab 2

    // Bagian Tab 3

    public function getKarakterSiswa()
    {
        $this->db->select('count(fks.id_karakter_siswa) as total_karakter, dt.tingkatan, ds.jenis_kelamin');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('dt.tingkatan');
        return $this->db->get()->result();
    }

    // Bagian tanggung jawab TK
    public function tanggungJawabTK()
    {
        $this->db->select('count(fks.tanggungjawab) as total_tanggung_jawab_tk, fks.tanggungjawab');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.tanggungjawab');
        $this->db->where('dt.tingkatan', 'TK');
        return $this->db->get()->result();
    }

    public function disiplinTK()
    {
        $this->db->select('count(fks.disiplin) as total_disiplin_tk, fks.disiplin');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.disiplin');
        $this->db->where('dt.tingkatan', 'TK');
        return $this->db->get()->result();
    }

    public function kepemimpinan()
    {
        $this->db->select('count(fks.kepemimpinan) as total_kepemimpinan_tk');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.kepemimpinan');
        $this->db->where('dt.tingkatan', 'TK');
        return $this->db->get()->result();
    }



    // End of Bagian Tab 3
}

/* End of file Visualisasi_model.php */
