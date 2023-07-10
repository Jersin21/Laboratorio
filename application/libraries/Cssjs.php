<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cssjs{
	
	var $css;
	var $js;
	var $path_css;
	var $path_js;
	
	function __constructor(){
		$this->path_css = APP_PATH_CSS;
		$this->path_js  = APP_PATH_JS;		
		$this->clear();
	}
	
	function clear_css(){
		$this->css = array();
	}
	
	function clear_js(){
		$this->js  = array();
	}
	
	function clear(){
		$this->css  = array();
		$this->js  = array();
	}
	
	function set_path_css($path){
		if(is_string($path)):
			$this->path_css = $path;
			return TRUE;
		else:
			return FALSE;
		endif;
	}	
	
	function set_path_js($path){
		if(is_string($path)):
			$this->path_js = $path;
			return TRUE;
		else:
			return FALSE;
		endif;
	}
	
	function add_css($css_file, $apply_ext = TRUE, $apply_css_path = TRUE, $set_clear = FALSE){
		if($set_clear === TRUE):
			$this->clear_css();
		endif;
		
		if(is_string($css_file)):
			$this->css[] = link_tag((($apply_css_path === TRUE) ? $this->path_css : '') . $css_file . (($apply_ext === TRUE) ? '.css' : ''));
		else:
			if(is_array($css_file) && count($css_file) > 0):
				foreach($css_file as $val):
					$this->css[] = link_tag((($apply_css_path === TRUE) ? $this->path_css : '') . $val . (($apply_ext === TRUE) ? '.css' : ''));
				endforeach;
			else:
				return FALSE;
			endif;
		endif;
		
		return TRUE;
	}
	
	function add_js($js_file, $apply_ext = TRUE, $apply_js_path = TRUE, $set_clear = FALSE){
		$js_pattern = '<script type="text/javascript" src="%s"></script>';
		
		if($set_clear === TRUE):
			$this->clear_js();
		endif;
		
		if(is_string($js_file)):
			$this->js[] = sprintf($js_pattern, ((($apply_js_path === TRUE) ? $this->path_js : '') . $js_file . (($apply_ext === TRUE) ? '.js' : '')));
		else:
			if(is_array($js_file) && count($js_file) > 0):
				foreach($js_file as $val):
					$this->js[] = sprintf($js_pattern, ((($apply_js_path === TRUE) ? $this->path_js : '') . $val . (($apply_ext === TRUE) ? '.js' : '')));
				endforeach;
			else:
				return FALSE;
			endif;
		endif;
		
		return TRUE;
	}
	
	function get_css(){
		return $this->css;
	}
	
	function get_js(){
		return $this->js;
	}
	
	function generate_css(){
		if(!empty($this->css)):
			$html = '';
			foreach($this->css as $css):
				$html .= $css . "\n";
			endforeach;
			return $html;
		else:
			return '';
		endif;
	}
	
	function generate_js(){
		if(!empty($this->js)):
			$html = '';
			foreach($this->js as $js):
				$html .= $js . "\n";
			endforeach;
			return $html;
		else:
			return '';
		endif;
	}
	
}

/* End of file: cssjs.php */