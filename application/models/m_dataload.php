<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class M_dataload extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function client()
    {

    }
    
    /**
     * { function_description }
     *
     * @return     <type>  ( description_of_the_return_value )
     */
    public function id_client()
    {
        $this->db->order_by("id_client", "DESC");
        $query = $this->db->get("client");
        return $query->result_array();
    }

    /**
     * { function_description }
     *
     * @param      <type>  $idclient  The idclient
     *
     * @return     <type>  ( description_of_the_return_value )
     */
    public function perusahaan_client($idclient = null)
    {
        $this->db->where("client", $idclient);
        $this->db->order_by("id_perusahaan", "DESC");
        $query = $this->db->get("data_perusahaan");
        return $query->result_array();
    }

    /**
     * { function_description }
     *
     * @param      <type>  $idclient   The idclient
     * @param      <type>  $ID_CLIENT  The id client
     *
     * @return     <type>  ( description_of_the_return_value )
     */
    public function id_perusahaan_client($idclient = null, $ID_CLIENT = null)
    {
        $this->db->where("client", $idclient);
        $this->db->where("id_perusahaan", $ID_CLIENT);
        $query = $this->db->get("data_perusahaan");
        return $query->row();
    }

    //
    // tampilkan semua data perusahaan yang dimiliki client
    //
    // @param      <type>  $USER_ID  The user id
    //
    // @return     <type>  ( description_of_the_return_value )
    //
    public function Select_perusahaan_by_userID($USER_ID = null)
    {
        if ($USER_ID != null and is_numeric($USER_ID)) {
            $this->db->where("client", $USER_ID);
            $query = $this->db->get("data_perusahaan");
            return $query->result_array();
        }

    }
    //
    // tampilkan data perusahaan yang dipilih client
    //
    // @param      <type>  $USER_ID        The user id
    // @param      <type>  $PERUSAHAAN_ID  The perusahaan id
    //
    // @return     <type>  ( description_of_the_return_value )
    //
    public function Select_perusahaan_by_userID_and_PERUSAHAAN_ID($USER_ID = null, $PERUSAHAAN_ID = null)
    {
        if ($USER_ID != null and is_numeric($USER_ID) and $PERUSAHAAN_ID != null and is_numeric($PERUSAHAAN_ID)) {
            $this->db->where("client", $USER_ID);
            $this->db->where("id_perusahaan", $PERUSAHAAN_ID);
            $query = $this->db->get("data_perusahaan");
            return $query->result_array();
        }

    }

    /**
     * { function_description }
     *
     * @param      <type>  $PERUSAHAAN_ID  The perusahaan id
     *
     * @return     <type>  ( description_of_the_return_value )
     */
    public function Select_paket_by_perusahaanID($PERUSAHAAN_ID)
    {
        if ($PERUSAHAAN_ID != null and is_numeric($PERUSAHAAN_ID)) {
            $this->db->where("client_id", $USER_ID);
            $query = $this->db->get("data_paket");
            return $query->result_array();
        }

    }

    /**
     * { function_description }
     *
     * @param      string  $id     The identifier
     *
     * @return     <type>  ( description_of_the_return_value )
     */
    public function data_supplier($id = "")
    {
        if ($id != null) {
            $this->db->order_by("id_sup", "DESC");
            $query = $this->db->get("supplier");
            return $query->result_array();
        } else {
            $this->db->order_by("id_sup", "DESC");
            $query = $this->db->get("supplier");
            return $query->result_array();
        }

    }

    /**
     * { function_description }
     *
     * @param      <type>  $id     The identifier
     *
     * @return     <type>  ( description_of_the_return_value )
     */
    public function data_produk($id = null)
    {
        if ($id != null) {
            $this->db->where("id_produk", $id);
            //$this->db->where("id_produk",$id);
            $this->db->join('supplier', 'supplier.id_sup = produk.Id_supplier');
            $this->db->order_by("harga", "DESC");
            $query = $this->db->get("produk");
            return $query->result();
        } else {
            $kategori = $this->input->get('k');
            $this->db->join('supplier', 'supplier.id_sup = produk.Id_supplier');
            $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
            $this->db->order_by("harga", "DESC");
            $query = $this->db->get("produk");
            return $query->result_array();
        }
    }

    /**
     * { function_description }
     *
     * @param      <type>  $id     The identifier
     *
     * @return     <type>  ( description_of_the_return_value )
     */
    public function supplier_produks($id)
    {
        $this->db->where("id_supplier", $id);
        $this->db->order_by("harga", "DESC");
        $query = $this->db->get("produk");
        return $query->result_array();
    }

    /**
     * { function_description }
     *
     * @param      <type>  $id     The identifier
     *
     * @return     <type>  ( description_of_the_return_value )
     */
    public function supplier_produk($id)
    {
        $this->db->where("id_supplier", $id);
        $this->db->order_by("harga", "DESC");
        $query = $this->db->get("produk");
        return $query->result();
    }

    /**
     * { function_description }
     *
     * @return     <type>  ( description_of_the_return_value )
     */
    public function kategori_produk()
    {
        //$this->db->order_by("kategoris","DESC");
        $query = $this->db->get("kategori");
        return $query->result_array();
    }

}
