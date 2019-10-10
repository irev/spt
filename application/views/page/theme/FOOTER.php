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


			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder"><?= _AUTHOR_ ?> </span>-
							<?= _APLIKASI_ ?> &copy; 2018-<?= date('Y')?>
						</span>

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
		<script src="<?= base_url() ?>asset/theme/assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="<?= base_url() ?>asset/theme/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url() ?>asset/theme/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?= base_url() ?>asset/theme/assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="<?= base_url() ?>asset/theme/assets/js/tree.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/select2.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/holder.min.js"></script>




		<!-- ace scripts -->
		<script src="<?= base_url() ?>asset/theme/assets/js/ace-elements.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/ace.min.js"></script>

		<!-- page specific plugin scripts -->	
		<!-- inline scripts related to this page refyandra-->

		<?php 
		if(!isset($plugin)){
			$plugin = "<!-- page specific javascript plugin scripts -->";
		}else{
			echo $plugin; 
		}
		?>





	</body>
</html>