<script type="text/javascript">
	/**
	 *   999/9999/SPT/DPUPR/2099
	 *   ___/____/SPT/DPUPR/20__
	 */
	$('#nomor_spt').inputmask("9{3}/9{3,4}/SPT[*{4,8}][-*{3,8}]/DPUPR[*{3,10}]/20[9]{2}");
	$('#nomor_sppd').inputmask("9{3}/9{3,4}/SPPD[*{4,8}][-*{3,8}]/DPUPR[*{3,10}]/20[9]{2}");
	/**
	 *   999/9999/SPT-AZZZZZ/DPUPR-AZZZZZ/2099
	 *   ___/____/SPT-_____/DPUPR_____/20__
	 */
	//$('#nomor_spt').inputmask("9{3}/9{3,4}/SPT[*{4,8}][-*{3,8}]/DPUPR[*{3,10}]/20[9]{2}");
	//$('#nomor_sppd').inputmask("9{3}/9{3,4}/SPPD[*{4,8}][-*{3,8}]/DPUPR[*{3,10}]/20[9]{2}");
// [a-za-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?

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
////////////////////////////////////////////////// 	pilih_beban	
$('#pilih_beban').change(function(event) {
	var text = $("select#pilih_beban option:selected").text();
	console.log(text);
	$('#pilih_beban_text').val(text.replace(/▶/gi, ""));
		/* Setelah memilih pegawai */
		$(this).toggle('slow');
		var idtujuan = $(this).val();
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


/**
 *   wizard-container
 */
	jQuery(function($) {
		var $validation = true;
				$('#fuelux-wizard-container')
				.ace_wizard({
					//step: 2 //optional argument. wizard will jump to step "2" at first
					//buttons: '.wizard-actions:eq(0)'
				})
				.on('actionclicked.fu.wizard' , function(e, info){
					if(info.step == 1 && $validation) {
						if(!$('#validation-form').valid()) e.preventDefault();
					}
				})
				//.on('changed.fu.wizard', function() {
				//})
				.on('finished.fu.wizard', function(e) {
					bootbox.dialog({
						message: "Terimakasih! Informasi yang anda masukkan akan disimpan tekan tombol Simpan!", 
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary"
							}
						}
					});
				}).on('stepclick.fu.wizard', function(e){
					//e.preventDefault();//this will prevent clicking and selecting steps
				});
			
			
				//jump to a step
				
				var wizard = $('#fuelux-wizard-container').data('fu.wizard')
				wizard.currentStep = 1;
				wizard.setState();
				
			
				//determine selected step
				//wizard.selectedItem().step
			

			//hide or show the other form which requires validation
				//this is for demo only, you usullay want just one form in your application
				$('#skip-validation').removeAttr('checked').on('click', function(){
					$validation = this.checked;
					if(this.checked) {
						$('#sample-form').hide();
						$('#validation-form').removeClass('hide');
					}
					else {
						$('#validation-form').addClass('hide');
						$('#sample-form').show();
					}
				})

				//documentation : http://docs.jquery.com/Plugins/Validation/validate
			
			
				$.mask.definitions['~']='[+-]';
				$('#phone').mask('(999) 999-9999');
				$('.ttd_nip').mask('19999999 999999 9 999');
				jQuery.validator.addMethod("phone", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
				}, "Enter a valid phone number.");
			
				$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block text-right',
					focusInvalid: false,
					ignore: "",
					rules: {
						tanggal_spt: {
							required: true,
							date:true
						},
						tempat_spt: {
							required: true,
						},
						ttd_nip: {
							required: true,
						},
						
						password: {
							required: true,
							minlength: 5
						},
						password2: {
							required: true,
							minlength: 5,
							equalTo: "#password"
						},
						name: {
							required: true
						},
						phone: {
							required: true,
							phone: 'required'
						},
						url: {
							required: true,
							url: true
						},
						comment: {
							required: true
						},
						state: {
							required: true
						},
						platform: {
							required: true
						},
						subscription: {
							required: true
						},
						gender: {
							required: true,
						},
						agree: {
							required: true,
						}
					},
			
					messages: {
						required: "Please provide a valid email.",
						email: {
							required: "Please provide a valid email.",
							email: "Please provide a valid email."
						},
						password: {
							required: "Please specify a password.",
							minlength: "Please specify a secure password."
						},
						state: "Please choose state",
						subscription: "Please choose at least one option",
						gender: "Please choose gender",
						agree: "Please accept our policy",
						ttd_nip :"Nip Harus diisi"
					},
			
			
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
						$(e).remove();
					},
			
					errorPlacement: function (error, element) {
						if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
							var controls = element.closest('div[class*="col-"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else if(element.is('.select2')) {
							error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
						}
						else if(element.is('.chosen-select')) {
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
						}
						else error.insertAfter(element.parent());
					},
			
					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});	

			$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					$('[class*=select2]').remove();
				});
	});
</script>


