<?php
/*
@template 
	Librery Template.php
	$contents //Tampilkan konten 
@$this->template->load_plugin
	$plugin

 */ 
	$this->load->view('page/theme/HEAD');
	//// KONTAINER DATA
	echo $contents;
	///FOOTER
	$page = $this->uri->segment(1);
	$this->template->load_plugin('page/theme/FOOTER',$page.'/js_'.$page);
	

?>