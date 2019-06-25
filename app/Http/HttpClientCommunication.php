<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http;

/**
 * Description of HttpClientCommunication
 *
 * @author zahidkhowaja
 */
class HttpClientCommunication 
{
	protected $url = null;
	protected $restConnector = null;
	protected $header = null;
	protected $response = null;

//	public function __construct($token = null)
	public function __construct()
	{
		$this->restConnector = new \App\Comms\REST\Request();

		$headers ["Accept"] = "application/json";
		$headers["Content-Type"] = "application/json";
//		$headers["Token"] = $token;
		$this->restConnector->defaultHeaders($headers);
		//$this->restConnector->o

//		$this->restConnector->proxy()
//
//




        $this->restConnector->proxy('', '3128','http://webproxy.efulife.com:3128');


		$this->url = 'http://localhost/ipmapi/public';
		//$this->url = 'http://172.16.0.101:8087';
//		if(env('APP_DEV'))
//		{
//			$this->url = 'http://172.16.0.101:8087';
//			//$this->url = 'http://172.16.0.80:8082';
//			//$this->url = 'http://test-apimw.efulife.com';
//		}
//		else 
//		{
//			$this->url = 'http://test-apimw.efulife.com';
//		}
		
	}
	
	public function storeData($id =null, $data, $post = false)
	{ 
		if ($post === true)
		{
		    //dd($this->url);
			//dd($this->url.'/'.$id, $this->headers(), json_encode($data));
			$this->response = $this->restConnector->post($this->url.'/'.$id, $this->headers(), json_encode($data));
			//dd($this->response);
			return $this->response;
		}
		
		$this->response = $this->restConnector->put($this->url . '/'. $id, $this->headers(), json_encode($data));
		return $this->response;
	}
//
//	public function updateData($id, $data)
//	{  
//		$this->response = $this->restConnector->patch($this->url . '/'. $id, $this->headers(), json_encode($data));
//		return $this->response;
//	}
//	
	public function getData($id , $queryParams = null)
	{   
		//var_dump($this->url . '/'. $id, $this->headers(), $queryParams); exit;
		$resp = $this->restConnector->get($this->url . '/'. $id, $this->headers(), $queryParams);
	//	dd($resp);
		if(!$resp->isSuccessful())
		{
			return null;
		}
		//dd(json_decode($resp->rawBody(),true));
		return json_decode($resp->rawBody(),true);
	}
//
//	public function delete($id, $headers = null)
//	{ 
//		$resp = $this->restConnector->delete($this->url . '/' . $id, $this->headers());
//		//print_r($resp); exit;
//		return $resp->isSuccessful();
//	}
//	
//	public function getRawBody()
//    {
//        return json_decode($this->response->rawBody(),true);
//    }
//
//    public function getResponse()
//    {
//        return $this->response;
//    }
//
    public function headers()
    {
  //       $this->header['Authorization'] = 'Bearer ' . "XXXXAAA123BBBHAPP";
		// $this->header['channelcode'] = 'HEALTHAPP';
//		$this->header['Content-Type'] = 'application/json';
//		$this->header['Connection'] = 'Keep-Alive';
		
        return $this->header;
    }
}
