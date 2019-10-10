<div class="row">
<?php 
if(count($perusahaan) == 1){
/*
//print_r($paket);
foreach ($paket as $pek) {
	# code...
	$pekerjaan = $pek['kegiatan'];
}
*/
foreach ($perusahaan as $per) {
	# code...
	$nm_perusahaan = $per['perusahaan'];
}

 ?>
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">
	<i class="ace-icon fa fa-times"></i>
	</button>
	<strong>Informasi!</strong><br/>
	Data di bawah ini merupakan daftar kontrak pada Paket Pekerjaan  yang dikerjaakan oleh <b><?= $nm_perusahaan?></b>
	<br>
</div>

<p>DATA PAKET <a href="../inputpaket" class="btn  btn-sm">TAMBAH PAKET</a></p>

<?php 
	//print_r($kontrak);
?>
<table class="table table-striped table-bordered table-hover dataTable no-footer">
	<thead>
		<tr>
			<th>NO</th>
			<th>TAHUN</th>
			<th>PEKERJAAN</th>
			<th>PAGU</th>
			<th>DINAS</th>
			<th>LOKASI</th>
			<th></th>
		</tr>
	</thead>
	<?php 
	//echo $this->db->last_query();
	$no =1;
	foreach ($data_paket as $pak) {
		# code...
	 ?>
	<tr>
		<td><?= $no ?></td>
		<td><?= $pak['tahun'] ?></td>
		<td><?= $pak['pekerjaan'] ?></td>
		<td><?= $pak['pagu'] ?></td>
		<td><?= $pak['organisasi'] ?></td>
		<td><?= $pak['lokasi'] ?></td>

		<td>
			<a>Edit</a> | <a>Hapus</a>
		</td>	
	</tr>
<?php 
$no++; }	 
?>
</table>	
<?php 
}else{
	echo "<h3>No Data can be access!</h3>";
}
?>
<!--DEV-->

username:  <?= $this->session->userdata('username'); ?><br/>
perusahaan:  <?= $this->session->userdata('perusahaan'); ?><br/>
idclient : <?= $this->session->userdata('idclient');  ?><br/>
<?php 
echo print_r($this->session->all_userdata());

 ?>





</div>