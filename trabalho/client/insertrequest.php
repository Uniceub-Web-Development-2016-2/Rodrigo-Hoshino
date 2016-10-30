<?php
include('httpful.phar');
$json = json_encode($_POST);
$get_request = 'http://localhost/trabalho/api/car/create';
$response = \Httpful\Request::post($get_request)
->sendsJson()
->body($json)
->send();
echo $response->body;
