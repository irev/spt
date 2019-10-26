<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?= _APLIKASI_ ?></title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/font-awesome/5.11.2/css/solid.min.css" />
		
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/font-awesome/5.11.2/css/brands.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/font-awesome/5.11.2/css/fontawesome.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/font-awesome/5.11.2/css/regular.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/font-awesome/5.11.2/css/brands.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		
		<!-- page Meedun styles -->
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/css/meedun-ui-custom.css" />
		<!-- page Meedun styles -->

		<!-- page specific fullcalendar plugin styles -->
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/css/fullcalendar.min.css" />
		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/css/select2.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/css/jquery-ui.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/css/ui.jqgrid.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/css/jquery.gritter.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?= base_url() ?>asset/theme/assets/js/ace-extra.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/jquery-2.1.4.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/bootstrap.min.js"></script>
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?= base_url() ?>asset/theme/assets/js/html5shiv.min.js"></script>
		<script src="<?= base_url() ?>asset/theme/assets/js/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
			input[type=number]::-webkit-outer-spin-button,
			input[type=number]::-webkit-inner-spin-button {
				 cursor: pointer;
			    -webkit-appearance: none;
			    margin: 0;
			}

			input[type=number] {
			    -moz-appearance:textfield;
			}
			/*
			input[type="date"] {
  				background:#fff url('../bap/asset/theme/assets/images/avatars/avatar2.png')  97% 50% no-repeat ;
  				background:#fff url('https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/calendar_2.png')  97% 50% no-repeat ;

			}
			*/
			input[type="date"]::-webkit-inner-spin-button {
			  display: none;
			}
			input[type="date"]::-webkit-calendar-picker-indicator {
			  opacity: 100;
			}
			input[type="date"]::-webkit-calendar-picker-indicator {
			    font-size: 18px;
			}
		</style>
		<style type="text/css">
			.ENVIRONMENT{
				left: 12px;
			    right: 12px;
			    bottom: 4px;
			    padding: 8px;
			    line-height: 36px;
			    border-top: 3px double #E5E5E5;
			    background: #2f2f2f;
			    width: 85%;
			    margin-left: 190px;
			    color: white;
			    line-height: normal;
			    margin-bottom: 33px;
			    border-radius: 4px;
			    border: 3px double #E5E5E5;
			}
			@media print
			{    
			    .noprint, .noprint *
			    {
			        display: none !important;
			    }
			}
		</style>
	
	</head>

	<body class="skin-2" style="min-width: 620px !important;  overflow:auto;">