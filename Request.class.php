<?php

class Request {
    /**
     * Contain all the url parts
     * @var array
     */
    public $url;
    /**
     * Http method
     * @var string
     */
    public $method;

    private function __construct($url, $method){
        $this->url = $url;
        $this->method = $method;
    }
    /**
     * Create the bla bla bla
     * @return Request
     */
    public static function parse(){
        $url = (isset($_GET['url']) && !empty($_GET['url'])) ? $_GET['url'] : "";
        $url = trim($url, '/');
        if(empty($url)){
            $url = [];
        }else if(strpos($url, '/') === FALSE){
            $url = [ $url ];
        }else{
            $url = explode('/', $url);
        }
        return new Request($url, $_SERVER['REQUEST_METHOD']);
    }
}