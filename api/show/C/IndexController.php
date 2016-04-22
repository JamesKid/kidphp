<?php
class Index{
	public function index(){
		$test = 1;
		return $test;
	}
	public function firstFunction($number=null,$test=null){
		$result = $number*$test;
		return $result;
	}
	public function edit(){
		echo "edit";
	}

}
?>
