<?php

/*
 * Contoller utilisé pour obtenir des info plus détaillé sur les lignes que l'API
 *
 * utilisé par WidgetsController::directions()
 */ 

class TansController extends AppController{
	
	public $helpers = array('Html', 'Form');

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('*');
	}

	public function beforeRender(){
		$this->layout = 'ajax';
	}

/* Fonctions liées au widget TAN */

	/*
	* Function lignes()
	*
	* Renvoi liste des lignes passant par un arrêt
	*
	* on cherche les lignes passant à cet arrêt
	*
	*/
	public function lignes($arret = null) {
		$lignes = null;

		$idTan = $arret;

		//On va chercher les lignes en dtb
		$lignesDtb = $this->Tan->find('all');

		if ($idTan) {
			//On cherche tous les arrêts dans l'API qui disposent d'infos sur lignes
			if ($arretsJson = json_decode(@file_get_contents('https://open.tan.fr/ewp/arrets.json'), true)) 
			{
				foreach ($arretsJson as $aJ) {

					//Si l'arret corespond à celui recherché
					if($aJ['codeLieu'] == $idTan) 
					{
						//On stocke les lignes qui passe à cet arrêt
						$lignesJson = $aJ['ligne'];

						//travail sur les lignes
						$lignes = array();
						foreach ($lignesJson as $lJ) {

							$name = false;
							//Ligne correspondante en dtb pour récup' name
							foreach ($lignesDtb as $lD) 
							{
								$stop = false;
								if($lD['Tan']['idTan'] == $lJ['numLigne'] && !$stop) {
									$name = $lD['Tan']['name'];
									$stop = true;
								}
							}

							//Ajout de la ligne 
							$lignes[] = array(
								"id" => $lJ['numLigne'],
								"text"  => ($name) ?: $lJ['numLigne']
							);
						}
					}
				}
			}
		}

		$this->set('lignes', json_encode($lignes));
	}

	/*
	* Function directions()
	*
	* Renvoi les directions d'une ligne passant par un arrêt
	*
	*/
	public function directions($ligne = null) {
		$directions = null;
		if($ligne != null)
		{
			$infoLigne = $this->Tan->find('first', array(
					'conditions' => array('Tan.name' => $ligne)
				));
			if($infoLigne){
				$directions = array(
					0 => array(
							'id'   => '0',
							'text' => 'Les 2 sens'
						),
					1 => array(
							'id'   => '1',
							'text' => 'Vers '.$infoLigne['Tan']['sens_1']
						),
					2 => array(
							'id'   => '2',
							'text' => 'Vers '.$infoLigne['Tan']['sens_2']
						)
				);
			}
		}
		$this->set('directions', json_encode($directions));
	}
/* End fonctions TAN */

}