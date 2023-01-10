<?php 

namespace App\Http;

use \Closure;
use \Exception;

class Router
{
	/**
	 * Url Completa do Projeto
	 * @var string
	 */
	private $url = '';
	/**
	 * Prefixo de todas as rotas
	 * @var string
	 */
	private $prefix = '';
	/**
	 * Indice de rotas
	 * @var array
	 */
	private $routes = [];
	/**
	 * Instancia de Request
	 * @var Request
	 */
	private $request;

	public function __construct($url){
		$this->request  = new Request();
		$this->url 		= $url; 
		$this->setPrefix();
   }

	/**
	 * Metodo responsavel por definir o prefixo das rotas
	 */
	 private function setPrefix(){
		//INFORMAÇÔES DA URL ATUAL
		$parseUrl = parse_url($this->url);
		//DEFINE O PREFIXO
		$this->prefix = $parseUrl['path'] ?? '';
	}
	/**
	 * Metodo
	 * @param string $method 
	 * @param string $route 
	 * @param array  $params 
	 */
	private function addRoute($method,$route,$params=[]){
		//VALIDAÇÂO DOS PARAMETROS
		foreach ($params as $key=>$value) {
			if ($value instanceof Closure) {
				$params['controller'] = $value;
				unset($params[$key]);
				continue;
			}
		}

		// PADRAO REGEX DE VALIDAÇÂO DE URL
		$patternRoute = '/^'.str_replace('/','\/',$route).'$/';

		// ADICIONA A ROTA DENTRO DA CLASSE
		$this->routes[$patternRoute][$method] = $params;
	}

	/**
	 * Metodo responsavel por definie uma rota de GET
	 * @param  string $route  [description]
	 * @param  array  $params [description]
	 */
	public function get($route, $params = []){
		return $this->addRoute('GET',$route,$params);
	}	
	/**
	 * Metodo responsavel por definie uma rota de POST
	 * @param  string $route  [description]
	 * @param  array  $params [description]
	 */
	public function post($route, $params = []){
		return $this->addRoute('POST',$route,$params);
	}
	/**
	 * Metodo responsavel por definie uma rota de PUT
	 * @param  string $route  [description]
	 * @param  array  $params [description]
	 */
	public function put($route, $params = []){
		return $this->addRoute('PUT',$route,$params);
	}
	/**
	 * Metodo responsavel por definie uma rota de DELETE
	 * @param  string $route  [description]
	 * @param  array  $params [description]
	 */
	public function delete($route, $params = []){
		return $this->addRoute('DELETE',$route,$params);
	}
	/**
	 * Metodo responsavel por retornar os dados da rota atual
	 * @return array
	 */
	private function getRoute(){
		//URI
		$uri = $this->getUri();
		//METHOD
		$httpMethod = $this->request->getHttpMethod();
		//VALIDA AS ROTAS
		foreach ($this->routes as $patternRoute=>$methods) {

			//VERIFICA SE A URI BATE O PADRAO
			if (preg_match($patternRoute, $uri)) {
				//VERIFICAR O METODO
				if ($methods[$httpMethod]) {
					//RETORNO DOS PARAMETROS DA ROTA
					return $methods[$httpMethod];
				}
				//METODO NAO PERMITIDO
				throw new Exception("Metodo não é permitido", 405);
			}
		}
		throw new Exception("URL não encontrada", 404);

	}
	/**
	 * Metodo responsavel por retornar a URI desconsiderando o prefixo
	 * @return  string
	 */
	private function getUri(){
		//URI DA REQUEST
		$uri = $this->request->getUri();
		//FATIA A URI COM O PREFIXO
		$xUri = strlen($this->prefix) ? explode($this->prefix,$uri) : [$uri];
		//RETORNA A URI SEM PREFIXO
		return end($xUri); 
	}
	/**
	 * Metodo responsavel por executar a rota atual
	 * @return  Response
	 */
	public function run(){
		try{
			//Obtem a Rota Atual
			$route = $this->getRoute(); 
			//verificar o controlador
			if(!isset($route['controller'])){
				throw new Exception('A Url não pode ser processada!!!', 500);
			}
			// ARGUMENTOS DA FUNÇÃO
			$args = [];
			// RETORNA A EXECUÇÃO DA FUNÇÃO
			return call_user_func_array($route['controller'],$args);
		}catch (Exception $e){
			return new Response($e->getCode(),$e->getMessage());
		}
	}


/*
			echo '<pre>';
			print_r($route);
			echo '</pre>';exit;	
*/



}//classe