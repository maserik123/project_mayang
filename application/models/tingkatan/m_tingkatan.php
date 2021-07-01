<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_tingkatan extends CI_Model {

    public function import_data($dataTingkatan)
    {

        // $tingkatan = array('tingkatan'=> $dataTingkatan);

        // $this->db->replace('dim_tingkatan', $tingkatan);

        // $this->db->from('dim_tingkatan');
        // $this->db->where('tingkatan', $dataTingkatan); 
        // $query = $this->db->get();
        // if($query->num_rows() != 0){
        //     $data = array(
        //                 'tingkatan'=>$dataTingkatan
        //              );
        //  $this->db->where('tingkatan', $dataTingkatan);
        //  $this->db->update('dim_tingkatan', $data); 
        // }else{
        //     $data = array(
        //     'tingkatan'=>$dataTingkatan
        //     );
        //    $this->db->insert('dim_tingkatan',$data);
        // }

        $priority= $this->db->query("SELECT tingkatan FROM dim_tingkatan WHERE tingkatan = '$dataTingkatan'")->result();

        if (empty($priority))
        {
            $dim_tingkatan = array('tingkatan'=> $dataTingkatan);

            $this->db->replace('dim_tingkatan', $dim_tingkatan);
        }
    }


    public function getDataTingkatan()
    {
        return $this->db->get('dim_tingkatan')->result_array();
    }

}