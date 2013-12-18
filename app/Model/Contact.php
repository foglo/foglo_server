<?php
class Contact extends AppModel {
 
	var $name = 'Contact';
	var $useTable = false;
 	var $_schema = array(
		'nom' => array(
			'type' => 'string',
			'length' => 30
		),
		'email' => array(
			'type' => 'string',
			'length' => 50
		),
		'societe' => array(
			'type' => 'string',
			'length' => 50
		),
		'message' => array(
			'type' => 'text'
		)
	);
 	var $validate = array(
		'nom' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false,
			'message' => "Votre nom doit être renseigné."
		),
		'email' => array(
			'rule' => 'email',
			'required' => true,
			'allowEmpty' => false,
			'message' => "Vous devez saisir une adresse email valide."
		),
		'societe' => array(
			'rule' => array('maxLength', 50),
			'required' => false,
			'allowEmpty' => false,
			'message' => "50 caractères max."
		),
		'message' => array(
			'rule' => 'notEmpty',
			'required' => true,
			'allowEmpty' => false,
			'message' => "Vous devez saisir un message."
		)
	);
}
?>