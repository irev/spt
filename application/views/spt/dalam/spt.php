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
<h3 class="header smaller lighter blue">SPT Dalam Daerah <a class="btn btn-xs btn-primary" href="<?= base_url('spt/dalam/add') ?>">+ SPT DALAM</a></h3>	
<!--?= $this->session->flashdata('msg') ?-->

<div class="table-responsive">
<table id="dynamic-table" class="table table-striped table-bordered table-hover ">
												<thead>
													<tr>
														<th class="center">No</th>
														
														<th>Nomor</th>
														<th>Tanggal</th>
														<th class="hidden-480">Perintah Dari</th>
														<th width="20%">Maksud Melaksanakan Tugas</th>
														<th>Kepada (MEMERINTAHKAN)</th>
														<th class="hidden-480">Tujuan</th>
														<th>Berangkat & Kembali</th>
														<th>Transportasi</th>
														<th class="center">
															#ID
														</th>
														
														<th>#</th>
													</tr>
												</thead>

												<tbody>
													<?php $no=1; foreach ($spt_dalam as $trans) { ?>
															<tr>
																<td class="center"><?= $no ?></td>
																<td class="hidden-480"><?= $trans['no_spt'] ?></td>
																<td><?= LONGE_DATE_INDONESIA($trans['ttd_tgl']) ?></td>
																<td class="hidden-480"><?= '<b>'.$trans['ttd_nama'].'</b><br>'.$trans['ttd_jabatan'].'<br>'.$trans['ttd_nip'] ?></td>
																<td><?= $trans['maksud'] ?></td>
																<td><?= '<b>'.$trans['nama'].'</b><br>'.$trans['jabatan'].'<br>'.$trans['nip'] ?></td>
																<td class="hidden-480"><?= $trans['tujuan'] ?></td>
																<td><?= LONGE_DATE_INDONESIA($trans['tgl_berangkat']).'<br>'.LONGE_DATE_INDONESIA($trans['tgl_kembali']) ?></td>
																<td><?= $trans['transportasi'] ?></td>
																<td class="center"><?= $trans['id_spt'] ?></td>
																
																<td>
																	<div class="hidden-md hidden-lg hidden-xs action-buttons">
																		<a class="blue" href="<?= base_url('spt/print_dalam') ?>/<?= $trans['id_spt'] ?>" title="Rincian">
																			<i class="ace-icon fa fa-search-plus bigger-130"></i>
																		</a>

																		<a class="blue" href="<?= base_url('spt/print_dalam') ?>/<?= $trans['id_spt'] ?>" title="Cetak">
																			<i class="ace-icon fa fa-print bigger-130"></i>
																		</a>

																		<a class="blue" href="<?= base_url('spt/laporan') ?>/<?= $trans['id_spt'] ?>" title="Laporan SPPD">
																			<i class="ace-icon fa fa-file bigger-130"></i>
																		</a>

																		<a class="green" href="<?= base_url('spt/dalam/edit') ?>/<?= $trans['id_spt'] ?>?p=2" title="Ubah">
																			<i class="ace-icon fa fa-pencil bigger-130"></i>
																		</a>

																		<a class="red" onclick="deleteConfirm('<?php echo site_url('spt/delete_spt_dalam/'.  $trans['id_spt']) ?>')" href="#!">
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
																					<a class="blue" href="<?= base_url('spt/dalam/detail-spt-sppd') ?>/<?= $trans['id_spt'] ?>" title="Rincian">
																						<i class="ace-icon fa fa-search-plus bigger-130"></i>
																					</a>
																				</li>	

																				<li>
																					<a class="blue" href="<?= base_url('spt/prints') ?>/<?= $trans['id_spt'] ?>" title="Cetak">
																						<i class="ace-icon fa fa-print bigger-130"></i>
																					</a>
																				</li>	

																				<li>
																					<a class="blue" href="<?= base_url('spt/laporan') ?>/<?= $trans['id_spt'] ?>" title="Laporan SPPD">
																						<i class="ace-icon fa fa-file bigger-130"></i>
																					</a>
																				</li>	

																				<li>
																					<a class="green" href="<?= base_url('spt/dalam/edit') ?>/<?= $trans['id_spt'] ?>?p=2" title="Ubah">
																						<i class="ace-icon fa fa-pencil bigger-130"></i>
																					</a>
																				</li>	

																				<li>
																					<a class="red" onclick="deleteConfirm('<?php echo site_url('spt/delete_spt_dalam/'.  $trans['id_spt']) ?>')" href="#!">
																						<i class="ace-icon fa fa-trash-o bigger-130"></i>
																					</a>
																				</li>	
																			</ul>
																		</div>
																	</div>
																</td>
																
															</tr>
													<?php $no++; } ?>	
													
												</tbody>
											</table>
</div>											

</div>
</div>
<!--?=  $this->input->get('p')  ?><br -->
<!-- ?= $uniqueId = uniqid(rand(), TRUE); ? -->

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



