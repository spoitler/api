<?php

class Request {
    /**
     * Contain all the url parts
     * @var array
     */
    public $url;
    public $data;
    /**
     * Http method
     * @var string
     */
    public $method;

    private function __construct($data, $method){
        $this->data = $data;
        $this->method = $method;
    }
    /**
     * Create the bla bla bla
     * @return Request
     */
    public static function parse(){
        //var_dump($_SERVER);
        $url = (isset($_GET['url']) && !empty($_GET['url'])) ? $_GET['url'] : "";
        $url = trim($url, '/');
        if(empty($url)){
            $url = [];
        }else if(strpos($url, '/') === FALSE){
            $url = [ $url ];
        }else{
            $url = explode('/', $url);
        }

        // TODO: url Parser on 'QUERY_STRING' to extract filter (e.g licence)

        $data = isset($_GET['licence']) ? ["url" => $url, "filter" => $_GET['licence']] : ["url" => $url,"filter" => ""];

        return new Request($data, $_SERVER['REQUEST_METHOD']);
    }
}
/**
* Filter
* - licence_plate_reports
*/
