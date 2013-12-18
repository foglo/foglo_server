<?php

class UsersController extends AppController{
	
	public $helpers = array('Html', 'Form');
	public $components = array(
		'AutoLogin',
	    'Auth' => array(
	        'authenticate' => array(
	            'Form' => array(
	                'fields' => array(
	                	'username' => 'email',
	                	'password' => 'password'
	                	),
	                'userModel' => 'User'
	            )
	        )
	    )
	);


	/* --- Functions --- */

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('login', 'inscription', 'mdp_perdu');
	}
	
	public function beforeSave(){}

	/*
	* Function inscription()
	* 
	* Enregistre un nouvel utilisateur.
	* Groupe 2 par défaut. Voir premium()
	*
	*/
	public function inscription(){
		$this->set('title_for_layout', 'Inscription');
		$this->set('groups', $this->User->Group->find('list'));
		if($this->request->is('post'))
		{
			$this->User->create();
			
			$data = $this->request->data;

			//Vérif si email déjà inscrit
			$dejaInscrit = $this->User->find('first', array(
				'conditions' => array('User.email' => $data['User']['email'])
				));

			if(!empty($dejaInscrit))
			{
	            $this->Session->setFlash('Cette adresse email est déjà inscrite.', 'flash_err');
			}
			else
			{
				//Vérif des mots de passe
				if($this->User->password($data['User']['password']) == $this->User->password($data['User']['pwd_confirm']))
				{
					$data['User']['group_id'] = 2;

					if($this->User->saveAll($data, array('deep' => true))) {
						//Inscription ok, connection
						$id = $this->User->id;
		   				$data['User'] = array_merge($data['User'], array('id' => $id));
		        		$this->Auth->login($data['User']);

		        		//On crée la page d'accueil
		        		$upage = array(
	        				'name'    => 'Accueil',
							'user_id' => $id,
	        			);

	        			$this->User->Upage->create();
	        			if($this->User->Upage->save($upage))
	        			{

	        				//Email confirm
    				        App::uses('CakeEmail', 'Network/Email');

					        $email = new CakeEmail();
					        $email->from(array('no-reply@foglo.fr' => 'foglo'));
					        $email->to($this->Auth->user('email'));
					        $email->subject('Inscription réussie !');
					        $message = 'Votre inscription à foglo est réussie.';
					        $email->send($message);

	        				$this->Session->setFlash('Inscription réussie ! Vous êtes connecté.','flash_ok');
		               		$this->redirect(array('controller' => 'widgets'));
	        			}
	        			else
	        			{
	        				$this->User->delete($id);
	        				$this->Session->setFlash('L\'inscription n\'a pas fonctionné. Merci de réessayer.', 'flash_pb');
	        			}
		            } else {
		                $this->Session->setFlash('L\'inscription n\'a pas fonctionné. Merci de réessayer.', 'flash_pb');
		            }
		        } else {
	            	$this->Session->setFlash('Les deux mots de passe ne correspondent pas.', 'flash_err');
		        }
				
			}
			
		}
	}

	/*
	* Function modifier_compte()
	* 
	* Ne modifie pas le groupe. Voir premium()
	* Ne modifie pas le mot de passe. Voir modifier_mdp()
	*
	* $user = utlisateur courant
	* $data = données revoyées pour enregistremrnt
	*
	* @uses Model::password()
	*
	*/
	public function modifier_compte(){
		$this->set('title_for_layout', 'Modifier mon compte');
		//On recherche l'utilisateur courant
		$id = $this->Auth->user('id');
		$this->User->id = $id;
		$user = $this->User->find('all', array(
				'conditions' => array('id' => $id),
				'recursive' => -1
			));
		$user = $user[0];

		//On envoie les données sur l'utilisateur à la vue
		$this->set('user', $user);

		if($this->request->is('post') || $this->request->is('put'))
		{
			$data = $this->request->data;

			//Si le psw est ok
			if(isset($data['User']['password']) && $this->User->password($data['User']['password']) == $user['User']['password']){

				//On empèche le changement de groupe
				$data['User']['group_id'] = $user['User']['group_id'];

				//Enregistrement
				if($this->User->save($data)){
					$this->Session->setFlash('Modification réussie !');
               		$this->redirect(array('controller' => 'users', 'action' => 'moncompte'));
				} else {
	                return $this->Session->setFlash('La modification n\'a pas fonctionnée. Merci de réessayer.', 'flash_pb');
	            }
	        } else {
	        	return $this->Session->setFlash('Le mot de passe est incorrect.', 'flash_err');
	        }
		}
	}

	/*
	* Function modifier_mdp()
	*
	* Modifie le mot de passe
	*
	*/
	public function modifier_mdp(){
		$this->set('title_for_layout', 'Modifier mon mot de passe');
		//On recherche l'utilisateur courant
		$id = $this->Auth->user('id');
		$this->User->id = $id;
		$user = $this->User->find('first', array(
				'conditions' => array('id' => $id),
				'recursive' => -1
			));

		//On envoie les données sur l'utilisateur à la vue
		$this->set('user', $user);

		if($this->request->is('post') || $this->request->is('put'))
		{
			$data = $this->request->data;
			if($this->User->password($data['User']['password']) == $user['User']['password'])
			{
				//Si vrai changement de mot de passe
				if(!empty($data['User']['new_password_1']))
				{
					if($this->User->password($data['User']['new_password_1']) == $this->User->password($data['User']['new_password_2']))
					{
						$data['User']['password'] = $data['User']['new_password_1'];
					} else {
						return $this->Session->setFlash('Les nouveaux mots de passe sont incorrects.', 'flash_err');
					}

					//Enregistrement
					if($this->User->save($data, false)){
						$this->Session->setFlash('Modification réussie !', 'flash_ok');
		            	$this->redirect(array('controller' => 'users', 'action' => 'moncompte'));
					} else {
		                return $this->Session->setFlash('La modification n\'a pas fonctionnée. Merci de réessayer.', 'flash_pb');
	            	}
				}
			}
			else
			{
				return $this->Session->setFlash('Le mot de passe est incorect.', 'flash_err');
			}
		}
	}

	/*
	 * Function premium()
	 *
	 * Met un utilisateur premium 
	 *
	 */
	public function premium(){

		$user = $this->User->find('first', array(
				'conditions' => array('id' => $this->Auth->user('id')),
				'recursive' => -1
			));

		//On envoie les données sur lutilisateur à la vue
		$this->set('user', $user);
		if($this->request->is('post'))
		{
			$data['User']['id'] = $user['User']['id'];
			$data['User']['end_premium'] = '2012-08-31 12:00:00';

			if($this->User->save($data, false)){
				//On overwrite la Session pour changement de header
				$this->Session->write('Auth.User.premium', 1);

				$this->Session->setFlash('Opération réussie. Vous êtes Premium', 'flash_ok');
				$this->redirect(array('controller' => 'widgets', 'action' => 'index'));
			} else {
				$this->Session->setFlash('L\'opération a échoué.', 'flash_pb');
			}
		}

	}



	public function login(){
		$this->set('title_for_layout', 'Connexion');
		if($this->request->is('post'))
		{
			//Login email + password
	        if($this->Auth->login()) 
	        {
	        	//$this->Session->setFlash('Vous êtes connecté.', 'flash_ok');
				/*if($this->Auth->user()) {
					$this->redirect($this->Auth->redirect());
				}*/
	            return $this->redirect(array('controller' => 'widgets', 'action' => 'index'));
	        } 
	        else
	        {
	            $this->Session->setFlash('Identifiant ou mot de passe incorrect(s).', 'flash_err');
	        }
	    }
	}

	public function logout(){
		$this->redirect($this->Auth->logout());	
	}

	public function moncompte(){
		$this->set('title_for_layout', 'Mon Compte');
		$id = $this->Auth->user('id');
		$user = $this->User->find('first', array(
				'conditions' => array('User.id' => $id)
			));
		$this->set('user', $user);
	}

	/*
	* Function suppression()
	* 
	* Supprime l'utilisateur courant
	* 
	*/
	public function suppression(){
		$this->User->id = $this->Auth->user('id');
		$email = $this->Auth->user('email');
        if ($this->User->delete($this->User->id, true)) {

			//Email confirm
	        App::uses('CakeEmail', 'Network/Email');

	        $email = new CakeEmail();
	        $email->from(array('no-reply@foglo.fr' => 'foglo'));
	        $email->to($this->Auth->user('email'));
	        $email->subject('Suppression du compte réussie');
	        $message = 'Votre compte sur foglo à bien été supprimé.';
	        $email->send($message);

        	$this->Auth->logout();
            $this->redirect(array('controller' => 'widgets', 'action' => 'index'));
        } else {
	        $this->Session->setFlash('La suppression n\'a pas fonctionnée. Merci de réessayer.', 'flash_pb');
	        $this->redirect(array('action' => 'moncompte'));
    	}
	}

	/*
	* Function mdpperdu()
	* 
	* Envoi un nouveau mot de passe par mail à l'adresse email entrée
	*
	*/
	public function mdp_perdu(){
		$this->set('title_for_layout', 'Mot de passe perdu');
		if($this->request->is('post'))
		{
			$data = $this->request->data;
			$user = $this->User->find('first', array(
				'conditions' => array(
					'User.email' => $data['User']['email']),
				'recursive' => -1
				));

			//On a trouvé un user coorespondant à l'email
			if(!empty($user))
			{
				$password = $this->User->generatePassword();
				
				$data['User']['id'] = $user['User']['id'];
				$data['User']['password'] = $password;

				if($this->User->save($data, false)){

					//Envoi email avec mdp
			        App::uses('CakeEmail', 'Network/Email');

			        $email = new CakeEmail();
			        $email->from(array('no-reply@foglo.fr' => 'foglo'));
			        $email->to($user['User']['email']);
			        $email->subject('Nouveau mot de passe foglo');
			        $message = 'Vous avez utilisé le formulaire "Mot de passe oublié" sur foglo.fr.'
			        			."\n".
			        			'Votre nouveau mot de passe est : '. $password;
			        $email->send($message);

					$this->Session->setFlash('Un email vous a été envoyé avec la procédure à suivre.');
					$this->redirect(array('controller' => 'widgets'));
				} else {
					$this->Session->setFlash('Il y a eu une erreur.', 'flash_pb');
				}

			}
			else
			{
	       		$this->Session->setFlash('Nous n\'avons pas trouvé d\'utilisateur correspondant à cette adresse email.', 'flash_pb');
			}
		}
	}

	/*
	* Function liste()
	*
	* // Admin //
	* Renvoi la liste de tous les utilisateurs
	*
	*/
	public function liste(){
		if($this->Auth->user('group_id') == 1)
		{
			$this->layout = 'admin';
			$users = $this->User->find('all'); 		// <- A paginer

			$this->set('users', $users);
		} else {
			$this->redirect(array('action' => 'index'));
		}
	}

	/*
	* Function edition()
	*
	* // Admin //
	* Edit d'un user & upage
	*
	*/
	public function edition($id){
		if($this->Auth->user('group_id') == 1)
		{
			$this->layout = 'admin';
			if($this->request->is('post'))
			{

				$data = $this->request->data;

				if($this->User->saveAssociated($data, array('validate' => false))){
					$this->Session->setFlash('Modification effectuée avec succès.', 'admin_flash_ok');
					$this->redirect(array('controller' => 'users', 'action' => 'liste'));
				} else {
					$this->Session->setFlash('La modification a échouée.', 'admin_flash_err');
				}
			}

			$user = $this->User->find('first', array(
					'conditions' => array(
						'User.id' => $id)
					)); 
			$this->set('user', $user);

		} else {
			$this->redirect(array('action' => 'index'));
		}
	}

	/*
	* Function suppression
	*
	* Supprime l'user 
	* // admin
	*
	*/
	public function supprimer($id){
		$this->User->id = $id;
		$user = $this->User->find('first', array(
				'conditions' => array(
				'User.id' => $id)
			)); 
		//Suppression
		$this->User->delete($id, true);
		//if(isset($user['Upage']))
			//$this->User->Data->delete($user['Upage']['id']);

		/* A dev : suppr widget + positions */

		$this->Session->setFlash('Suppression effectuée.', 'admin_flash_ok');
		$this->redirect(array('controller' => 'users', 'action' => 'liste'));
	}

}