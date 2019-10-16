<script type="text/javascript">
	var idpegawai;
	/* Act on the event btn_show_input click*/
	$('.btn_show_input').click(function(event) {
		var data = $(this).attr('data-id');
		$(this).toggle('slow');
	    $("#"+data).toggle('slow', function() {

		});
	});
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
				console.log(data);
				$('#nama').val(data.nama);
				$('#nip').val(data.nip);
				$('#jabatan').val(data.jabatan);
				$('#pangkat').val(data.pangkat_golongan);
				$('#tambah-pengikut').attr('data-id',data.id_peg);
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
			$('.btn_show_input').toggle('slow');
		});
		
	});
	$('#tambah-pengikut').click(function(event){
				var nama     =$('#nama').val();
				var nip      =$('#nip').val();
				var jabatan  =$('#jabatan').val();
				var golongan =$('#pangkat').val();
				if(nama!="" && jabatan !="" && golongan !="" ){
				$.ajax({
					url: '<?= base_url()?>spt/simpan_pengikut',
					type: 'POST',
					dataType: 'json',
					data: {	
							spt_id:'<?= $this->uri->segment("4")?>',
							pegawai_id:$(this).attr('data-id'),
							nama:nama,
							nip:nip,
							jabatan:jabatan,
							golongan:golongan,
							perjalanan:'dalam',
							tahun:'<?= date("Y")?>'
						},
					success(data){
						console.log(data);
						if (data==true) {
							alert('Data berhasil disimpan');
							location.reload();
						}else if(data==2){
							alert('Sudah Ada');	
						}else{
							alert('Data gagal disimpan');
						}
					}	
				});
				}else{
					alert('Belum memilih pegawai');
				}
	});

</script>