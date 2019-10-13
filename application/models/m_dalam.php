<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_dalam extends CI_Model {
	
	function __construct(){
		parent::__construct();		
	}
	private $_table = "spt_data";
	public $id_spt;
	public $no_spt;
	public $no_sppd; ///
	public $nama;
	public $nip;
	public $pangkat;
	public $golongan;
	public $jabatan;
	public $maksud;
	public $transportasi;
	public $tujuan;
	public $wilayah;
	public $tgl_berangkat;
	public $tgl_kembali;
	public $sumber_dana;
/////////////////// SPT	
	public $ttd_tempat;
	public $ttd_tgl;
	public $ttd_jabatan;
	public $ttd_nama;
	public $ttd_gol;
	public $ttd_nip;
//////////////////// SPPD
	public $ttd_sppd_tempat;
	public $ttd_sppd_tgl;
	public $ttd_sppd_jabatan;
	public $ttd_sppd_nama;
	public $ttd_sppd_gol;
	public $ttd_sppd_nip;
	public $beban;
	public $anggaran;
	/////////////////
	// TABEL PENGIKUT
	// //////////////
	//private $_table_pengikut = "spt_pengikut";


	public function cekDuplikatEntry($FIELD="", $VALUE="") {

	    $this->db->where($FIELD, $VALUE);
	    $query = $this->db->get("spt_data");
	    $count_row = $query->num_rows();
	    if ($count_row > 0) {
	    
	        return FALSE; // jika ada.
	     } else {
	      
	        return TRUE; // jika tidak
	     }
	}


		function spt_dalam($ID_SPTDALAM = null){
			//$ID_CLIENT = $this->session->userdata('idclient');
			$this->db->order_by("id_spt","ASC");
			if($ID_SPTDALAM != null){
				$this->db->where("id_spt", $ID_SPTDALAM);
			}
			$query=$this->db->get($this->_table); //TABEL SPT
			if($ID_SPTDALAM != null){
				return $query->row();
			}else{
				return $query->result_array();
			}
		}	

////// PEGAWAI YANG IKUT DALAM PERJALANAN DINAS
		function spt_pengikut($ID_SPT){

			$this->db->select(
				"spt_pengikut.*, 
				m_pegawai.*, 
				m_pegawai.nama as nama_pegawai, 
				spt_data.*,
				spt_data.nama as nm_diperintah,
				spt_data.nip as nip_diperintah,
				spt_data.pangkat as pangkat_diperintah,
				spt_data.golongan as golongan_diperintah,
				m_golongan.*, 
				m_eselon.*,
				m_tujuan.kec as kec,
				m_tujuan.kab as kab,
				m_tujuan.prov as prov,
				"
			);
			$this->db->where("spt_id", $ID_SPT);
			$this->db->join("m_pegawai","spt_pengikut.pegawai_id=m_pegawai.id_peg");
			$this->db->join("spt_data","spt_data.id_spt=spt_pengikut.spt_id");
			$this->db->join("m_golongan","m_golongan.id_gol=m_pegawai.golongan_id");
			$this->db->join("m_eselon","m_eselon.id_eselon=m_pegawai.eselon_id");
			$this->db->join("m_tujuan","m_tujuan.id_tujuan=spt_data.tujuan_id");
			$query=$this->db->get("spt_pengikut"); //TABEL PENGIKUT
			return $query->result_array();//TABEL PENGIKUT
		}

		function query_simpan(){
			//SET DATA
				$post = $this->input->post();
				$tempat =  $post['tempat_spt'] ;//"Simpang Empat";
				$this->id_spt           =uniqid();
				$this->no_spt           =$post['nomor_spt'];
				$this->no_sppd          =$post['nomor_sppd']; ///
				$this->nama             =$post['nama'];
				$this->nip              =$post['nip'];
				$this->pangkat          =$post['golongan'];
				$this->golongan         =$post['golongan'];

				$this->jabatan          =$post['jabatan'];
				$this->maksud           =$post['maksud'];
				$this->transportasi     =$post['transpor'];

				$this->tujuan_id        =$post['pilih_tujuan'];
				$this->tujuan           =$post['tujuan'];
				$this->$wilayah			=$post['wilayah'];
				$this->tgl_berangkat    =$post['berangkat'];
				$this->tgl_kembali      =$post['kembali'];
				$this->sumber_dana      =$post['tahun'];
				/////////////////// SPT	
				$this->ttd_tempat       = $tempat;
				$this->ttd_tgl          =$post['tanggal_spt'];
				$this->ttd_jabatan      =$post['ttd_jabatan'];
				$this->ttd_nama         =$post['ttd_nama'];
				$this->ttd_gol          =$post['ttd_golongan'];
				$this->ttd_nip          =$post['ttd_nip'];
				//////////////////// SPPD
				$this->ttd_sppd_tempat  =$post['tempat_sppd'];
				$this->ttd_sppd_tgl     =$post['tanggal_sppd'];
				$this->ttd_sppd_nama    =$post['ttd_sppd_nama'];
				$this->ttd_sppd_nip     =$post['ttd_sppd_nip'];
				$this->ttd_sppd_gol     =$post['ttd_sppd_golongan'];
				$this->ttd_sppd_jabatan =$post['ttd_sppd_jabatan'];
				$this->perjalanan 		="dalam";
				$this->tahun 			=date("Y");
				///// INPUT TAMBAHAN UNTUK SPPD
				$this->beban            ='DPA Dinas Pekerjaan Umum & Penataan Ruang Kab. Pasaman Barat Tahun Anggaran 2019';
				$this->anggaran         =$post['pasal_anggaran'];
			//EXE
			    $this->db->insert($this->_table, $this);
					$result  = ($this->db->affected_rows() != 1) ? false : true;
					return $result;
		}
		
		function get_data($gettabel,$getfield,$keyfield,$key){
			$this->db->where($keyfield,$key);
			$query=$this->db->get($gettabel); //TABEL SPT
			return $query->row($getfield);
		}

		function query_update(){
			//SET DATA
				$post = $this->input->post();
				$tempat =  $post['tempat_spt'] ;//"Simpang Empat";
				$this->id_spt           =$post['id_spt'];
				$this->no_spt           =$post['nomor_spt'];
				$this->no_sppd          =$post['nomor_sppd']; ///
				$this->nama             =$post['nama'];
				$this->nip              =$post['nip'];
				$this->pangkat          =$post['golongan'];
				$this->golongan         =$post['golongan'];

				$this->jabatan          =$post['jabatan'];
				$this->maksud           =$post['maksud'];
				$this->transportasi     =$post['transpor'];

				$this->tujuan_id        =$post['pilih_tujuan'];
				$this->tujuan           =$post['tujuan'];
				$this->wilayah			=$post['wilayah'];
				$this->tgl_berangkat    =$post['berangkat'];
				$this->tgl_kembali      =$post['kembali'];
				$this->sumber_dana      =$post['tahun'];
				/////////////////// SPT	
				$this->ttd_tempat       = $tempat;
				$this->ttd_tgl          =$post['tanggal_spt'];
				$this->ttd_jabatan      =$post['ttd_jabatan'];
				$this->ttd_nama         =$post['ttd_nama'];
				$this->ttd_gol          =$post['ttd_golongan'];
				$this->ttd_nip          =$post['ttd_nip'];
				//////////////////// SPPD
				$this->ttd_sppd_tempat  =$post['tempat_sppd'];
				$this->ttd_sppd_tgl     =$post['tanggal_sppd'];
				$this->ttd_sppd_nama    =$post['ttd_sppd_nama'];
				$this->ttd_sppd_nip     =$post['ttd_sppd_nip'];
				$this->ttd_sppd_gol     =$post['ttd_sppd_golongan'];
				$this->ttd_sppd_jabatan =$post['ttd_sppd_jabatan'];
				$this->perjalanan 		="dalam";
				$this->tahun 			=date("Y");
			///// INPUT TAMBAHAN UNTUK SPPD
				$this->beban            ='DPA Dinas Pekerjaan Umum & Penataan Ruang Kab. Pasaman Barat Tahun Anggaran 2019';
				$this->anggaran         =$post['pasal_anggaran'];
			//EXE
		        $this->db->update($this->_table, $this, array('id_spt' => $this->id_spt));
				//CEK KONDISI
				$result  = ($this->db->affected_rows() >= 1) ? false : true;
				return  $result;
		}

		public function delete($id)
    	{
        return $this->db->delete($this->_table, array("id_spt" => $id));
    	}


	////// query pengikut
    	//public $_tabel_pengikut = 'spt_pengikut';
    	public $tahun;
    	public function query_simpan_pengikut(){
    		$post = $this->input->post();
    		$data = [
	    				'spt_id' 	 => $post["spt_id"],
						'pegawai_id'  => $post["pegawai_id"],
						'perjalanan'  => $post["perjalanan"],
						'tahun'       => $post["tahun"],
    		      ];
				//$this->db->trans_start();
				$this->db->insert("spt_pengikut", $data);
				$result  = ($this->db->affected_rows() != 1) ? false : true;
				return $result;
    	}
    	public function deletePengikut($id){
    		return $this->db->delete("spt_pengikut", array("id_peng" => $id));
    	}	


}