<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
								</div>
							</div>
							<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
<div class="noprint ENVIRONMENT">
							
								<?php if(ENVIRONMENT === 'development'){ ?>
								ENVIRONMENT= <?= ENVIRONMENT ?>	<br>
								TOKEN = <?= $TOKEN ?><br>ID = <?= $ID ?><br>P = <?= $this->input->get('p') ?><br>
								last_query = <?= $this->db->last_query() ?><br>
								<?php } ?>
							
</div>
			<div class="footer noprint">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<small>
								Diakses menggunakan browser <?= $this->agent->browser().' v.'.$this->agent->version() ?>
							<br>
							<span class="blue bolder"><?= _AUTHOR_ ?> </span>-
							<?= _APLIKASI_ ?> &copy; 2018-<?= date('Y')?>
						</span>
							</small>
							waktu render halaman  <strong>{elapsed_time}</strong> detik. <?php echo  (ENVIRONMENT === 'development') ?  ENVIRONMENT.' CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		

		<!-- <![endif]-->

		<!--[if IE]>
<script src="<?= base_url() ?>asset/theme/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url() ?>asset/theme/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		

		<!-- ace scripts -->
		<script src="<?= base_url() ?>asset/theme/assets/js/ace-elements.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/ace.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="<?= base_url() ?>asset/theme/assets/js/jquery.dataTables.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/dataTables.buttons.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/buttons.flash.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/buttons.html5.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/buttons.print.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/buttons.colVis.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/dataTables.select.min.js"></script>	
		<script src="<?= base_url() ?>asset/theme/assets/js/jquery.gritter.min.js"></script>
		<!-- page specific plugin scripts -->
			<script src="<?= base_url() ?>asset/theme/assets/js/jquery-ui.custom.min.js"></script>
			<script src="<?= base_url() ?>asset/theme/assets/js/ace-elements.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/wizard.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/jquery.validate.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/jquery-additional-methods.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/bootbox.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/jquery.maskedinput.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/select2.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/jquery.inputmask.js"></script>
		<script src="<?= base_url() ?>asset/meedun/meedun.v1.js"></script>

		<!-- inline scripts related to this page refyandra-->
<script type="text/javascript">
	$('#master-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					//bAutoWidth: false,
					//"aoColumns": [
					//  { "bSortable": false },
					//  null, null,null, null, null,
					//  { "bSortable": false }
					//],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			
			
					select: {
						style: 'one'
					}
			    } );
</script>
		<?php 
		if(!isset($plugin)){
			$plugin = "<!-- page specific javascript plugin scripts -->";
		}else{
			echo $plugin; 
		}
		?>
	
	<script type="text/javascript">
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
	</body>
</html>