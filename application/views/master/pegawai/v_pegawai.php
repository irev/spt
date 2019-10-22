<script type="text/javascript">		
			let deleteConfirm = function (url){
				console.log(url);
				$('#btn-delete').attr('href', url);
				$('#deleteModal').modal();
			}
</script>
<?php 


 ?>
<div class="col-md-12 col-xs-6">	
	</div>
<div class="row">
<div class="col-xs-12">
<h3 class="header smaller lighter blue">DATA PEGAWAI <a class="btn btn-xs btn-primary" href="<?= base_url('master/pegawai/add') ?>">+ Pegawai</a></h3>	
<?= $this->session->flashdata('msg') ?>
<div class="alert alert-info">
	<button class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>
	Master Pegawai berisi data pegawai yang aktif pada lingkungan instansi. <br>Setiap data pegawai harus diisi lengkap, terutama data <b>pangkat/golongan</b> dan <b>eselon</b> yang akan terkait dengan perhitungan <i>uang harian</i> perjalanan dinas.
</div>
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															#
														</th>
														<th>Nama</th>
														<th>Nip</th>
														<th>Pangkat / Golongan </th>
														<th>Eselon </th>
														<th class="hidden-480">Jabatan</th>

														<th>
															<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
															Tahun
														</th>
														<!--th class="hidden-480">Status</th-->

														<th></th>
													</tr>
												</thead>

												<tbody>
													<?php foreach ($pegawai as $peg) { ?>
															<tr>
																<td class="center"><?= $peg['id_peg'] ?></td>
																<td><?= $peg['nama'] ?></td>
																<td><?= $peg['nip'] ?></td>
																<td><?= ($peg['golongan']==null)? lengkapiData($peg['id_peg']) : $peg['golongan']?></td>
																<td><?= ($peg['eselon']==null)? lengkapiData($peg['id_peg']) : $peg['eselon']?></td>
																<td><?= $peg['jabatan'] ?></td>
																<td class="center"><?= $peg['tahun'] ?></td>
																<!--td><?= $peg['tahun'] ?></td-->
																<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="blue" href="<?= base_url('master/pegawai/pegawai') ?>/<?= $peg['id_peg'] ?>">
																	<i class="ace-icon fa fa-search-plus bigger-130"></i>
																</a>

																<a class="green" href="<?= base_url('master/pegawai/edit') ?>/<?= $peg['id_peg'] ?>">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="red" onclick="deleteConfirm('<?php echo site_url('master/delete_pegawai/'. $peg['id_peg']) ?>')" href="#!">
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
																			<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete" onclick="deleteConfirm('<?php echo site_url('master/delete_pegawai/'. $peg['id_peg']) ?>')" href="#!">
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
