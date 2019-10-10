<script type="text/javascript">
  	$(".pitih").inputmask({
    'alias': 'decimal',
    rightAlign: true,
    'groupSeparator': '.',
    'autoGroup': true,
    oncomplete: function () {
    	$(".pitih").unmask();
    	var angka = $(".pitih").val();
    	var nominal = angka.toString();
    	$('.nominal').val(numberWithCommas(nominal));
    },
    onUnMask: function(maskedValue, maskedValue){
    	return unmaskedValue;
    }
  	});
function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1')
}
function numberWithCommas(x) {
    return x.toString().replace(/,/g, '');
}
//console.info(formatNumber(2665)) // 2,665
//console.info(formatNumber(102665)) // 102,665
//console.info(formatNumber(111102665)) // 111,102,665

//console.info(numberWithCommas('2,665')) // 111,102,665
//console.info(numberWithCommas('102,665')) // 111,102,665
//console.info(numberWithCommas('111,102,665')) // 111,102,665

</script>