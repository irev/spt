<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		var $template_data = array();
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
		// load tema
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->CI->load->helper(['url']);
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
			return $this->CI->load->view($template, $this->template_data, $return);
		}

		////// pangil js plugin script
		function load_plugin($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->set('plugin', $this->CI->load->view($view, $view_data, TRUE));					
			return $this->CI->load->view($template, $this->template_data, $return);
		}



		function load_js($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->CI->load->helper(['url']);
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
			$page = $this->CI->uri->segment(1);	
			$js_file = explode("/", $view);
			// load function_exists(function_name)
			$this->load($template, $view , $view_data = array(), $return = FALSE);
			$this->load_plugin('theme/FOOTER',str_replace(end($js_file),'',$view).'/js_'.end($js_file) , $view_data = array(), $return = FALSE); 
			//return $this->CI->load->view($template, $this->template_data, $return);
			// footer
		}
		
}
/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */