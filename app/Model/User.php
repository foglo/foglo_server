<?php

App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel{

	public $name = 'User';
    public $hasMany = array(
            "Widget" => array(
                'className' => 'Widget',
                'dependent' => true
            ),
    		"Upage" => array(
    			'className' => 'Upage',
    			'dependent' => true
		));
	public $belongsTo = "Group";
	public $validate = array(
        'prenom' => array(
            'rule'       => 'alphaNumeric', 
            'required'   => true,
            'allowEmpty' => false,
            'message'    => 'Un prénom est requis'
            ),
        'nom' => array(
            'rule'       => 'alphaNumeric', 
            'required'   => true,
            'allowEmpty' => false,
            'message'    => 'Un nom est requis'
            ),
        'password' => array(
            'rule' => array('minLength', 5),
            'required'   => true,
            'allowEmpty' => false,
            'message'    => 'Un mot de passe de 5 caractère minimum est requis'
            ),
       	'email' => array(
       		'rule' => 'email',
			'required'   => true,
            'allowEmpty' => false,
			'message' => 'Un email est requis.'
       		)
        );
    public $virtualFields = array(
        'premium' => 'User.end_premium > NOW()'
    );

	public function beforeSave($options = array()){
        if(isset($this->data[$this->alias]['password']))
        {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

    /*
     * Function password()
     * Renvoi string cripté comme un mdp
     */
    public function password($psw){
        return AuthComponent::password($psw);
    }

    public function generatePassword($length = 8)
    {
        // initialize variables
        $password = "";
        $i = 0;
        $possible = "0123456789bcdfghjkmnpqrstvwxyz";
 
        // add random characters to $password until $length is reached
        while ($i < $length) {
            // pick a random character from the possible ones
            $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
 
            // we don't want this character if it's already in the password
            if (!strstr($password, $char)) {
                $password .= $char;
                $i++;
            }
        }
        return $password;
    }

}