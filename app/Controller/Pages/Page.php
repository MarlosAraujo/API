<?php 

namespace App\Controller\Pages;


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
        return View::render('pages/page', [
            'title'   => $title,
            'content' => $content
        ]);
    }







}