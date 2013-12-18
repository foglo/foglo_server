<?php

class Upage extends AppModel{

	public $name = 'Upage';
	public $hasMany = array(
		"Widget" => array(
			'className' => 'Widget',
			'dependent' => true
			),
		"Position" => array(
			'className' => 'Position',
			'dependent' => true
		));
	public $belongsTo = "User";
	public $validate = array(
        'name' => array(
             'rule'    => 'alphaNumeric'
        )
    );
}