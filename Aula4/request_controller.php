<?php
class RequestController
{
        const VALID_METHODS = array('GET', 'POST', 'PUT', 'DELETE');
        const VALID_PROTOCOLS = array('http/1.0','http/1.1','http/1.2','http/1.3','https');     
        public function create_request($request_info)
        {
                if(!self::is_valid_method($request_info['REQUEST_METHOD']))
                {
                        return array("code" => "405", "message" => "method not allowed");
                        
                }       
                
                if(!filter_var($request_info['REMOTE_ADDR'], FILTER_VALIDATE_IP){
                        return array("code"=>"502", "message" => "invalid remote ip");
                }
                if(!filter_var($request_info['SERVER_ADDR'], FILTER_VALIDATE_IP){
                        return array("code"=>"502", "message" => "invalid server ip");
                }
                if(!self::is_valid_protocol($request_info['SERVER_PROTOCOL'])){
                        return array("code"=>"400", "message" => "invalid protocol");
                }
                if(strpos($request_info['REQUEST_URI'], ' ') != false){
                        return array("code"=>"400", "message" => "invalid uri");
                }
        
                if(strpos($request_info['QUERY_STRING'], ' ') != false){
                        return array("code"=>"400", "message"=>"invalid query");
                }
        //      file_get_contents('php://input');
                
                return new Request();
                        
        }
        
        public function is_valid_method($method)
        {
                if( is_null($method) || !in_array($method, self::VALID_METHODS))
                        return false;
                
                return true;
        }
        
        public function is_valid_protocol($protocol)
        {
                if(is_null($protocol) || !in_array(strtolower($protocol), self::VALID_PROTOCOLS))
                        return false;
                return true;
        }
}