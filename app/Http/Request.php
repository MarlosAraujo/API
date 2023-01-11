<?php 

namespace App\Http;

/**
 * summary
 */
class Request
{
    /**
     * Metodo HTTP da requisicao
     * @var string
     */
    private $httpMethod;
    /**
     * URI da Pagina
     * @var array
     */
    private $uri;
    /**
     * Parametros da URL
     * @var array
     */
    private $queryParams = [];

    private $postVars = [];

    private $headers = [];

    public function __construct(){
    	$this->queryParams  = $_GET ?? [];
    	$this->postVars 	= $_POST ?? [];
    	$this->headers      = getallheaders();
    	$this->httpMethod   = $_SERVER['REQUEST_METHOD'] ?? '';
    	$this->uri 		 	= $_SERVER['REQUEST_URI'] ?? '';

    }

    /**
     * Metodo responsavel por retornar o Metodo da Requisição
     * @return string
     */
    public function getHttpMethod(){
    	return $this->httpMethod; 
    }
    /**
     * Metodo responsavel por retornar a URI da Requisição
     * @return string
     */
    public function getUri(){
    	return $this->uri; 
    }
    /**
     * Metodo responsavel por retornar os headers da Requisição
     * @return array
     */    
    public function getHeaders(){
    	return $this->headers; 
    }
    /**
     * Metodo responsavel por retornar os parametros da URL da Requisição
     * @return array
     */    
    public function getQueryParams(){
    	return $this->queryParams; 
    }
     /**
     * Metodo responsavel por retornar as Variaveis POST da Requisição
     * @return array
     */
    public function getPostVars(){
    	return $this->postVars; 
    }

}//classe
