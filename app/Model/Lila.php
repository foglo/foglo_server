<?php 
class Lila extends AppModel{

	/*
	 * Function arrets()
	 *
	 * Renvois liste de tous les arrets Lila sous la forme :
	   $arrets = array(
			"id Arret 1" => $field,
			"id Arret 2" => $field,
			...
	   )
	 *
	 * Pas d'id, juste le nom (cf. id() et name())
	 */	
	function arrets($maj = false, $stopPoints = false, $field = 'name') {

		$file = fopen("files/lila_gtfs/stops.txt", "r");

		$stops = array();
		$row = 0;

		//Différent possibilités de $field
		$keys = array(
			'name' => 1,
			'parent' => 8
		);
		$key = $keys[$field];

		//On renvoi les StopArea
		if(!$stopPoints)
		{
			while (($data = fgetcsv($file, 1000, ",")) !== FALSE) 
			{

				//Pour toutes les lignes contenant StopArea
				if($row != 0 && stristr($data[0], 'StopArea'))
				{
	 				if($maj){
						$stops[$data[0]] = strtoupper($data[$key]);
	 				}
	 				else{
	 					$stops[$data[0]] = $data[$key];
	 				}
				}
				//Si on passe dans la partie StopPoint
				elseif($row !=0)
				{
					//On sort du while
					break;
				}
				
				$row++;
			}
	    }
	    //On renvoi les StopPoints
	    elseif($stopPoints)
	    {
			while (($data = fgetcsv($file, 1000, ",")) !== FALSE) 
			{

				//Pour toutes les lignes contenant StopPoint
				if($row != 0 && stristr($data[0], 'StopPoint'))
				{
	 				if($maj){
						$stops[$data[0]] = strtoupper($data[$key]);
	 				}
	 				else{
	 					$stops[$data[0]] = $data[$key];
	 				}
				}
				
				$row++;
			}
	    }

	    fclose($file);

	    return $stops;
	}

	/*
	 * Function ids($arret, $stopPoints = false)
	 *
	 * Renvoi ids d'un arret demandé par son nom
	 */
	function ids($arret = null, $stopPoints = false) {
		
		//On travaille sur les stopArea
		if(!$stopPoints)
		{
			$arrets = $this->arrets(true, false);
		}
		//On travaille sur les stopPoint
		elseif($stopPoints)
		{
			$arrets = $this->arrets(true, true);
		}


		if($arret != null && $arrets)
		{
			//Mise en majuscule de arret
			$arret = strtoupper($arret);
			//On cherche l'idTan de cet arrêt
			$ids = array_keys($arrets, $arret);

			return $ids; 
		}
		else
		{
			//retourne la liste des arrêts
			return $arrets;
		}

	}

	/*
	 * Function idsByParent($arret)
	 *
	 * Renvoi ids de tous les StopPoint ayant un parent_location == $arret
	 */
	function idsByParent($arret = null) {

		//majuscule, stopPoint et field parent_station
		$arrets = $this->arrets(true, true, 'parent');

		if($arret != null && $arrets)
		{
			//Mise en majuscule de arret
			$arret = strtoupper($arret);
			//On cherche l'idTan de cet arrêt
			$ids = array_keys($arrets, $arret);

			return $ids; 
		}
		else
		{
			//retourne la liste des arrêts
			return false;
		}
	}

	/*
	 * Function name($id)
	 *
	 * Renvoi le nom d'un arrêt demandé par son id
	 */
	function name($id = null, $stopPoints = false, $ville = false) {

		//On travaille sur les stopArea avec le nom de la ville
		if(!$stopPoints && $ville)
		{
			//On va chercher l'arret correspondant en dtb
			$arret = $this->find('first', array(
				'conditions' => array('idLila' => $id)
			));

			if(!empty($arret))
			{
				//Si on a bien trouvé un nom, on l'envoi
				$name = $arret['Lila']['name'];

				return $name; 
			}
			else
			{
				return false;
			}
		}
		//On travaille sur les stopPoint avec le nom de la ville (passage par parent_location)
		elseif($stopPoints && $ville)
		{
			$arrets = $this->arrets(false, true, 'parent');

			if($id != null && $arrets)
			{
				$idParent = $arrets[$id];

				if($idParent) {
					//On va chercher l'arret StopArea correspondant en dtb
					$arret = $this->find('first', array(
						'conditions' => array('idLila' => $idParent)
					));

					if(!empty($arret))
					{
						//Si on a bien trouvé un nom, on l'envoi
						$name = $arret['Lila']['name'];

						return $name; 
					}
				}
			}
			else
			{
				//retourne la liste des arrêts
				return $arrets;
			}	
		}
		else
		{
			//On travaille sur les stopArea sans le nom de la ville
			if(!$stopPoints && !$ville)
			{
				$arrets = $this->arrets(false, false);
			}
			//On travaille sur les stopPoint sans le nom de la ville
			elseif($stopPoints && !$ville)
			{
				$arrets = $this->arrets(false, true);
			}

			if($id != null && $arrets)
			{
				$name = $arrets[$id];

				return $name; 
			}
			else
			{
				//retourne la liste des arrêts
				return $arrets;
			}		
		}
		
	}


	/*
	 * Function idsRoute($name)
	 *
	 * Renvoi les ids correspondant à la route passée en paramètre (short_name)
	 */
	function idsRoute($name) {

		$file = fopen("files/lila_gtfs/routes.txt", "r");

		$ids = array();
		$row = 0;

		while (($data = fgetcsv($file, 200, ",")) !== FALSE) 
		{
			//Pour lignes où le short_name correspond et dont l'id n'est pas déjà connu
			if($row != 0 && ($data[2] == $name) && !in_array($data[0], $ids))
			{
				$ids[] = $data[0];
			}

			$row++;
		}

		fclose($file);

		return $ids;
	}

	/*
	 * Function creaNomArret($)
	 *
	 * Ajoute le nom de la ville devant le nom de chaque StopArea et stocke tout ça en dtb
	 * Utilise Api Google Maps pour trouver la ville à partir des coordonnées géographiques
	 */
	function creaNomArret()
	{

		$deja = $this->find('list', array('fields' => array('id', 'idLila')));

		$file = fopen("files/lila_gtfs/stops.txt", "r");

		$row = 0;
		$arrets =0;

		while (($data = fgetcsv($file, 1000, ",")) !== FALSE) 
		{

			//Pour toutes les lignes contenant StopArea
			if($row != 0 && stristr($data[0], 'StopArea'))
			{ 
				if(!in_array($data[0], $deja))
				{
					$lat = $data[3];
					$lon = $data[4];
					$arret = array();

					ini_set('max_execution_time', '58');

					$f = false;
					$f = @file_get_contents('http://maps.googleapis.com/maps/api/geocode/xml?latlng='.$lat.','.$lon.'&sensor=false');
					if($f)
					{
						$xml = simplexml_load_string($f);

						$statut = (string)$xml->status;

						if($statut == 'OK')
						{

							$ville = (string)$xml->result[0]->address_component[2]->short_name;

							if($ville == '44'){
								$ville = (string)$xml->result[0]->address_component[1]->short_name;

								if($ville == '44'){
									$ville = (string)$xml->result[0]->address_component[0]->short_name;
								}
							}

							if($ville == '44'){
								exit;
							}

							$arret = array(
								'name' => $ville.' - '.$data[1],
								'idLila' => $data[0]
							);

							$this->create();
							$this->save($arret, false);

							$arrets++;

						}
						else
						{
							echo $data[0].' : '.$statut.'<br />';
						}
					}
					else
					{
						echo $data[0].' : pb file_get<br />';
					}
				}
				
			}
			//Si on passe dans la partie StopPoint
			elseif($row != 0)
			{
				//On sort du while
				break;
			}
			
			$row++;
		}

	    fclose($file);

	    return $arrets.' arrets sauvegardés';

	}

}

