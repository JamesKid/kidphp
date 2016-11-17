<?php
class JiekouController {
	public function index(){
		$type = isset($_GET['type'])? $_GET['type']: '';
		$number = isset($_GET['number'])? $_GET['number']: '';
		$result = array(
			'name' => 'wendy',
			'age' => 18,
			'type' => $type,
			'number' => $number
		);
		$result = json_encode($result,true);
		print_r($result);
	}
}
?>
