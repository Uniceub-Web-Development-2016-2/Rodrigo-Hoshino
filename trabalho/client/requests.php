<?php
include('httpful.phar');
$get_request = 'http://localhost/trabalho/api/car?id_car="'.$_GET['search'].'"';
$response = \Httpful\Request::get($get_request)->send();
echo  $response->body;
