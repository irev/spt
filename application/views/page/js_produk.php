<script type="text/javascript">
	$('input#jumlah_order').change(function(e){
			//alert('lol');
			var hasil = $('input#jumlah_order').val() * <?= $HARGA ?>;
			$('input#hasil_order').val(hasil);
	});
	$('input#jumlah_order').keydown(function(e){
</script>