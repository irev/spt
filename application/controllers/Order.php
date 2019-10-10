<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

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
			$this->template->load('template','order/data_order');
	}
	    function add_to_cart(){ //fungsi Add To Cart
        $data = array(
            'id' => $this->input->post('produk_id'), 
            'name' => $this->input->post('produk_nama'), 
            'price' => $this->input->post('produk_harga'), 
            'qty' => $this->input->post('quantity'), 
        );

        $this->cart->insert($data);
        echo '<form action="#" method="POST">
				<input type="text" name="produk_id">		
				<input type="text" name="produk_nama">		
				<input type="text" name="produk_harga">		
				<input type="number" name="quantity">		
				<input type="submit" name="add">		
				</form>

        ';
        echo '<br>'.$this->show_cart(); //tampilkan cart setelah added
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
                <th colspan="2">'.'Rp '.number_format($this->cart->total(),2,'.',',').'</th>
            </tr>
        ';
        return $output;
    }

	public function load_cart(){
		echo $this->show_cart();
	}
}
