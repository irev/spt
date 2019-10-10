		<!-- js_bap by refyandra-->
		<!-- page specific plugin scripts -->
		<script src="<?= base_url('asset/theme') ?>/assets/js/wizard.min.js"></script>
		<script src="<?= base_url('asset/theme') ?>/assets/js/jquery.validate.min.js"></script>
		<script src="<?= base_url('asset/theme') ?>/assets/js/jquery-additional-methods.min.js"></script>
		<script src="<?= base_url('asset/theme') ?>/assets/js/bootbox.js"></script>
		<script src="<?= base_url('asset/theme') ?>/assets/js/jquery.maskedinput.min.js"></script>
		<script src="<?= base_url('asset/theme') ?>/assets/js/select2.min.js"></script>

		<!-- page specific plugin scripts Table-->
		<script src="<?= base_url('asset/theme') ?>/assets/js/jquery.dataTables.min.js"></script>
		<script src="<?= base_url('asset/theme') ?>/assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?= base_url('asset/theme') ?>/assets/js/dataTables.buttons.min.js"></script>
		<script src="<?= base_url('asset/theme') ?>/assets/js/buttons.flash.min.js"></script>
		<script src="<?= base_url('asset/theme') ?>/assets/js/buttons.html5.min.js"></script>
		<script src="<?= base_url('asset/theme') ?>/assets/js/buttons.print.min.js"></script>
		<script src="<?= base_url('asset/theme') ?>/assets/js/buttons.colVis.min.js"></script>
		<script src="<?= base_url('asset/theme') ?>/assets/js/dataTables.select.min.js"></script>




	<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {

				$('[data-rel=tooltip]').tooltip();
			
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				}); 
			
			
				var $validation = true;
				$('#fuelux-wizard-container')
				.ace_wizard({
					//step: 2 //optional argument. wizard will jump to step "2" at first
					//buttons: '.wizard-actions:eq(0)'
				})
				.on('actionclicked.fu.wizard' , function(e, info){
					if(info.step == 1 && $validation) {
						//if(!$('#validation-form').valid()) e.preventDefault();
						if(!$('#validation-form-perusahaan').valid()) e.preventDefault();
					}
					if(info.step == 2 && $validation) {
						if(!$('#validation-form-kontrak').valid()) e.preventDefault();
					}
					if(info.step == 3 && $validation) {
						if(!$('#validation-form-bap').valid()) e.preventDefault();
						console.log($validation);

					}
					if(info.step == 4 && $validation) {
						if(!$('#validation-form-realisasi').valid()) e.preventDefault();
					}
				})
				//.on('changed.fu.wizard', function() {
				//})
				.on('finished.fu.wizard', function(e) {
					bootbox.dialog({
						message: "Thank you! Your information was successfully saved!", 
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
				/***/
				var wizard = $('#fuelux-wizard-container').data('fu.wizard')
				wizard.currentStep = 4;
				wizard.setState();
				
			
				//determine selected step
				//wizard.selectedItem().step
			
			
			
				//hide or show the other form which requires validation
				//this is for demo only, you usullay want just one form in your application
				$('#skip-validation').attr('checked',"").on('click', function(){
					$validation = this.checked;
					if(!this.checked) {
						$('#validation-form').hide();
						$('#sample-form').removeClass('hide');
						
					}
					else {
						$('#sample-form').addClass('hide');
						$('#validation-form').show();
					}
				})
				
				//documentation : http://docs.jquery.com/Plugins/Validation/validate
			
			
				$.mask.definitions['~']='[+-]';
				$('#phone').mask('0899-9999-9999');
			
				jQuery.validator.addMethod("phone", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
				}, "Enter a valid phone number.");

				$.mask.definitions['~']='[+-]';
				$('#KONTAK').mask('0899-9999-9999');
				$('.NIP').mask('99999999 999999 9 999');
				
				
				jQuery.validator.addMethod("NIP", function (value, element) {
					return this.optional(element) || /^\d{8} \d{6} \d{1} \d{3}/.test(value);
				}, "Masukkan nomor NIP yang valid '99999999 999999 9 999'.");

				jQuery.validator.addMethod("KONTAK", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
				}, "Enter a valid phone number.");
/////////PERUSAHAAN //////
$('#perusahaan').change(function(event) {
	/* Act on the event */
	var isi = $('#perusahaan').val();
	console.info(isi);
				$.ajax({
				 	url: '<?= base_url('/bap/json_perusahaan') ?>',
				 	type: 'POST',//default GET (Other values: POST)',
				 	dataType: 'json',//'default: Intelligent Guess (Other values: xml, json, script, or html)',
				 	data: {token:isi},//{param1: 'value1'},
				 	success: function(p) { // The function to execute if the request is a -success-, response will be the price
		                 	console.log($("input#NAMA_PERUSAHAAN").val(p.perusahaan));
		                 	console.log($("input#JENIS_PERUSAHAAN").val(p.jenis));
   	
            		}
				 }).done(function(p){
							$("#NAMA_PERUSAHAAN").val(p.perusahaan);
							$("#JENIS_PERUSAHAAN").val(p.jenis);
							$("#NAMA_ALAMAT_PERUSAHAAN").val(p.alamat_perusahaan);
							$("#NPWP_PERUSAHAAN").val(p.npwp);
							$("#BANK").val(p.bank);
							$("#REKENING_PERUSAHAAN").val(p.rekening);
							$("#PIMPINAN").val(p.pimpinan);
							$("#NAMA_PIMPINAN_PERUSAHAAN").val(p.direktur);
							$("#NAMA_ALAMAT_PIMPINAN").val(p.alamat);
							$("#KONTAK").val(p.kontak);
							console.log(p.perusahaan);
				 });
});
		/*
0: {name: "perusahaan", value: "2"}
1: {name: "NAMA_PERUSAHAAN", value: ""}
$("#JENIS_PERUSAHAAN").val(p.perusahaan);
$("#NAMA_ALAMAT_PERUSAHAAN").val(p.perusahaan);
$("#NPWP_PERUSAHAAN").val(p.perusahaan);
$("#BANK").val(p.perusahaan);
$("#REKENING_PERUSAHAAN").val(p.perusahaan);
$("#PIMPINAN").val(p.perusahaan);
$("#NAMA_PIMPINAN_PERUSAHAAN").val(p.perusahaan);
$("#NAMA_ALAMAT_PIMPINAN").val(p.perusahaan);
1$("#KONTAK").val(p.perusahaan);
*/





$('#validation-form-perusahaan').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						NAMA_PERUSAHAAN: {
							required: true
						},
						JENIS_PERUSAHAAN: {
							required: true
						},
						NAMA_ALAMAT_PERUSAHAAN: {
							required: true
						},
						NPWP_PERUSAHAAN: {
							required: true
						},
						BANK: {
							required: true
						},
						REKENING_PERUSAHAAN: {
							required: true
						},
						PIMPINAN: {
							required: true
						},
						NAMA_PIMPINAN_PERUSAHAAN: {
							required: true
						},
						NAMA_ALAMAT_PIMPINAN: {
							required: true
						},
						KONTAK: {
							required: true
						},


/*
						email: {
							required: true,
							email:true
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
						
						phone: {
							required: true,
							phone: 'required'
						},
						url: {
							required: true,
							url: true
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
						*/
					},
			
					messages: {
						required: {
							required: "Harus diisi."
						},
						/*
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
						agree: "Please accept our policy"
						*/
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

////////// end valid perusahaan
					$('#NILAI_KONTRAK').keyup(function(event){
						/* Act on the event */
						var nom = $(this).val();
						//var format = (nom/1000).toFixed(3);
						var format = nom;
						console.log(nom+' - '+format);
						$('.NILAI_KONTRAK_FORMAT').text(formatRupiah(format,'.'));
						$('#REALISASI_NILAI_KONTRAK').val(nom);
					});

					$('#BAP_PROGRES').keyup(function(event){
						/* Act on the event */
						var nom = $(this).val();
						$('#REALISASI_PROGRES').val(nom);
					});

					jQuery.validator.addMethod("TANGGAL",function(value, element) {
					        // put your own logic here, this is just a (crappy) example
					        //return value.match(/^(0?[1-9]|[12][0-9]|3[0-1])[/., -](0?[1-9]|1[0-2])[/., -](19|20)?\d{2}$/);
					        return value.match(/^(19|20)?\d{2}[/., -](0?[1-9]|1[0-2])[/., -](0?[1-9]|[12][0-9]|3[0-1])$/);
					    },
					    "Mohon masukkan tanggal sesuai dengan format dd/mm/yyyy."
					);

$('#validation-form-kontrak').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						NOMOR_KONTRAK: {
							required: true
						},
						KONTRAK: {
							required: true
						},
						NILAI_KONTRAK: {
							required: true
						},
						TGL_MULAI_KONTRAK: {
							required: true,
							TANGGAL:true
						},
						TGL_AKHIR_KONTRAK: {
							required: true,
							TANGGAL:true
						},
						HARI_PEKERJAAN: {
							required: true,
							max:360
						},

						
					},
			
					messages: {
						HARI_PEKERJAAN:{
							max: "Lama hari kalender dalam setahun maksimal 360 "
						},	
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
						agree: "Please accept our policy"
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

$('#validation-form-bap').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						BAP_JUDUL: {
							required: true
						},
						BAP_PROGRES: {
							required: true,
							min:1,
							max:100
						},
						BAP_NOMOR: {
							required: true
						},
						BAP_PJ_PA: {
							required: true
						},
						BAP_PJ_NIP_PA: {
							required: true,
							NIP: true
						},
						BAP_PJ_KPA: {
							required: true
						},
						BAP_PJ_NIP_KPA: {
							required: true,
							NIP: true
						},
						BAP_PJ_PPTK: {
							required: true
						},
						BAP_PJ_NIP_PPTK: {
							required: true,
							NIP: true
						},
						BAP_PJ_PENGAWAS: {
							required: false
						},
						BAP_PJ_NIP_PENGAWAS: {
							required: false,
							NIP: false
						},
					},
			
					messages: {
						BAP_PROGRES:{
							max: "Masukkan nilai kurang dari atau sama dengan 100.",
							min: "Silakan masukkan nilai yang lebih besar dari atau sama dengan 1.",
						},	
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
						agree: "Please accept our policy"
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

$('#validation-form-realisasi').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						REALISASI_NILAI_KONTRAK: {
							required: true
						},
						REALISASI_PROGRES: {
							required: true,
							min:1,
							max:100
						},
						BAP_NOMOR: {
							required: true
						},
						REALISASI_BAP_BRUTO: {
							required: true
						},
						BAP_PJ_NIP_PA: {
							required: true,
							NIP: true
						},
						BAP_PJ_KPA: {
							required: true
						},
						BAP_PJ_NIP_KPA: {
							required: true,
							NIP: true
						},
						BAP_PJ_PPTK: {
							required: true
						},
						BAP_PJ_NIP_PPTK: {
							required: true,
							NIP: true
						},
						BAP_PJ_PENGAWAS: {
							required: false
						},
						BAP_PJ_NIP_PENGAWAS: {
							required: false,
							NIP: false
						},
					},
			
					messages: {
						BAP_PROGRES:{
							max: "Masukkan nilai kurang dari atau sama dengan 100.",
							min: "Silakan masukkan nilai yang lebih besar dari atau sama dengan 1.",
						},	
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
						agree: "Please accept our policy"
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
/*
				$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						email: {
							required: true,
							email:true
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
						agree: "Please accept our policy"
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
*/			
				
				
				
				$('#modal-wizard-container').ace_wizard();
				$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
				
				
				/**
				$('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
					$(this).closest('form').validate().element($(this));
				});
				
				$('#mychosen').chosen().on('change', function(ev) {
					$(this).closest('form').validate().element($(this));
				});
				*/
				
				
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					$('[class*=select2]').remove();
				});

		/*POST PROGERES*/
		$('#btn-proses-realisasi').on('click', function(e){
			 var form_realisasi = $( '#validation-form-realisasi, #validation-form-bap' ).serializeArray();
			 //var form_realisasi = $( 'form' ).serializeArray()
			$.ajax({
				 	url: '<?= base_url('/bap/json_realisasi') ?>',
				 	type: 'POST',//default GET (Other values: POST)',
				 	dataType: 'json',//'default: Intelligent Guess (Other values: xml, json, script, or html)',
				 	data: form_realisasi,//{param1: 'value1'},
				 	success: function(response) { // The function to execute if the request is a -success-, response will be the price
		                    //var datashow = JSON.parse(response);             
		                 	//$("input#RETENSI").val(response.RETENSI);
		                 	console.log($("input#REALISASI_RETENSI").val(response.RETENSI));
		                 	console.log(response.RETENSI);
            		}
				 })
				 .done(function(e) {
				 	//console.log("success");
				 	for (var key in e) {   
					  $('input#'+key).val(e[key]);
					  var values = String(e[key]);
					  $('.'+key).text(formatRupiah(values,'.'));
					  console.log(key +' = '+e[key]);
					}
					if(e.REALISASI_RETENSI == 0){
						$('.ket_retensi').text('');
					}
					$('.REALISASI_JUMLAH_POTONGAN').text(formatRupiah(String(e.REALISASI_JUMLAH_POTONGAN),'.'));
					$('.progres').text(e.progres);
				 	
				 	//showValues();
				 })
				 .fail(function(e) {
				 	console.log("error = " + e);
				 })
				 .always(function(e) {
				 	console.log("complete = "+e);
				 	console.log(e);
				 });
				 	 
			});

}); 
/* END jQuery(function($) */

/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix, $matauang=null){
			console.log(angka);
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
		 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
			if ($matauang==null){ 
				$simbol = ""
			}else{
				$simbol="rp"
			}
		 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? $simbol +' ' + rupiah : '');
		}

			/*
				pringatan sebelum reload/refresh page
				window.addEventListener("beforeunload", function(event) {
					  event.returnValue = "Write something clever here..";
					});
			*/
		</script>