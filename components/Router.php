<?php

class Router 
{

	public $routes;

	public function __construct() {
		$this->routes = include( ROOT . '/config/routes.php' );
	}

	private function getURI() {
		if(!empty($_SERVER['REQUEST_URI'])) {
			return trim( $_SERVER['REQUEST_URI'], '/' );
		}
	}

	public function run() {

		$uri = $this->getURI();

		foreach( $this->routes as $uriPattern => $path )
		{
			if(preg_match("~$uriPattern~", $uri))
			{
				$internalRoutes = preg_replace("~$uriPattern~", $uri, $path);

				$segments = explode("/", $internalRoutes);

				$controllerName = ucfirst(array_shift($segments)) . 'Controller';
				$actionName = 'action' . ucfirst(array_shift($segments));

				$params = $segments;

				$filePath = ROOT . '/controllers/' . $controllerName . '.php';

				if( file_exists($filePath) ) {
					include( $filePath );
				}

				$controllerObj = new $controllerName();
				
				require_once(ROOT.'/views/base/head.php');
				$result = call_user_func_array(array($controllerObj, $actionName), $params);
				require_once(ROOT.'/views/base/footer.php');
				if($result != null) {
					break;
				}
			}
		}
	}
}


?>