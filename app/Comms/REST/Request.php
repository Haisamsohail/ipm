<?php

namespace App\Comms\REST;

/**
 * Request
 * 
 * Inspired by UNIREST
 *
 * @author anthony
 */
class Request
{
	protected $cookie = null;
	protected $cookieFile = null;
	protected $curlOpts = array();
	protected $defaultHeaders = array();
	protected $handle = null;
	protected $jsonOpts = array();
	protected $socketTimeout = null;
	protected $verifyPeer = true;
	protected $verifyHost = true;
	protected $auth =
	[
		'user' => '',
		'pass' => '',
		'method' => CURLAUTH_BASIC
	];
	
	protected $proxy =
	[
		'port' => false,
		'tunnel' => false,
		'address' => false,
		'type' => CURLPROXY_HTTP,
		'auth' =>
		[
			'user' => '',
			'pass' => '',
			'method' => CURLAUTH_BASIC
		]
	];
	
	const USER_AGENT = 'VFREST/1.0';

	/**
	 * Set JSON decode mode
	 *
	 * @param bool $assoc When TRUE, returned objects will be converted into associative arrays.
	 * @param bool $depth User specified recursion depth.
	 * @param bool $options Bitmask of JSON decode options. Currently only JSON_BIGINT_AS_STRING is supported (default is to cast large integers as floats)
	 */
	public function jsonOpts($assoc = false, $depth = 512, $options = 0)
	{
		return $this->jsonOpts = array($assoc, $depth, $options);
	}
	
    /**
     * Verify SSL peer
     *
     * @param bool $enabled enable SSL verification, by default is true
     */
    public function verifyPeer($enabled)
    {
        return $this->verifyPeer = $enabled;
    }
    
	/**
	 * Verify SSL host
	 *
	 * @param bool $enabled enable SSL host verification, by default is true
	 */
	public function verifyHost($enabled)
	{
		return $this->verifyHost = $enabled;
	}

	/**
	 * Set a timeout
	 *
	 * @param integer $seconds timeout value in seconds
	 */
	public function timeout($seconds)
	{
		return $this->socketTimeout = $seconds;
	}
	
	/**
	 * Set default headers to send on every request
	 *
	 * @param array $headers headers array
	 */
	public function defaultHeaders($headers)
	{
		return $this->defaultHeaders = array_merge($this->defaultHeaders, $headers);
	}

	/**
	 * Set a new default header to send on every request
	 *
	 * @param string $name header name
	 * @param string $value header value
	 */
	public function defaultHeader($name, $value)
	{
		return $this->defaultHeaders[$name] = $value;
	}


	/**
	 * Clear all the default headers
	 */
	public function clearDefaultHeaders()
	{
		return $this->defaultHeaders = array();
	}

	/**
	 * Set curl options to send on every request
	 *
	 * @param array $options options array
	 * @return array
	 */
	public function curlOpts($options)
	{
		return self::MergeCurlOptions($this->curlOpts, $options);
	}

	/**
	 * Set a new default header to send on every request
	 *
	 * @param string $name header name
	 * @param string $value header value
	 */
	public function curlOpt($name, $value)
	{
		return $this->curlOpts[$name] = $value;
	}

	/**
	 * Clear all the default headers
	 */
	public function clearCurlOpts()
	{
		return $this->curlOpts = array();
	}

	/**
	 * Set a coockie string for enabling coockie handling
	 *
	 * @param string $cookie
	 */
	public function cookie($cookie)
	{
		$this->cookie = $cookie;
	}
	/**
	 * Set a coockie file path for enabling coockie handling
	 *
	 * $cookieFile must be a correct path with write permission
	 *
	 * @param string $cookieFile - path to file for saving cookie
	 */
	public function cookieFile($cookieFile)
	{
		$this->cookieFile = $cookieFile;
	}

	/**
	 * Set authentication method to use
	 *
	 * @param string $username authentication username
	 * @param string $password authentication password
	 * @param string $method authentication method
	 */
	public function auth($username = '', $password = '', $method = CURLAUTH_BASIC)
	{
		$this->auth['user'] = $username;
		$this->auth['pass'] = $password;
		$this->auth['method'] = $method;
	}

	/**
	 * Set proxy to use
	 *
	 * @param string $address proxy address
	 * @param string $port proxy port
	 * @param string $type proxy type (Available options for this are CURLPROXY_HTTP, CURLPROXY_HTTP_1_0 CURLPROXY_SOCKS4, CURLPROXY_SOCKS5, CURLPROXY_SOCKS4A and CURLPROXY_SOCKS5_HOSTNAME)
	 * @param string $tunnel enable/disable tunneling
	 */
	public function proxy($address, $port = 1080, $type = CURLPROXY_HTTP, $tunnel = false)
	{
		$this->proxy['type'] = $type;
		$this->proxy['port'] = $port;
		$this->proxy['tunnel'] = $tunnel;
		$this->proxy['address'] = $address;

	}

	/**
	 * Set proxy authentication method to use
	 *
	 * @param string $username authentication username
	 * @param string $password authentication password
	 * @param string $method authentication method
	 * @param string $tunnel enable/disable tunneling
	 */
	public function proxyAuth($username = '', $password = '', $method = CURLAUTH_BASIC)
	{
		$this->proxy['auth']['user'] = $username;
		$this->proxy['auth']['pass'] = $password;
		$this->proxy['auth']['method'] = $method;
	}

	/**
	 * Send a GET request to a URL
	 *
	 * @param string $url URL to send the GET request to
	 * @param array $headers additional headers to send
	 * @param mixed $parameters parameters to send in the querystring
	 * @param string $username Authentication username (deprecated)
	 * @param string $password Authentication password (deprecated)
	 * @return Platform\Comms\REST\Response
	 */
	public function get($url, $headers = array(), $parameters = null, $username = null, $password = null)
	{
		return $this->send(HTTPMethod::GET, $url, $parameters, $headers, $username, $password);
	}

	/**
	 * Send a HEAD request to a URL
	 * @param string $url URL to send the HEAD request to
	 * @param array $headers additional headers to send
	 * @param mixed $parameters parameters to send in the querystring
	 * @param string $username Basic Authentication username (deprecated)
	 * @param string $password Basic Authentication password (deprecated)
	 * @return Platform\Comms\REST\Response
	 */
	public function head($url, $headers = array(), $parameters = null, $username = null, $password = null)
	{
		return $this->send(HTTPMethod::HEAD, $url, $parameters, $headers, $username, $password);
	}

	/**
	 * Send a OPTIONS request to a URL
	 * @param string $url URL to send the OPTIONS request to
	 * @param array $headers additional headers to send
	 * @param mixed $parameters parameters to send in the querystring
	 * @param string $username Basic Authentication username
	 * @param string $password Basic Authentication password
	 * @return Platform\Comms\REST\Response
	 */
	public function options($url, $headers = array(), $parameters = null, $username = null, $password = null)
	{
		return $this->send(HTTPMethod::OPTIONS, $url, $parameters, $headers, $username, $password);
	}

	/**
	 * Send a CONNECT request to a URL
	 * @param string $url URL to send the CONNECT request to
	 * @param array $headers additional headers to send
	 * @param mixed $parameters parameters to send in the querystring
	 * @param string $username Basic Authentication username (deprecated)
	 * @param string $password Basic Authentication password (deprecated)
	 * @return Platform\Comms\REST\Response
	 */
	public function connect($url, $headers = array(), $parameters = null, $username = null, $password = null)
	{
		return $this->send(HTTPMethod::CONNECT, $url, $parameters, $headers, $username, $password);
	}

	/**
	 * Send POST request to a URL
	 * @param string $url URL to send the POST request to
	 * @param array $headers additional headers to send
	 * @param mixed $body POST body data
	 * @param string $username Basic Authentication username (deprecated)
	 * @param string $password Basic Authentication password (deprecated)
	 * @return Platform\Comms\REST\Response response
	 */
	public function post($url, $headers = array(), $body = null, $username = null, $password = null)
	{
	//	dd($this->send(HTTPMethod::POST, $url, $body, $headers, $username, $password));
		return $this->send(HTTPMethod::POST, $url, $body, $headers, $username, $password);
	}

	/**
	 * Send DELETE request to a URL
	 * @param string $url URL to send the DELETE request to
	 * @param array $headers additional headers to send
	 * @param mixed $body DELETE body data
	 * @param string $username Basic Authentication username (deprecated)
	 * @param string $password Basic Authentication password (deprecated)
	 * @return Platform\Comms\REST\Response
	 */
	public function delete($url, $headers = array(), $body = null, $username = null, $password = null)
	{
		return $this->send(HTTPMethod::DELETE, $url, $body, $headers, $username, $password);
	}

	/**
	 * Send PUT request to a URL
	 * @param string $url URL to send the PUT request to
	 * @param array $headers additional headers to send
	 * @param mixed $body PUT body data
	 * @param string $username Basic Authentication username (deprecated)
	 * @param string $password Basic Authentication password (deprecated)
	 * @return Platform\Comms\REST\Response
	 */
	public function put($url, $headers = array(), $body = null, $username = null, $password = null)
	{
		return $this->send(HTTPMethod::PUT, $url, $body, $headers, $username, $password);
	}

	/**
	 * Send PATCH request to a URL
	 * @param string $url URL to send the PATCH request to
	 * @param array $headers additional headers to send
	 * @param mixed $body PATCH body data
	 * @param string $username Basic Authentication username (deprecated)
	 * @param string $password Basic Authentication password (deprecated)
	 * @return Platform\Comms\REST\Response
	 */
	public function patch($url, $headers = array(), $body = null, $username = null, $password = null)
	{
		return $this->send(HTTPMethod::PATCH, $url, $body, $headers, $username, $password);
	}

	/**
	 * Send TRACE request to a URL
	 * @param string $url URL to send the TRACE request to
	 * @param array $headers additional headers to send
	 * @param mixed $body TRACE body data
	 * @param string $username Basic Authentication username (deprecated)
	 * @param string $password Basic Authentication password (deprecated)
	 * @return Platform\Comms\REST\Response
	 */
	public function trace($url, $headers = array(), $body = null, $username = null, $password = null)
	{
		return $this->send(HTTPMethod::TRACE, $url, $body, $headers, $username, $password);
	}

	/**
	 * This function is useful for serializing multidimensional arrays, and avoid getting
	 * the 'Array to string conversion' notice
	 */
	public static function BuildHTTPCurlQuery($data, $parent = false)
	{
		$result = [];
		if(is_object($data)) { $data = get_object_vars($data); }
		
		foreach ($data as $key => $value)
		{
			if($parent) { $new_key = sprintf('%s[%s]', $parent, $key); }
			else { $new_key = $key; }
			
			if (!$value instanceof \CURLFile and (is_array($value) or is_object($value)))
			{
				$result = array_merge($result, self::BuildHTTPCurlQuery($value, $new_key));
			}
			else
			{
				$result[$new_key] = $value;
			}
		}
		
		return $result;
	}

	/**
	 * Send a cURL request
	 * @param Platform\Comms\REST\Method $method HTTP method to use
	 * @param string $url URL to send the request to
	 * @param mixed $body request body
	 * @param array $headers additional headers to send
	 * @param string $username Authentication username (deprecated)
	 * @param string $password Authentication password (deprecated)
	 * @throws Exception if a cURL error occurs
	 * @return Platform\Comms\REST\Response
	 */
	public function send($method, $url, $body = null, $headers = array(), $username = null, $password = null)
	{
		//dd($method, $url, $body , $headers );
		$this->handle = curl_init();
		
		if($method !== HTTPMethod::GET)
		{
			curl_setopt($this->handle, CURLOPT_CUSTOMREQUEST, $method);
			
			if(is_array($body) || $body instanceof \Traversable)
			{
				//dd($this->handle, CURLOPT_POSTFIELDS, self::BuildHTTPCurlQuery($body));
				curl_setopt($this->handle, CURLOPT_POSTFIELDS, self::BuildHTTPCurlQuery($body));
			}
			else
			{
				curl_setopt($this->handle, CURLOPT_POSTFIELDS, $body);
			}
		}
		elseif(is_array($body))
		{
			if (strpos($url, '?') !== false) { $url .= '&'; } else { $url .= '?'; }
			$url .= urldecode(http_build_query(self::BuildHTTPCurlQuery($body)));
		}
		//var_dump($url);exit;
		$curl_base_options =
		[
			CURLOPT_URL => self::EncodeURL($url),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_HTTPHEADER => $this->GetFormattedHeaders($headers),
			CURLOPT_HEADER => true,
			CURLINFO_HEADER_OUT => true,
			CURLOPT_SSL_VERIFYPEER => $this->verifyPeer,
			//CURLOPT_SSL_VERIFYHOST accepts only 0 (false) or 2 (true). Future versions of libcurl will treat values 1 and 2 as equals
			CURLOPT_SSL_VERIFYHOST => $this->verifyHost === false ? 0 : 2,
			CURLOPT_SSLVERSION => 6,
			// If an empty string, '', is set, a header containing all supported encoding types is sent
			CURLOPT_ENCODING => ''
		];
	//	dd($this->handle, self::MergeCurlOptions($curl_base_options, $this->curlOpts));
		curl_setopt_array($this->handle, self::MergeCurlOptions($curl_base_options, $this->curlOpts));
		
		if ($this->socketTimeout !== null) { curl_setopt($this->handle, CURLOPT_TIMEOUT, $this->socketTimeout); }
		if ($this->cookie) { curl_setopt($this->handle, CURLOPT_COOKIE, $this->cookie); }
		if ($this->cookieFile)
		{
			curl_setopt($this->handle, CURLOPT_COOKIEFILE, $this->cookieFile);
			curl_setopt($this->handle, CURLOPT_COOKIEJAR, $this->cookieFile);
		}
		
		// supporting deprecated http auth method
		if (!empty($username))
		{
			curl_setopt_array
			(
				$this->handle,
				[
					CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
					CURLOPT_USERPWD  => $username . ':' . $password
				]
			);
		}
		
		if (!empty($this->auth['user']))
		{
			curl_setopt_array
			(
				$this->handle,
				[
					CURLOPT_HTTPAUTH => $this->auth['method'],
					CURLOPT_USERPWD  => $this->auth['user'] . ':' . $this->auth['pass']
				]
			);
		}
//dd($this->proxy['address']);
		if ($this->proxy['address'] !== false)
		{
			
			curl_setopt_array
			(
				$this->handle,
				[
					CURLOPT_PROXYTYPE       => $this->proxy['type'],
					CURLOPT_PROXY           => $this->proxy['address'],
					CURLOPT_PROXYPORT       => $this->proxy['port'],
					CURLOPT_HTTPPROXYTUNNEL => $this->proxy['tunnel'],
					CURLOPT_PROXYAUTH       => $this->proxy['auth']['method'],
					CURLOPT_PROXYUSERPWD    => $this->proxy['auth']['user'] . ':' . $this->proxy['auth']['pass']
				]
			);
		}
//		dd($this->handle);
		$response   = curl_exec($this->handle);
//		dd('aya');
		 // dd($response.'request');
		$error      = curl_error($this->handle);
		// dd($error);
		$info       = self::getInfo();
//		dd($info);
		
		if ($error) { throw new \Exception($error); }
		
		// Split the full response in its headers and body
		$header_size = $info['header_size'];
		$header      = substr($response, 0, $header_size);
		$body        = substr($response, $header_size);
		$httpCode    = $info['http_code'];
		
		return new Response($httpCode, $body, $header, $this->jsonOpts);
	}
	
	public function getInfo($opt = false)
	{
		if ($opt) { $info = curl_getinfo($this->handle, $opt); }
		else { $info = curl_getinfo($this->handle); }
		
		return $info;
	}
	
	public function getCurlHandle()
	{
		return $this->handle;
	}
	
	public function getFormattedHeaders($headers)
	{
		$formattedHeaders = [];
		
		$combinedHeaders = array_change_key_case(array_merge((array) $headers, $this->defaultHeaders));
		
		foreach ($combinedHeaders as $key => $val) { $formattedHeaders[] = self::GetHeaderString($key, $val); }
		
		if (!array_key_exists('user-agent', $combinedHeaders)) { $formattedHeaders[] = self::USER_AGENT; }
		if (!array_key_exists('expect', $combinedHeaders)) { $formattedHeaders[] = 'expect:'; }
		
		return $formattedHeaders;
	}
	
	protected static function GetArrayFromQuerystring($query)
	{
		$query = preg_replace_callback
		(
			'/(?:^|(?<=&))[^=[]+/',
			function ($match)
			{
				return bin2hex(urldecode($match[0]));
			},
			$query
		);
		
		$values = null;
		parse_str($query, $values);
		
		return array_combine(array_map('hex2bin', array_keys($values)), $values);
	}

	/**
	 * Ensure that a URL is encoded and safe to use with cURL
	 * @param  string $url URL to encode
	 * @return string
	 */
	protected static function EncodeURL($url)
	{
		$url_parsed = parse_url($url);
		$scheme = $url_parsed['scheme'] . '://';
		$host   = $url_parsed['host'];
		$port   = (isset($url_parsed['port']) ? $url_parsed['port'] : null);
		$path   = (isset($url_parsed['path']) ? $url_parsed['path'] : null);
		$query  = (isset($url_parsed['query']) ? $url_parsed['query'] : null);
		if ($query !== null)
		{
			$query = '?' . http_build_query(self::GetArrayFromQuerystring($query));
		}
		
		if ($port && $port[0] !== ':') { $port = ':' . $port; }
		
		$result = $scheme . $host . $port . $path . $query;
		return $result;
	}

	protected static function GetHeaderString($key, $val)
	{
		return trim(strtolower($key))  . ': ' . $val;
	}

	/**
	 * 
	 * @param array $existingOptions
	 * @param array $newOptions
	 * @return array
	 */
	protected static function MergeCurlOptions(&$existingOptions, $newOptions)
	{
		$existingOptions+=$newOptions;
		return $existingOptions;
	}
}
