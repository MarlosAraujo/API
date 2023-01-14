<?php 

namespace App\Controller\Site;


use \App\Utils\View;

/**
 * Home
 */
class About extends Page
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

    public static function getAbout()
    {
    	$content = View::render('site/about', [
    		'header' => self::getHeader(),
            'title' => 'Meu APP', 
    		'content' => 'Minha API sendo Montada',
            'footer' => self::getFooter()]
    	);

        return parent::getPage('Newser API', $content);
    }







}