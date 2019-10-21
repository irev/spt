<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
?>
<script type="text/javascript">		
			let deleteConfirm = function (url){
				console.log(url);
				$('#btn-delete').attr('href', url);
				$('#deleteModal').modal();
			}
</script>	
 <div class="col-md-12 col-xs-6">

	</div>
<div class="row">
<div class="col-xs-12">
<h3 class="header smaller lighter blue">Master Transportasi <a class="btn btn-xs btn-primary" href="<?= base_url('master/transportasi/add') ?>">+ Transportasi</a></h3>	
<?= $this->session->flashdata('msg') ?>

<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															#
														</th>
														<th>Transportasi</th>
														<th>Nomor Polisi</th>
														<th>Jenis</th>
														<th>Roda</th>
														<!--th>CC</th-->
														<th>Perjalanan</th>
														<!--th>Wil I</th>
														<th>Wil II</th>
														<th>Wil III</th>
														<th>Wil IV</th-->
														<th>Wil I<br/> (liter)</th>
														<th>Wil II<br/> (liter)</th>
														<th>Wil III<br/> (liter)</th>
														<th>Luar<br/>(liter)</th>
														<th></th>
													</tr>
												</thead>

												<tbody>
													<?php foreach ($transportasi as $trans) { ?>
															<tr>
																<td class="center"><?= $trans['id_tran'] ?></td>
																<td><?= $trans['nama'] ?></td>
																<td><?= $trans['nomor'] ?></td>
																<td><?= $trans['jenis'] ?></td>
																<td><?= $trans['roda'] ?></td>
																<!--td><?= $trans['cc'] ?></td-->
																<td><?= $trans['perjalanan'] ?></td>
																<!--td><?= $trans['wil1'] ?></td>
																<td><?= $trans['wil2'] ?></td>
																<td><?= $trans['wil3'] ?></td>
																<td><?= $trans['wil4'] ?></td-->
																<td><?= $trans['liter1'] ?></td>
																<td><?= $trans['liter2'] ?></td>
																<td><?= $trans['liter3'] ?></td>
																<td><?= $trans['bbm_luar'] ?></td>
																<td>
																	<div class="hidden-sm hidden-xs action-buttons">
																		<a class="blue" href="<?= base_url('master/transportasi/transportasi') ?>/<?= $trans['id_tran'] ?>">
																			<i class="ace-icon fa fa-search-plus bigger-130"></i>
																		</a>

																		<a class="green" href="<?= base_url('master/transportasi/edit') ?>/<?= $trans['id_tran'] ?>">
																			<i class="ace-icon fa fa-pencil bigger-130"></i>
																		</a>

																		<a class="red" onclick="deleteConfirm('<?php echo site_url('master/delete_trans/'.  $trans['id_tran']) ?>')" href="#!">
																			<i class="ace-icon fa fa-trash-o bigger-130"></i>
																		</a>
																		
																	</div>

																	<div class="hidden-md hidden-lg">
																		<div class="inline pos-rel">
																			<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																				<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																			</button>

																			<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																				<li>
																					<a href="<?= base_url('master/transportasi/transportasi') ?>/<?= $trans['id_tran'] ?>" class="tooltip-info" data-rel="tooltip" title="View">
																						<span class="blue">
																							<i class="ace-icon fa fa-search-plus bigger-120"></i>
																						</span>
																					</a>
																				</li>

																				<li>
																					<a href="<?= base_url('master/transportasi/edit') ?>/<?= $trans['id_tran'] ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																						<span class="green">
																							<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																						</span>
																					</a>
																				</li>

																				<li>
																					<a onclick="deleteConfirm('<?php echo site_url('master/delete_trans/'.  $trans['id_tran']) ?>')" href="#!" class="tooltip-error" data-rel="tooltip" title="Delete" >
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
													<?php } ?>	
													
												</tbody>
											</table>

</div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>



