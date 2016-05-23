<?php
#=================================================================
#  A convert funtion list for array,object ,and so on
#
# kidphp_check
# Copyright (c) 2016 vimkid
#
# functionList: arrayToObject    -> 数组转对象
#				objectToArray    -> 对象转数组
#=================================================================

class Convert {
	/** 数组转对象
	 */
	function arrayToObject($e){
		if( gettype($e)!='array' ) return;
		foreach($e as $k=>$v){
			if( gettype($v)=='array' || getType($v)=='object' )
				$e[$k]=(object)arrayToObject($v);
		}
		return (object)$e;
	}
	 
	/** 对象转数组
	 */
	function objectToArray($e){
		$e=(array)$e;
		foreach($e as $k=>$v){
			if( gettype($v)=='resource' ) return;
			if( gettype($v)=='object' || gettype($v)=='array' )
				$e[$k]=(array)objectToArray($v);
		}
		return $e;
	}

}
