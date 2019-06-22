<?php

namespace App\Comms\REST;

/**
 * File
 * 
 * Inspired by UNIREST.
 *
 * @author anthony
 */
class File
{
	/**
	 * Prepares a file for upload.
	 * 
	 * @param string $filename
	 * @param string $mimetype
	 * @param string $postname
	 * @return string 
	 */
	public static function add($filename, $mimetype = '', $postname = '')
	{
		if (function_exists('curl_file_create'))
		{
			return curl_file_create($filename, $mimetype = '', $postname = '');
		}
		else
		{
			return sprintf('@%s;filename=%s;type=%s', $filename, $postname ?: basename($filename), $mimetype);
		}
	}
}