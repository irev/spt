<?php
/*
@template 
	Librery Template.php
	$contents //Tampilkan konten 
@$this->template->load_plugin
	$plugin

 */ 
	$this->load->view('theme/HEAD');
	//// KONTAINER DATA
	echo $contents;
	///FOOTER
	$page = $this->uri->segment(1);
	$this->load->view('theme/FOOTER');
	//$this->template->load_plugin('theme/FOOTER',$page.'/js_'.$page);
?>
