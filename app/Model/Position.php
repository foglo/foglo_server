<?php

class Position extends AppModel{

	public $name = 'Position';
	public $belongsTo = array(
		'Widget' => array(
			'className' => 'Widget',
			'dependent' => true
			),
		'Upage' => array(
			'className' => 'Upage',
			'dependent' => true
		));
	/*public $validate = array(
        'widget_id' => array(
             'rule'    => 'alphaNumeric'
        ),
        'page_id' => array(
            'rule'    => 'alphaNumeric'
        ),
        'position' => array(
             'rule'    => 'alphaNumeric'
        )
    );*/
}