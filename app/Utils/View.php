<?php 

namespace App\Utils;

/**
 * View
 */
class View
{
	/**
	 * Variaveis padrões da View
	 * @var array
	 */
	private static $vars = [];
	/**
	 * Metodo responsável por definir os dados inicias da classe
	 * @param  array $vars 
	 */
	public static function init($vars = []){
		self::$vars = $vars;
	}

	/**
	 * Metodo responsável por retornar o conteudo da View
	 * @param  [type] $view
	 * @return [type] 
	 */
	private static function getContentView($view)
	{
		$file = __DIR__.'./../resources/view/'.$view.'.html';
		return file_exists($file) ? file_get_contents($file) : 'Arquivo não encontrado!!!';
	}
	/**
	 * Metodo responsavel por retorna o conteudo renderizado da View
	 * @param  string $view
	 * @param  array $params 
	 * @return string       
	 */
	public static function render($view, $params =[])
	{
		// CONTEUDO DA VIEW
		$contentView = self::getContentView($view);

		//CHAVES DO ARRAY DE VARIAVEIS
		$keys = array_keys($params);
		$keys = array_map(function($item){
			return '{{'.$item.'}}';
		}, $keys);
		//RETORNA O CONTEUDO RENDERIZADO  
		return str_replace($keys, array_values($params),$contentView);
	}

}//classe