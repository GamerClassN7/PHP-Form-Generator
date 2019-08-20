## PHP_FORM_GENERATOR

Simple php class for generation oh HTML forms

# Example
```PHP
$form = new Form('name','1','POST','');
$form->addInput(InputTypes::TEXT,'nadpis','','Label','');
$form->addInput(InputTypes::BUTTON,'nadpis','','Label','test');
$form->addInput(InputTypes::TEXT,'nadpis','','Label','', false);
$form->addInput(InputTypes::TEXT,'nadpis','','Label','');
$arg = array(
	'test_v' => 'test',
	'test_v2' => 'test',
);
$form->addSelect('1', '1', '1', $arg, false);
$form->render();
die();
```