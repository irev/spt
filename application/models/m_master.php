<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class M_master extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $tahun = $this->session->userdata("TA");
    }

    private $_tablepegawai = "m_pegawai";
    public $id_peg;
    public $eselon_id;
    public $golongan_id;
   
    //public $nama_jabatan;

    public function pegawai($ID_PEGAWAI = null)
    {
        //$ID_CLIENT = $this->session->userdata('idclient');
        $this->db->order_by("id_peg", "ASC");
        $this->db->select("m_pegawai.*, CONCAT( m_golongan.pangkat,' ',m_golongan.golongan) as pangkat_golongan, wil1 as dalam_wil1_rp,wil2 as dalam_wil2_rp,wil3 as dalam_wil3_rp, m_eselon.eselon as eselon, m_eselon.rp_oh as luar_rp", false);
        $this->db->join("m_golongan", "m_golongan.id_gol=m_pegawai.golongan_id");
        $this->db->join("m_eselon", "m_eselon.id_eselon=m_pegawai.eselon_id");
        if ($ID_PEGAWAI != null) {
            //$this->db->select("m_pegawai.*, m_eselon.eselon,m_eselon.rp_oh");
            $this->db->where("m_pegawai.id_peg", $ID_PEGAWAI);
        }
        $query = $this->db->get($this->_tablepegawai);
        if ($ID_PEGAWAI != null) {
            return $query->row();
        } else {
            return $query->result_array();
        }
    }

    public function getpegawaiById($id)
    {
        return $this->db->get_where("m_pegawai", ["id_peg" => $id])->row();
    }

/**
 *   [golongan description]
 *   @method      golongan
 *   @author Meedun
 *   @date        2019-10-17
 *   @file        file_name()
 *   @anotherdate 2019-10-17T06:12:43+0700
 *   @version     [version]
 *   @param       [type]                   $ID_GOLONGAN [description]
 *   @return      [type]                                [description]
 */
    public function golongan($ID_GOLONGAN = null)
    {
        //$ID_CLIENT = $this->session->userdata('idclient');
        $this->db->order_by("golongan", "ASC");
        $this->db->where("tahun", $this->session->userdata("TA"));
        if ($ID_GOLONGAN != null) {
            $this->db->where("id_gol", $ID_GOLONGAN);
        }
        $query = $this->db->get("m_golongan");
        if ($ID_GOLONGAN != null) {
            return $query->row();
        } else {
            return $query->result_array();
        }
    }
    
/**
 * { function_description }
 *
 * @return     <type>  ( description_of_the_return_value )
 */
    public function golonganAjax()
    {
        foreach ($this->m_master->golongan($ID) as $element) {
            $result[$element['grup']][] = $element;

        }
        return json_encode($result);
    }
    public function jabatan($ID_JABATAN = null)
    {
        //$ID_CLIENT = $this->session->userdata('idclient');
        $this->db->order_by("id_jab", "ASC");
        if ($ID_JABATAN != null) {
            $this->db->where("id_jab", $ID_JABATAN);
        }
        $query = $this->db->get("m_jabatan");
        if ($ID_JABATAN != null) {
            return $query->row();
        } else {
            return $query->result_array();
        }
    }
    public function eselon($ID_ESELON = null)
    {
        //$ID_CLIENT = $this->session->userdata('idclient');
        $this->db->order_by("id_eselon", "ASC");
        if ($ID_ESELON != null) {
            $this->db->where("id_eselon", $ID_ESELON);
        }
        $query = $this->db->get("m_eselon");
        if ($ID_ESELON != null) {
            return $query->row();
        } else {
            return $query->result_array();
        }
    }


    public function query_simpanpegawai()
    {
        $post              = $this->input->post();
        $this->nama        = $post["nama"];
        $this->nip         = $post["nip"];
        $this->jabatan     = $post["jabatan"];
        $this->golongan    = $post["nm_gol"];
        $this->golongan_id = $post["golongan"];
        $this->eselon_id   = $this->input->post("eselon"); //$post["eselon"];
        $this->tahun       = $post["tahun"];
        //$this->db->trans_start();
        $this->db->insert($this->_tablepegawai, $this);
        $result = ($this->db->affected_rows() != 1) ? false : true;
        return $result;
        //$this->db->trans_complete();
        //echo $this->db->last_query();

    }
    /**
     *   [query_updatepegawai description]
     *   @method      query_updatepegawai
     *   @author Meedun
     *   @date        2019-10-19
     *   @file        file_name()
     *   @anotherdate 2019-10-19T04:23:21+0700
     *   @version     [v1.0]
     *   @return      [bolean]           
     */
    public function query_updatepegawai()
    {
        $post              = $this->input->post();
        $this->id_peg      = $post["id_peg"];
        $this->nama        = $post["nama"];
        $this->nip         = $post["nip"];
        $this->jabatan     = $post["jabatan"];
        $this->golongan    = $post["nm_gol"];
        $this->golongan_id = $post["golongan"];
        $this->eselon_id   = $post["eselon"];
        $this->tahun       = $post["tahun"];
        $this->db->update($this->_tablepegawai, $this, array('id_peg' => $post['id_peg']));
        //CEK KONDISI
        $result = ($this->db->affected_rows() >= 1) ? true : false;
        return $result;
    }
    public function delete_pegawai($id)
    {
        return $this->db->delete($this->_tablepegawai, array("id_peg" => $id));
    }

/**
 * Panggil data dari tabel anggaran
 * @param      <int>  $ID_ANGGARAN  The id anggaran
 * @param      <string>  $key          The key as field
 * @return     <type>  ( data array )
 */
    public function anggaran($ID_ANGGARAN = null, $key = null)
    {
        //$ID_CLIENT = $this->session->userdata('idclient');
        $this->db->order_by("id_anggaran", "ASC");
        if ($ID_ANGGARAN != null) {
            $this->db->where("id_anggaran", $ID_ANGGARAN);
        }
        $query = $this->db->get("m_anggaran");
        if ($ID_ANGGARAN != null && $key != null) {
            return $query->row($key);
        } elseif ($ID_ANGGARAN != null) {
            return $query->row();
        } else {
            return $query->result_array();
        }
    }

    public function belanja($ID = null, $key = null)
    {
        //$ID_CLIENT = $this->session->userdata('idclient');
        $this->db->order_by("id_belanja", "ASC");
        if ($ID != null) {
            $this->db->where("id_belanja", $ID);
        }
        $query = $this->db->get("m_belanja");
        if ($ID != null && $key != null) {
            return $query->row($key);
        } elseif ($ID != null) {
            return $query->row();
        } else {
            return $query->result_array();
        }
    }

    


    public function kegiatan($ID = null, $key = null)
    {
        //$ID_CLIENT = $this->session->userdata('idclient');
        $this->db->order_by("id_kegiatan", "ASC");
        if ($ID != null) {
            $this->db->where("id_kegiatan", $ID);
        }
        $query = $this->db->get("m_kegiatan");
        if ($ID != null && $key != null) {
            return $query->row($key);
        } elseif ($ID != null) {
            return $query->row();
        } else {
            return $query->result_array();
        }
    }

    public function pegawai_data($ID = null, $key = null)
    {
        //$ID_CLIENT = $this->session->userdata('idclient');
        $this->db->order_by("id_peg", "ASC");
        if ($ID != null) {
            $this->db->where("id_peg", $ID);
        }
        $query = $this->db->get("m_pegawai");
        if ($ID != null && $key != null) {
            return $query->row($key);
        } elseif ($ID != null) {
            return $query->row();
        } else {
            return $query->result_array();
        }
    }

#--------------------------------------------------------------------------------------------
# TUJUAN 
#--------------------------------------------------------------------------------------------
   public function tujuan($ID = null, $key = null)
    {
        //$ID_CLIENT = $this->session->userdata('idclient');
        $this->db->order_by("id_tujuan", "ASC");
        if ($ID != null) {
            $this->db->where("id_tujuan", $ID);
        }
        $query = $this->db->get("m_tujuan");
        if ($ID != null && $key != null) {
            return $query->row($key);
        } elseif ($ID != null) {
            return $query->row();
        } else {
            return $query->result_array();
        }
    }

    public function prov(){
        $query = $this->db->get("mw_prov");
        return $query->result_array();
    }
    public function provKab($id=null){
        if(!is_null($id)){
            $this->db->where('provid',$id);            
        }
        $query = $this->db->get("mw_kab");
        return $query->result_array();  
    }
    public function kabKec($id=null){
        if(!is_null($id)){
            $this->db->where('kabid',$id);            
        }
        $query = $this->db->get("mw_kec");
        return $query->result_array();
        
    }
#--------------------------------------------------------------------------------------------
# CARI NOMOR KENDRAAN ? TRANSPORTASI 
#--------------------------------------------------------------------------------------------
    public function trasportsasi_nomor($ID_TRAN = null)
    {
        //$ID_CLIENT = $this->session->userdata('idclient');
        $this->db->order_by("nomor", "ASC");
        if ($ID_TRAN != null) {
            $this->db->where("nomor", $ID_TRAN);
        }
        $query = $this->db->get("m_trasportsasi");
        if ($ID_TRAN != null) {
            return $query->row();
        } else {
            return $query->result_array();
        }
    }

}
