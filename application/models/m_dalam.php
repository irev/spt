<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class M_dalam extends CI_Model
{

    public function __construct()
    {
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
    public function cekDuplikatEntry($FIELD = "", $VALUE = "")
    {

        $this->db->where($FIELD, $VALUE);
        $query     = $this->db->get("spt_data");
        $count_row = $query->num_rows();
        if ($count_row > 0) {

            return false; // jika ada.
        } else {

            return true; // jika tidak
        }
    }

    public function spt_dalam($ID_SPTDALAM = null)
    {
        //$ID_CLIENT = $this->session->userdata('idclient');
        $this->db->order_by("id_spt", "ASC");
        if ($ID_SPTDALAM != null) {
            $this->db->where("id_spt", $ID_SPTDALAM);
        }
        $query = $this->db->get($this->_table); //TABEL SPT
        if ($ID_SPTDALAM != null) {
            return $query->row();
        } else {
            return $query->result_array();
        }
    }


////// PEGAWAI YANG IKUT DALAM PERJALANAN DINAS

    public function spt_pengikut($ID_SPT)
    {

        $this->db->select(
            "spt_pengikut.*,
				m_pegawai.*,
				`m_pegawai`.`nama` as `nama_pengikut`,
				`m_pegawai`.`nip` as `nip_pengikut`,
				`m_pegawai`.`jabatan` as `jabatan_pengikut`,
				`m_pegawai`.`golongan` as `gol_pengikut`,
				`m_pegawai`.`eselon_id` as `eselon_pengikut`,

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
				m_kegiatan.rekening,
				m_kegiatan.kegiatan,
				m_kegiatan.pptk,
				m_kegiatan.bendahara,
				m_kegiatan.kpa,
				(SELECT jabatan FROM `m_pegawai` WHERE `id_peg` = m_kegiatan.kpa) as jabkpa,
				(SELECT nama FROM `m_pegawai` WHERE `id_peg` = m_kegiatan.kpa) as kpa,
				(SELECT nip FROM `m_pegawai` WHERE `id_peg` = m_kegiatan.kpa) as nipkpa,


				(SELECT jabatan FROM `m_pegawai` WHERE `id_peg` = m_kegiatan.pptk) as jabpptk,
				(SELECT nama FROM `m_pegawai` WHERE `id_peg` = m_kegiatan.pptk) as pptk,
				(SELECT nip FROM `m_pegawai` WHERE `id_peg` = m_kegiatan.pptk) as nippptk,


				(SELECT jabatan FROM `m_pegawai` WHERE `id_peg` = m_kegiatan.bendahara) as jabbendahara,
				(SELECT nama FROM `m_pegawai` WHERE `id_peg` = m_kegiatan.bendahara) as bendahara,
				(SELECT nip FROM `m_pegawai` WHERE `id_peg` = m_kegiatan.bendahara) as nipbendahara
				"
            //k.nama as k_nama, k.nip as k_nip, k.jabatan as k_jabatan,
            //p.nama as p_nama, p.nip as p_nip, p.jabatan as p_jabatan,
            //b.nama as b_nama, b.nip as b_nip, b.jabatan as b_jabatan
        );
        $this->db->where("spt_id", $ID_SPT);
        $this->db->join("m_pegawai", "spt_pengikut.pegawai_id=m_pegawai.id_peg", "LEFT");
        $this->db->join("spt_data", "spt_data.id_spt=spt_pengikut.spt_id", "LEFT");
        $this->db->join("m_golongan", "m_golongan.id_gol=m_pegawai.golongan_id", "LEFT");
        $this->db->join("m_eselon", "m_eselon.id_eselon=m_pegawai.eselon_id", "LEFT");
        $this->db->join("m_tujuan", "m_tujuan.id_tujuan=spt_data.tujuan_id", "LEFT");
        $this->db->join("m_kegiatan", "m_kegiatan.id_kegiatan=spt_data.kegiatan_id", "LEFT");
        //$this->db->join("m_kegiatan as k","k.kpa=m_pegawai.id_peg");
        //$this->db->join("m_kegiatan as p","p.pptk=m_pegawai.id_peg");
        //$this->db->join("m_kegiatan as b","b.bendahara=m_pegawai.id_peg");
        $query = $this->db->get("spt_pengikut"); //TABEL PENGIKUT
        return $query->result_array(); //TABEL PENGIKUT
    }

    public function query_simpan()
    {
        //SET DATA
        $post           = $this->input->post();
        $tempat         = $post['tempat_spt']; //"Simpang Empat";
        $this->id_spt   = uniqid();
        $this->no_spt   = $post['nomor_spt'];
        $this->no_sppd  = $post['nomor_sppd']; ///
        $this->nama     = $post['nama'];
        $this->nip      = $post['nip'];
        $this->pangkat  = $post['golongan'];
        $this->golongan = $post['golongan'];

        $this->jabatan      = $post['jabatan'];
        $this->maksud       = $post['maksud'];
        $this->transportasi = $post['transpor'];

        $this->tujuan_id     = $post['pilih_tujuan'];
        $this->tujuan        = $post['tujuan'];
        $this->wilayah       = $post['wilayah'];
        $this->tgl_berangkat = $post['berangkat'];
        $this->tgl_kembali   = $post['kembali'];
        $this->sumber_dana   = $post['tahun'];
        /////////////////// SPT
        $this->ttd_tempat  = $tempat;
        $this->ttd_tgl     = $post['tanggal_spt'];
        $this->ttd_jabatan = $post['ttd_jabatan'];
        $this->ttd_nama    = $post['ttd_nama'];
        $this->ttd_gol     = $post['ttd_golongan'];
        $this->ttd_nip     = $post['ttd_nip'];
        //////////////////// SPPD
        $this->ttd_sppd_tempat  = $post['tempat_sppd'];
        $this->ttd_sppd_tgl     = $post['tanggal_sppd'];
        $this->ttd_sppd_nama    = $post['ttd_sppd_nama'];
        $this->ttd_sppd_nip     = $post['ttd_sppd_nip'];
        $this->ttd_sppd_gol     = $post['ttd_sppd_golongan'];
        $this->ttd_sppd_jabatan = $post['ttd_sppd_jabatan'];
        $this->perjalanan       = "dalam";
        $this->tahun            = date("Y");
        ///// INPUT TAMBAHAN UNTUK SPPD
        $this->beban       = 'DPA Dinas Pekerjaan Umum & Penataan Ruang Kab. Pasaman Barat Tahun Anggaran 2019';
        $this->anggaran    = $post['pilih_beban'];
        $this->kegiatan_id = $post['kegiatan'];
        //EXE
        $this->db->insert($this->_table, $this);
        $this->query_simpan_pengikut(true, $this->id_spt, $post["perintah_untuk"], $this->perjalanan, $this->tahun);
        $result = ($this->db->affected_rows() != 1) ? false : true;
        return $result;
    }

    public function get_data($gettabel, $getfield, $keyfield, $key)
    {
        $this->db->where($keyfield, $key);
        $query = $this->db->get($gettabel); //TABEL SPT
        return $query->row($getfield);
    }

    public function query_update()
    {
        //SET DATA
        $post           = $this->input->post();
        $tempat         = $post['tempat_spt']; //"Simpang Empat";
        $this->id_spt   = $post['id_spt'];
        $this->no_spt   = $post['nomor_spt'];
        $this->no_sppd  = $post['nomor_sppd']; ///
        $this->nama     = $post['nama'];
        $this->nip      = $post['nip'];
        $this->pangkat  = $post['golongan'];
        $this->golongan = $post['golongan'];

        $this->jabatan      = $post['jabatan'];
        $this->maksud       = $post['maksud'];
        $this->transportasi = $post['transpor'];

        $this->tujuan_id     = $post['pilih_tujuan'];
        $this->tujuan        = $post['tujuan'];
        $this->wilayah       = $post['wilayah'];
        $this->tgl_berangkat = $post['berangkat'];
        $this->tgl_kembali   = $post['kembali'];
        $this->sumber_dana   = $post['tahun'];
        /////////////////// SPT
        $this->ttd_tempat  = $tempat;
        $this->ttd_tgl     = $post['tanggal_spt'];
        $this->ttd_jabatan = $post['ttd_jabatan'];
        $this->ttd_nama    = $post['ttd_nama'];
        $this->ttd_gol     = $post['ttd_golongan'];
        $this->ttd_nip     = $post['ttd_nip'];
        //////////////////// SPPD
        $this->ttd_sppd_tempat  = $post['tempat_sppd'];
        $this->ttd_sppd_tgl     = $post['tanggal_sppd'];
        $this->ttd_sppd_nama    = $post['ttd_sppd_nama'];
        $this->ttd_sppd_nip     = $post['ttd_sppd_nip'];
        $this->ttd_sppd_gol     = $post['ttd_sppd_golongan'];
        $this->ttd_sppd_jabatan = $post['ttd_sppd_jabatan'];
        $this->perjalanan       = "dalam";
        $this->tahun            = date("Y");

        ///// INPUT TAMBAHAN UNTUK SPPD
        $this->beban       = 'DPA Dinas Pekerjaan Umum & Penataan Ruang Kab. Pasaman Barat Tahun Anggaran 2019';
        $this->anggaran    = $post['pilih_beban'];
        $this->kegiatan_id = $post['kegiatan'];

        //EXE
        $this->db->update($this->_table, $this, array('id_spt' => $this->id_spt));
        $this->query_simpan_pengikut(true, $this->id_spt, $post["perintah_untuk"], $this->perjalanan, $this->tahun);
        //CEK KONDISI
        //$result  = ($this->db->affected_rows() >= 1) ? false : true;
        //return  $result;
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_spt" => $id));
    }

    ////// query pengikut
    //public $_tabel_pengikut = 'spt_pengikut';
    public $tahun;
    private function cekPenikut($IDSPT = null, $IDPEGAWAI = null)
    {
        if ($IDSPT != null && $IDPEGAWAI != null) {
            $this->db->select("*");
            $this->db->where("pegawai_id", $IDPEGAWAI);
            $this->db->where("spt_id", $IDSPT);
            $query = $this->db->get("spt_pengikut"); //TABEL SPT
            return $this->db->affected_rows();
        }

    }
    public function query_simpan_pengikut($token = false, $spt_id = null, $idpegawai = null, $perjalanan = null, $tahun = null)
    {

        $post = $this->input->post();

        if ($token) {
            $data = [
                'spt_id'     => $spt_id,
                'pegawai_id' => $idpegawai,
                'perjalanan' => $perjalanan,
                'tahun'      => $tahun,
            ];
            $ids   = $spt_id;
            $idpeg = $idpegawai;
        } else {
            $data = [
                'spt_id'     => $post["spt_id"],
                'pegawai_id' => $post["pegawai_id"],
                'perjalanan' => $post["perjalanan"],
                'tahun'      => $post["tahun"],
            ];
            $ids   = $post["spt_id"];
            $idpeg = $post["pegawai_id"];
        }
        //$this->db->trans_start();
        $cek = $this->cekPenikut($ids, $idpeg);
        //echo $this->db->last_query();
        if ($cek === 0) {
            $this->db->insert("spt_pengikut", $data);
            echo $this->db->affected_rows();
        } else {
            echo "2";
        }
        //$result  = ($this->db->affected_rows() > 1) ? false : true;
        //echo $this->db->affected_rows();
    }
    public function deletePengikut($id)
    {
        return $this->db->delete("spt_pengikut", array("id_peng" => $id));
    }

}
