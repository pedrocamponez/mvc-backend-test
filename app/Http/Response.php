<?php

namespace App\Http;

class Response
{

    /**
     * Status HTTP
     * @var integer
     */
    private $httpCode = 200;

    /**
     * Cabecalho do Response
     * @var array
     */
    private $headers = [];

    /**
     * Tipo de conteudo retornado
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Conteudo do Response
     * @var mixed
     */
    public $content;

    /**
     * Metodo responsavel por iniciar a classe e definir os valores
     * @param integer $httpCode
     * @param string $contentType
     * @param mixed $content
     */
    public function __construct($httpCode, $content, $contentType = 'text/html')
    {
        $this->httpCode = $httpCode;
        $this->content = $content;
        $this->setContentType($contentType);
    }

    /**
     * Metodo responsavel por alterar a content type do response
     * @param string $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /**
     * Metodo responsavel por adicionar um registro no cabecalho de response
     * @param string $key
     * @param string $value
     */
    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }

    /**
     * Metodo responsavel por enviar os headers para o navegador
     */

    private function sendHeaders()
    {
        http_response_code($this->httpCode);

        foreach($this->headers as $key=>$value){
            header($key.': '.$value);
        }
    }

    /**
     * Metodo responsavel por enviar, imprimindo na tela, a resposta para o usuario
     */
    public function sendResponse()
    {
        $this->sendHeaders();

        switch ($this->contentType) {
            case 'text/html':
                echo $this->getContentAsString();
                break;
            case 'application/json':
                echo json_encode($this->content);
                break;
            default:
                echo 'Content Type nao suportado';
        }

        if (is_callable($this->content)) {
            $content = call_user_func($this->content);
        }

        exit;
    }

    /**
     * Metodo responsavel por retornar o conteudo como string
     * @return string
     */
    private function getContentAsString()
    {
        if (is_array($this->content) || is_object($this->content)) {
            return json_encode($this->content);
        }

        return (string) $this->content;
    }
}