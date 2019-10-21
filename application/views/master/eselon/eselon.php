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
<h3 class="header smaller lighter blue">Master Eselon <a class="btn btn-xs btn-primary" href="<?= base_url('master/eselon/add') ?>">+ Eselon</a></h3>	
<?= $this->session->flashdata('msg') ?>
<div class="alert alert-info">
	<button class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>
	Untuk informasi nominal <b>uang saku</b> eselon mengacu pada <b>Standar Biaya</b>.<br>
	Nominal ini dipakai sebagai perhitungan uang saku perjalanan <b>dinas luar daerah</b>
</div>
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															#
														</th>
														<th>Eselon</th>
														<th>Uang Saku / OH</th>
														<th>TH</th>
														<th></th>
													</tr>
												</thead>

												<tbody>
													<?php foreach ($eselon as $ese) { ?>
															<tr>
																<td class="center"><?= $ese['id_eselon'] ?></td>
																<td><?= $ese['eselon'] ?></td>
																<td style="text-align: right;">Rp. <span style="font-weight: bolder;"><?=number_format($ese['rp_oh'],0,',','.') ?></span></td>
																<td style="text-align: center;"><?= $ese['tahun'] ?></td>
																<td>
																	<div class="hidden-sm hidden-xs action-buttons">
																		<a class="blue" href="<?= base_url('master/eselon/eselon') ?>/<?= $ese['id_eselon'] ?>">
																			<i class="ace-icon fa fa-search-plus bigger-130"></i>
																		</a>

																		<a class="green" href="<?= base_url('master/eselon/edit') ?>/<?= $ese['id_eselon'] ?>">
																			<i class="ace-icon fa fa-pencil bigger-130"></i>
																		</a>

																		<a class="red" onclick="deleteConfirm('<?php echo site_url('master/delete_eselon/'.  $ese['id_eselon']) ?>')" href="#!">
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
																					<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																						<span class="blue">
																							<i class="ace-icon fa fa-search-plus bigger-120"></i>
																						</span>
																					</a>
																				</li>

																				<li>
																					<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																						<span class="green">
																							<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																						</span>
																					</a>
																				</li>

																				<li>
																					<a onclick="deleteConfirm('<?php echo site_url('master/delete/'.  $ese['id_eselon']) ?>')" href="#!" class="tooltip-error" data-rel="tooltip" title="Delete" >
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



