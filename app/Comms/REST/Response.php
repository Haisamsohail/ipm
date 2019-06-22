<?php

namespace App\Comms\REST;

/**
 * Reponse
 * 
 * Inspired by UNIREST
 *
 * @author anthony
 */
class Response
{
	protected $code;
	protected $rawBody;
	protected $body;
	protected $headers;

	/**
	 * @param int $code response code of the cURL request
	 * @param string $raw_body the raw body of the cURL response
	 * @param string $headers raw header string from cURL response
	 * @param array $json_args arguments to pass to json_decode function
	 */
	public function __construct($code, $raw_body, $headers, $json_args = array())
	{
		$this->code     = $code;
		$this->headers  = $this->parseHeaders($headers);
		$this->rawBody  = $raw_body;
		$this->body     = $raw_body;
		
		// make sure raw_body is the first argument
		array_unshift($json_args, $raw_body);
		$json = call_user_func_array('json_decode', $json_args);
		if (json_last_error() === JSON_ERROR_NONE) { $this->body = $json; }
	}
	
	public function code() { return $this->code; }
	public function headers() { return $this->headers; }
	public function rawBody() { return $this->rawBody; }
	public function body() { return $this->body; }
	
	public function isSuccessful()
	{
		return false !== filter_var($this->code,FILTER_VALIDATE_INT, ['options'=>['min_range'=>200,'max_range'=>299]] );
	}
	
	/**
	 * if PECL_HTTP is not available use a fall back function
	 *
	 * thanks to ricardovermeltfoort@gmail.com
	 * http://php.net/manual/en/function.http-parse-headers.php#112986
	 */
	private function parseHeaders($raw_headers)
	{
		if (function_exists('http_parse_headers')) { return http_parse_headers($raw_headers); }
		
		$key = '';
		$headers = [];

		foreach (explode("\n", $raw_headers) as $i => $h)
		{
			$h = explode(':', $h, 2);

			if (isset($h[1]))
			{
				if (!isset($headers[$h[0]]))
				{
					$headers[$h[0]] = trim($h[1]);
				}
				else if (is_array($headers[$h[0]]))
				{
					$headers[$h[0]] = array_merge($headers[$h[0]], array(trim($h[1])));
				}
				else
				{
					$headers[$h[0]] = array_merge(array($headers[$h[0]]), array(trim($h[1])));
				}

				$key = $h[0];
			}
			else
			{
				if (substr($h[0], 0, 1) == "\t") { $headers[$key] .= "\r\n\t".trim($h[0]); }
				else if (!$key) { $headers[0] = trim($h[0]); }
			}
		}

		return $headers;
	}
}