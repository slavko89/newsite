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
	
	public static function delete($tableName, $id){
		
		$pattern = 'DELETE FROM %s WHERE id="%s"';
		
		$sql = sprintf($pattern, $tableName, $id);
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