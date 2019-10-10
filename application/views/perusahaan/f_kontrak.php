<div class="row">
	
<form class="form-horizontal" role="form" action="act_kontrak" method="post">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> JUDUL KONTRAK </label>

										<div class="col-sm-9">
											<select class="form-control" id="form-field-select-1" name="judul">
																<option value=""></option>
																<option value="KONTRAK">KONTRAK</option>
																<option value="KONTRAK ADD I">KONTRAK ADD I</option>
																<option value="KONTRAK ADD II">KONTRAK ADD II</option>
																<option value="KONTRAK ADD III">KONTRAK ADD III</option>
																<option value="KONTRAK ADD IV">KONTRAK ADD IV</option>
																<option value="KONTRAK ADD V">KONTRAK ADD V</option>
															</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">NOMOR KONTRAK </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="NOMOR KONTRAK" class="col-xs-10 col-sm-5" name="nomor">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">NILAI KONTRAK (Rp)</label>

										<div class="col-sm-9">
											<input type="number" id="form-field-1" placeholder="NILAI KONTRAK 100000000" class="col-xs-10 col-sm-5" name="nilai">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">TANGGAL KONTRAK</label>

										<div class="col-sm-9">
											<input type="date" id="form-field-1" placeholder="tgl kontrak" class="col-xs-10 col-sm-5" name="tgl_awal">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">TANGGAL BERAKHIR KONTRAK</label>

										<div class="col-sm-9">
											<input type="date" id="form-field-1" placeholder="tgl akhir" class="col-xs-10 col-sm-5" name="tgl_akhir">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">JUMLAH HARI</label>

										<div class="col-sm-3">
											<input type="number" id="form-field-1" placeholder="Hari Kalender" class="col-xs-10 col-sm-5" name="hari">
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">Hari Kalender</span>
											</span>
										</div>
										
									</div>

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



