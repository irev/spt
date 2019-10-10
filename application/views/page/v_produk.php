<?php  
//print_r($produk);
?>
<?php 
foreach ( $produk as $prod){
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
<div class="col-xs-12 col-sm-3">

</div>



<div class="col-xs-12 col-sm-9">
<div class="row">												
<div class="widget-box ui-sortable-handle" id="widget-box-1">
												<div class="widget-header">
													<h5 class="widget-title">
														<i class="fa fa-truck" aria-hidden="true"></i>   
														<?= $PRODUK ?> 
													</h5>

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
																	<dd>
																		<form action="<?= base_url()?>page/order/<?= $IDPRO ?>" method="post">
																		<?= '<a>'.number_format($HARGA,0,'','.').'</a>' ?>
																		X 
																		<input type="number" min="1" name="jumlah_order" id="jumlah_order" required> <?= $SATUAN ?> = 
																		<input type="number" name="hasil_order" id="hasil_order" readonly="" required> 
																		<button type="submit">Pesan</button>
																	</form>
																	</dd>
																
																	

															</dl>


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
</div>
</div>											