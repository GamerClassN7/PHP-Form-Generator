<?php
class InputTypes
{
	const TEXT = 'text';
	const NUMBER = 'number';
	const COLOR = 'color';
	const CHECK = 'checkbox';
	const BUTTON = 'button';
	const DATE = 'date';
	const DATETIME = 'datetime';
	const SUBMIT = 'submit';
}

class Form {

	public $formContent = "";
	private $formName;
	private $formId;
	private $method;
	private $action;

	function __construct( $name, $id, $method, $action) {
		if ($name != "") {
			$this->formName = 'name="'.$name.'"';
		}
		if ($id != "") {
			$this->formId = 'id="'.$id.'"';
		}
		if ($method != "") {
			$this->method = 'method="'.$method.'"';
		}
		if ($action != "") {
			$this->$action = 'action="'.$action.'"';
		}
	}

	function addInput($type, $name, $id, $label, $value, $enabled = true){
		$this->formContent .= '<div class="field">';
		if ($label != "") {
			$this->formContent .= '<div class="label">'.$label.'</div>';
		}
		$this->formContent .= '<input class="input" type="'.$type.'" name="'.$name.'" value="'.$value.'" ' . ($enabled ? '' : 'disabled') . '>';
		$this->formContent .= '</div>';
	}

	//TODO: add Group support
	function addSelect($name, $id, $label, $data, $multiple = false, $enabled = true){
		$this->formContent .= '<div class="field">';
		if ($label != "") {
			$this->formContent .= '<div class="label">'.$label.'</div>';
		}
		$this->formContent .= '<select class="input"' . ($multiple ? '' : 'multiple') . ($enabled ? '' : 'disabled') . '>';
		foreach ($data as $value => $text) {
			$this->formContent .= '<option value="' . $value . '">' . $text . '</option>';
		}
		$this->formContent .= '</select>';
		$this->formContent .= '</div>';
	}

	function render(){
		self::addInput(InputTypes::SUBMIT, 'formSubmit', '', 'Submit', 'Submit');
		$form = '<form '.$this->formName.$this->formId.$this->method.$this->action.'">';
		$form .= $this->formContent;
		$form .= '</form>';
		echo 	$form;
	}
}
