<?php
/* note : fix by jameskid 2016.4.28 
 * history: fix mysql_query to pdo 
 *
 */
namespace system\core\db;
use PDO; //声明引用PDO
class Mysql {
	private $_writeLink = NULL; //主
	private $_readLink = NULL; //从
	private $_replication = false; //标志是否支持主从
	private $config = array();
	public $sql = "";
	
	public function __construct( $config = array() ){
		include($_SERVER['DOCUMENT_ROOT'].'/conf/Config.php'); //引用配置文件
		$this->config = $config;
		$this->dbTableHead = $this->config['DB']['DB_TABLE_HEAD'];
		//判断是否支持主从				
		/* 配置pdo */
		$dbName = $this->config['DB']['DB_NAME'];
		$dbUser = $this->config['DB']['DB_USER'];
		$dbPwd = $this->config['DB']['DB_PASSWORD'];
		$this->dbh = new PDO('mysql:host=localhost;dbname='.$dbName, $dbUser,$dbPwd);
		$this->dbh->query('set names utf8;'); /* 设置编码 */
		$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	//执行sql查询	 fix by jameskid
	public function query($sql, $params = array()) {
		try {
			$this->sql = $sql;
			$query = $this->dbh->prepare($sql);
			$query->execute();
			return $query;
		} catch (PDOException $e){
			$this->error('MySQL Query Error',$e);
		}
	}

	//获取表行数
	public function getTableRows($tableName) {
		/** 有三种方法，而且性能根据情况各不相同 
		 * 方法一--- count		 :select count(*) from table  400万数据时0.5秒  速度一般
		 */
		 /*
		 * 方法二--- order by id ：select id from table order by id desc limit 1  速度最快，但需要id严格按0开始递增，不能删除或有疏漏
		 *
		 */
		try {
			$idField = $tableName.'_id';
			$table = $this->dbTableHead.'_'.$tableName;
			$sql = 'select '.$idField.' from '.$table.' order by '.$idField.' desc limit 1';
			$query = $this->dbh->prepare($sql);
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			return $result[0][$idField];
		} catch (PDOException $e){
			$this->error('MySQL Query Error',$e);
		}

		 /**
		 * 方法三--- information_schema:
	     *			use information_schema;
	     *			select TABLE_ROWS from tables where TABLE_NAME ='tablename'  
	     *			由于表information_schema没有索引，如果数据库的表少，则快，如果数据库表多很，则会很慢
		 *

		$dbUser = $this->config['DB']['DB_USER'];
		$dbPwd = $this->config['DB']['DB_PASSWORD'];
		$this->dbhInfo = new PDO('mysql:host=localhost;dbname='.'information_schema', $dbUser,$dbPwd);
		$this->dbhInfo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="select TABLE_ROWS from tables where TABLE_NAME = '".$tableName."'";
		$query = $this->dbhInfo->prepare($sql);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		return $result[0]['TABLE_ROWS'];
		 */
	}

	
	//执行sql命令 fix by jameskid
	public function execute($sql, $params = array()) {
		try {
			$this->sql = $sql;
			$query = $this->dbh->prepare($sql);
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch (PDOException $e){
			$this->error('MySQL Query Error',$e);
		}
	}
	
	//从结果集中取得一行作为关联数组，或数字数组，或二者兼有 
	public function fetchArray($query) {
		return $this->unEscape($query->fetch(PDO::FETCH_ASSOC));
	}	
	
	//取得前一次 MySQL 操作所影响的记录行数 markj
	public function affectedRows() {
		//$link = $this->_getWriteLink();
		//return $link->rowCount();
		return 1;
	}
	
	//获取上一次插入的id
	public function lastId() {
		/*
		return (
			$id = mysql_insert_id( $this->_getWriteLink() )
		) >= 0 
		? $id 
		: mysql_result(
			$this->execute("SELECT last_insert_id()"), 0
		);
		 */
		return 1;
	}
	
	//获取表结构 fix by jameskid
	public function getFields($table) {

		try {
			$this->sql = "SHOW FULL FIELDS FROM {$table}";
			$query = $this->dbh->prepare($this->sql);
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch (PDOException $e){
			$this->error('MySQL Query Error',$e);
		}
	}
	
	//获取行数 fix by jameskid
	public function count($table,$table_add,$where) {

		$this->sql = "SELECT count(*) FROM $table $table_add $where";
		$query = $this->query($this->sql);
        $data = $query->fetch(PDO::FETCH_ASSOC);
		return $data['count(*)'];
	}
	
	//数据过滤 markj
	public function escape($value) {
		if( isset($this->_readLink) ) {
            $link = $this->_readLink;
        } elseif( isset($this->_writeLink) ) {
            $link = $this->_writeLink;
        } else {
            $link = $this->_getReadLink();
        }

		if( is_array($value) ) { 
		   return array_map(array($this, 'escape'), $value);
		} else {
		   if( get_magic_quotes_gpc() ) {
			   $value = stripslashes($value);
		   } 
		   return $link->quote($value);
		}
	}
	
	//数据过滤
	public function unEscape($value) {
		if (is_array($value)) {
			return array_map('stripslashes', $value);
		} else {
			return stripslashes($value);
		}
	}	
	
	//解析待添加或修改的数据
	public function parseData($options, $type) {
		//如果数据是字符串，直接返回
		if(is_string($options['data'])) {
			return $options['data'];
		}
		if( is_array($options) && !empty($options) ) {
			switch($type){
				case 'add':
						$data = array();
						$data['fields'] = array_keys($options['data']);
						$data['values'] = $this->escape( array_values($options['data']) );
						return " (`" . implode("`,`", $data['fields']) . "`) VALUES (" . implode(",", $data['values']) . ") ";
				case 'save':
						$data = array();
						foreach($options['data'] as $key => $value) {
								$data[] = " `$key` = " . $this->escape($value);
						}
						return implode(',', $data);
			default:return false;
			}
		}
		return false;
	}
	
	//解析查询条件
	public function parseCondition($options) {
		$condition = "";
		if(!empty($options['where'])) {
			$condition = " WHERE ";
			if(is_string($options['where'])) {
				$condition .= $options['where'];
			} else if(is_array($options['where'])) {
					foreach($options['where'] as $key => $value) {
						 $condition .= " `$key` = " . $this->escape($value) . " AND ";
					}
					$condition = substr($condition, 0,-4);	
			} else {
				$condition = "";
			}
		}

		//多表解析
		$table_array = $options['add_table'];
		if(is_array($table_array)){
			foreach ($table_array as $value) {
				$where_add.=$value['where'];
			}
			if(empty($condition)){
				$condition.='WHERE '.substr($where_add,4);
			}else{
				$condition.=$where_add;
			}
		}
		$options['add_table'] = '';
		
		if( !empty($options['group']) && is_string($options['group']) ) {
			$condition .= " GROUP BY " . $options['group'];
		}
		if( !empty($options['having']) && is_string($options['having']) ) {
			$condition .= " HAVING " .  $options['having'];
		}
		if( !empty($options['order']) && is_string($options['order']) ) {
			$condition .= " ORDER BY " .  $options['order'];
		}
		if( !empty($options['limit']) && (is_string($options['limit']) || is_numeric($options['limit'])) ) {
			$condition .= " LIMIT " .  $options['limit'];
		}
		if( empty($condition) ) return "";
        return $condition;
	}
	
	//输出错误信息
	public function error($message = '',$e = ''){
		if( DEBUG && $e != ''){
			$str = " {$message}<br>
					<b>SQL</b>: {$this->sql}<br>
					<b>错误详情</b>: {$e->getMessage()}<br>
					"; 
		} else {
			$str = "<b>出错</b>: $message<br>";
		}
		throw new Exception($str);
	}
	
	/******************兼容以前的版本*****************************/
		//选择数据库
	public function select_db($dbname) {
		//return mysql_select_db($dbname, $this->_getWriteLink());
	}
	
	//从结果集中取得一行作为关联数组，或数字数组，或二者兼有 
	public function fetch_array($query, $result_type = MYSQL_ASSOC) {
		return $this->fetchArray($query, $result_type);
	}
	//获取上一次插入的id
	public function insert_id() {
		return $this->lastId();
	}
	//取得前一次 MySQL 操作所影响的记录行数
	public function affected_rows() {
		return $this->affectedRows();
	}
	//取得结果集中行的数目
	public function num_rows($query) {
		return $query->rowCount();
		//return mysql_num_rows($query);
	}
	/******************兼容以前的版本*****************************/

	//获取从服务器连接
    private function _getReadLink() {
        if( isset( $this->_readLink ) ) {
            return $this->_readLink;
        } else {
            if( !$this->_replication ) {
				return $this->_getWriteLink();
           	} else {
                $this->_readLink = $this->_connect( false );
                return $this->_readLink;
            }
        }
    }
	
	//获取主服务器连接
    private function _getWriteLink() {
        if( isset( $this->_writeLink ) ) {
            return $this->_writeLink;
        } else{
            $this->_writeLink = $this->_connect( true );
            return $this->_writeLink;
        }
    }
	
	//数据库链接 fix by jameskid
	private  function _connect($is_master = true) {
		if( ($is_master == false) && $this->_replication ) {	
			$slave_count = count($this->dbConfig['DB_SLAVE']);
			//遍历所有从机
			for($i = 0; $i < $slave_count; $i++) {
				$db_all[] = array_merge($this->dbConfig, $this->dbConfig['DB_SLAVE'][$i]);
			}
			$db_all[] = $this->dbConfig;//如果所有从机都连接不上，连接到主机
			//随机选择一台从机连接
			$rand =  mt_rand(0, $slave_count-1);
			$db = array_unshift($db_all, $db_all[$rand]);			
		} else {
			$db_all[] = $this->dbConfig; //直接连接到主机
		}

		foreach($db_all as $db) {
			if($link = new PDO('mysql:host='.$db['DB_HOST'].';dbname='.$db['DB_NAME'], $db['DB_USER'],$db['DB_PWD'])){
				break;
			}
		}
		
		if(!$link){
			$this->error('无法连接到数据库服务器');
		}
		$version = $link->getAttribute(PDO::ATTR_SERVER_VERSION);
		if($version > '4.1') {
			$link->query("SET character_set_connection = " . $db['DB_CHARSET'] . ", character_set_results = " . $db['DB_CHARSET'] . ", character_set_client = binary");		
				
			if($version > '5.0.1') {
				$link->query("SET sql_mode = ''");
			}
		}		
        //mysql_select_db($db['DB_NAME'], $link);
        return $link;
	}
	
	//关闭数据库
	public function __destruct() {
		if($this->_writeLink) {
			//@mysql_close($this->_writeLink);
			$this->_writeLink=NULL;
		}
		if($this->_readLink) {
			//@mysql_close($this->_readLink);
			$this->_readLink=NULL;
		}
	} 
}
