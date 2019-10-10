<div class="col-xs-12 col-sm-3">
<div class="row">

													<div class="search-area well well-sm ">
														<div class="search-filter-header bg-primary">
															<h5 class="smaller no-margin-bottom">
																<i class="ace-icon fa fa-sliders light-green bigger-130"></i>&nbsp; Refine your Search
															</h5>
														</div>

														<div class="space-10"></div>

														<form>
															<div class="row">
																<div class="col-xs-12 col-sm-12 col-md-12">
																	<div class="input-group">
																		<input id="cari_produk" type="text" class="form-control" name="keywords" placeholder="Look within results">
																		<div class="input-group-btn">
																			<button type="button" class="btn btn-default no-border btn-sm">
																				<i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
																			</button>
																		</div>
																	</div>
																</div>
															</div>
														</form>
														<div class="hr hr-dotted"></div>
														
<h4 class="blue smaller">
	<i class="fa fa-tags"></i>
	Kategori
</h4>
<div class="tree-container ace-scroll">

<div id="filters" class="sections">
	
	<?php foreach ($KATEGORI as $kat): ?>
												<div class="checkbox">
													<label>
														<input  id="<?= $kat['kategoris'] ?>"  value="<?= $kat['kategoris'] ?>" name="colour" type="checkbox" class="ace">
														<span class="lbl"> <?= $kat['kategoris'] ?> </span>
													</label>
												</div>

    <?php endforeach ?>
  </div>
  <div>

  </div>    
 </div>
													<div class="hr hr-dotted hr-24"></div>

 														<div class="text-center">
															<button type="button" id="none" class="btn btn-default btn-round btn-sm btn-white">
																<i class="ace-icon fa fa-remove red2"></i>
																Reset
															</button>
														</div>
													
													<div class="hr hr-dotted hr-24"></div>
 														<div class="col-md-12">
												            <h4>ORDER</h4>
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
												        <div class="space-10"></div>
														<div class="hr hr-dotted hr-24"></div>
														<div class="hr hr-dotted hr-24"></div>
														
 														<div class="hr hr-dotted"></div>
														<br>
														<br>
														<br>
</div>
</div>
</div>



<div class="col-xs-12 col-sm-10  col-md-9">
<div class="row" id="my_produk">		

<?php 
//print_r($produk);
foreach ($produk as $pro): ?>


														<!--div class="col-xs-12 col-sm-6 col-md-4 kategori_<?= $pro['kategoris'] ?> grid-products"  data-colour="<?= $pro['kategoris'] ?>" data-produk-id="<?= $pro['id_produk'] ?>" style="cursor: pointer;" onclick="window.location.replace('<?= base_url()."page/produk/".$pro["id_produk"] ?>')" -->
														<div class="col-xs-12 col-sm-6 col-md-4 kategori_<?= $pro['kategoris'] ?> grid-products"  data-colour="<?= $pro['kategoris'] ?>" data-produk-id="<?= $pro['id_produk'] ?>" style="cursor: pointer;"  >
															<div class="thumbnail search-thumbnail">
																<span class="search-promotion label label-success arrowed-in arrowed-in-right">Sponsored</span>

																<!--img class="media-object" data-src="holder.js/100px150?theme=gray" alt="100%x200" src="<?= base_url('asset/theme/assets/images/exavator.jpg')?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;"-->
																<img class="media-object"  alt="100%x200" src="<?= base_url('asset/theme/assets/images/exavator.jpg')?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
																
																<div class="caption">
																	<div class="clearfix">
																		<span class="pull-right label label-grey info-label"><?= $pro['kota'] ?></span>

																		<div class="pull-left bigger-110">
																			<i class="ace-icon fa fa-star orange2"></i>

																			<i class="ace-icon fa fa-star orange2"></i>

																			<i class="ace-icon fa fa-star orange2"></i>

																			<i class="ace-icon fa fa-star-half-o orange2"></i>

																			<i class="ace-icon fa fa-star light-grey"></i>
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="hr hr-dotted hr-24"></div>
																	<h4 class="col-md-7">Rp <?= number_format($pro['harga'],0,'.',',') ?></h4>
																	<div class="col-md-5  pull-right">
									                                    <input type="number" name="quantity" id="<?= $pro['id_produk'] ?>" value="1" class="quantity form-control">
									                                </div>
									                                </div>	
									                                <div class="hr hr-dotted hr-24"></div>

																	<h3 class="search-title col-md-12">
																		<a href="#" class="blue"><?= TextSingkat($pro['title'],0,25) ?></a>
																	</h3>
																	<p> <?= TextSingkat($pro['ket'],0,40, 'page/produk/'.$pro['id_produk']) ?></p>
																	<p>Supplier : <?= $pro['nama'] ?></p>
																</div>
																<button class="add_cart btn btn-success btn-block" data-produkid="<?= $pro['id_produk'] ?>" data-produknama="<?= $pro['nama'] ?>" data-produkharga="<?= $pro['harga'] ?>">P E S A N</button>
															</div>
														</div>
<?php endforeach ?>
														<!--div class="col-xs-6 col-sm-4 col-md-3">
															<div class="thumbnail search-thumbnail">
																<img class="media-object" data-src="holder.js/100px200?theme=gray" alt="100%x200" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22180%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20180%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16cb53c5fd2%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16cb53c5fd2%22%3E%3Crect%20width%3D%22180%22%20height%3D%22200%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2264.046875%22%20y%3D%22104.5%22%3E180x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
																<div class="caption">
																	<div class="clearfix">
																		<span class="pull-right label label-grey info-label">Tokyo</span>
																	</div>

																	<h3 class="search-title">
																		<a href="#" class="blue">Thumbnail label</a>
																	</h3>
																	<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam ...</p>
																</div>
															</div>
														</div>

														<div class="col-xs-6 col-sm-4 col-md-3">
															<div class="thumbnail search-thumbnail">
																<img class="media-object" data-src="holder.js/100px200?theme=gray" alt="100%x200" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22180%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20180%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16cb53c5fd6%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16cb53c5fd6%22%3E%3Crect%20width%3D%22180%22%20height%3D%22200%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2264.046875%22%20y%3D%22104.5%22%3E180x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
																<div class="caption">
																	<div class="clearfix">
																		<span class="pull-right label label-grey info-label">Istanbul</span>
																	</div>

																	<h3 class="search-title">
																		<a href="#" class="blue">Thumbnail label</a>
																	</h3>
																	<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam ...</p>
																</div>
															</div>
														</div>

														<div class="col-xs-6 col-sm-4 col-md-3">
															<div class="thumbnail search-thumbnail">
																<img class="media-object" data-src="holder.js/100px200?theme=social" alt="100%x200" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22180%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20180%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16cb53c5fdb%20text%20%7B%20fill%3A%23FFFFFF%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16cb53c5fdb%22%3E%3Crect%20width%3D%22180%22%20height%3D%22200%22%20fill%3D%22%233a5a97%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2264.046875%22%20y%3D%22104.5%22%3E180x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
																<div class="caption">
																	<div class="clearfix">
																		<span class="pull-right label label-grey info-label">Chicago</span>
																	</div>

																	<h3 class="search-title">
																		<a href="#" class="blue">Thumbnail label</a>
																	</h3>
																	<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam ...</p>
																</div>
															</div>
														</div-->
</div>
</div>