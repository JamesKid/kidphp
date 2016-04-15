<?php
//class Route extends PublicCore{
class Route {
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
	 * 截取controler 和function
	 *
	 **/
	public function getControllerFunction($url,$api){
		$controlFuction = array();
		if(empty($url)){  
			# 默认控制器和默认方法  
			$controlFuction['api'] = $api;  
			$controlFuction['class'] = 'index';  
			$controlFuction['function'] = 'index';  
		}else {  
			$uri = explode('/', $url);  
			# 如果function为空 则默认访问index  
			if (count($uri) == 2)  {  
				if ($uri[0]!=$api)  {  
					$controlFuction['api'] = $api;  
					$controlFuction['class'] = $uri[0];  
					$controlFuction['function'] = 'index';  
				}else{
					$controlFuction['api'] = 'show';  
					$controlFuction['class'] = $uri[0];  
					$controlFuction['function'] = 'index';  
				}
			} else if (count($uri) == 1)  {  
				$controlFuction['api'] = $api;  
				$controlFuction['class'] = 'index';  
				$controlFuction['function'] = 'index';  
			}  
			else {  
				$controlFuction['api'] = $uri[0];  
				$controlFuction['class'] = $uri[1];  
				$controlFuction['function'] = $uri[2];  
			}  
		}  
		return $controlFuction;
	}
}
