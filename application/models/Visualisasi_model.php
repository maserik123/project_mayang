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

    // Bagian TK
    // Bagian tanggung jawab TK
    public function tanggungJawabTK()
    {
        $this->db->select('count(fks.tanggungjawab) as total_tanggung_jawab_tk, count(fks.id_karakter_siswa) as total_tk, fks.tanggungjawab');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.tanggungjawab');
        $this->db->where('dt.tingkatan', 'TK');
        return $this->db->get()->result();
    }

    public function disiplinTK()
    {
        $this->db->select('count(fks.disiplin) as total_disiplin_tk,count(fks.id_karakter_siswa) as total_tk, fks.disiplin');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.disiplin');
        $this->db->where('dt.tingkatan', 'TK');
        return $this->db->get()->result();
    }

    public function kepemimpinanTK()
    {
        $this->db->select('count(fks.kepemimpinan) as total_kepemimpinan_tk, count(fks.id_karakter_siswa) as total_tk, fks.kepemimpinan');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.kepemimpinan');
        $this->db->where('dt.tingkatan', 'TK');
        return $this->db->get()->result();
    }

    public function sopanSantunTK()
    {
        $this->db->select('count(fks.sopansantun) as total_sopansantun_tk, count(fks.id_karakter_siswa) as total_tk, fks.sopansantun');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.sopansantun');
        $this->db->where('dt.tingkatan', 'TK');
        return $this->db->get()->result();
    }

    public function kejujuranTK()
    {
        $this->db->select('count(fks.kejujuran) as total_kejujuran_tk, count(fks.id_karakter_siswa) as total_tk, fks.kejujuran');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.kejujuran');
        $this->db->where('dt.tingkatan', 'TK');
        return $this->db->get()->result();
    }


    public function tanggungJawab_TK()
    {
        $this->db->select('count(fks.tanggungjawab) as total_tanggung_jawab_tk, count(fks.id_karakter_siswa) as total_tk, fks.tanggungjawab');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        // $this->db->group_by('fks.tanggungjawab');
        $this->db->where('dt.tingkatan', 'TK');
        return $this->db->get()->result();
    }

    public function disiplin_TK()
    {
        $this->db->select('count(fks.disiplin) as total_disiplin_tk,count(fks.id_karakter_siswa) as total_tk, fks.disiplin');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        // $this->db->group_by('fks.disiplin');
        $this->db->where('dt.tingkatan', 'TK');
        return $this->db->get()->result();
    }

    public function kepemimpinan_TK()
    {
        $this->db->select('count(fks.kepemimpinan) as total_kepemimpinan_tk, count(fks.id_karakter_siswa) as total_tk, fks.kepemimpinan');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        // $this->db->group_by('fks.kepemimpinan');
        $this->db->where('dt.tingkatan', 'TK');
        return $this->db->get()->result();
    }

    public function sopanSantun_TK()
    {
        $this->db->select('count(fks.sopansantun) as total_sopansantun_tk, count(fks.id_karakter_siswa) as total_tk, fks.sopansantun');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        // $this->db->group_by('fks.sopansantun');
        $this->db->where('dt.tingkatan', 'TK');
        return $this->db->get()->result();
    }

    public function kejujuran_TK()
    {
        $this->db->select('count(fks.kejujuran) as total_kejujuran_tk, count(fks.id_karakter_siswa) as total_tk, fks.kejujuran');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        // $this->db->group_by('fks.kejujuran');
        $this->db->where('dt.tingkatan', 'TK');
        return $this->db->get()->result();
    }

    // End of Bagian TK

    // Start of Bagian SD
    public function tanggungJawabSD()
    {
        $this->db->select('count(fks.tanggungjawab) as total_tanggung_jawab_sd, count(fks.id_karakter_siswa) as total_sd, fks.tanggungjawab');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.tanggungjawab');
        $this->db->where('dt.tingkatan', 'SD');
        return $this->db->get()->result();
    }

    public function disiplinSD()
    {
        $this->db->select('count(fks.disiplin) as total_disiplin_sd, count(fks.id_karakter_siswa) as total_sd, fks.disiplin');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.disiplin');
        $this->db->where('dt.tingkatan', 'SD');
        return $this->db->get()->result();
    }

    public function kepemimpinanSD()
    {
        $this->db->select('count(fks.kepemimpinan) as total_kepemimpinan_sd, count(fks.id_karakter_siswa) as total_sd, fks.kepemimpinan');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.kepemimpinan');
        $this->db->where('dt.tingkatan', 'SD');
        return $this->db->get()->result();
    }

    public function sopanSantunSD()
    {
        $this->db->select('count(fks.sopansantun) as total_sopansantun_sd, count(fks.id_karakter_siswa) as total_sd, fks.sopansantun');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.sopansantun');
        $this->db->where('dt.tingkatan', 'SD');
        return $this->db->get()->result();
    }

    public function kejujuranSD()
    {
        $this->db->select('count(fks.kejujuran) as total_kejujuran_sd, count(fks.id_karakter_siswa) as total_sd, fks.kejujuran');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.kejujuran');
        $this->db->where('dt.tingkatan', 'SD');
        return $this->db->get()->result();
    }
    // 
    public function tanggungJawab_SD()
    {
        $this->db->select('count(fks.tanggungjawab) as total_tanggung_jawab_sd, count(fks.id_karakter_siswa) as total_sd, fks.tanggungjawab');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        // $this->db->group_by('fks.tanggungjawab');
        $this->db->where('dt.tingkatan', 'SD');
        return $this->db->get()->result();
    }

    public function disiplin_SD()
    {
        $this->db->select('count(fks.disiplin) as total_disiplin_sd, count(fks.id_karakter_siswa) as total_sd, fks.disiplin');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        // $this->db->group_by('fks.disiplin');
        $this->db->where('dt.tingkatan', 'SD');
        return $this->db->get()->result();
    }

    public function kepemimpinan_SD()
    {
        $this->db->select('count(fks.kepemimpinan) as total_kepemimpinan_sd, count(fks.id_karakter_siswa) as total_sd, fks.kepemimpinan');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        // $this->db->group_by('fks.kepemimpinan');
        $this->db->where('dt.tingkatan', 'SD');
        return $this->db->get()->result();
    }

    public function sopanSantun_SD()
    {
        $this->db->select('count(fks.sopansantun) as total_sopansantun_sd, count(fks.id_karakter_siswa) as total_sd, fks.sopansantun');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        // $this->db->group_by('fks.sopansantun');
        $this->db->where('dt.tingkatan', 'SD');
        return $this->db->get()->result();
    }

    public function kejujuran_SD()
    {
        $this->db->select('count(fks.kejujuran) as total_kejujuran_sd, count(fks.id_karakter_siswa) as total_sd, fks.kejujuran');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        // $this->db->group_by('fks.kejujuran');
        $this->db->where('dt.tingkatan', 'SD');
        return $this->db->get()->result();
    }

    // End of SD

    // Start of Bagian SMP
    public function tanggungJawabSMP()
    {
        $this->db->select('count(fks.tanggungjawab) as total_tanggung_jawab_smp, count(fks.id_karakter_siswa) as total_smp, fks.tanggungjawab');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.tanggungjawab');
        $this->db->where('dt.tingkatan', 'SMP');
        return $this->db->get()->result();
    }

    public function disiplinSMP()
    {
        $this->db->select('count(fks.disiplin) as total_disiplin_smp, count(fks.id_karakter_siswa) as total_smp, fks.disiplin');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.disiplin');
        $this->db->where('dt.tingkatan', 'SMP');
        return $this->db->get()->result();
    }

    public function kepemimpinanSMP()
    {
        $this->db->select('count(fks.kepemimpinan) as total_kepemimpinan_smp, count(fks.id_karakter_siswa) as total_smp, fks.kepemimpinan');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.kepemimpinan');
        $this->db->where('dt.tingkatan', 'SMP');
        return $this->db->get()->result();
    }

    public function sopanSantunSMP()
    {
        $this->db->select('count(fks.sopansantun) as total_sopansantun_smp, count(fks.id_karakter_siswa) as total_smp, fks.sopansantun');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.sopansantun');
        $this->db->where('dt.tingkatan', 'SMP');
        return $this->db->get()->result();
    }

    public function kejujuranSMP()
    {
        $this->db->select('count(fks.kejujuran) as total_kejujuran_smp, count(fks.id_karakter_siswa) as total_smp, fks.kejujuran');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        $this->db->group_by('fks.kejujuran');
        $this->db->where('dt.tingkatan', 'SMP');
        return $this->db->get()->result();
    }

    // 

    public function tanggungJawab_SMP()
    {
        $this->db->select('count(fks.tanggungjawab) as total_tanggung_jawab_smp, count(fks.id_karakter_siswa) as total_smp, fks.tanggungjawab');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        // $this->db->group_by('fks.tanggungjawab');
        $this->db->where('dt.tingkatan', 'SMP');
        return $this->db->get()->result();
    }

    public function disiplin_SMP()
    {
        $this->db->select('count(fks.disiplin) as total_disiplin_smp, count(fks.id_karakter_siswa) as total_smp, fks.disiplin');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        // $this->db->group_by('fks.disiplin');
        $this->db->where('dt.tingkatan', 'SMP');
        return $this->db->get()->result();
    }

    public function kepemimpinan_SMP()
    {
        $this->db->select('count(fks.kepemimpinan) as total_kepemimpinan_smp, count(fks.id_karakter_siswa) as total_smp, fks.kepemimpinan');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        // $this->db->group_by('fks.kepemimpinan');
        $this->db->where('dt.tingkatan', 'SMP');
        return $this->db->get()->result();
    }

    public function sopanSantun_SMP()
    {
        $this->db->select('count(fks.sopansantun) as total_sopansantun_smp, count(fks.id_karakter_siswa) as total_smp, fks.sopansantun');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        // $this->db->group_by('fks.sopansantun');
        $this->db->where('dt.tingkatan', 'SMP');
        return $this->db->get()->result();
    }

    public function kejujuran_SMP()
    {
        $this->db->select('count(fks.kejujuran) as total_kejujuran_smp, count(fks.id_karakter_siswa) as total_smp, fks.kejujuran');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->join('dim_siswa ds', 'ds.id_siswa = fks.id_siswa', 'left');
        // $this->db->group_by('fks.kejujuran');
        $this->db->where('dt.tingkatan', 'SMP');
        return $this->db->get()->result();
    }


    // End of SMP

    // End of Bagian Tab 3
    // Start of Bagian Tab 4

    function getGuruAjarRelevanTK()
    {
        $this->db->select('count(fga.id_guru_aja) as total_relevan_tk, count(fga.id_guru_aja) as total, dt.tingkatan');
        $this->db->from('fact_guru_ajar fga');
        $this->db->join('dim_guru dg', 'dg.id_guru = fga.id_guru', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fga.id_tingkatan', 'left');
        $this->db->group_by('dt.tingkatan');
        $this->db->where('dt.tingkatan', 'TK');
        $this->db->where('dg.relevan', 'Relevan');

        return $this->db->get()->result();
    }

    function getGuruAjarTidakRelevanTK()
    {
        $this->db->select('count(fga.id_guru_aja) as total_tidak_relevan_tk, count(fga.id_guru_aja) as total, dt.tingkatan');
        $this->db->from('fact_guru_ajar fga');
        $this->db->join('dim_guru dg', 'dg.id_guru = fga.id_guru', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fga.id_tingkatan', 'left');
        $this->db->group_by('dt.tingkatan');
        $this->db->where('dt.tingkatan', 'TK');
        $this->db->where('dg.relevan', 'Tidak Relevan');

        return $this->db->get()->result();
    }

    function getGuruAjarRelevanSD()
    {
        $this->db->select('count(fga.id_guru_aja) as total_relevan_sd, count(fga.id_guru_aja) as total, dt.tingkatan');
        $this->db->from('fact_guru_ajar fga');
        $this->db->join('dim_guru dg', 'dg.id_guru = fga.id_guru', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fga.id_tingkatan', 'left');
        $this->db->group_by('dt.tingkatan');
        $this->db->where('dt.tingkatan', 'SD');
        $this->db->where('dg.relevan', 'Relevan');

        return $this->db->get()->result();
    }

    function getGuruAjarTidakRelevanSD()
    {
        $this->db->select('count(fga.id_guru_aja) as total_tidak_relevan_sd, count(fga.id_guru_aja) as total, dt.tingkatan');
        $this->db->from('fact_guru_ajar fga');
        $this->db->join('dim_guru dg', 'dg.id_guru = fga.id_guru', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fga.id_tingkatan', 'left');
        $this->db->group_by('dt.tingkatan');
        $this->db->where('dt.tingkatan', 'SD');
        $this->db->where('dg.relevan', 'Tidak Relevan');

        return $this->db->get()->result();
    }


    function getGuruAjarRelevanSMP()
    {
        $this->db->select('count(fga.id_guru_aja) as total_relevan_smp, count(fga.id_guru_aja) as total, dt.tingkatan');
        $this->db->from('fact_guru_ajar fga');
        $this->db->join('dim_guru dg', 'dg.id_guru = fga.id_guru', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fga.id_tingkatan', 'left');
        $this->db->group_by('dt.tingkatan');
        $this->db->where('dt.tingkatan', 'SMP');
        $this->db->where('dg.relevan', 'Relevan');

        return $this->db->get()->result();
    }

    function getGuruAjarTidakRelevanSMP()
    {
        $this->db->select('count(fga.id_tingkatan) as total_tidak_relevan_smp, count(fga.id_guru_aja) as total, dt.tingkatan');
        $this->db->from('fact_guru_ajar fga');
        $this->db->join('dim_guru dg', 'dg.id_guru = fga.id_guru', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fga.id_tingkatan', 'left');
        $this->db->group_by('dt.tingkatan');
        $this->db->where('dt.tingkatan', 'SMP');
        $this->db->where('dg.relevan', 'Tidak Relevan');

        return $this->db->get()->result();
    }

    // 

    function getGuruAjarRelevan_TK()
    {
        $this->db->select('count(fga.id_guru_aja) as total_relevan_tk, count(fga.id_guru_aja) as total, dt.tingkatan');
        $this->db->from('fact_guru_ajar fga');
        $this->db->join('dim_guru dg', 'dg.id_guru = fga.id_guru', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fga.id_tingkatan', 'left');
        $this->db->group_by('dt.tingkatan');
        $this->db->where('dt.tingkatan', 'TK');
        $this->db->where('dg.relevan', 'Relevan');

        return $this->db->get()->result();
    }

    function getGuruAjarTidakRelevan_TK()
    {
        $this->db->select('count(fga.id_guru_aja) as total_tidak_relevan_tk, count(fga.id_guru_aja) as total, dt.tingkatan');
        $this->db->from('fact_guru_ajar fga');
        $this->db->join('dim_guru dg', 'dg.id_guru = fga.id_guru', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fga.id_tingkatan', 'left');
        $this->db->group_by('dt.tingkatan');
        $this->db->where('dt.tingkatan', 'TK');
        $this->db->where('dg.relevan', 'Tidak Relevan');

        return $this->db->get()->result();
    }

    function getGuruAjarRelevan_SD()
    {
        $this->db->select('count(fga.id_guru_aja) as total_relevan_sd, count(fga.id_guru_aja) as total, dt.tingkatan');
        $this->db->from('fact_guru_ajar fga');
        $this->db->join('dim_guru dg', 'dg.id_guru = fga.id_guru', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fga.id_tingkatan', 'left');
        // $this->db->group_by('dt.tingkatan');
        $this->db->where('dt.tingkatan', 'SD');
        $this->db->where('dg.relevan', 'Relevan');

        return $this->db->get()->result();
    }

    function getGuruAjarTidakRelevan_SD()
    {
        $this->db->select('count(fga.id_guru_aja) as total_tidak_relevan_sd, count(fga.id_guru_aja) as total, dt.tingkatan');
        $this->db->from('fact_guru_ajar fga');
        $this->db->join('dim_guru dg', 'dg.id_guru = fga.id_guru', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fga.id_tingkatan', 'left');
        $this->db->group_by('dt.tingkatan');
        $this->db->where('dt.tingkatan', 'SD');
        $this->db->where('dg.relevan', 'Tidak Relevan');

        return $this->db->get()->result();
    }


    function getGuruAjarRelevan_SMP()
    {
        $this->db->select('count(fga.id_guru_aja) as total_relevan_smp, count(fga.id_guru_aja) as total, dt.tingkatan');
        $this->db->from('fact_guru_ajar fga');
        $this->db->join('dim_guru dg', 'dg.id_guru = fga.id_guru', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fga.id_tingkatan', 'left');
        $this->db->group_by('dt.tingkatan');
        $this->db->where('dt.tingkatan', 'SMP');
        $this->db->where('dg.relevan', 'Relevan');

        return $this->db->get()->result();
    }

    function getGuruAjarTidakRelevan_SMP()
    {
        $this->db->select('count(fga.id_tingkatan) as total_tidak_relevan_smp, count(fga.id_guru_aja) as total, dt.tingkatan');
        $this->db->from('fact_guru_ajar fga');
        $this->db->join('dim_guru dg', 'dg.id_guru = fga.id_guru', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fga.id_tingkatan', 'left');
        $this->db->group_by('dt.tingkatan');
        $this->db->where('dt.tingkatan', 'SMP');
        $this->db->where('dg.relevan', 'Tidak Relevan');

        return $this->db->get()->result();
    }

    // End of Bagian Tab 4

    // Grafik bagian prestasi


    public function getAkademikNonAkademik($kategori)
    {
        $this->db->select('count(fp.id_fact_prestasi) as total, dt.tingkatan, dw.tahun');
        $this->db->from('fact_prestasi fp');
        $this->db->join('dim_prestasi dp', 'dp.id_prestasi = fp.id_prestasi', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fp.id_tingkatan', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fp.id_waktu', 'left');
        $this->db->group_by('dw.tahun');
        $this->db->where('dp.kategori', $kategori);
        return $this->db->get()->result();
    }

    function getTingkatanByTahun($kategori, $tingkatan, $tahun)
    {
        $this->db->select('count(fp.id_fact_prestasi) as total, dt.tingkatan');
        $this->db->from('fact_prestasi fp');
        $this->db->join('dim_prestasi dp', 'dp.id_prestasi = fp.id_prestasi', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fp.id_tingkatan', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fp.id_waktu', 'left');
        $this->db->where('dp.kategori', $kategori);
        $this->db->where('dt.tingkatan', $tingkatan);
        $this->db->where('dw.tahun', $tahun);
        return $this->db->get()->result();
    }
    // End grafik bagian prestasi

    function getAllAkademikNonAkademik()
    {
        $this->db->select('count(fp.id_fact_prestasi) as total, dp.kategori');
        $this->db->from('fact_prestasi fp');
        $this->db->join('dim_prestasi dp', 'dp.id_prestasi = fp.id_prestasi', 'left');
        $this->db->group_by('dp.kategori');
        return $this->db->get()->result();
    }

    // Diagram Komparasi bagian beranda dashboard

    function getKomparasiKarakter()
    {
        $this->db->select('');
        $this->db->from('fact_karakter_siswa fk');
        $this->db->order_by('id_karakter_siswa', 'desc');
        return $this->db->get()->result();
    }

    function getBerandaAbsensi()
    {
        $this->db->select('(count(fa.id_fact_absensi)*33.3) as total');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->where('da.absensi', 'Alpa');

        return $this->db->get()->result();
    }

    function getBerandaKarakter()
    {
        $this->db->select('count(id_karakter_siswa) as total');
        $this->db->from('fact_karakter_siswa');
        return $this->db->get()->result();
    }

    function getBerandaPrestasi()
    {
        $this->db->select('count(id_fact_prestasi) * 33.3 as total');
        $this->db->from('fact_prestasi');
        return $this->db->get()->result();
    }

    function getPerbandinganAbsensi()
    {
        $this->db->select('dw.tahun');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fa.id_waktu', 'left');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->group_by('dw.tahun');
        return $this->db->get()->result();
    }

    function getPerbandinganAbsensiTingkatan($tahun, $tingkat)
    {
        $this->db->select('dw.tahun, count(fa.id_absensi) as total, da.absensi, dt.tingkatan');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fa.id_waktu', 'left');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fa.id_tingkatan', 'left');
        $this->db->where('dw.tahun', $tahun);
        $this->db->where('dt.tingkatan', $tingkat);
        $this->db->where('da.absensi = "Alpa"');
        return $this->db->get()->result();
    }

    function getPerbandinganPrestasi()
    {
        $this->db->select('dw.tahun');
        $this->db->from('fact_prestasi fp');
        $this->db->join('dim_prestasi dp', 'dp.id_prestasi = fp.id_prestasi', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fp.id_tingkatan', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fp.id_waktu', 'left');
        $this->db->group_by('dw.tahun');
        return $this->db->get()->result();
    }

    function getPerbandinganPrestasiTingkatan($tahun, $tingkat)
    {
        $this->db->select('dw.tahun, count(fp.id_fact_prestasi) as total');
        $this->db->from('fact_prestasi fp');
        $this->db->join('dim_prestasi dp', 'dp.id_prestasi = fp.id_prestasi', 'left');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fp.id_tingkatan', 'left');
        $this->db->join('dim_waktu dw', 'dw.id_waktu = fp.id_waktu', 'left');
        $this->db->where('dw.tahun', $tahun);
        $this->db->where('dt.tingkatan', $tingkat);
        return $this->db->get()->result();
    }

    public function getPerbandinganKarakter()
    {
        $this->db->select('dt.tingkatan');
        $this->db->select('AVG(fks.tanggungjawab)*25 as persentase_tanggungJawab');
        $this->db->select('AVG(fks.kepemimpinan)*25 as persentase_kepemimpinan');
        $this->db->select('AVG(fks.disiplin)*25 as Persentase_Disiplin');
        $this->db->select('AVG(fks.sopansantun)*25 as Persentase_SopanSantun');
        $this->db->select('AVG(fks.kejujuran)*25 as Persentase_Kejujuran');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        $this->db->group_by('dt.tingkatan');
        return $this->db->get()->result();
    }


    public function getKomparasiDataKarakterBeranda()
    {
        $this->db->select('dt.tingkatan');
        $this->db->select('((((AVG(fks.tanggungjawab)*25) + (AVG(fks.kepemimpinan)*25) + (AVG(fks.disiplin)*25) + (AVG(fks.sopansantun)*25) + (AVG(fks.kejujuran)*25))/5)*33.3) as total');
        $this->db->from('fact_karakter_siswa fks');
        $this->db->join('dim_tingkatan dt', 'dt.id_tingkatan = fks.id_tingkatan', 'left');
        // $this->db->group_by('dt.tingkatan');
        return $this->db->get()->result();
    }

    function getPerbAbsensi()
    {
        return $this->db->query(' select dim_waktu.tahun, count(fact_absensi.id_absensi) as JumlahAbsensi, 
        dim_absensi.absensi, dim_tingkatan.tingkatan  from fact_absensi join dim_tingkatan on fact_absensi.id_tingkatan=dim_tingkatan.id_tingkatan  join dim_waktu on fact_absensi.id_waktu=dim_waktu.id_waktu  join dim_absensi ON fact_absensi.id_absensi=dim_absensi.id_absensi  WHERE fact_absensi.id_absensi=2  GROUP by dim_waktu.tahun, dim_tingkatan.tingkatan ')->result();
    }

    function totalKeterangan($keterangan)
    {
        $this->db->select('count(fa.id_fact_absensi) as total');
        $this->db->from('fact_absensi fa');
        $this->db->join('dim_absensi da', 'da.id_absensi = fa.id_absensi', 'left');
        $this->db->where('da.absensi', $keterangan);
        return $this->db->get()->result();
    }
}

/* End of file Visualisasi_model.php */
