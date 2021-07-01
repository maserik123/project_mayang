<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_grafik extends CI_Model {

    // public function getKeeratanGuru()
    // {
    //     $query = $this->db->query("SELECT  dim_waktu.tahun, count(fact_absensi.id_absensi) as JumlahAbsensi, dim_tingkatan.tingkatan, dim_absensi.absensi
    //     from fact_absensi
    //     join dim_tingkatan
    //     on fact_absensi.id_tingkatan=dim_tingkatan.id_tingkatan
    //     join dim_waktu
    //     on fact_absensi.id_waktu=dim_waktu.id_waktu
    //     join dim_absensi
    //     ON fact_absensi.id_absensi=dim_absensi.id_absensi
    //     WHERE fact_absensi.id_absensi=3
    //     GROUP by dim_waktu.tahun, dim_tingkatan.tingkatan
    //     ")->result();
    //     return $query;
    // }

    public function getAbsensiPertingkatan()
    {
        $query = $this->db->query("SELECT dim_tingkatan.tingkatan, count(fact_absensi.id_absensi) as JumlahAbsensi
        from fact_absensi
        join dim_tingkatan
        on fact_absensi.id_tingkatan=dim_tingkatan.id_tingkatan
        join dim_waktu
        on fact_absensi.id_waktu=dim_waktu.id_waktu
        join dim_absensi
        ON fact_absensi.id_absensi=dim_absensi.id_absensi
        WHERE fact_absensi.id_absensi=3
        GROUP by dim_tingkatan.tingkatan")->result();
        return $query;
    }

    // public function getPersentaseNilaiKarakter()
    // {
    //     $query = $this->db->query("SELECT dim_tingkatan.tingkatan, AVG(fact_karakter_siswa.tanggungjawab) 
    //     as Persentase_Karakter, AVG(fact_karakter_siswa.disiplin) as Persentase_Disiplin, AVG(fact_karakter_siswa.sopansantun) 
    //     as Persentase_SopanSantun, AVG(fact_karakter_siswa.kejujuran) as Persentase_Kejujuran FROM fact_karakter_siswa
    //     JOIN dim_tingkatan
    //     ON fact_karakter_siswa.id_tingkatan= dim_tingkatan.id_tingkatan
    //     GROUP BY dim_tingkatan.tingkatan
    //     ")->result();
    //     return $query;
    // }

    public function getPrestasi()
    {
        $query = $this->db->query("SELECT COUNT(fact_prestasi.id_fact_prestasi) as total, dim_prestasi.kategori, dim_waktu.tahun, dim_tingkatan.tingkatan as TKT
        from fact_prestasi
        JOIN dim_prestasi
        on fact_prestasi.id_prestasi=dim_prestasi.id_prestasi
        JOIN dim_tingkatan
        on fact_prestasi.id_tingkatan=dim_tingkatan.id_tingkatan
        JOIN dim_waktu
        on fact_prestasi.id_waktu=dim_waktu.id_waktu
        GROUP by dim_waktu.tahun
        ")->result();
        return $query;
    }

    // public function getAlfaPerTingkatan()
    // {
    //     $query = $this->db->query("SELECT  dim_waktu.tahun, count(fact_absensi.id_absensi) as JumlahAbsensi, dim_tingkatan.tingkatan, dim_absensi.absensi
    //     from fact_absensi
    //     join dim_tingkatan
    //     on fact_absensi.id_tingkatan=dim_tingkatan.id_tingkatan
    //     join dim_waktu
    //     on fact_absensi.id_waktu=dim_waktu.id_waktu
    //     join dim_absensi
    //     ON fact_absensi.id_absensi=dim_absensi.id_absensi
    //     WHERE fact_absensi.id_absensi=3
    //     GROUP by dim_waktu.tahun, dim_tingkatan.tingkatan
    //     ")->result();
    //     return $query;
    // }

    // public function getAlfaPerTingkatanTahun()
    // {
    //     $query = $this->db->query("SELECT  dim_waktu.tahun, count(fact_absensi.id_absensi) as JumlahAbsensi, dim_tingkatan.tingkatan, dim_absensi.absensi
    //     from fact_absensi
    //     join dim_tingkatan
    //     on fact_absensi.id_tingkatan=dim_tingkatan.id_tingkatan
    //     join dim_waktu
    //     on fact_absensi.id_waktu=dim_waktu.id_waktu
    //     join dim_absensi
    //     ON fact_absensi.id_absensi=dim_absensi.id_absensi
    //     WHERE fact_absensi.id_absensi=3
    //     GROUP by dim_waktu.tahun, dim_tingkatan.tingkatan
    //     ")->result();
    //     return $query;
    // }

}