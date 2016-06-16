<?php
/**
*  * csv_get_lines 读取CSV文件中的某几行数据
*   * @param $csvfile csv文件路径
*    * @param $lines 读取行数
*     * @param $offset 起始行数
*      * @return array
*       * */


function csv_get_lines($csvfile, $lines, $offset = 0) {
	$dbh = new PDO('mysql:host=localhost;dbname=ip', 'root', '123456');
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbh->exec('set names utf8');

	if(!$fp = fopen($csvfile, 'r')) {
		return false;
	}
	$i = $j = 0;
	while (false !== ($line = fgets($fp))) {
		if($i++ < $offset) {
			continue;
		}
		break;
	}
	$data = array();
	while(($j++ < $lines) && !feof($fp)) {
		$data[] = fgetcsv($fp);
		$point = strpos($data[$j-1][0],'.');
		$table = substr($data[$j-1][0],0,$point);

		$list0 = $data[$j-1][0];
		$list1 = $data[$j-1][1];
		$list2 = $data[$j-1][2];
		$list3 = $data[$j-1][3];
		$list4 = $data[$j-1][4];

		$sql = "insert into `".$table."` ( 
			ip_begin,
			ip_end,
			ip_country,
			ip_province,
			ip_city
		) values (
			'$list0',
			'$list1',
			'$list2',
			'$list3',
			'$list4'
		)
		";
		//print_r($sql);die;
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
	}
	fclose($fp);
	return $data;
}
//$data = csv_get_lines('/root/zsj/soft/data/dbip-city-2016-06.csv', 100, 8150900);
$data = csv_get_lines('/root/zsj/soft/data/dbip-city-2016-06.csv', 10000,0);
//print_r($data);
?>
