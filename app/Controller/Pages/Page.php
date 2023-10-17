<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Page
{
    /**
     * Metodo responsavel por renderizar o header do html
     * @return string
     */
    private static function getHeader()
    {
        return View::render('Pages/header');
    }

    /**
     * Metodo responsavel por renderizar o footer do html
     * @return string
     */
    private static function getFooter()
    {
        return View::render('Pages/footer');
    }

    /**
     * Metodo responsavel por retornar o conteudo da view na page.html
     * @return string
     */
    public static function getPage($title,$content)
    {
        return View::render('Pages/page', [
            'title' => $title,
            'header' => self::getHeader(),
            'content' => $content,
            'footer' => self::getFooter()
        ]);
    }
}