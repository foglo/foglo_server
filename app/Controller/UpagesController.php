<?php

class UpagesController extends AppController{
	
	public $helpers = array('Html', 'Form');
	//public $scaffold;


	/*
	 * Function index()
	 *
	 * Gestion des pages par leur propriétaire 
	 */

	public function index()
	{
		if($this->Auth->user('premium') || $this->Auth->user('group_id') == 3 || $this->Auth->user('group_id') == 1)
		{
			$this->set('title_for_layout', 'Mes pages');

			$upages = $this->Upage->find('all', array(
				'conditions' => array(
					'Upage.user_id' => $this->Auth->user('id'))
				));


			$user = $this->Upage->User->find('first', array(
				'conditions' => array(
					'User.id' => $this->Auth->user('id')
					)
				));

			$this->set('user', $user);
			$this->set('upages', $upages);

		}
		else
		{
			$this->Session->setFlash('La gestion des pages est réservées au membres premium.', 'flash_pb');
			$this->redirect(array('controller' => 'widgets', 'action' => 'index'));
		}
	}

	/*
	 * Function add()
	 *
	 * PENSER à EMPECHER 'Accueil'
	 * 
	 */
	public function add(){
		if($this->Auth->user('premium') || $this->Auth->user('group_id') == 3 || $this->Auth->user('group_id') == 1)
		{		
			$this->set('title_for_layout', 'Créer une page');

			if($this->request->is('post') || $this->request->is('put'))
			{
				$this->request->data['Upage']['name'] = str_replace(' ', '', $this->request->data['Upage']['name']);
				if($this->request->data['Upage']['name'] != 'Accueil')
				{
					$this->request->data['Upage']['user_id'] = $this->Auth->user('id');
					$this->Upage->create();
					if($this->Upage->save($this->request->data)){
						$this->Session->setFlash('Création réussie', 'flash_ok');
						$this->redirect(array('controller' => 'upages', 'action' => 'index'));
					} else {
						$this->Session->setFlash('La création n\'a pas fonctionnée', 'flash_pb');
					}
				}
				else
				{
					$this->Session->setFlash('Le terme "Accueil" est résevé à votre page d\'accueil', 'flash_pb');
				}
			}
		}
		else
		{
			$this->Session->setFlash('La gestion des pages est réservées au membres premium.', 'flash_pb');
			$this->redirect(array('controller' => 'widgets', 'action' => 'index'));
		}

		$user = $this->Upage->User->find('first', array(
			'conditions' => array(
				'User.id' => $this->Auth->user('id')
				)
			));

		$this->set('user', $user);		
	}

	/*
	 * Function edit()
	 *
	 * Edition du nom d'une page
	 */
	public function edit($id = null){
		if($this->Auth->user('premium') || $this->Auth->user('group_id') == 3 || $this->Auth->user('group_id') == 1)
		{
			$this->set('title_for_layout', 'Modifier une page');

			if(!$id && $this->request->is('post')){
				$id = $this->request->data['Upage']['id'];
				$this->request->data['Upage']['user_id'] = $this->Auth->user('id');
			}

			$upage = $this->Upage->find('first', array(
				'conditions' => array(
					'Upage.user_id' => $this->Auth->user('id'),
					'Upage.id'      => $id)
				));


			//Si la page demandée appartient bien à l'utilisateur
			if(!empty($upage))
			{
				if($this->request->is('post') || $this->request->is('put'))
				{
					if($this->request->data['Upage']['name'] != 'Accueil')
					{
						if($this->Upage->save($this->request->data)){
							$this->Session->setFlash('Modification réussie', 'flash_ok');
							$this->redirect(array('controller' => 'upages', 'action' => 'index'));
						} else {
							$this->Session->setFlash('La modification n\a pas fonctionnée', 'flash_pb');
						}
					}
					else
					{
						$this->Session->setFlash('Le terme "Accueil" est résevé à votre page d\'accueil', 'flash_pb');
					}
				}
				$this->set('upage', $upage);
			}
			else
			{
				$this->Session->setFlash('Ce widget n\'existe pas ou ne vous appartient pas.', 'flash_err');
				$this->redirect(array('controller' => 'upages', 'action' => 'index'));
			}
		}
		else
		{
			$this->Session->setFlash('La gestion des pages est réservées au membres premium.', 'flash_pb');
			$this->redirect(array('controller' => 'widgets', 'action' => 'index'));
		}

		$user = $this->Upage->User->find('first', array(
			'conditions' => array(
				'User.id' => $this->Auth->user('id')
				)
			));

		$this->set('user', $user);
	}


	/*
	 * Function delete()
	 *
	 */
	public function delete($id)
	{
		if($this->Auth->user('premium') || $this->Auth->user('group_id') == 3 || $this->Auth->user('group_id') == 1)
		{
			$upage = $this->Upage->find('first', array(
				'conditions' => array(
					'Upage.user_id' => $this->Auth->user('id'),
					'Upage.id'      => $id
					)
				));
			//Si la page demandée appartient bien à l'utilisateur
			if(!empty($upage))
			{

					if($upage['Upage']['name'] != 'Accueil')
					{
						if($this->Upage->delete($id, true)){
							//Suppr de tous les widgets associé


							$this->Session->setFlash('Suppression réussie', 'flash_ok');
							$this->redirect(array('controller' => 'upages', 'action' => 'index'));
						} else {
							$this->Session->setFlash('La modification n\a pas fonctionnée', 'flash_pb');
						}
					}
					else
					{
						$this->Session->setFlash('Vous ne pouvez pas supprimer votre page d\'accueil', 'flash_pb');
					}
			}
			else
			{
				$this->Session->setFlash('Ce widget n\'existe pas ou ne vous appartient pas.', 'flash_err');
				$this->redirect(array('controller' => 'upages', 'action' => 'index'));
			}
		}
		else
		{
			$this->Session->setFlash('La gestion des pages est réservées au membres premium.', 'flash_pb');
			$this->redirect(array('controller' => 'widgets', 'action' => 'index'));
		}

	}
}