<?php

namespace App\Utils;

class View
{

    /**
     * Variaveis padrao da View
     * @var array
     */
    private static $vars = [];

    /**
     * Metodo responsavel por definir os dados iniciais da classe
     * @param array $vars
     */
    public static function init($vars = [])
    {
        self::$vars = $vars;
    }

    /**
     * Metodo responsavel por retornar o conteudo de uma view
     * @param string $view
     * @return string
     */
    private static function getContentView($view)
    {
        $file = __DIR__ . '/../../resources/view/' . $view . '.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }

    /**
     * Metodo responsavel por retornar o conteudo renderizado de uma view
     * @param string $view
     * @param array $vars (string/numeric)
     * @return string
     */
    public static function render($view, $vars = [])
    {
        // Conteudo da View
        $contentView = self::getContentView($view);

        // Merge das variaveis da View (array)
        $vars = array_merge(self::$vars, $vars);

        // Encontra todas as chaves a serem substituidas 
        preg_match_all('/{{(.*?)}}/', $contentView, $matches);

        // Substitui as chaves encontradas pelos valores correspondentes (para resolver bug de URL localhost/src/%7B%7BURL%7D%7D)
        foreach ($matches[1] as $match) {
            if (array_key_exists($match, $vars)) {
                $contentView = str_replace("{{{$match}}}", $vars[$match], $contentView);
            }
        }

        // Retorna o conteudo ja renderizado
        return $contentView;
    }
}
