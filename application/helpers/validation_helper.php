<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Performs a Regular Expression match test.
 */
if( !function_exists('regex_match') )
{
	function regex_match($str, $regex)
	{
		if ( ! preg_match($regex, $str))
		{
			return FALSE;
		}

		return  TRUE;
	}
}


/**
 * post_code
 */
if( !function_exists('post_code') )
{
	function post_code($str)
	{
		return (bool)preg_match( '/^\d{2}.\d{3}-\d{3}$|^\d{5}\d{3}$/', $str);

	}
}


/**
 * Decimal number
 */
if( !function_exists('decimal') )
{
	function decimal($str)
	{
		// return (bool) preg_match('/^[\-+]?[0-9]+\.[0-9]+$/', $str);
		return (bool) preg_match('/^[\-+]?[0-9]{1,3}(\.?[0-9]{3})*(\,[0-9]+)?$/', $str);
	}
}

