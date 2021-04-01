<?php 

class Validator {

	private $errors, $data;

	public function __construct($data = null) {
		return $this->data = $data;
	}

	public function min($int) {
		if (strlen($this->data) < $int) {
			$this->errors[] = "Количество символов не может быть меньше $int";			
		}

		return $this;
		
	}

	public function email() {
		if ( !filter_var($this->data, FILTER_VALIDATE_EMAIL)) {
			$this->errors[] = "Введен не корректный эмейл";
		} 

		return $this;		
	}


	public function uniq($comparison_data) {

		if ( $data === in_array($comparison_data)) {
			$this->errors[] = "Поле должно быть уникальным";
		}

	}

	
	public function validate() {

		if(!empty($this->errors)) {			
			return $this->errors;
		}

		return true;
	}
}

$v = new Validator;

$data1 = "n";

$v->check($data1,
	[
		'min' => 2
	]
);

$data2 = "d@d.ru";

$v->check($data2,
	[
		'min' => 2,
		'email' => true
	]
);

$v2 = new Validator($data2);





?>