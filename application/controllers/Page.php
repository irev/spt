<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public $KATEGORI;
	function __construct(){
		parent::__construct();
		$this->load->model(['m_dataload']);
		//$this->load->library(['session','Mylib_form','Mylib_themes','l_paket']);
		$this->load->database();
		//$this->load->helper(['url','tanggal','tanggal_id','terbilang']);
	
		$this->KATEGORI =  $this->m_dataload->kategori_produk();	

	}
	public function index()
	{


		$product_cart = array();
	
		if($this->session->userdata('cart_session')){
		
			$cart_session = $this->session->userdata('cart_session');
		
			foreach($cart_session as $id=>$val){
				$product_cart[$id] = $val;
			}
		
		} 
		
		if($this->input->post('quantity')){
			$qty_add = $this->input->post('quantity');
		} else {
			$qty_add = 1;
		}
		
				$product_cart[$this->input->post('product_id')] = $qty_add;
			
			$this->session->set_userdata('cart_session',$product_cart);
			
			$cart_session = $this->session->userdata('cart_session');
		
			$arr = array();
			$arr['update_cart'] = array_sum($cart_session);
			echo json_encode($arr);



		$data['produk'] = $this->m_dataload->data_produk();
		$data['KATEGORI'] = $this->m_dataload->kategori_produk();
		$this->template->load('template_page','page/v_page', $data);
	}


	public function produk($id=null)
	{
		if(!is_numeric($id) || $id == null){
			redirect('page','refresh');
		}else{  
			$data['produk'] = $this->m_dataload->data_produk($id);
			$data['supplier'] = $this->m_dataload->supplier_produk($id);
			$this->template->load('template_page','page/v_produk', $data);
		}
	}
    
    public function order($id=null)
	{
		if($id != null){
			$data['produk'] = $this->m_dataload->data_produk($id);
			$data['supplier'] = $this->m_dataload->supplier_produk($id);

			$this->template->load('template_page','page/v_order', $data);
		}else{  
			redirect('page','refresh');
		}
	}



	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/*
	*  @cart 
	*/
	function add_to_cart(){ //fungsi Add To Cart
        $item = array(
            'id' => $this->input->post('produk_id'), 
            'name' => $this->input->post('produk_nama'), 
            'price' => $this->input->post('produk_harga'), 
            'qty' => $this->input->post('quantity'), 
        );
        $this->cart->insert($item);
        if(!$this->session->has_userdata('cart')) {
            $cart = array($item);
            $this->session->set_userdata('cart', serialize($cart));
        } else {
            $index = $this->exists($id);
            $cart = array_values(unserialize($this->session->userdata('cart')));
            if($index == -1) {
                array_push($cart, $item);
                $this->session->set_userdata('cart', serialize($cart));
            } else {
                $cart[$index]['quantity']++;
                $this->session->set_userdata('cart', serialize($cart));
            }
        }

        echo $this->show_cart(); //tampilkan cart setelah added
    }
 
    function show_cart(){ //Fungsi untuk menampilkan Cart
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .='
                <tr>
                    <td>'.$items['name'].'</td>
                    <td>'.number_format($items['price']).'</td>
                    <td>'.$items['qty'].'</td>
                    <td>'.number_format($items['subtotal']).'</td>
                    <td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                </tr>
            ';
        }
        $output .= '
            <tr>
                <th colspan="3">Total</th>
                <th colspan="2">'.'Rp '.number_format($this->cart->total()).'</th>
            </tr>
        ';
        return $output;
    }
 
    function load_cart(){ //load data cart
        echo $this->show_cart();
    }
 
    function hapus_cart(){ //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }
}
