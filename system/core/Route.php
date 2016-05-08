<?php
//class Route extends PublicCore{
class Route {
	/** 初始化路由
	 */
	public function initRoute(){
		//获得请求地址
		$root = $_SERVER['SCRIPT_NAME'];  
		$request = $_SERVER['REQUEST_URI'];   
		// 过滤地址,过滤第一个斜杠  
		$config = Config::getConfig();  //获取配置
		$url = trim(str_replace($root,'', $request),'/');   
		$api = $config['DEFAULT_API'];  //引用配置的默认api
		$uri = $this->getControllerFunction($url,$api);
		return $uri;
	}

	/**
	 * 截取api  controler 和function
	 *
	 **/
	public function getControllerFunction($url,$api){
		$controlFuction = array();
		if(empty($url)){  
			// 默认控制器和默认方法  
			$controlFuction['api'] = $api;  
			$controlFuction['class'] = 'Index';  
			$controlFuction['function'] = 'index';  
		}else {  
			$uri = explode('/', $url);  
			if (count($uri) == 2)  {  
				$controlFuction['api'] = 'show';  
				$controlFuction['class'] = ucfirst($uri[0]);  
				$controlFuction['function'] = $uri[1];  
			} else if (count($uri) == 1)  {  
				$controlFuction['api'] = $api;  
				$controlFuction['class'] = ucfirst($uri[0]);  
				$controlFuction['function'] = 'index';  
			} else {  
				$controlFuction['api'] = $uri[0];  
				$controlFuction['class'] = ucfirst($uri[1]);  
				$controlFuction['function'] = $uri[2];  
			}  
		}  
		return $controlFuction;
	}
}