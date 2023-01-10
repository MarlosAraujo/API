<?php 

namespace App\Controller\Site;


use \App\Utils\View;


/**
 * Home
 */
class Page
{
    /**
     * Metodo responsavel por retonar o conteudo (view) da pagina Generica
     * @return string
     */

    private static function config($db = [])
    {
        return $db;
    }

    public static function getPage($title, $content)
    {
        return View::render('site/page', [
            'title'   => $title,
            'content' => $content
        ]);
    }







}