<?php
class Request{
	private $method;
	private $protocol;
	private $server_ip;
	private $remote_ip;
	private $resource;
	private $parameters;
	
	public function __construct($method, $protocol, $server_ip,$remote_ip, $resource, $parameters)
	{
		$this->method = $method;
		$this->protocol = $protocol;
		$this->server_ip = $server_ip;
		$this->remote_ip = $remote_ip;
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

