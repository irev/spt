<?php  
//print_r($produk);
?>
<?php foreach ( $produk as $prod){
	$IDPRO		= $prod->id_produk;
	$PRODUK     = $prod->title;
	$SATUAN     = $prod->satuan;
	$JENIS      = $prod->jenis;
	$KELAS      = $prod->kelas;
	$KETERANGAN = $prod->ket;
	$ID_SUP     = $prod->Id_supplier; 
	$SUPPLIER   = $prod->nama;
	$ALAMAT     = $prod->alamat;
	$KOTA       = $prod->kota;
	$up_date_p  = $prod->up_date_p;
	$HARGA  	= $prod->harga;
}
//$supplier = $this->m_dataload->supplier_produk($ID_SUP);
//print_r($supplier);
//foreach ($supplier as $sup) {
//	$SUPPLIER = $sup->nama;
//}
?>
<div class="widget-box ui-sortable-handle" id="widget-box-1">
												<div class="widget-header">
													<h5 class="widget-title">  <?= $PRODUK ?> </h5>

													<div class="widget-toolbar">
														<div class="widget-menu">
															<a href="#" data-action="settings" data-toggle="dropdown">
																<i class="ace-icon fa fa-bars"></i>
															</a>

															<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
																<li>
																	<a data-toggle="tab" href="#dropdown1">Option#1</a>
																</li>

																<li>
																	<a data-toggle="tab" href="#dropdown2">Option#2</a>
																</li>
															</ul>
														</div>

														<a href="#" data-action="fullscreen" class="orange2">
															<i class="ace-icon fa fa-expand"></i>
														</a>

														<a href="#" data-action="reload">
															<i class="ace-icon fa fa-refresh"></i>
														</a>

														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>

														<a href="#" data-action="close">
															<i class="ace-icon fa fa-times"></i>
														</a>
													</div>
												</div>

												<div class="widget-body">
													<div class="widget-main">

<dl id="dt-list-1" class="dl-horizontal">
																<dt>Satuan</dt>
																	<dd><?= $SATUAN ?></dd>
																<dt>Kelas</dt>
																	<dd><?= $KELAS ?></dd>
																<dt>Deskripsi</dt>
																	<dd><?= TextSingkat($KETERANGAN,0,790) ?>.</dd>
																	<dd><i class="glyphicon glyphicon-time"></i> <?= $up_date_p ?>.</dd>
																	
																<div class="hr hr-18 dotted hr-double"></div>
																	<dt>Supplier</dt>
																	<dd><?= $SUPPLIER ?>.</dd>
																	<dt>Alamat</dt>
																	<dd><?= '<a>'.$KOTA.'</a> '.$ALAMAT ?>.</dd>
																<div class="hr hr-18 dotted hr-double"></div>
																	<dt>Harga</dt>
																	<dd><form action="<?= base_url()?>/order/<?= $IDPRO ?>">
																		<?= '<a>'.number_format($HARGA,0,'','.').'</a>' ?>
																		X 
																		<input type="number" min="1" name="jumlah_order" id="jumlah_order" required> <?= $SATUAN ?> = 
																		<input type="number" name="hasil_order" id="hasil_order" readonly="" required> 
																		<button type="submit">Pesan</button>
																	</form>
																	</dd>
																<button class="btn btn-primary pull-right">Chack Out</button>
																	
																<div class="hr hr-18 dotted hr-double"></div>

															</dl>

<br>
														<p class="alert alert-info">
															<button type="button" class="close" data-dismiss="alert">
																<i class="ace-icon fa fa-times"></i>
															</button>
															Nunc aliquam enim ut arcu aliquet adipiscing. Fusce dignissim volutpat justo non consectetur. Nulla fringilla eleifend consectetur.
														</p>
														<p class="alert alert-success">
															<button type="button" class="close" data-dismiss="alert">
																<i class="ace-icon fa fa-times"></i>
															</button>
															Raw denim you probably haven't heard of them jean shorts Austin.
														</p>
													</div>
												</div>
											</div>



<h2>Shopping Cart Dengan Ajax dan Codeigniter</h2>
    <hr/>
    <div class="row">
        <div class="col-md-8">
            <h4>Produk</h4>
            <div class="row">
            <?php foreach ($data as $row) : ?>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img width="200" src="<?php echo base_url().'assets/images/'.$row->produk_image;?>">
                        <div class="caption">
                            <h4><?php echo $row->produk_nama;?></h4>
                            <div class="row">
                                <div class="col-md-7">
                                    <h4><?php echo 'Rp '.number_format($row->produk_harga);?></h4>
                                </div>
                                <div class="col-md-5">
                                    <input type="number" name="quantity" id="<?php echo $row->produk_id;?>" value="1" class="quantity form-control">
                                </div>
                            </div>
                            <button class="add_cart btn btn-success btn-block" data-produkid="<?php echo $row->produk_id;?>" data-produknama="<?php echo $row->produk_nama;?>" data-produkharga="<?php echo $row->produk_harga;?>">Add To Cart</button>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
                 
            </div>
 
        </div>
        <div class="col-md-4">
            <h4>Shopping Cart</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="detail_cart">
 
                </tbody>
                 
            </table>
        </div>
    </div>





 
<?php foreach ($this->cart->contents() as $items): ?>
<?= print_r($items). '/      /'.$items['qty']; ?>
<?php endforeach ?>	


<?php echo form_open('page/order/5'); ?>

<table cellpadding="6" cellspacing="1" style="width:100%" border="0">

<tr>
        <th>QTY</th>
        <th>Item Description</th>
        <th style="text-align:right">Item Price</th>
        <th style="text-align:right">Sub-Total</th>
</tr>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

        <tr>
                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                <td>
                        <?php echo $items['name']; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                        <?php endforeach; ?>
                                </p>

                        <?php endif; ?>

                </td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
        <td colspan="2"> </td>
        <td class="right"><strong>Total</strong></td>
        <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>

</table>

<p><?php echo form_submit('', 'Update your Cart'); ?></p>
