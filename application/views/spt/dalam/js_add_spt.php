<script type="text/javascript">
	$('#pilih_pegawai').change(function(event) {
		/* Setelah memilih pegawai */
		$(this).toggle('slow');
		var idpegawai = $(this).val();
		$.ajax({
			url: '<?= base_url()?>spt/select_pegawai',
			type: 'POST',
			dataType: 'json',
			data: {pilih_pegawai: idpegawai},
			success(data){
				$('#nama').val(data.nama);
				$('#nip').val(data.nip);
				$('#jabatan').val(data.jabatan);
				$('#golongan').val(data.golongan);
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
	//////TTD SPT
	$('#pilih_pegawai_spt').change(function(event) {
		/* Setelah memilih pegawai */
		$(this).toggle('slow');
		var idpegawai = $(this).val();
		$.ajax({
			url: '<?= base_url()?>spt/select_pegawai',
			type: 'POST',
			dataType: 'json',
			data: {pilih_pegawai: idpegawai},
			success(data){
				$('#ttd_nama').val(data.nama);
				$('#ttd_nip').val(data.nip);
				$('#ttd_jabatan').val(data.jabatan);
				$('#ttd_golongan').val(data.golongan);
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
	//////TTD SPPD
	$('#pilih_pegawai_sppd').change(function(event) {
		/* Setelah memilih pegawai */
		$(this).toggle('slow');
		var idpegawai = $(this).val();
		$.ajax({
			url: '<?= base_url()?>spt/select_pegawai',
			type: 'POST',
			dataType: 'json',
			data: {pilih_pegawai: idpegawai},
			success(data){
				$('#ttd_sppd_nama').val(data.nama);
				$('#ttd_sppd_nip').val(data.nip);
				$('#ttd_sppd_jabatan').val(data.jabatan);
				$('#ttd_sppd_golongan').val(data.golongan);
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
	/////////////////////////////////////////////////////////
		$('#pilih_transportasi').change(function(event) {
		/* Setelah memilih pegawai */
		$(this).toggle('slow');
		var idtransportasi = $(this).val();
		$.ajax({
			url: '<?= base_url()?>spt/select_transportasi',
			type: 'POST',
			dataType: 'json',
			data: {pilih_transportasi: idtransportasi},
			success(data){
				$('#transpor').val(data.nomor);
				$('#tran_nama').val(data.nama);
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
////////////////////////////////////////////////// 	pilih_tujuan	
$('#pilih_tujuan').change(function(event) {
		/* Setelah memilih pegawai */
		$(this).toggle('slow');
		var idtujuan = $(this).val();
		$.ajax({
			url: '<?= base_url()?>spt/select_tujuan',
			type: 'POST',
			dataType: 'json',
			data: {pilih_tujuan: idtujuan},
			success(data){
				$('#tujuan').val(data.tujuan);
				$('#jarak').val(data.jarak);
				$('#wilayah').val(data.wilayah);
				$('#perjalanan').val(data.perjalanan);
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
	/* Act on the event btn_show_input click*/
	$('.btn_show_input').click(function(event) {
		var data = $(this).attr('data-id');
	    $("#"+data).toggle('slow', function() {
			
		});
	});

	$('#gritter-center').on('click', function(){
					$.gritter.add({
						title: 'This is a centered notification',
						text: 'Just add a "gritter-center" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
						class_name: 'gritter-info gritter-center'
					});
			
					return false;
				});

	<?php 
	if (validation_errors()) {
	?>
	var isi = `<?= validation_errors() ?>`;
		$.gritter.add({
						title: 'Ups..! Masih ada yang belum diisi.',
						text: isi,
						class_name: 'gritter-danger gritter-center'
					});
	<?php } ?>

</script>


