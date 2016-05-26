<?php
#=================================================================
#  A rand calculate method package
#
# kidphp_check
# Copyright (c) 2016 vimkid
#
# functionList: arrayToObject    -> 生成指定数量不重复数据,返回数组
#				objectToArray    -> 对象转数组
#=================================================================

namespace system\plugin\kidphp\kidphp_rand;
class Rand {
	/** 生成指定数量不重复随机数
	 * @begin  随机数开始值
	 * @end    随机数结束值
	 * @times  生成数量
	 */
	function noRepeatRand($begin,$end,$times){
		//生成数量不能大于随机数数量
		if($times>$end-$begin+1){
			return array(
				'error'=>1,
				'errorInfo'=>'生成数量不能大于随机数数量'
			);
		}
		$tmp=array();
		while(count($tmp)<$times){
			$tmp[]=mt_rand($begin,$end);
			$tmp=array_unique($tmp);
		}
		return array(
			'error'=>0,
			'errorInfo'=>'',
			'data'=>$tmp
		);
	}
}
