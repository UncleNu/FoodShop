<?php
class View{
	private $pageVars = array();
	private $template;
	private $data;
	public $cache_ext;
	public $cache_time;
	public $cache_folder;
	public $ignore_pages;
	public $dynamic_url;
	public $cache_file;
	public $ignore;
	public $cache_ = false;
	public function __construct($template){
		$this->cache_ext = '_.cache.html';
		$this->cache_time = 1800;
		$this->cache_folder = 'static/cache/html/';
		$this->ignore_pages = array(
				'',
				''
		);
		$this->dynamic_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'];
		$this->cache_file = $this->cache_folder . md5($this->dynamic_url) . $this->cache_ext;
		$this->ignore = (in_array($this->dynamic_url,$this->ignore_pages)) ? true : false;
		$this->template = APP_DIR . 'views/' . $template . '.php';
	}
	public function cachepage_start(){
		ob_start();
		if(! $this->ignore && file_exists($this->cache_file) && time() - $this->cache_time < filemtime($this->cache_file)){
			ob_start('ob_gzhandler');
			readfile($this->cache_file);
			echo '<!-- cached page - ' . date('l jS \of F Y h:i:s A',filemtime($this->cache_file)) . ', Page : ' . $this->dynamic_url . ' -->';
			ob_end_flush();
			exit();
		}
		ob_start('ob_gzhandler');
		$this->cache_ = true;
	}
	public function cachepage_end(){
		if($this->cache_){
			if(! is_dir($this->cache_folder)){
				mkdir($this->cache_folder);
			}
			if(! $this->ignore){
				$fp = fopen($this->cache_file,'w');
				fwrite($fp,ob_get_contents());
				fclose($fp);
			}
			ob_end_flush();
		}
	}
	public function set($var = '',$val = ''){
		if(is_array($var)){
			foreach($var as $key=>$value){
				$this->pageVars[$key] = $value;
			}
		}else{
			$this->pageVars[$var] = $val;
		}
	}
	public function loadPlugin($name = ''){
		extract($this->pageVars);
		include (APP_DIR . 'plugins/' . $name . '.php');
	}
	public function loadJs($name,$baseurl='0'){
		if($baseurl == '1'){
			$url = BASE_URL;
		}else{
			$url = BASE_PLUGIN;
		}
		echo '<script type="text/javascript" src="' . $url . strtolower($name) . '.js"></script>';
	}
	public function loadCss($name,$baseurl='0'){
		if($baseurl == '1'){
			$url = BASE_URL;
		}else{
			$url = BASE_PLUGIN;
		}
		echo '<link href="' . BASE_PLUGIN . strtolower($name) . '.css" rel="stylesheet" type="text/css">';
	}
	public function loadInc($name = ''){
		include (APP_DIR . 'views/' . $name . '.php');
	}
	public function loadLayout($name = ''){
		extract($this->pageVars);
		include (APP_DIR . 'views/' . $name . '.php');
	}
	public function inc($name = ''){
		extract($this->pageVars);
		include ($name);
	}
	public function redirect($loc,$out='0')
	{
		if($out == '0'){
			global $config;
			header('Location: '. $config['base_url'] . $loc);
		}else{
			header('Location: '.$loc);
		}
	}
	public function render(){
		echo $this->inc($this->template);
		$this->cachepage_end();
	}
}
?>