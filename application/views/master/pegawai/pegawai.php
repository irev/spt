
<h3 class="header smaller lighter blue">
										Profile Pegawai
										<small>Infomasi Detail Pegawai</small>
									</h3>
									
<table class="table able-striped table-bordereds">
	<tbody>
		<tr>
			<th width= "20%">Nama</th>
			<td width= "1%">:</td>
			<td style="font-weight: bolder;"><?= $pegawai->nama ?></td>
		</tr>
		<tr>
			<th width= "20%">Nip</th>
			<td width= "1%">:</td>
			<td><?= $pegawai->nip ?></td>
		</tr>
		<tr>
			<th width= "20%">Jabatan</th>
			<td width= "1%">:</td>
			<td><?= $pegawai->jabatan ?></td>
		</tr>
		<tr>
			<th width= "20%">Golongan</th>
			<td width= "1%">:</td>
			<td><?= $pegawai->golongan ?></td>
		</tr>
		<tr>
			<th width= "20%">Eselon</th>
			<td width= "1%">:</td>
			<td><?= $pegawai->eselon ?></td>
		</tr>
		<tr>
			<th width= "20%">Tahun</th>
			<td width= "1%">:</td>
			<td><?= $pegawai->tahun ?></td>
		</tr>
	</tbody>
</table>									


<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<a class="btn btn-default" type="button" href="<?= base_url('master/pegawai') ?>">
												<i class="ace-icon fa fa-angle-double-left"></i>
												Kembali
											</a>

											&nbsp; &nbsp; &nbsp;
											<a class="btn btn-warning" type="button" href="<?= base_url('master/pegawai/edit') ?>/<?= $pegawai->id_peg ?>">
												<i class="ace-icon fa fa-pencil bigger-110"></i>
												ubah
											</a>
											&nbsp; &nbsp; &nbsp;
											<a class="btn btn-danger" type="button" href="<?= base_url('master/pegawai/edit') ?>/<?= $pegawai->id_peg ?>">
												<i class="ace-icon fa fa-times bigger-110"></i>
												Batal
											</a>
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