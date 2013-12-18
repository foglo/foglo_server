<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $components = array('Session','Auth');

    public function beforeFilter() {
    	//Config Auth
		$this->Auth->deny();
		$this->Auth->logoutRedirect = array('controller' => 'widgets', 'action' => 'index');
		$this->Auth->loginRedirect = array('controller' => 'widgets', 'action' => 'index');
		$this->Auth->loginAction = '/';
		$this->Auth->authError = 'Vous devez être inscrit pour accèder à cette partie du site.';

		//Envoi des Upages
		if($this->Auth->loggedIn()) {
			//Pour admin et premium
			if($this->Auth->user('premium') == 1 || $this->Auth->user('group_id') == 3 || $this->Auth->user('group_id') == 1)
			{
				$this->loadModel('Upage');
				$upages = $this->Upage->find('all', array(
					'conditions' => array(
						'Upage.user_id' => $this->Auth->user('id')
					)
				));

				$this->set('upagesHead', $upages);
			}
		}
    }

    //Clés d'API 
    var $cleDataNantes = "PC3DV0JN8NDIYA8"; //data.nantes.fr
    var $cleYahoo = "HGM0uZ_V34GPzWpD1M0rt_GBIWDl_DUT89P09bsA9DRVg.mwMfiURclM0IrIqj0EbNOQkWOdpfo.zm.PHIKlDitz.fSS8Ks-";
}
