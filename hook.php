<?php

class Hook {
	
	/**
	* Hooks
	*/
	private static $hook = array();

	/**
	* Adds a function to a bind place.
	*
	* @static
	* @param string $hook
	* @param null $function
	* @return bool
	*/
	public static function add($hook = '', $function = NULL)
	{
	    if(!self::exist($hook)) self::$hook[$hook] = array();
	    if(is_callable($function)) {
	        self::$hook[$hook][] = $function;
	    } 
	    return FALSE;
	}


	/**
	* Checks if a Hook exists. In case it does, it returns TRUE.
	* If not it returns FALSE.
	*
	* @static
	* @param string $hook
	* @return bool
	*/
	public static function exist($hook = '')
	{
		return (isset(self::$hook[$hook]))? TRUE:FALSE;
	}


	/**
	* Binds a hook place.
	*
	* @static
	* @param string $hook
	* @param null $param
	* @return bool
	*/
	public static function bind($hook = '', $param=NULL)
	{
	if(self::exist($hook)) {
		foreach(self::$hook[$hook] as $action)
		{
			if(is_array($param)) call_user_func_array($action, $param);
			else call_user_func($action);
	    } 
	}
	return FALSE;
	}
}