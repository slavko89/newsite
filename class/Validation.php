<?php 


class Validation {
		
	public $errors = [];
	

	public function check($attributes, $rules)
	{
		
		foreach ($rules as $rule) {
			$ruleMethod = $rule[1];
			
			switch ($ruleMethod) {
				case 'required':
					$this->required($rule[0], $attributes);
					break;
					
				case 'email':
					$this->email($rule[0], $attributes);
					break;
					
				case 'numberPhone':
					$this->numberPhone($rule[0], $attributes);
					break;
				
				case 'unique':
					$this->unique($rule[0], $attributes, $rule['tableName']);
					break;
				
				case 'compare':
					$this->compare($rule[0], $rule, $attributes);
					break;
				
				case 'type':
				
					switch ($rule['type']) {
						case 'string':
							$params = [];
							if (isset($rule['min'])) {
								$params['min'] = $rule['min'];
 							}
							if (isset($rule['max'])) {
								$params['max'] = $rule['max'];
 							}
							
							$this->string($rule[0], $params, $attributes);	
							break;	
							
						case 'natural':
							$params = [];
							if (isset($rule['min'])) {
								$params['min'] = $rule['min'];
 							}
							if (isset($rule['max'])) {
								$params['max'] = $rule['max'];
 							}
							
							$this->natural($rule[0], $params, $attributes);	
							break;						
					}
			}
		}	
	}
	
	public function unique($checkAttributes, $valueAttributes, $tableName)
	{
		foreach ($checkAttributes as $attribute) {

			if (empty($this->errors[$attribute])) {
				
				$result = Db::findOne($tableName, [
					$attribute=>$valueAttributes[$attribute]
				]);
				
				if (!empty($result)) {
					$this->errors[$attribute] = 'Це значення вже зайняте';
				}
			}
			
		}
	}

	public function required($checkAttributes, $valueAttributes)
	{
		foreach ($checkAttributes as $attribute) {
			if (!isset($valueAttributes[$attribute]) || trim($valueAttributes[$attribute]) == '') {
				$this->errors[$attribute] = 'Нобхідно заповнити';
			}
			
		}
	}

	public function email($checkAttributes, $valueAttributes)
	{
		foreach ($checkAttributes as $attribute) {
			if (!empty($valueAttributes[$attribute]) && !filter_var($valueAttributes[$attribute], FILTER_VALIDATE_EMAIL)) {
				$this->errors[$attribute] = 'Не є E-mail адресом';
			}
			
		}
	}
	
	public function numberPhone($checkAttributes, $valueAttributes)
	{
		foreach ($checkAttributes as $attribute) {
			if(!preg_match("/^[0-9]{10,10}+$/", $valueAttributes[$attribute])){
							$this->errors[$attribute] = 'Не є номером телефону';
			}
			
		}
	}

	public function compare($checkAttributes, $params, $valueAttributes)
	{
		$attributeCompare = $params['attribute'];
		
		foreach ($checkAttributes as $attribute) {
			if (!empty($valueAttributes[$attribute]) && !empty($valueAttributes[$attributeCompare]) && $valueAttributes[$attribute] != $valueAttributes[$attributeCompare]) {
				$this->errors[$attribute] = $params['message'];
			}			
		}
	}

	public function string($checkAttributes, $params, $valueAttributes)
	{
		foreach ($checkAttributes as $attribute) {
			if (isset($valueAttributes[$attribute])) {
				if ($params['min'] && strlen($valueAttributes[$attribute]) < $params['min']) {
					$this->errors[$attribute] = 'Мінімальна довжина строки: '.$params['min'].' символів';
				}
				
				if ($params['max'] && strlen($valueAttributes[$attribute]) > $params['max']) {
					$this->errors[$attribute] = 'Максимальна довжина строки: '.$params['max'].' символів';
				}
				
			}
			
			//echo $attribute . '<br/>';
		}
	}

	public function natural($checkAttributes, $params, $valueAttributes)
	{
		foreach ($checkAttributes as $attribute) {
			if (isset($valueAttributes[$attribute])) {
				if ($params['min'] && $valueAttributes[$attribute] < $params['min']) {
					$this->errors[$attribute] = 'Мінімальне значення: '.$params['min'];
				}
				
				if ($params['max'] && $valueAttributes[$attribute] > $params['max']) {
					$this->errors[$attribute] = 'Максимальне значення: '.$params['max'];
				}
				
			}
			
			//echo $attribute . '<br/>';
		}
	}

}