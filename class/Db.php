<?php 
class Db{
	
	public static function connect(){
		$link = mysql_connect(localhost, mysql , mysql);
		if(!$link){
			die('Ошыбка соединения:'. msql_error());
		}
		
		$db_selected =mysql_select_db(slavik);
		if(!$db_selected){
			die('Не удалось выбрать базу'. mysql_error);
		}
		
		
	}
	
	public static function insert($tableName, $atributes){
		
		$pattern = 'INSERT INTO %s (%s) VALUES ("%s")';
		
		foreach($atributes as $k=>$v){
			
			$lines[] = $k;
			$values[] = $v;
		}	
			$lines = implode(', ', $lines);
			$values = implode('", "', $values);
			
			$sql = sprintf($pattern, $tableName, $lines, $values);
			$result = mysql_query($sql)or die("Query: <b>$sql</b> is failed!!!");
		return $result;
	}
	
	public static function update($tableName, $atributes, $id){
		
		$pattern = "UPDATE %s SET %s WHERE id=%s";
		
		foreach($atributes as $k=>$v){
			
			$lines[] = ''.$k.'="'.$v.'"';
		}	
			$lines = implode(', ', $lines);
						
			$sql = sprintf($pattern, $tableName, $lines, $id);
			$result = mysql_query($sql)or die("Query: <b>$sql</b> is failed!!!");
		return $result;
	}
	
	public static function delete($tableName, $atributes){
		
		$pattern = 'DELETE FROM %s WHERE %s';
		foreach($atributes as $k => $v){
			$str = $k.'="'.$v.'"';
		}
		$sql = sprintf($pattern, $tableName, $str);
		$result = mysql_query($sql) or die("Query: <b>$sql</b> is failed");
		return $result;
	}
	
	
	//SELECT * FROM user WHERE email = '1' AND password = '2'
	
	public static function findOne($tableName, $attributes = []){
		
		$pattern = 'SELECT * FROM %s %s LIMIT 1';
		
		$lines = [];
		foreach ($attributes as $k=>$v) {
			$lines[] = sprintf('%s = "%s"', $k, $v);
		}
		
		$where 	= implode(' AND ', $lines);
		
		if (!empty($where)) {
			$where = 'WHERE ' . $where;
		} 
		
		$sql 	= sprintf($pattern, $tableName, $where);
		
		
		
		$result = mysql_query($sql) or die("Query: <b>$sql</b> is failed!!!");
		
		$row 	=  mysql_fetch_assoc($result);
		
		return $row;
	}
	
	public static function findAll($tableName, $attributes = []){
		
		$pattern = 'SELECT * FROM %s %s';
		
		$lines = [];
		foreach ($attributes as $k=>$v) {
			$lines[] = sprintf('%s = "%s"', $k, $v);
		}
		
		$where 	= implode(' AND ', $lines);
		
		if (!empty($where)) {
			$where = 'WHERE ' . $where;
		} 
		
		$sql 	= sprintf($pattern, $tableName, $where);
		
		$data = [];
        $result = mysql_query($sql);
        
		$row = mysql_fetch_assoc($result);
		do{
			$data[] = $row; 
		} while($row = mysql_fetch_assoc($result));
		
		return $data;			
	}
	
	public static function findAllOR($tableName, $attributes = []){
		
		$pattern = 'SELECT * FROM %s WHERE %s ';
		
		$lines = [];
		foreach ($attributes as $k=>$v) {
			foreach($v as $val){
				$lines[] = sprintf('%s = %s', $k, $val);
			}
			
		}
		
		$or 	= implode(' OR ', $lines);
		
		$sql 	= sprintf($pattern, $tableName, $or);
		
		$data = [];
        $result = mysql_query($sql);
        
		$row = mysql_fetch_assoc($result);
		do{
			$data[] = $row; 
		} while($row = mysql_fetch_assoc($result));
		
		return $data;			
	}
	
}
	



//mysql
/*
select
from
where
limit
group by
order by 
*/