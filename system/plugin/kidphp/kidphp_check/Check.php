<?php
#=================================================================
#  A check funtion list for qq ,email,phone,ip
#
# kidphp_check
# Copyright (c) 2016 vimkid
#
# functionList: checkIp    -> 检查ip
#				checkIpv   -> 检查Ip 用php5.2版本后的方法
#				checkEmail -> 检查Email
#				checkPhone -> 检查Phone
#				checkQQ    -> 检查QQ
#
# Check Class
#=================================================================

class Check {
	/** 检查ip 版本大于5.2
	 */
	function checkIp($ip){
		$preg=preg_match("/^d+.d+.d+.d+$/",trim($ip));
		if($preg){
			return true;
		} else {
			return false;
		}
	}
	/** 检查正常ip 要求php版本大于5.2
	 */
	function checkIpv($ip){
		if(filter_var($ip, FILTER_VALIDATE_IP)) {
			return true;
		}
		else {
			return false;
		}
	}
	/** 判断是否是合法的IPv4 IP地址
	 */
	function checkIpv4($ip){
		if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
			return true;
		}
		else {
			return false;
		}
	}

	/**判断是否是合法的公共IPv4地址，192.168.1.1这类的私有IP地址将会排除在外
	*/
	function checkIpv4OutNet($ip){
		if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE)) {
			return true;
		}
		else {
			return false;
		}
	}
  
	/**判断是否是合法的IPv6地址
	 */
	function checkIpv6($ip){
		if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE)) {
			return true;
		}
		else {
			return false;
		}
	}
	/**判断是否是public IPv4 IP或者是合法的Public IPv6 IP地址
	 */
	function checkIpv6Out($ip){
		if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
			return true;
		}
		else {
			return true;
		}
	}

	/** 检查email
	 */
	function checkEmail($e){
	}

	/** 检查phone
	 */
	function checkPhone($e){
		if (preg_match("/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$/", $mobilePhone)) {
			return true;
		} else {
			return false;
		}
	}

	/** 检查qq
	 */
	function checkQQ($e){
	}
}
