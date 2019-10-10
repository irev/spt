<div class="row">
<?php 
$pekerjaan="";
if(count($perusahaan) == 1){
//print_r($paket);
foreach ($paket as $pek) {
	# code...
	$pekerjaan = $pek['kegiatan'];
}

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
	Data di bawah ini merupakan daftar kontrak pada Paket Pekerjaan <b><?= $pekerjaan ?></b> yang dikerjaakan oleh <b><?= $nm_perusahaan?></b>
	<br>
</div>

<p>DATA KONTRAK <a href="../inputpaket" class="btn  btn-sm">TAMBAH KONTRAK</a></p>

<?php 
	//print_r($kontrak);
?>
<table class="table">
	<thead>
		<tr>
			<th>No</th>
			<th>KONTRAK</th>
			<th>NOMOR</th>
			<th>NILAI</th>
			<th>Tanggal Mulai</th>
			<th>Tanggal Berakhir</th>
			<th>Hari</th>
			<th>Tahun</th>
			<th></th>
		</tr>
	</thead>
	<?php 
	$no =1;
	foreach ($kontrak as $kont) {
		# code...
	 ?>
	<tr>
		<td><?= $no ?></td>
		<td><?= $kont['judul'] ?></td>
		<td><?= $kont['nomor_kontrak'] ?></td>
		<td><?= $kont['nilai_kontrak'] ?></td>
		<td><?= $kont['awal'] ?></td>
		<td><?= $kont['akhir'] ?></td>
		<td><?= $kont['hari'] ?> Kalender</td>
		<td><?= $kont['akhir'] ?></td>	
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