<?php

class Data extends AppModel{

	public $name = 'Data';
	public $belongsTo = 'Widget';
    
	public $validate = array(
        'data_1' => array(
        	'rule' => array('maxLength', 255),
            'required'   => false,
            'message' => '255 caractères max'
            ),
        'data_2' => array(
        	'rule' => array('maxLength', 255),
            'required'   => false,
            'message' => '255 caractères max'
            ),
        'data_3' => array(
        	'rule' => array('maxLength', 255),
            'required'   => false,
            ),
        'data_4' => array(
        	'rule' => array('maxLength', 255),
            'required'   => false,
            'message' => '255 caractères max'
            ),
    );
}