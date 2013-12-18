<?php

class LilasController extends AppController{

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('*');
	}

	public function beforeRender(){
		$this->layout = 'ajax';
	}

	/*
	 * Function routes($arret)
	 *
	 * Renvoi toutes les routes passant à un arrêt
	 */
	function routes($arret = null) {

		function in_routes($elem, $routes)
	    {
	    	foreach ($routes as $route) {
	    		if(in_array($elem, $route)){
	    			return true;
	    		}
	    	}   
	        return false;
	    }

	    //Comme il y a un ":" après StopArea, Cake prend ça comme un arguments nommé (cf. doc Named Params)
		$arret = 'StopArea:'.$this->request->params['named']['StopArea'];

		if($arret)
		{
			//On récup' les id des StopPoint ayant le même nom
			$ids = $this->Lila->idsByParent($arret);

			//On récup les trip_id correspondant aux $ids de l'arret demandé
			$file = fopen("files/lila_gtfs/stop_times.txt", "r");
			$trips_id = array();
			$row = 0;

			while (($data = fgetcsv($file, 200, ",")) !== FALSE) 
			{
				//Pour lignes contenant un des $ids recherché
				if($row != 0 && in_array($data[3], $ids) && !in_array($data[0], $trips_id)) 
				{
	 				$trips_id[] = $data[0];
				}

		        $row++;
		    }
		    //On a donc un array contenant les trip_id de tous les trips passant par l'arret
		    fclose($file);


		    //On récup' les route_id correspondants aux trips
		    $file = fopen("files/lila_gtfs/trips.txt", "r");
			$routes_id = array();
			$row = 0;

			while (($data = fgetcsv($file, 200, ",")) !== FALSE) 
			{
				//Pour trips ayant un trip_id contenu dans $trips_id
				if($row != 0 && in_array($data[2], $trips_id) && !in_array($data[0], $routes_id)) 
				{
	 				$routes_id[] = $data[0];
				}

		        $row++;
		    }
		    //On a donc un array contenant les route_id des routes passant à l'arret
		    fclose($file);


		    //On récup' les noms des routes données par $routes_id
		    $file = fopen("files/lila_gtfs/routes.txt", "r");
			$routes = array();
			$row = 0;

			while (($data = fgetcsv($file, 200, ",")) !== FALSE) 
			{
				//Pour routes ayant un route_id contenu dans $routes_id
				if($row != 0 && in_array($data[0], $routes_id) && !in_routes($data[2].' - '.$data[3], $routes)) 
				{
					/* 
						array(
							"route_short_name" => "route_long_name"
						)
					*/
	 				//$routes[ html_entity_decode($data[2], ENT_QUOTES, 'UTF-8')] = html_entity_decode($data[3], ENT_QUOTES, 'UTF-8');
					$routes[] = array(
						'id' => $data[2],
						'text' => $data[2].' - '.$data[3]	
					);
				}

		        $row++;
		    }
		    //On a donc un array contenant les noms des routes passant à l'arret
		    fclose($file);

		   	$this->set('routes', json_encode($routes));
		}
		
	}

	/*
	 * Function sens($route)
	 *
	 * Renvoi les diffénrents sens possible pour une routes choisie
	 */
	function sens($route = null) {

		ini_set ('max_execution_time', 60);

		if($route)
		{
			$sens = array();

			//On va chercher les route_id correspondants au route_short_name 
			$routes = $this->Lila->idsRoute($route);

			//Pour chaque Route_id
			foreach ($routes as $route) {
				//Init
				$stops_max = array();

				$trips_file = fopen("files/lila_gtfs/trips.txt", "r");
				$trips = array();
				$row = 0;
				
				//On trouve les trips correspondants
				while (($data = fgetcsv($trips_file, 200, ",")) !== FALSE) 
				{
					if($row != 0 && ($data[0] == $route) && !in_array($data[2], $trips))
					{
						$trips[] = $data[2];
					}

					$row++;
				}

				fclose($trips_file);

				//Donc $trips = tous les trips passant par la route_id

				//Pour chaque trip, on trouve le combo départ-arrivée à partir des stop_times et stops
				$times_file = fopen("files/lila_gtfs/stop_times.txt", "r");

				//On cherche les stoptimes de départ et d'arrivée correspondants au trip 
				foreach ($trips as $trip) {
					
					//on remet le pointer de fgetcsv à 0
					rewind($times_file);

					$stops = array();
					$row = 0;

					while (($data = fgetcsv($times_file, 200, ",")) !== FALSE) 
					{
						//Pour chaque StopTimes du Trip
						if($row != 0 && ($data[0] == $trip))
						{
							//StopPoint_id => stop_sequence
							$stops[$data[3]] = $data[4];
						}

						$row++;
					}

					//On garde le trajet le plus long (le plus de stopTimes)
					if(count($stops) > count($stops_max)){
						$stops_max = $stops;
					}
				}

				fclose($times_file);

				//On construit le msg
				if(!empty($stops_max))
				{
					//Id des StopPoint
					$depart = array_keys($stops_max, min($stops));  
					$arrivee = array_keys($stops_max, max($stops));
			
					//Nom des arrets avec la ville
					$depart = $this->Lila->name($depart[0], true, true);
					$arrivee = $this->Lila->name($arrivee[0], true, true);

				}

				$sens[] = array(
					'id' => $route,
					'text' =>  'De '.$depart.' vers '.$arrivee	
				);

			}

			$this->set('sens', json_encode($sens));		
		}
	}

	/*
	 * Function essai()
	 *
	 * description
	 */
	// function essai() {

	// 	//$this->Lila->deleteAll(array('name LIKE' => '44%'), false);

	// 	$data = $this->Lila->creaNomArret();

	// 	debug($data);
	// }
}


