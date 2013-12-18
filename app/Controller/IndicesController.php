<?php 

/* 
 * Gestion des indices qualité de l'air obtenu par lecture mail airpl.org
 */

class IndicesController extends AppController {

	//On déclare l'appartenance au modèle sinon il ne trouve pas $this->Indice wtf?!
	public $uses = 'Indice';

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('add', 'index', 'name');
	}

	/*
	 *	Voir aussi app/Console/Commande/AirShell.php 
	 */
}