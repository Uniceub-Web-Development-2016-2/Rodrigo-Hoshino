<?php
class Request{
        private $method;
        private $protocol;
        private $ip;
        private $resource;
        private $parameters;

        public function __construct($method, $protocol, $ip, $resource, $parameters)
        {
                $this->method = $method;
                $this->protocol = $protocol;
                $this->ip = $ip;
                $this->resource = $resource;
                $this->parameters = $parameters;
        }

        public function __get($atrib)
        {
                return $this->$atrib;
        }
        public function __set($atrib, $value)
        {
                $this->$atrib = $value;
        }


        public function toString()
        {
                $request = $this->protocol.'://'.$this->ip.'/'.$this->resource.'?';
                foreach($this->parameters as $key=>$value)
                        {
                                $request = $request.$key.'='.$value.'&amp';
                        }
                return substr($request,0,-4);
        }



}
$request = new Request('POST','http','172.22.51.17','resource',array('p1'=>'tenis','p2'=>'preto'));
echo $request->toString();

