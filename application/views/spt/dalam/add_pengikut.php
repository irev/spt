

<h3 class="header smaller lighter blue"><i class="fa fa-users"></i> 11. PENGIKUT</h3>
<?= 
$this->session->set_flashdata('msg','dfgfdgdfg');
$this->session->flashdata('msg') 

?>

<script type="text/javascript">		
			let deleteConfirm = function (url){
				console.log(url);
				$('#btn-delete').attr('href', url);
				$('#deleteModal').modal();
			}
</script>	

									<div class="row">
										<div class="col-xs-12 col-md-12 ">
											<a class="btn btn-xs btn-default" type="button" href="javascript:history.back()">
												<i class="ace-icon fa fa-angle-double-left"></i>
												Kembali
											</a>
											<a id="add_prngikut" class="btn btn-xs btn-warning" style="float: right;"> <i class="fa fa-users" > </i> + PENGIKUT </a>
											<?php 
												echo count($spt_pengikut)." Orang Pengikut";		
											 ?>
										<table class="table table-">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama</th>
													<th>Nip</th>
													<th>Pangkat/Gol</th>
													<th>Jabatan</th>
													<th>#</th>
												</tr>
											</thead>
											<tbody>
												<?php 

												$this->m_dalam->spt_pengikut($ID);
												
												$link ="";
												if(count($spt_pengikut) > 0){
												$no =1;
												
													foreach ($spt_pengikut as $peng) {
												?>		
														 <tr>
														 <td><?= $no ?></td>
														 <td><?= $peng['nama_pengikut'] ?></td>
														 <td><?= $peng['nip_pengikut'] ?></td>
														 <td><?= $peng['gol_pengikut'] ?></td>
														 <td><?= $peng['jabatan_pengikut'] ?></td>
														
														 <td><a class="btn btn-xs btn-danger" onclick="deleteConfirm('<?= site_url('spt/delete_spt_dalam_pengikut/'.$peng['id_peng'].'/'.$peng['spt_id'].'?p=2') ?>')" ><i class="fa fa-minus"></i></a></td>
														 </tr>
												<?php		 
														$no++; 
													}
												}else{
													echo'<tr>
														<td>-</td>
														<td style="text-align: left;">-</td>
														<td>-</td>
														<td>-</td>
														<td>-</td>
														<td>-</td>
														</tr>';
												}
												?>
												
													<tr>
														<td>
															<a href="#" class="btn_show_input btn btn-xs btn-primary" $display data-id="pilih_pegawai">Pilih Pegawai ▶</a>	
															<select style="display:none;" id="pilih_pegawai" placeholder="pilih_pegawai" class="col-xs-12 col-sm-12 <?= $hide_input ?>" name="pilih_pegawai" required>
																<option value=""></option>
																<?php foreach ($pegawai as $peg) {
																	echo '<option value="'.$peg['id_peg'].'">'.$peg['nama'].' ▶ '.$peg['nip'].' ▶ '.$peg['jabatan'].' ▶ '.$peg['golongan'].'</option>';
																} ?>
																
															</select>
														</td>
														<td style="text-align: left;">
															<input type="text" id="nama"  name="nama" class="col-md-12">
														</td>
														<td >
															<input type="text" id="nip" name="nip" class="col-md-12">
														</td>
														<td>
															<input type="text" id="pangkat" name="pangkat" class="col-md-12">
														</td>
														<td>
															<input type="text" id="jabatan" name="jabatan" class="col-md-12">
														</td>
														<td>
															<a id="tambah-pengikut" data-id="" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i></a>
														</td>
													</tr>
											</tbody>
										</table>

									<div class="form-group">
										<!--label class="col-sm-2control-label no-padding-right" for="pilih_pegawai"> Pilih Pegawai*</label-->

										<!--div class="col-sm-12">
											<a href="#" class="btn_show_input btn btn-xs btn-primary" $display data-id="pilih_pegawai">Pilih Pegawai ▶</a>	
											<select style="display:none;" id="pilih_pegawai" placeholder="pilih_pegawai" class="col-xs-12 col-sm-5 <?= $hide_input ?>" name="pilih_pegawai">
												<option value=""></option>
												<?php foreach ($pegawai as $peg) {
													echo '<option value="'.$peg['id_peg'].'">'.$peg['nama'].' ▶ '.$peg['nip'].' ▶ '.$peg['jabatan'].' ▶ '.$peg['golongan'].'</option>';
												} ?>
												
											</select>				

										</div-->
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

