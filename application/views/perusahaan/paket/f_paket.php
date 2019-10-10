<div class="row">
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Informasi!</strong><br/>
	jika Mendaftar sebagai Member pro <b>BISA MELEBIHI DARI 1 (satu) Paket Pekerjaan</b>	
	<br>
</div>	

<?php 


?>	
<form class="form-horizontal" role="form" action="act_paket" method="post">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">URUSAN </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="URUSAN" class="col-xs-10 col-sm-10" name="URUSAN">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">ORGANISASI </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="ORGANISASI" class="col-xs-10 col-sm-10" name="ORGANISASI">
										</div>
									</div>
								<div class="hr hr-dotted"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">PROGRAM </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="PROGRAM" class="col-xs-10 col-sm-10" name="PROGRAM">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">KEGIATAN </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="KEGIATAN" class="col-xs-10 col-sm-10" name="KEGIATAN">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">PEKERJAAN </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="PEKERJAAN" class="col-xs-10 col-sm-10" name="PEKERJAAN">
										</div>
									</div>
								<div class="hr hr-dotted"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">OBJECK BELANJA </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="OBJECK BELANJA" class="col-xs-10 col-sm-10" name="OBJECK_BELANJA">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">REKENING </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="REKENING" class="col-xs-10 col-sm-10" name="REKENING">
										</div>
									</div>
								<div class="hr hr-dotted"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">KODE DPA </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="KODE DPA/DPPA" class="col-xs-10 col-sm-10" name="KODE_DPA">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">TANGGAL DPA/DPPA </label>

										<div class="col-sm-9">
											<input type="date" id="form-field-1" placeholder="TANGGAL DPA/DPPA" class="col-xs-10 col-sm-10" name="TGL_DPA">
										</div>
									</div>
								<div class="hr hr-dotted"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">LOKASI </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="LOKASI" class="col-xs-10 col-sm-10" name="LOKASI">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">TAHUN </label>

										<div class="col-sm-3">
											<input type="number" max="2030" min="2019" id="form-field-1" placeholder="TAHUN" class="col-xs-10 col-sm-10" name="TAHUN">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">PAGU ANGGARAN </label>

										<div class="col-sm-9">
											<input type="number" id="form-field-1" placeholder="PAGU ANGGARAN" class="col-xs-10 col-sm-10" name="PAGU">
										</div>
									</div>
														
	<!--BATAS-->
									
								<div class="hr hr-dotted"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> ID PERUSAHAAN </label>
										<div class="col-sm-9">
											<input readonly type="Text" id="form-field-2" placeholder="ID_PERUSAHAAN" class="col-xs-10 col-sm-5" name="perusahaan_id" value="<?= $this->session->userdata('perusahaan')  ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> CLIENT ID </label>
										<div class="col-sm-9">
											<input readonly type="Text" id="form-field-2" placeholder="ID_CLIENT" class="col-xs-10 col-sm-5" name="client_id" value="<?= $this->session->userdata('idclient')  ?>">
										</div>
									</div>	



									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="button">
												<i class="ace-icon fa fa-check bigger-110"></i>
												SIMPAN
											</button>
<button class="btn" type="submit">proses</button>
											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>


								</form>






<!--DEV-->
 
username:  <?= $this->session->userdata('username'); ?><br/>
perusahaan:  <?= $this->session->userdata('perusahaan'); ?><br/>

</div>



