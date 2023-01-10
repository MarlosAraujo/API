<?php 

print_r(_SITE_TITLE);

namespace App\Controller;


use \App\Utils\View;

/**
 * Home
 */
class Login
{
    /**
     * Pagina Login
     */    
    public static function getLogin()
    {
        $content = View::render('pages/login', [
            'title' => _SITE_TITLE
            ]
        );

        return self::getPage('Newser API', $content);
    }







}