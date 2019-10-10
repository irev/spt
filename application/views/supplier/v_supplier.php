<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 //echo $contents;
?>

<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>
													<th class="center">
														<label class="pos-rel">
															<input type="checkbox" class="ace">
															<span class="lbl"></span>
														</label>
													</th>
													<th class="detail-col">Details</th>
													<th>Supplier</th>
													<th>Alamat</th>
													<th class="hidden-480">Kontak</th>

													<th>
														<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
														Update
													</th>
													<th class="hidden-480">Status</th>

													<th></th>
												</tr>
											</thead>

											<tbody>

	<?php foreach ($supplier as $sup) : ?>

												<tr>
													<td class="center">
														<label class="pos-rel">
															<input type="checkbox" class="ace">
															<span class="lbl"></span>
														</label>
													</td>

													<td class="center">
														<div class="action-buttons">
															<a href="#" class="green bigger-140 show-details-btn" title="Show Details">
																<i class="ace-icon fa fa-angle-double-down"></i>
																<span class="sr-only">Details</span>
															</a>
														</div>
													</td>

													<td>
														<a href="#"><?= $sup['nama'] ?></a>
													</td>
													<td><?= $sup['alamat'] ?></td>
													<td class="hidden-480"><?= $sup['pimpinan'] ?><br><a href="tel:<?= $sup['hp'] ?>">Tel: <?= $sup['hp'] ?></a></td>
													<td><?= $sup['nama'] ?></td>

													<td class="hidden-480">
														<span class="label label-sm label-warning"><?= $sup['nama'] ?></span>
													</td>

													<td>
														<div class="hidden-sm hidden-xs btn-group">
															<button class="btn btn-xs btn-success">
																<i class="ace-icon fa fa-check bigger-120"></i>
															</button>

															<button class="btn btn-xs btn-info">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															</button>

															<button class="btn btn-xs btn-danger">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</button>

															<button class="btn btn-xs btn-warning">
																<i class="ace-icon fa fa-flag bigger-120"></i>
															</button>
														</div>

														<div class="hidden-md hidden-lg">
															<div class="inline pos-rel">
																<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
																	<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
																</button>

																<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																	<li>
																		<a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																			<span class="blue">
																				<i class="ace-icon fa fa-search-plus bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																			<span class="red">
																				<i class="ace-icon fa fa-trash-o bigger-120"></i>
																			</span>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</td>
												</tr>

												<tr class="detail-row">
													<td colspan="8">
														<div class="table-detail">
															<div class="row">
																<?php $produk = $this->m_dataload->supplier_produks($sup['id_sup']); ?>
																		<?php foreach ($produk as $prod) : ?>
																<div class="col-xs-12 col-sm-4">
																	<div class="space visible-xs"></div>
																	
																	<div class="profile-user-info profile-user-info-striped">
																		
																		
																		<span class="search-promotion label label-success arrowed-in arrowed-in-right">Rp <?= number_format($prod['harga'],0,'. ',',') ?></span>
																		<div class="profile-info-row">
																			<div class="profile-info-name"></div>
																			<div class="profile-info-value">
																				<span><?= $prod['title'] ?></span>
																			</div>
																		</div>
																		
																		<div class="profile-info-row">
																			<div class="profile-info-name"> Location </div>

																			<div class="profile-info-value">
																				<i class="fa fa-map-marker light-orange bigger-110"></i>
																				<span>Netherlands, Amsterdam</span>
																			</div>
																		</div>

																		<div class="profile-info-row">
																			<div class="profile-info-name"> Kelas </div>

																			<div class="profile-info-value">
																				<span><b><?= $prod['kelas'] ?></b></span>
																			</div>
																		</div>

																		<div class="profile-info-row">
																			<div class="profile-info-name"> Joined </div>

																			<div class="profile-info-value">
																				<span>2010/06/20</span>
																			</div>
																		</div>

																		<div class="profile-info-row">
																			<div class="profile-info-name"> Last Online </div>

																			<div class="profile-info-value">
																				<span>3 hours ago</span>
																			</div>
																		</div>

																		<div class="profile-info-row">
																			<div class="profile-info-name">Harga</div>

																			<div class="profile-info-value">
																				<span><?= $prod['harga'] ?></span>
																			</div>
																		</div>
																
																	</div>
																</div>								
										<?php endforeach ?>										
																

																
															</div>
														</div>
													</td>
												</tr>
	<?php endforeach ?>

											</tbody>
										</table>

<!-- /////////////////////////////////////////////////////////////////////////////////////// -->
