<?php

namespace App\Http;

use \Closure;
use \Exception;
use \ReflectionFunction;

class Router
{
    /**
     * URL raiz completa
     * @var string
     */
    private $url = '';

    /**
     * Prefixo de todas as rotas do projeto
     * @var string
     */
    private $prefix = '';

    /**
     * Rotas
     * @var array
     */
    private $routes = [];

    /**
     * Instancia de Request
     * @var Request
     */
    private $request;

    /**
     * Metodo responsavel por iniciar a classe e definir os valores
     */
    public function __construct($url)
    {
        $this->request = new Request();
        $this->url = $url;
        $this->setPrefix();
    }

    /**
     * Metodo responsavel por definir o prefixo das rotas
     */
    private function setPrefix()
    {
        $parseUrl = parse_url($this->url);

        $this->prefix = $parseUrl['path'] ?? '';
    }

    /**
     * Metodo responsavel por adicionar uma rota na classe
     */
    private function addRoute($method, $route, $params = [])
    {
        foreach($params as $key=>$value)
        {
            if($value instanceof Closure){
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        // Variaveis da rota dinamica
        $params['variables'] = [];

        // Padrao de validacao das rotas
        $patternVariable = '/{(.*?)}/';
        if(preg_match_all($patternVariable,$route,$matches)){
            $route = preg_replace($patternVariable,'(.*?)',$route);
            $params['variables'] = $matches[1];
        }

        // Validacao da URL
        $patternRoute = '/^'.str_replace('/','\/',$route).'$/';

        $this->routes[$patternRoute][$method] = $params;
    }

    /**
     * Metodo responsavel por definir uma rota de GET
     * @param string $route
     * @param array $params
     */
    public function get($route, $params = [])
    {
        return $this->addRoute('GET', $route, $params);
    }

    /**
     * Metodo responsavel por definir uma rota de POST
     * @param string $route
     * @param array $params
     */
    public function post($route, $params = [])
    {
        return $this->addRoute('POST', $route, $params);
    }

    /**
     * Metodo responsavel por definir uma rota de PUT
     * @param string $route
     * @param array $params
     */
    public function put($route, $params = [])
    {
        return $this->addRoute('PUT', $route, $params);
    }
    
    /**
     * Metodo responsavel por definir uma rota de DELETE
     * @param string $route
     * @param array $params
     */
    public function delete($route, $params = [])
    {
        return $this->addRoute('DELETE', $route, $params);
    }

    /**
     * Metodo responsavel por retornar a URI sem o prefixo
     * @return string
     */
    private function getUri()
    {
        $uri = $this->request->getUri();

        $xUri = strlen($this->prefix) ? explode($this->prefix,$uri) : [$uri];

        return end($xUri);
    }

    /**
     * Metodo responsavel por retornar os dados da rota atual
     * @return array
     */
    private function getRoute()
    {
        // URI
        $uri = $this->getUri();

        // METODO
        $httpMethod = $this->request->getHttpMethod();

        // Validando as rotas
        foreach($this->routes as $patternRoute=>$methods){
            // Verificando se a URI da match com o padrao de URI ($patternRoute)
            if(preg_match($patternRoute,$uri,$matches)){
                // Verifica o metodo HTTP
                if(isset($methods[$httpMethod])){
                    // Removendo o inicio da rota (que e desnecessario)
                    unset($matches[0]);

                    // Variaveis processadas (inclusive a variavel ja no request)
                    $keys = $methods[$httpMethod]['variables'];
                    $methods[$httpMethod]['variables'] = array_combine($keys,$matches);
                    $methods[$httpMethod]['variables']['request'] = $this->request;

                    // Retorno dos parametros da rota
                    return $methods[$httpMethod];
                }

                // Metodo nao existe ou nao eh permitido
                throw new Exception("Metodo nao permitido", 405);
            }
        }

        // URL nao foi encontrada
        throw new Exception("URL nao encontrada", 404);
    }

    /**
     * Metodo responsavel para executar a rota
     * @return Response
     */
    public function run()
    {
        try{
            
            // Pega a rota atual
            $route = $this->getRoute();

            // Verifica o controlador
            if(!isset($route['controller'])){
                throw new Exception("A URL nao pode ser processada", 500);
            }
            
            $args = [];

            //Reflection
            $reflection = new ReflectionFunction($route['controller']);
            foreach($reflection->getParameters() as $parameter){
                $name = $parameter->getName();
                $args[$name] = $route['variables'][$name] ?? '';
            }

            // Retorna a execucao da funcao
            return call_user_func_array($route['controller'], $args);

        } catch(Exception $e){
            return new Response($e->getCode(),$e->getMessage());
        }
    }
}