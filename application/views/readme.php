<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	$contents = file_get_contents('README.md');
	echo $this->parsedown->text($contents);