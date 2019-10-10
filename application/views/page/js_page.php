



<?php
echo $page = $this->uri->segment(2); 
if($page == 'produk' || $page == 'order'){
foreach ( $produk as $prod){
	/*
	$PRODUK     = $prod->title;
	$SATUAN     = $prod->satuan;
	$JENIS      = $prod->jenis;
	$KELAS      = $prod->kelas;
	$KETERANGAN = $prod->ket;
	$ID_SUP     = $prod->Id_supplier; 
	$SUPPLIER   = $prod->nama;
	$ALAMAT     = $prod->alamat;
	$KOTA       = $prod->kota;
	$up_date_p  = $prod->up_date_p;
	*/
	$HARGA  	= $prod->harga;
}
?>

<script type="text/javascript">
    $(document).ready(function(){
        
    });
</script>



<script type="text/javascript">

	$('input#jumlah_order').on('change',function(){
			//alert('lol');
			var hasil = $('input#jumlah_order').val() * <?= $HARGA ?>;
			$('input#hasil_order').val(hasil);
	});
</script>
<?php } ?>




<script type="text/javascript">
			jQuery(function($) {
			$(document).ready(function(){
			  $("#cari_produk").on("keyup", function() {
			    var value = $(this).val().toLowerCase();
			    $("#my_produk div").filter(function() {
			      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			    });
			  });
			});



$('.add_cart').click(function(){
            var produk_id    = $(this).data("produkid");
            var produk_nama  = $(this).data("produknama");
            var produk_harga = $(this).data("produkharga");
            var quantity     = $('#' + produk_id).val();
            $.ajax({
                url : "<?php echo base_url();?>page/add_to_cart",
                method : "POST",
                data : {produk_id: produk_id, produk_nama: produk_nama, produk_harga: produk_harga, quantity: quantity},
                success: function(data){
                    $('#detail_cart').html(data);
                }
            });
        });
 
        // Load shopping cart
        $('#detail_cart').load("<?php echo base_url();?>/page/load_cart");
 
        //Hapus Item Cart
        $(document).on('click','.hapus_cart',function(){
            var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
            $.ajax({
                url : "<?php echo base_url();?>page/hapus_cart",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    $('#detail_cart').html(data);
                }
            });
        });

			/*
				//data for tree element 45
				var category = {
					'for-sale' : {text: 'For Sale', type: 'folder'}	,
					'vehicles' : {text: 'Vehicles', type: 'item'}	,
					'rentals' : {text: 'Rentals', type: 'item'}	,
					'real-estate' : {text: 'Real Estate', type: 'item'}	,
					'pets' : {text: 'Pets', type: 'item'}	,
					'tickets' : {text: 'Tickets', type: 'item'}
				}
*/

var category = {
		<?php 
		$KATEGORI = $this->KATEGORI;
		foreach ($KATEGORI as $kat) {
			if(count($KATEGORI) > -1 ){
				echo  json_encode($kat['kategoris']).": {text: '".$kat['kategoris']."', type: 'item'},";
			}	
			 
		}
		 ?>

}
 /*

				category['for-sale']['additionalParameters'] = {
					'children' : {
						'appliances' : {text: 'Appliances', type: 'item'},
						'arts-crafts' : {text: 'Arts & Crafts', type: 'item'},
						'clothing' : {text: 'Clothing', type: 'item'},
						'computers' : {text: 'Computers', type: 'item'},
						'jewelry' : {text: 'Jewelry', type: 'item'},
						'office-business' : {text: 'Office', type: 'item'},
						'sports-fitness' : {text: 'Sports & Fitness', type: 'item'}
					}
				}
*/				
				
				var dataSource1 = function(options, callback){
					var $data = null
					if(!("text" in options) && !("type" in options)){
						$data = category;//the root tree
						callback({ data: $data });
						return;
					}
					else if("type" in options && options.type == "folder") {
						if("additionalParameters" in options && "children" in options.additionalParameters)
							$data = options.additionalParameters.children || {};
						else $data = {}//no data
					}
					
					callback({ data: $data })
				}


				
				$('#cat-tree').ace_tree({
					dataSource: dataSource1,
					multiSelect: true,
					cacheItems: true,
					'open-icon' : 'ace-icon tree-minus',
					'close-icon' : 'ace-icon tree-plus',
					'itemSelect' : true,
					'folderSelect': false,
					'selected-icon' : 'ace-icon fa fa-check',
					'unselected-icon' : 'ace-icon fa fa-times',
					loadingHTML : '<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>'
				});


			
				$('.tree-container').ace_scroll({size: 250, mouseWheelLock: true});
				$('#cat-tree').on('closed.fu.tree disclosedFolder.fu.tree', function() {
					$('.tree-container').ace_scroll('reset').ace_scroll('start');	
				});
				
				
				
				//select2 location element
				$('.select2').css('min-width', '150px').select2({allowClear:true});
				
				
				//jQuery ui distance slider
				$( "#slider-range" ).css('width','150px').slider({
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1] + "";
			
						if( !ui.handle.firstChild ) {
							$("<div class='tooltip bottom in' style='display:none;left:-6px;top:14px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
							.prependTo(ui.handle);
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('span.ui-slider-handle').on('blur', function(){
					$(this.firstChild).hide();
				});
				
			
				//this is for demo only
				$('.thumbnail').on('mouseenter', function() {
					$(this).find('.info-label').addClass('label-primary');
				}).on('mouseleave', function() {
					$(this).find('.info-label').removeClass('label-primary');
				});
				
			
				//toggle display format buttons
				$('#toggle-result-format .btn').tooltip({container: 'body'}).on('click', function(e){
					$(this).siblings().each(function() {
						$(this).removeClass($(this).attr('data-class')).addClass('btn-grey');
					});
					$(this).removeClass('btn-grey').addClass($(this).attr('data-class'));
				});
				
				////////////////////
				//show different search page
				$('#toggle-result-page .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					$('.search-page').parent().addClass('hide');
					$('#search-page-'+which).parent().removeClass('hide');
				});
			});


				$('#cat_tree .tree-lable').on('click', function(e) {
					/* Act on the event */
					console.log($('.tree-selected').text());
				});

$(document).ready(function() {
  var $products = $('.grid-products'),
      $filters = $("#filters input[type='checkbox']"),
      product_filter = new ProductFilterLevel1($products, $filters);
  product_filter.init();
});

function ProductFilterLevel1(products, filters) {
  var _this = this;

  this.init = function() {
    this.products = products;
    this.filters = filters;
    this.bindEvents();
  };

  this.bindEvents = function() {
    this.filters.click(this.filterGridProducts);
    $('#none').click(this.removeAllFilters);
  };

  this.filterGridProducts = function() {
    _this.products.hide();
    var selectedFilters = _this.filters.filter(':checked');
    if (selectedFilters.length) {
      var selectedFiltersValues = [];
      selectedFilters.each(function() {
        var currentFilter = $(this);
        selectedFiltersValues.push("[data-" + currentFilter.attr('name') + "='" + currentFilter.val() + "']");
      });
      _this.products.filter(selectedFiltersValues.join(',')).show();
    } else {
      _this.products.show();
    }
  };

  this.removeAllFilters = function() {
    _this.filters.prop('checked', false);
    _this.products.show();
  }
}



</script>


