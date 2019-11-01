<?php

namespace Hcode;

class Model{ //classe magica onde se chama os getters e setters dinamicamente

	private $values = [];

	public function __call($name, $args){

		$method = substr($name,0,3); // filtra se é set ou get e guarda em metodo
		$fieldName = substr($name,3,strlen($name)); // pega o nome da função

		switch ($method) {
			case 'get':
				return  (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL;
			break;

			case 'set':
				$this->values[$fieldName] = $args[0];
			break;
			
		}

	}


	public function setData($data = array()){ // seta todos os campos da classe dinamicamente 

		foreach ($data as $key => $value) {
			$this->{"set".$key}($value);
		}

	}

	public function getValues(){
		return $this->values;
	}

}

?>