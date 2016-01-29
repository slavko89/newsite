<?php 


class Db {
	
	public static function connect()
	{
		$link = mysql_connect(db_host, db_user, db_pass);
		if (!$link) {
			die('Ошибка соединения: ' . mysql_error());
		}	

		$db_selected = mysql_select_db(db_name, $link);
		if (!$db_selected) {
			die ('Не удалось выбрать базу '.db_name.': ' . mysql_error());
		}
	}
	
/*
// UPDATE user SET email = 'test@i.ua', name = 'tester' WHERE id = 1;

$attributes = [
	'email' => 'test@i.ua',
	'name' 	=> 'tester',
];	

Array
(
    [0] => email = "tttt@i.ua"
    [1] => name = "pppppp"
)


*/

	public static function update($tableName, $attributes, $id)
	{
		$pattern = 'UPDATE %s SET %s WHERE id = %s';
		
		$lines = [];
		foreach ($attributes as $k=>$v) {
			$lines[] = sprintf('%s = "%s"', $k, $v);
		}
		
		$sets = implode(', ', $lines);
		
		$sql 	= sprintf($pattern, $tableName, $sets, $id);
		$result = mysql_query($sql) or die("Query: <b>$sql</b> is failed!!!");
		
		return $result;
	}
	
	public static function delete($tableName, $id)
	{
		
	}
	
	public static function insert($tableName, $attributes)
	{
		
	}
	
/*
	SELECT * FROM user WHERE email = '1' AND password = '2'
*/	
	public static function findOne($tableName, $attributes=[], $debug=false)
	{
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
		
		if ($debug) {
			d($sql);
		}
		
		$result = mysql_query($sql) or die("Query: <b>$sql</b> is failed!!!");
		$row 	= mysql_fetch_assoc($result);
		
		return $row;
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