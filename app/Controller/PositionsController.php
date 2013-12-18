<?php

class PositionsController extends AppController{

	//public $helpers = array('Html', 'Form');
	//public $components = array('Auth', 'Session', 'RequestHandler');
	//public $uses = array('Widget', 'Upage', 'Position');


	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->deny('*');
	}

	public function index(){
		$this->redirect(array('controller' => 'widgets'));
	}


	/*
	 * Function change()
	 *
	 * Upadte la position d'un widget
	 *
	 * @params = upage_id, widget_id, position
	 */
	public function change($upage_id = null, $widget_id = null, $position = null){
		if($this->request->is('ajax'))
		{
			if($upage_id != null && $widget_id != null && $position != null)
			{
				//On cherche toutes les positions >= à la positions souhaitée
				$positions = $this->Position->find('all', array(
					'conditions' => array(
						'Position.upage_id' => $upage_id,
						'Position.position >=' => $position
						),
					'order' => array('Position.position'),
					'recursive' => -1
					));

				//Position à modifier
				$wanted = $this->Position->find('first', array(
					'conditions' => array(
						'Position.upage_id' => $upage_id,
						'Position.widget_id' => $widget_id
						),
					'recursive' => -1
					));


				//On incrémente chaque position >= pour faire de la place au nouveau widget
				$i = 0;
				foreach($positions as $p) {
					$positions[$i]['Position']['position'] = $p['Position']['position'] +1;	
					$i++;
				}
				//On sauvegarde
				$this->Position->saveMany($positions, array(
					'Position' => array('position')
					));

				//On met le widget en position voulue
				$wanted['Position']['position'] = $position;
				$wanted['Position']['upage_id'] = $upage_id;	
				$wanted['Position']['widget_id'] = $widget_id;	

				//On sauvegarde
				$this->Position->save($wanted);
			}
		}
	}
}