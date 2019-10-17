<script type="text/javascript">

$(".btn-bayar").click(function() {
    var url ="<?= base_url("spt/bayar") ?>";
    var id  = $(this).attr('data-id');
    if($(this).attr('data-val')=='yes' ){
    	$.post(url,{'bayar':'no','id_peng':id}, function(data, status, jqXHR) {// success callback
                $(this).text("no");    
        });
         $(this).text("no");
         $(this).attr('data-val','no');
          $(this).removeClass("btn btn-xs btn-success btn-bayar");
          $(this).addClass("btn btn-xs btn-danger btn-bayar");
    	console.log('yes');
    	
    }else{
    	$.post(url,{'bayar':'yes','id_peng':id}, function(data, status, jqXHR) {// success callback
                $(this).text("yes");
        });
        $(this).text("yes");
        $(this).attr('data-val','yes');
        $(this).removeClass("btn btn-xs btn-danger btn-bayar");
          $(this).addClass("btn btn-xs btn-success btn-bayar");
         
    	console.log('no');
    	
    }
});

$(".btn-no").addClass("btn btn-xs btn-danger btn-bayar");

</script>