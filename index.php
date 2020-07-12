<?php

include 'Request.class.php';
include 'api/Api/Api.class.php';
include 'api/Dao/Dao.class.php';
include 'api/Dao/DaoReport.class.php';

$request = Request::parse();

//var_dump($request);

if(Api::execute($request)){
    http_response_code(200);
}else{
    http_response_code(400);
}

?>
