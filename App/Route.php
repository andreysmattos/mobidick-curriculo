<?php

namespace App;

class Route
{
	
	//Atributos
	private $route;


	//Metodos
	public function __construct(){
		$this->initRoutes();
		$this->run($this->getUrl());
	}

	//isso aki precisa ser configurado conforme a estrutura de pastas do servidor
	public function initRoutes(){
		$routes['home'] = array('route'=>'/!!%20Banco%20Mobidick/public/', 'arq'=>'index.php');
		$routes['login'] = array('route'=>'/!!%20Banco%20Mobidick/public/login', 'arq'=>'login.php');
		$this->setRoutes($routes);
	}

	public function setRoutes(array $route){
		$this->route = $route;
	}


	public function run($url){
		array_walk($this->route, function ($route) use ($url){
			if($url == $route['route']){
				include '../App/html/' . $route['arq'];

			}
		});
	}


	public function getUrl(){
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}
}

