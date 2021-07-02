<?php

namespace Src\Init;

abstract class Bootstrap {
	private $routes;

	abstract protected function initRoutes(); 

	public function __construct() {
		$this->initRoutes();
		$this->run($this->getUrl());
	}

	public function getRoutes() {
		return $this->routes;
	}

	public function setRoutes(array $routes) {
		$this->routes = $routes;
	}

	protected function run($url) {
		
		//Alterado
		$routeactualexplode = explode("/", $url);
		//Fim alterado

		foreach ($this->getRoutes() as $key => $route) {
			
			//Alterado
			$routearray = explode("/", $route['route']);
			//Fim alterado

			if($url == $route['route']) {
				$class = "App\\Controllers\\".ucfirst($route['controller']);

				$controller = new $class;
				
				$action = $route['action'];

				$controller->$action();
			}

			//Alterado
			if(
				count($routearray) == count($routeactualexplode) &&
				array_search(":id", $routearray)
			) {
				$parameter = $routeactualexplode[array_search(":id", $routearray)];
				$routearray[array_search(":id", $routearray)] = $routeactualexplode[array_search(":id", $routearray)];
				if($routearray == $routeactualexplode) {
					$class = "App\\Controllers\\".ucfirst($route['controller']);

					$controller = new $class;
					
					$action = $route['action'];

					$controller->$action($parameter);
				}
			}
			//Fim alterado
		}
	}

	protected function getUrl() {
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}
}

?>