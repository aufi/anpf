<?php

class Anpf {
	
	protected $url_prefix = '';
	protected $fn_prefix = 'route_';
	protected $view_path = 'views/';
	protected $background_fn = null;
	protected $background = array('ip', 'ref');
	
	public function render($template, $d = null) {
		if (is_array($this->background)) extract($this->background, EXTR_OVERWRITE);
		if (is_array($d)) extract($d, EXTR_OVERWRITE);	//extract($d, EXTR_PREFIX_ALL, 'd');
		echo "<!-- anpf -->\n";
		require($this->view_path.'layout/header.html.php');
		include($this->view_path.$template.'.html.php');
		require($this->view_path.'layout/footer.html.php');
	}
	
	public function call($fname, $param = null) {
		(isset($param)) ? $data = call_user_func($fname, $param) : $data = call_user_func($fname);
		($data) ? $this->render($this->remove_prefix($this->fn_prefix, $fname), $data) : $this->render($this->remove_prefix($this->fn_prefix, $fname));
	}
	
	public function url_to_function($param) {
		$param = substr($this->remove_prefix($this->url_prefix, $param), 1);	//remove / from param start
		$fname = '';
		$fparam = '';
		$part = explode('/', $param);
		if (isset($part[0])) $fname = $part[0];	//controller
		if (isset($part[1])) $fname .= '_'.$part[1];	//action
		if (isset($part[2])) $fparam = $part[2];	//id
		return array('fname' => $this->fn_prefix.$fname, 'fparam' => $fparam);
	}
	
	public function process_request($param) {
		(isset($_SERVER['PATH_INFO'])) ? $fcall = $this->url_to_function($this->sec($_SERVER['PATH_INFO'])) : $fcall = $this->url_to_function('/index');
		(function_exists($fcall['fname'])) ? $this->call($fcall['fname'], $fcall['fparam']) : $this->call($this->fn_prefix.'error_404');
	}
	
	public function remove_prefix($prefix, $text) {
		if (substr($text, 0, strlen($prefix) ) == $prefix) {
		    $text = substr($text, strlen($prefix), strlen($text));
		}
		return $text;
	}
	
	public function __construct($conf = array()) {
	    if (isset($conf['background_fn']) && function_exists($conf['background_fn'])) $this->background_fn = $conf['background_fn'];
		if (isset($_SERVER['REMOTE_ADDR'])) $this->background['ip'] = $this->sec($_SERVER['REMOTE_ADDR']);
		if (isset($_SERVER['X-Forwarded-For'])) $this->background['ip'] = $this->sec($_SERVER['X-Forwarded-For']);
		(isset($_SERVER['HTTP_REFERER'])) ? $this->background['ref'] = $this->sec($_SERVER['HTTP_REFERER']) : $this->background['ref'] = '';
	}
	
	public function run() {
		if (isset($this->background_fn)) $this->background = array_merge($this->background, call_user_func($this->background_fn));
		$this->process_request();
	}
	
	public function url_for($fname, $param = null) {
		$path = '';
		$fname = preg_replace('/^' . $this->fn_prefix . '/', '', $fname);
		$part = explode('_', $fname, 2);
		if (isset($part[0])) $path = $part[0];	//controller
		if (isset($part[1])) $path .= '/'.$part[1];	//action
		if (isset($param)) $path .= '/'.$param;	//id
		return $this->url_prefix.$path;
	}
	
	public function redirect_to($url) {
		Header('Location: '.$url);
		exit(0);
	}
	
	public function sec($t) {
		return htmlspecialchars(trim($t));
	}
	
	public function flash($type, $text) {
		$_SESSION['anpf_flash_'.$type] = $text;
	}
	
	public function has_flash($type) {
		return isset($_SESSION['anpf_flash_'.$type]);
	}
	
	public function get_flash($type) {
		if (isset($_SESSION['anpf_flash_'.$type])) {
			$t = $_SESSION['anpf_flash_'.$type];
			unset($_SESSION['anpf_flash_'.$type]);
			return $t;
		}
	}
}

