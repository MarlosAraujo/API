<?php 

namespace App\Controller\Site;


use \App\Utils\View;

/**
 * Home
 */
class Home extends Page
{
    /**
     * Pagina Principal
     */

    private static function getHeader(){
        return View::render('site/header',[]);
    }
    
    private static function getFooter(){
        return View::render('site/footer',[]);
    }

    public static function getHome()
    {
    	$content = View::render('site/home', [
    		'header' => self::getHeader(),
            'title' => 'Meu APP', 
    		'content' => 'Minha API sendo Montada',
            'footer' => self::getFooter()]
    	);

        return parent::getPage('Newser API', $content);
    }







}