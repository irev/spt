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
<h3 class="header smaller lighter blue">SPT Luar Daerah <a class="btn btn-xs btn-primary" href="<?= base_url('spt/luar/add')."/".uniqid() ?>">+ SPT LUAR</a></h3>	
<!--?= $this->session->flashdata('msg') ?-->

<div class="table-responsive">
<table id="dynamic-table" class="table table-striped table-bordered table-hover ">
												<thead>
													<tr>
														<th class="center">No</th>
														
														<th>Nomor</th>

														<th class="hidden-480">Perintah</th>
														<th width="15%">Maksud<br>Melaksanakan<br>Tugas</th>
														<th>Kepada</th>
														<th class="hidden-480">Tujuan</th>
														<th>Berangkat & Kembali</th>
														<th>Transportasi</th>
														<!--th class="center">
															#ID
														</th-->
														
														<th>#</th>
													</tr>
												</thead>

												<tbody>
													<?php $no=1; foreach ($spt_dalam as $getspt) { ?>
														<?php if($getspt["perjalanan"]==="luar"): ?>
															<tr>
																<td class="center"><?= $no ?></td>
																<td class="hidden-480"><?= $getspt['no_spt'] ?><br><?= LONGE_DATE_INDONESIA($getspt['ttd_tgl']) ?></td>
																
																<td class="hidden-480"><?= '<b>'.$getspt['ttd_nama'].'</b><br>'.$getspt['ttd_jabatan'].'<br>'.$getspt['ttd_nip'] ?></td>
																<td><?= $out = strlen($getspt['maksud']) > 50 ? substr($getspt['maksud'],0,50)."..." : $getspt['maksud']; ?></td>
																<td><?= '<b>'.$getspt['nama'].'</b><br>'.$getspt['jabatan'].'<br>'.$getspt['nip'] ?></td>
																<td class="hidden-480"><?= $getspt['tujuan'] ?></td>
																<td><?= LONGE_DATE_INDONESIA($getspt['tgl_berangkat']).'<br>'.LONGE_DATE_INDONESIA($getspt['tgl_kembali']) ?></td>
																<td><?= $getspt['transportasi'] ?></td>
																<!--td class="center"><?= $getspt['id_spt'] ?></td-->
																
																<td>
																	<div class="hidden-md hidden-lg hidden-xs action-buttons">
																		<a class="blue" href="<?= base_url('spt/print_dalam') ?>/<?= $getspt['id_spt'] ?>" title="Rincian">
																			<i class="ace-icon fa fa-search-plus bigger-130"></i>
																		</a>

																		<a class="blue" href="<?= base_url('spt/print_dalam') ?>/<?= $getspt['id_spt'] ?>" title="Cetak">
																			<i class="ace-icon fa fa-print bigger-130"></i>
																		</a>

																		<a class="blue" href="<?= base_url('spt/laporan') ?>/<?= $getspt['id_spt'] ?>" title="Laporan SPPD">
																			<i class="ace-icon fa fa-file bigger-130"></i>
																		</a>

																		<a class="green" href="<?= base_url('spt/luar/edit') ?>/<?= $getspt['id_spt'] ?>?p=2" title="Ubah">
																			<i class="ace-icon fa fa-pencil bigger-130"></i>
																		</a>

																		<a class="red" onclick="deleteConfirm('<?php echo site_url('spt/delete_spt_luar/'.  $getspt['id_spt']) ?>')" href="#!">
																			<i class="ace-icon fa fa-trash-o bigger-130"></i>
																		</a>
																		
																	</div>

																	<div class="hidden-mdxx hidden-md">
																		<div class="inline pos-rel">
																			<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																				<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																			</button>

																			<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																				<li>
																					<a class="blue" href="<?= base_url('spt/luar/detail-spt-sppd') ?>/<?= $getspt['id_spt'] ?>" title="Rincian">
																						<i class="ace-icon fa fa-search-plus bigger-130"></i>
																					</a>
																				</li>	

																				<li>
																					<a class="blue" href="<?= base_url('spt/prints') ?>/<?= $getspt['id_spt'] ?>" title="Cetak">
																						<i class="ace-icon fa fa-print bigger-130"></i>
																					</a>
																				</li>	

																				<li>
																					<a class="blue" href="<?= base_url('spt/laporan') ?>/<?= $getspt['id_spt'] ?>" title="Laporan SPPD">
																						<i class="ace-icon fa fa-file bigger-130"></i>
																					</a>
																				</li>	

																				<li>
																					<a class="green" href="<?= base_url('spt/luar/edit') ?>/<?= $getspt['id_spt'] ?>?p=2" title="Ubah">
																						<i class="ace-icon fa fa-pencil bigger-130"></i>
																					</a>
																				</li>	

																				<li>
																					<a class="red" onclick="deleteConfirm('<?php echo site_url('spt/delete_spt_luar/'.  $getspt['id_spt']) ?>')" href="#!">
																						<i class="ace-icon fa fa-trash-o bigger-130"></i>
																					</a>
																				</li>	
																			</ul>
																		</div>
																	</div>
																</td>
																
															</tr>
														<?php endif ?>	
													<?php $no++; } ?>	
													
												</tbody>
											</table>
</div>											

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



