<?php

class Tan extends AppModel{

	public $name = 'Tan';

	/*
	 * Function arretsTan()
	 *
	 * Renvoi liste des arrets Tan
	 */
	public function arretsTan($maj = false) {
		
		$arrets = false;
		//$arrets va être de la forme :
		// $arrets = array(
		//		'idTan' => 'name'
		//		...
		// );

		$row = 0;
		//On va chercher les arrêts dans l'API
		if ($arretsJson = json_decode(@file_get_contents('https://open.tan.fr/ewp/arrets.json'), true)) {
			$arrets = array();	
			foreach ($arretsJson as $aJ) {
				//Besoin de mettre en majuscule (cf. script en bas)
				if ($maj) {
					$arrets[$aJ['codeLieu']] = strtoupper($aJ['libelle']);
				} else {
					$arrets[$aJ['codeLieu']] = $aJ['libelle'];
				}
			}
		}

		//retourne la liste des arrêts
		return $arrets;
	}


	/*
	 * Function idTan()
	 *
	 * Si $arret, renvoi son idTan
	 *
	 * Appelé par WidgetsController::refresh()
	 * Appelé par WidgetsController::arrets()
	 *
	 */
	public function idTan($arret = null){

		$arrets = $this->arretsTan(true);

		if($arret != null && $arrets)
		{
			//Mise en majuscule de arret
			$arret = strtoupper($arret);
			//On cherche l'idTan de cet arrêt
			$idTan = array_search($arret, $arrets);

			return $idTan; 
		}
		else
		{
			//retourne la liste des arrêts
			return $arrets;
		}
	}


	/*
	 * Function nameTan()
	 *
	 * Renvoi nom de l'arret demandé avec son idTan
	 *
	 * Appelé par WidgetsController::edit()
	 *
	 */
	public function nameTan($idTan = null){

		$arrets = $this->arretsTan();

		if($idTan != null && $arrets)
		{
			//On cherche l'idTan de cet arrêt
			$name = $arrets[$idTan];

			return $name; 
		}
		else
		{
			//retourne la liste des arrêts
			return $arrets;
		}
	}

}