<?php 

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
            'title'                     => _SITE_TITLE,
            'content'                   => 'Acessando pagina de login',
            '_URL'                      => _URL,
            '_FORM_SUBMIT'              => _FORM_SUBMIT,
            '_REGISTER_ACCOUNT'         => _FORM_REGISTER_ACCOUNT,
            '_FORM_REMEMBER_ME'         => _FORM_REMEMBER_ME,
            '_FORM_PASSWORD'            => _FORM_PASSWORD,
            '_FORM_EMAIL'               => _FORM_EMAIL,
            '_FORM_PASSWORD_FORGOT'     => _FORM_PASSWORD_FORGOT,
            '_FORM_ACCESS_RESTRICT'     => _FORM_ACCESS_RESTRICT,
            ]
        );
/*
        echo '<pre>';
        print_r($content);
        echo '</pre>';exit;
*/
        return $content;
    }







}