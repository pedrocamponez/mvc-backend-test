<?php

namespace App\Http;

class Request
{
    /**
     * Metodo HTTP da requisicao
     * @var string
     */
    private $httpMethod;

    /**
     * URI da pagina
     * @var string
     */
    private $uri;

    /**
     * Parametros da URL ($_GET)
     * @var array
     */
    private $queryParams = [];

    /**
     * Variaveis do POST da pagina ($_POST)
     * @var array
     */
    private $postVars = [];

    /**
     * Cabecalho da requisicao
     * @var array
     */
    private $headers = [];

    /**
     * Construtor da classe
     */
    public function __construct()
    {
        $this->queryParams = $_GET ?? [];
        $this->postVars = $_POST ?? [];
        $this->headers = getallheaders();
        $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri = $_SERVER['REQUEST_URI'] ?? '';
    }

    /**
     * Metodo para retornar o HTTP da requisicao
     * @return string
     */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    /**
     * Metodo para retornar a URI da requisicao
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Metodo para retornar os headers da requisicao
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Metodo para retornar os parametros da URL da requisicao
     * @return array
     */
    public function getQueryParams()
    {
        return $this->queryParams;
    }

    /**
     * Metodo para retornar as variaveis POST da requisicao
     * @return array
     */
    public function getPostVars()
    {
        return $this->postVars;
    }

}