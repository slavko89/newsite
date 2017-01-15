<?

class Posters{
	
	public static function getList($is_active){
		if(!isset($is_active)){
			$list  = Db::findAll('poster');
		}else if (isset($is_active) && !isset($is_active[1])){
			$list  = Db::findAll('poster', ['is_active'=>$is_active[0]]);
		}else {
			$list  = Db::findAll('poster');
		}
		
		return $list;
	}
	
	public static function getListUser($uid){
			$list  = Db::findAll('poster', ['user_id'=>$uid]);
		return $list;
	}
	
	public static function getDataPosters($val){
		$data = [];
		
		
		$data['poster']['id'] 			= $val['id'];
		$data['poster']['user_id'] 		= $val['user_id'];
		$data['poster']['title']		= $val['title'];
		$data['poster']['date'] 		= $val['date'];
		$data['poster']['is_active'] 	= $val['is_active'];
		$image = Db::findAll('poster_foto', ['animal_id'=>$val['id']]);
		$i = 0;
		
		foreach($image as $v){
			$data['image'][$i] = $v['url'];
			$i++;
		}
		
		$data['animal'] = Db::findOne('animal', ['id'=>$val['animal_id']]);
		$data['animal_breed'] = Db::findOne('animal_breed', ['id'=>$val['breed_id']]);
		return $data;
	
	}
}

									
?>