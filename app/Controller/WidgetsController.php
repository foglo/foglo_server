<?php

class WidgetsController extends AppController{

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
	    ),
	    'Session',
	    'RequestHandler'
	);
	//public $uses = array('Widget', 'Upage', 'Position');


	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index', 'refresh', 'environnement', 'actualites', 'transports', 'parkings');
	}


	/*
	* Function index()
	*
	* Retrourne l'ensemble des widgets de l'utilisateur si il est connecté
	* Sinon, retourne les widgets par défaut
	*
	*/
	public function index($upageName = null){
		
		//Par défaut, affichage de la page d'accueil
		if(!isset($upageName)) $upageName = 'Accueil';

		//Page d'accueil connecté
		if($this->Auth->loggedIn()){
			$user_id = $this->Auth->user('id');
			$upage = $this->Widget->Upage->find('first', array(
				'conditions' => array(
					'user_id' => $user_id,
					'name' => $upageName),
				'recursive' => -1
			));
		//Page d'accueil non-connecté
		} else {
			//Id noname
			$user_id = 1;
			$upage = $this->Widget->Upage->find('first', array(
				'conditions' => array(
					'user_id' => $user_id,
					'name' => 'Accueil'),
				'recursive' => -1
			));

			$this->set('title_for_layout', 'titleAccueil');
		}

		//Recherche des widgets en fonction de l'user_id
		$widgets = $this->Widget->find('all', array(
			'conditions' => array(
				'Widget.user_id' => $user_id,
				'Widget.upage_id' => $upage['Upage']['id']
				),
			'order' => array('Position.position')
		));
		$this->set('widgets', $widgets);
		$this->set('upage', $upage);			

	}



	/*
	* Function add()
	*
	* Crée un nouveau widget
	*
	*/
	public function add($upage = null, $position = null){
		//Init
		$error = false;
		$edit = true; //Pour ouverture panneau options après save()

		if($this->request->is('ajax'))
		{
			$stop = false; //Pour limite nb widgets

			$data = $this->request->data;
			//On écrase user_id par sécurité
			$data['Widget']['user_id'] = $this->Auth->user('id');

			//Si on a bien choisit un widget
			if(isset($data['Widget']['name'])){

				//Si compte gratuit, vérif des limites de nb widgets
				if($this->Auth->user('group_id') == 2 && !$this->Session->read('Auth.User.premium'))
				{
					//On va chercher les widgets de l'utilisateur avec le même name que celui demandé
					$widgets = $this->Widget->find('all', array(
						'conditions' => array(
							'Widget.name' => $data['Widget']['name'],
							'Widget.user_id' => $this->Auth->user('id')
							)
						));

					if(!empty($widgets))
					{
						switch ($data['Widget']['name']) {
							case 'tan':
								if(count($widgets) >= 5)
								{
									$error = array();
									$error['msg'] = "Le nombre maximum de widgets Tan autorisé pour un compte gratuit est atteint.";
									$error['type'] = 'closeWidget';
									$stop = true;
								}
								break;
							case 'meteo':
								if(count($widgets) >= 3)
								{
									$error = array();
									$error['msg'] = "Le nombre maximum de widgets Météo autorisé pour un compte gratuit est atteint.";
									$error['type'] = 'closeWidget';
									$stop = true;
								}
								break;
							case 'parkings':
								if(count($widgets) >= 3)
								{
									$error = array();
									$error['msg'] = "Le nombre maximum de widgets Parkings autorisé pour un compte gratuit est atteint.";
									$error['type'] = 'closeWidget';
									$stop = true;
									echo 'stop';
								}
								break;
							case 'twitter':
								if(count($widgets) >= 3)
								{
									$error = array();
									$error['msg'] = "Le nombre maximum de widgets Twitter autorisé pour un compte gratuit est atteint.";
									$error['type'] = 'closeWidget';
									$stop = true;
								}
								break;
							case 'horloge':
								if(count($widgets) >= 2)
								{
									$error = array();
									$error['msg'] = "Le nombre maximum de widgets Horloge autorisé pour un compte gratuit est atteint.";
									$error['type'] = 'closeWidget';
									$stop = true;
								}
								break;
							case 'ecolo':
								if(count($widgets) >= 2)
								{
									$error = array();
									$error['msg'] = "Le nombre maximum de widgets Be Ecolo autorisé pour un compte gratuit est atteint.";
									$error['type'] = 'closeWidget';
									$stop = true;
								}
								break;
							case 'air':
								if(count($widgets) >= 2)
								{
									$error = array();
									$error['msg'] = "Le nombre maximum de widgets Air autorisé pour un compte gratuit est atteint.";
									$error['type'] = 'closeWidget';
									$stop = true;
								}
								break;
							case 'rss':
								if(count($widgets) >= 3)
								{
									$error = array();
									$error['msg'] = "Le nombre maximum de widgets Rss autorisé pour un compte gratuit est atteint.";
									$error['type'] = 'closeWidget';
									$stop = true;
								}
								break;
							case 'bicloo':
								if(count($widgets) >= 3)
								{
									$error = array();
									$error['msg'] = "Le nombre maximum de widgets Bicloo autorisé pour un compte gratuit est atteint.";
									$error['type'] = 'closeWidget';
									$stop = true;
								}
								break;								
							
							default:
								break;
						}
					} 
				}

				//Non-atteinte de la limite de widgets, on continu
				if(!$stop)
				{
					//On défini l'Upage_id du widget
					if(!empty($upage)){
						$data['Widget']['upage_id'] = $upage;
					} else {
						$uAccueil = $this->Widget->Upage->find('first', array(
							'conditions' => array(
								'Upage.user_id' => $this->Auth->user('id'),
								'Upage.name' => 'Accueil'
							)
						));
						$data['Widget']['upage_id'] = $uAccueil['Upage']['id'];
					}

					/* Position du widget dans la page */
						if($position != null)
						{
							//L'utilisateur veut ajouter un widget à un endroit précis
							//On cherche toutes les positions >= à la positions souhaitée
							$positions = $this->Widget->Position->find('all', array(
								'conditions' => array(
									'Position.upage_id' => $data['Widget']['upage_id'],
									'Position.position >=' => $position
									),
								'order' => array('Position.position'),
								'recursive' => -1
								));

							//On incrémente chaque position >= pour faire de la place au nouveau widget
							$i = 0;
							foreach ($positions as $p) {
								$positions[$i]['Position']['position'] = $p['Position']['position'] +1;	
								$i++;
							}
							//On sauvegarde
							$this->Widget->Position->saveMany($positions, array(
								'Position' => array('position')
								));

							//On met le widget en position voulue
							$data['Position']['position'] = $position;
							$data['Position']['upage_id'] = $data['Widget']['upage_id'];
						}
						else
						{
							$positions = $this->Widget->Position->find('all', array(
								'conditions' => array(
									'Position.upage_id' => $data['Widget']['upage_id']
									),
								'order' => array('Position.position'),
								'recursive' => -1
								));

							//On met le widget en dernière position
							if(!empty($positions)){
								$data['Position'] = array();
								$data['Position']['position'] = $positions[0]['Position']['position'] + 1;
							} else {
								$data['Position']['position'] = 0;
							}

							$data['Position']['upage_id'] = $data['Widget']['upage_id'];
						}



					/* En fonction du widget */
						switch ($data['Widget']['name']) {

							//Widget meteo
							case 'meteo':
								$data['Data'] = array();
								$data['Data']['data_1'] = 'Nantes';
								$data['Data']['widget_id'] = $this->Widget->id;
								break;

							//Widget Tan
							case 'tan':
								$data['Data'] = array();
								$data['Data']['data_1'] = 'Commerce';
								$data['Data']['data_2'] = '1';
								$data['Data']['data_3'] = '1';
								$data['Data']['widget_id'] = $this->Widget->id;
								break;

							//Widgets Parkings et Lila
							case 'parkings': case 'lila':
								$data['Data'] = array();
								$data['Data']['data_1'] = '';
								$data['Data']['data_2'] = '';
								$data['Data']['data_3'] = '';
								$data['Data']['widget_id'] = $this->Widget->id;
								break;

							//Widget Twitter
							case 'twitter':
								$data['Data'] = array();
								$data['Data']['data_1'] = '';
								$data['Data']['widget_id'] = $this->Widget->id;
								break;

							//Widget Rss
							case 'rss':
								$data['Data'] = array();
								$data['Data']['data_1'] = '';
								$data['Data']['widget_id'] = $this->Widget->id;
								break;

							//Widget Bicloo
							case 'bicloo':
								$data['Data'] = array();
								$data['Data']['data_1'] = '';
								$data['Data']['widget_id'] = $this->Widget->id;
								break;

							//Widgets sans options
							case 'horloge': case 'air':
								$edit = false;
								break;
							
							default:
								break;
						}
					/* End fonction widget */

					//Save puis redirection vers panneau options (si $edit)
					if ($this->Widget->saveAll($data, array('deep' => true)))
					{
						if($edit){
							$this->redirect(array('action' => 'edit', $this->Widget->id));
						} else {
							//Si pas besoin d'options, en envoit direct sur refresh()
							$this->redirect(array('action' => 'refresh', $this->Widget->id));
						}
					}
				}
			}
		//Request non-AJAX
		} else {
			$this->Session->setFlash('Vous ne pouvez pas accèder à cette page directement.', 'flash_pb');
			$this->redirect(array('action' => 'index'));
		} 

		$user_id = $this->Auth->user('id');

		$accueil  = $this->Widget->Upage->find('first', array(
				'conditions' => array(
					'user_id' => $user_id,
					'name' => 'Accueil'),
				'recursive' => -1
			));

		$this->set('upageID', $upage);
		$this->set('user_id', $user_id);
		$this->set('error', $error);
	}



	/*
	* Function edit()
	* 
	* Edition d'un widget
	* 
	* $appartenance = appartenance widget/user
	*/
	public function edit($id, $error = false){
		$stop = false;

		if($this->request->is('ajax'))
		{
			//On cherche le widget à éditer
			$widget = $this->Widget->find('first',
					array('conditions' => array('Widget.id' => $id))
				 );

			//Retour du widget
			//Si le widget n'existe pas, on stop
			if(empty($widget)){
				$error = 'Pas de widget correspondant.';
			} else {
				//Vérif de l'appartenance du widget à l'user courant
				if($widget['Widget']['user_id'] == $this->Auth->user('id')){
					$this->set('widget', $widget);
					$appartenance = true;
				} else {
					$error = 'Ce widget ne vous appartient pas.';
					$appartenance = false;
				}
			}

		/* En fonction du widget, action éxécutée avant rendering vue edit.ctp */

			switch ($widget['Widget']['name']) {
				case 'tan':
					//On va chercher les arrêt pour envoi à la vue
					$this->loadModel('Tan');
					$arrets = $this->Tan->arretsTan();
					$this->set('arrets', $arrets);
					//Si pas d'arrets dispo (pb connexion), on stop
					if(!$arrets) {
						$stop = true;
						$error = "Impossible de récupérer les arrêts Tan. Le service ne répond pas. Edition du widget impossible.";
					}
					break;

				case 'lila':
					//On va chercher les arrêt pour envoi à la vue
					$this->loadModel('Lila');
					$arrets = $this->Lila->find('list', array('fields' => array('idLila', 'name')));
					//natsort($arrets);
					$this->set('arrets', $arrets);
					//Si pas d'arrets dispo (pb connexion), on stop
					if(!$arrets) {
						$stop = true;
						$error = array(
							'msg' => "Impossible de récupérer les arrêts Lila. Edition du widget impossible.",
							'type' => 'closeWidget'
						);
					}
					break;

				case 'facebook':
					//On check si l'utilisateur est connecté à facebook pour afficher où non un message dans la vue
					require_once APPLIBS."Facebook".DS."facebook.php";

					$fb = new Facebook(array(
						'appId' => '463661703654585',
						'secret' => 'c396a819f6848ba9c5c9d494c98dca65'
					));
					$user = $fb->getUser();

					if($user == 0){
						$userConnected = false;
						$this->set('stopForm', true);
					} else {
						//Utilisateur connecté
						$userConnected = true;
						$access_token = $fb->getAccessToken();
					}
					$this->set('userConnected', $userConnected);
					break;

				case 'bicloo':
					//On va chercher la station pour envoi à la vue
					$this->loadModel('BiclooStation');
					$stations = $this->BiclooStation->find('list', array('fields' => array('BiclooStation.name')));
					$this->set('stations', $stations);
					//Si pas de stations
					if(!$stations) {
						$stop = true;
						$error = array(
							'msg' => "Il n'y a pas de station disponible. Edition du widget impossible.",
							'type' => 'closeWidget'
						);
					}
					break;
			}

		/* End fonction widget */

			$data = $this->request->data;

			if(!empty($data) && $appartenance)
			{
				$this->Widget->id     = $id;
				$data['Widget']['id'] = $id;

				if(isset($data['Data'])) $data['Data']['id'] = $widget['Data']['id'];

				/* En fonction du widget, petites vérif */
				switch ($widget['Widget']['name']) {

					//Widget Météo : on suppr les espaces
					case 'meteo':
						$data['Data']['data_1'] = str_replace(' ', '', $data['Data']['data_1']);
						break;

					//Widget Tan : verif si arrêt existe bien + ligne bien numeric
					case 'tan':
						//On va chercher le nom de l'arret ds modèle 
						$nameTan = $this->Tan->nameTan($data['Data']['data_1']);

						//Si arrêt bien référencé
						if(!is_string($nameTan) || $nameTan == null ) {
							$error = 'Cet arrêt n\'existe pas.';
							$stop  = true;
							$this->set('poptions', true);
						//Si drection ok
						} else if(!is_numeric($data['Data']['data_3']) || !isset($data['Data']['data_3'])) {
							$error = 'Le sens comporte une erreur';
							$stop  = true;
							$this->set('poptions', true);
						}

						//On stocke le nom de l'arrêt et pas son id (on sait jamais si changement API, etc.)
						$data['Data']['data_1'] = $nameTan;

						break;

					//Widget Parkings : vérif si le parking existe bien
					case 'parkings':
						$this->loadModel('Parking');
						$parkings = $this->Parking->find('list');
						if(!array_search($data['Data']['data_1'], $parkings)){
							$error = 'Ce parking n\'est pas référencé.';
							$stop  = true;
							$this->set('poptions', true);
						}
						break;

					//Widget Twitter : vérif si compte demandé existe bien
					case 'twitter':
						$html = @file_get_contents('https://api.twitter.com/1/statuses/user_timeline.xml?include_rts=true&screen_name='.$data['Data']['data_1'].'&count=5');
						if($html)
						{
							$xml =  simplexml_load_string(utf8_encode($html));
							if(isset($xml->error))
							{
								$error = 'Aucun tweet trouvé pour cet utilisateur. Merci de vérifier l\'orthographe.';
								$stop  = true;
								$this->set('poptions', true);
							}				
						}
						else
						{
							$error = 'Aucun tweet trouvé pour cet utilisateur. Merci de vérifier l\'orthographe.';
							$stop  = true;
							$this->set('poptions', true);
							$this->set('stopForm', true);
						}
						break;

					//Widget RSS
					case 'rss':
						$url = $data['Data']['data_1'];
						//On rajoute http:// si il n'y en a pas
						$url = 'http://'.preg_replace('#^http://#', '', $url);
						$data['Data']['data_1'] = $url;
						break;

					//Widget Lila
					case 'lila':
						break;

					//Widget Facebook
					case 'facebook':
						//Si utilisateur non connecté, on renvoi vers panneau edit pour qu'il se connecte
						if(!$userConnected)
						{
							$error = 'Vous n\êtes pas connecté à Facebook';
							$stop  = true;
							$this->set('poptions', true);
						}
						else
						{
							try 
							{
								$posts = $fb->api('/'.urlencode($data['Data']['data_1']).'/feed/?access_token='.$access_token, 'GET');
							} 
							catch(FacebookApiException $e) 
							{
								$error = 'Le nom ou l\'indentifiant entré n\'est pas reconnu par Facebook.';
								$stop  = true;
								$this->set('poptions', true);
							}
						}

						break;

					//Widget Bicloo
					case 'bicloo':
						break;

					default:
						break;
				}
				/* End fonction widget */

				//Si pas de pb
				if(!$stop)
				{
					//On sauvegarde le widget et les modèles associés
					if($this->Widget->saveAll($data, array('deep' => true))){
						$this->redirect(array('action' => 'refresh', $this->Widget->id));
					} else {
						$error = 'Il y a eu une erreur, merci de réessayer.';
					}
				}
			}
		} 
		else
		{
			$this->Session->setFlash('Vous ne pouvez pas accèder à cette page directement.', 'flash_pb');
			$this->redirect(array('action' => 'index'));			
		}

		$this->set('error', $error);
	}



	/*
	* Function refresh()
	*
	* Rafraichi les informations du widget demandé en ajax
	* Toute l'intelligence des widgets est ici.
	*
	* $error = si pas d'erreur vaut false
	*
	* Appelé par add() et edit()
	*
	*/
	public function refresh($id = null, $error = false){

		//On cherche le widget à rafraichir
		//Si appel avec un id (cf add() & edit())
		if($id)
		{
			$widget = $this->Widget->find('first',
					array('conditions' => array('Widget.id' => $id))
				);
		}
		//Si appel Ajax sans $id (cf js)
		elseif($this->request->is('ajax'))
		{
			$id = $this->request->data['id'];
			$widget = $this->Widget->find('first',
					array('conditions' => array('Widget.id' => $id))
				);
		}

		//Retour du widget
		//Si le widget n'existe pas, on stop
		if(empty($widget)){
			$error = array(
				'msg'  => 'Pas de widget correspondant.',
				'type' => 'closeWidget'
			);
		} else {
			//Vérif de l'appartenance du widget à l'user courant
			//Si user_id == 1, widget demandé par la page d'accueil non-inscrit
			if(($widget['Widget']['user_id'] == 1) || ($widget['Widget']['user_id'] == $this->Auth->user('id')))
			{
				$this->set('widget', $widget);

				/* En fonction du widget */
				switch ($widget['Widget']['name']) {
					
					//Widget Météo
					case 'meteo':

						$ville = html_entity_decode($widget['Data']['data_1'], ENT_QUOTES, 'UTF-8');

						$meteo = $this->Widget->weather($ville);

						//Si msg d'erreur
						if($meteo['type'] != 'meteo')
						{
							$error = $meteo['msg'];

							if($error['type'] != 'info'){
								$this->redirect(array('action' => 'edit', $widget['Widget']['id'], $error));
							}
						}
						else
						{
							$this->set('meteo', $meteo);
						}
						

						break;
						
					//Widget Be écolo
					case 'ecolo':

						$ville = html_entity_decode($widget['Data']['data_1'], ENT_QUOTES, 'UTF-8');

						$meteo = $this->Widget->weather($ville);

						//Si msg d'erreur
						if($meteo['type'] != 'meteo'){
							$error = $meteo;
						}
						else{
							$this->set('meteo', $meteo);
						}
					
						//Pas de panneau d'options
						$this->set('stopOptions', $stopOptions = true);
						break;

					//Widget Tan
					case 'tan':
						//Si on a bien un arrêt en db
						if(isset($widget['Data']['data_1']))
						{ 
							//1 - Recherche du temps d'attente
							//On cherche l'idTan de l'arrêt en dtb
							$this->loadModel('Tan');
							$idTan = $this->Tan->idTan($widget['Data']['data_1']);

							$sens  = $widget['Data']['data_3'];
							$ligne = $widget['Data']['data_2'];
							$arret = $widget['Data']['data_1'];

							$infoLigne = $this->Tan->find('first', array(
									'conditions' => array('Tan.name' => $ligne)
								));


							//Si l'arrêt est bien reconnu
							if($idTan != null)
							{
								$passage = array();
								//Sens 0 = Les deux sens
								if($sens == 0)
								{
									//Retour des données
									$retourTan = json_decode(file_get_contents('https://open.tan.fr/ewp/tempsattente.json/'.$idTan), true);

									//debug(file_get_contents('https://open.tan.fr/ewp/tempsattente.json/'.$idTan));

									if(!empty($retourTan))
									{
										$i = 0;
										foreach ($retourTan as $retour) {
											if($retour['ligne']['numLigne'] == $ligne && $i<2){

												//Gestion cas particuliers
												//Passage immédiat
												if($retour['temps'] == '0 min'
													|| $retour['temps'] == 'Close' 
													|| $retour['temps'] == 'Closest'
												   )
												{ 
													$retour['temps'] = '<span>Immédiat</span>';
												} 
												//Durée > 1h
												elseif($retour['temps'] == '>1h')
												{
													// on ne donne pas de temps (cf vue)
													$retour['temps'] = '';
												}

												$passages[] = $retour;
												$i++;
											}
	
										}

										//Si $passages reste vide : plus de passages à cette heure ci
										//pour cette ligne
										// obsolète depuis 08/06 (retour ">1h")
										if(empty($passages))
										{
											//Si on dispose d'info sur cette ligne en database
											if($infoLigne || !empty($infoLigne)){
												$passages[0]['terminus'] = utf8_decode($infoLigne['Tan']['sens_1']);
												$passages[1]['terminus'] = utf8_decode($infoLigne['Tan']['sens_2']);
											} else {
												$passages[0]['terminus'] = 'Inconnu';
												$passages[1]['terminus'] = 'Inconnu';
											}
											$passages[0]['ligne']['numLigne'] = $widget['Data']['data_2'];
											$passages[1]['ligne']['numLigne'] = $widget['Data']['data_2'];
											$i++;
										}
									} 
									//Pas de retour (avant 08/06 : synonyme de Plus de passages à cette heure-ci)
									else
									{
										//Si on dispose d'info sur cette ligne en database
										if($infoLigne || !empty($infoLigne)){
											$passages[0]['terminus'] = $infoLigne['Tan']['sens_1'];
											$passages[1]['terminus'] = $infoLigne['Tan']['sens_2'];
										} else {
											$passages[0]['terminus'] = 'Inconnu';
											$passages[1]['terminus'] = 'Inconnu';
										}
										$passages[0]['ligne']['numLigne'] = $widget['Data']['data_2'];
										$passages[1]['ligne']['numLigne'] = $widget['Data']['data_2'];
									}

									//Couleur si dispo
									if($infoLigne || !empty($infoLigne))
									{
										$couleur = $infoLigne['Tan']['couleur'];
										$this->set('couleur', $couleur);	
									}
								}
								//Un sens a été choisi (sens 1 ou sens 2)
								else
								{
									//Retour des données
									$retourTan = json_decode(file_get_contents('https://open.tan.fr/ewp/tempsattente.json/'.$idTan), true);
									if(!empty($retourTan))
									{
										$i = 0;
										foreach ($retourTan as $retour) {
											//Si passage à cette arrêt pour la ligne demandée
											if($retour['ligne']['numLigne'] == $ligne && $retour['sens'] == $sens && $i<1){

												//Gestion cas particuliers
												// passage immédiat
												if($retour['temps'] == '0 min'
													|| $retour['temps'] == 'Close' 
													|| $retour['temps'] == 'Closest'
												   )
												{ 
													$retour['temps'] = '<span>Immédiat</span>';
												} 
												//Durée > 1h
												elseif($retour['temps'] == '>1h')
												{
													// on ne donne pas de temps (cf vue)
													$retour['temps'] = '';
												}

												$passages[] = $retour;
												$i++;
											}
										}

										//Si $passages reste vide : plus de passages à cette heure ci
										//pour cette ligne
										// obsolète depuis 08/06 (retourne ">1h")
										if(empty($passages))
										{
											//Si on dispose d'info sur cette ligne en database
											if($infoLigne || !empty($infoLigne)){
												$passages[0]['terminus'] = utf8_decode($infoLigne['Tan']['sens_1']);
											} else {
												$passages[0]['terminus'] = 'Inconnu';
											}
											$passages[0]['ligne']['numLigne'] = $widget['Data']['data_2'];
											$i++;
										}
									} 
									else 
									{

										//Si on dispose d'info sur cette ligne en database
										if($infoLigne || !empty($infoLigne)){
											$passages[0]['terminus'] = $infoLigne['Tan']['sens_'.$sens];
										} else {
											$passages[0]['terminus'] = 'Inconnu';
										}
										$passages[0]['ligne']['numLigne'] = $widget['Data']['data_2'];
									}

									//Couleur si dispo
									if($infoLigne || !empty($infoLigne))
									{
										$couleur = $infoLigne['Tan']['couleur'];
										$this->set('couleur', $couleur);	
									}
								}
								$this->set('passages', $passages);
								$this->set('arret', $arret);
							} 
							else
							{
								$error = 'Aucun horaire disponible pour cet arrêt.';
								$this->redirect(array('action' => 'edit', $widget['Widget']['id'], $error));
							}

							//2 - Info trafic
							//Url retour xml
							if(!empty($widget['Data']['data_4']) && $widget['Data']['data_4'] == 1)
							{
								$url = 'http://data.nantes.fr/api/getInfoTraficTANTempsReel/1.0/'.$this->cleDataNantes;

								//cURL
								$curl = curl_init();

								//Erreur depuis 23/02/13 : CURLOPT_RETURNTRANSFER => TRUE ne fonctionnait pas, curl débuguait la page reçue
								/*$options = array(
									CURLOPT_URL            => $url,
									CURLOPT_FOLLOWLOCATION => true,
									CURLOPT_RETURNTRANSFER => true,
									CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5',
									CURLOPT_TIMEOUT        => 8
								);
								curl_setopt_array($curl, $options);*/

								curl_setopt($curl, CURLOPT_URL, $url);
								curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
								curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
								curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
								curl_setopt($curl, CURLOPT_TIMEOUT , 8);

								$page = curl_exec($curl);
								curl_close($curl);

								$xml = simplexml_load_string($page);

								if(!empty($xml) || $xml != false)
								{
									$ligne = $widget['Data']['data_2']; //Ligne à chercher
									$infosTan = array();

									function in_infosTan($elem, $infos)
								    {
								    	foreach ($infos as $info) {
								    		if(in_array($elem, $info)){
								    			return true;
								    		}
								    	}   
								        return false;
								    }

									foreach ($xml->answer->data->ROOT->LISTE_INFOTRAFICS->INFOTRAFIC as $info) {
										
										$troncons = explode(';', $info->TRONCONS);

										foreach ($troncons as $t) {

											//On enlève les [] qui entourent le tronçon
											$t = substr($t, 1, strlen($t));
											$t = substr($t, 0, -1);
											//On découpe par les /
											$t = explode('/', $t);

											$ligneTroncon = $t[0];

											$debut = DateTime::createFromFormat('d/m/Y', (string)$info->DATE_DEBUT);
											$fin   = (DateTime::createFromFormat('d/m/Y', (string)$info->DATE_FIN));

											if(
												$ligneTroncon == $ligne //Si l'info correspond à la ligne
												&& ($debut && strtotime($debut->format('Ymd')) < time()) //Si date de début avant ajd
												&& ($fin && strtotime($fin->format('Ymd')) > time()) //Si date de fin après ajd
												&& (string)$info->PERTURBATION_TERMINEE == '0' //Si perturbation !terminée
												&& !in_infosTan((string)$info->RESUME, $infosTan)
												)
											{
												//On stocke l'info
												$infosTan[] = array(
													'titre'  => (string)$info->INTITULE,
													'resume' => (string)$info->RESUME
												);
											}
										}
									}
									$this->set('infosTan', $infosTan);
								}
							}
						}
						else
						{
							$error = 'Aucun arrêt configuré.';
							$this->redirect(array('action' => 'edit', $widget['Widget']['id'], $error));
						}
						break;

					//Widget Parkings
					case 'parkings' :
						if(!empty($widget['Data']['data_1']))
						{
							$parking = $widget['Data']['data_1'];

							//Url retour parkings xml
							$url = 'http://data.nantes.fr/api/getDisponibiliteParkingsPublics/1.0/'.$this->cleDataNantes;

							//cURL
							$curl = curl_init();

							//Erreur depuis 23/02/13 : CURLOPT_RETURNTRANSFER => TRUE ne fonctionnait pas, curl débuguait la page reçue
							/*$options = array(
								CURLOPT_URL            => $url,
								CURLOPT_FOLLOWLOCATION => TRUE,
								CURLOPT_RETURNTRANSFER => TRUE,
								CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5',
								CURLOPT_TIMEOUT        => 8
							);*/

							//curl_setopt_array($curl, $options);

							curl_setopt($curl, CURLOPT_URL, $url);
							curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
							curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
							curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
							curl_setopt($curl, CURLOPT_TIMEOUT , 8);

							$page = curl_exec($curl);
							curl_close($curl);

							$xml = simplexml_load_string(utf8_encode($page));

							//debug($xml);

							if(!empty($xml) || $xml != false)
							{

								if(empty($xml->answer->data))
								{
									$error = array(
										'msg' => 'Il n\'y a pas de données disponibles pour le moment.',
										'type' => 'info'
									);
								}
								else
								{
									foreach ($xml->answer->data->Groupes_Parking->Groupe_Parking as $group) {
										$parkings[] = $group;
									}
									
									//Recherche du bon parking
									foreach($parkings as $key => $value){
										
										if($value->Grp_nom == $parking){

											//debug($value);
											//Statut du parking							
											$dispo['statut'] = $value->Grp_statut;

											//Statut 5 et erste places avant complet
											if($dispo['statut'] == 5 && $value->Grp_complet > 0)
											{
												$dispo['message'] = '<span>'.$value->Grp_disponible.'</span><br /> places disponibles.';	
											} 
											//Statut 5 mais plus de place avant complet
											elseif($dispo['statut'] == 5 && $value->Grp_complet == 0) {
												$dispo['message'] = '<span>Complet</span>';
											} elseif($dispo['statut'] == 2) {
												$dispo['message'] ='<span>Abonnés</span>';
											} elseif($dispo['statut'] == 1) {
												$dispo['message'] ='<span>Fermé</span>';
											} else  {
												$dispo['message'] ='Données non disponibles.';
											}
											$dispo['parking'] = $parking;

											$this->set('parking', $dispo);

										}
									}
								}
							}
							else
							{
								$error = array(
									'msg' => 'Service de données indisponible',
									'type' => 'info'
								);
							}
						}
						else
						{
							$error = 'Il n\'y a pas de parking renseigné.';
							$this->redirect(array('action' => 'edit', $widget['Widget']['id'], $error));
						}
						break;
					
					//Widget Twitter
					case 'twitter':
						$html = @file_get_contents('https://api.twitter.com/1/statuses/user_timeline.xml?include_rts=true&screen_name='.$widget['Data']['data_1'].'&count=5');
						if($html)
						{
							$xml =  simplexml_load_string(utf8_encode($html));
							if(isset($xml->error))
							{
								$error = 'Aucun tweet trouvé pour cet utilisateur. Merci de vérifier l\'orthographe.';
								$this->redirect(array('action' => 'edit', $widget['Widget']['id'], $error));
							}
							else
							{
								$i = 1;
								foreach ($xml->status as $statut) {
									$tweets[$i]['date'] = (string)$statut[0]->created_at;
									$tweets[$i]['text'] = (string)$statut[0]->text;
									$tweets[$i]['text'] = preg_replace('#http://[a-z0-9._/-]+#i', '<a target="_blank" href="$0">$0</a>', $tweets[$i]['text']);
									$tweets[$i]['text'] = preg_replace('#@([a-z0-9_]+)#i', '@<a target="_blank" href="http://twitter.com/$1">$1</a>', $tweets[$i]['text']);
  									$tweets[$i]['text'] = preg_replace('# \#([a-z0-9_-]+)#i', ' #<a target="_blank" href="http://search.twitter.com/search?q=%23$1">$1</a>', $tweets[$i]['text']);
									$i++;
								}

								$this->set('tweets', $tweets);
							}
						}
						else
						{
							$error = 'Aucun tweet trouvé pour cet utilisateur. Merci de vérifier l\'orthographe.';
							$this->redirect(array('action' => 'edit', $widget['Widget']['id'], $error));
						}
						break;
					
					//Widget Horloge
					case 'horloge':
						$heure = date("G:i");
						$jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
						$mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");

						$date = array(
								'jour' => $jour[date("w")],
								'nb'   => date('j'),
								'mois' => $mois[date("n")],
								'annee' => date("Y")
							);

						$this->set('heure', $heure);
						$this->set('date', $date);

						//Pas de panneau d'options
						$this->set('stopOptions', $stopOptions = true);
						break;

					//Widget Air
					case 'air':
						//Indice du jour, stocké la veille en dtb (cf. IndicesContoller::add())
						$this->loadModel('Indice');
						$indice = $this->Indice->find('first', array(
							'conditions' => array('date' => date("Y-m-d"))
							));

						$this->set('indice', $indice['Indice']['indice']);

						//Alerte (récupération du flux rss airpl.org)
						$xml = simplexml_load_string(@file_get_contents("http://www.airpl.org/flux/alertes"));	
						if($xml && !empty($xml))
						{
							$items = array();
							foreach ($xml->channel->item as $item) 
							{	
								$date = html_entity_decode((string)$item->title, ENT_NOQUOTES, "UTF-8");
								$text = html_entity_decode((string)$item->description, ENT_NOQUOTES, "UTF-8");
								
								//Def date du jour en fr
								$jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
								$mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
								$ajd = $jour[date("w")].' '.date('d').' '.$mois[date("n")].' '.date("Y");	

								//Si un item concerne aujourd'hui et Nantes ou la Loire-Atlantique
								if((stristr($date, $ajd) !== FALSE) && ((stristr($text, 'Nantes') !== FALSE) || (stristr($text, 'Loire-Atlantique') !== FALSE)))
								{
									$alerte = $text;
									$this->set('alerte', $alerte);
								}
							}
						}
						//Pas de panneau d'options
						$this->set('stopOptions', $stopOptions = true);
						break;

					//Widget Rss
					case 'rss':
						//Chargement du Component SimplePie
						$this->Simplepie = $this->Components->load('Simplepie');

						//On récupère le flux passé par simplepie
						$feed = $this->Simplepie->feed($widget['Data']['data_1']);

						if(isset($feed->error) && stristr($feed->error, 'A feed could not be found'))
						{
							$error = 'L\'adresse inscrite ne semble pas être un flux RSS';
							$this->redirect(array('action' => 'edit', $widget['Widget']['id'], $error));
						}
						elseif (isset($feed->error)) {
							$error = 'Il y a une erreur avec l\'addresse inscrite';
							$this->redirect(array('action' => 'edit', $widget['Widget']['id'], $error));
						}

						//On récup' les 5 derniers items du flux
						$items = $feed->get_items(0, 5);

						//Stockage temporaire des items
						$a = array();
						function get_first_image_url($html)
						{
							if (preg_match('/<img.+?src="(.+?)"/', $html, $matches)) {
								return $matches[1];
							}
							else return false;
						}

						foreach($items as $i)
						{
							$a[] = array(
								'date' => $i->get_date('j m Y'),
								'title' => $i->get_title(),
								'permalink' => $i->get_permalink(),
								'img' => get_first_image_url($i->get_content())
							);
						}

						//Construction du flux
						$flux = array(
							'title'     => $feed->get_title(),
							'permalink' => $feed->get_permalink(),
							'items'     => $a
						);

						$this->set('flux', $flux);

						break;

					//Widget Lila
					case 'lila':
						$error = array(
								'msg' => 'Le widget est désactivé. Nous travaillons à son retour.',
								'type' => 'info'
							);

						// $this->loadModel('Lila');

						// $idArea = $widget['Data']['data_1'];
						// $route = $widget['Data']['data_3'];

						// if(!empty($idArea) && !empty($route))
						// {
						// 	//1 - A partir de la route, on cherche les trips qui correspondent
						// 	$f_trips = fopen("files/lila_gtfs/trips.txt", "r");
						// 	$trips = array();
						// 	$row = 0;

						// 	while (($data = fgetcsv($f_trips, 200, ",")) !== FALSE) 
						// 	{
						// 		//Pour lignes contenant une des routes 
						// 		if($row != 0 && $data[0] == $route) 
						// 		{
					 // 				$trips[] = $data;
						// 		}

						//         $row++;
						//     }

						// 	fclose($f_trips);

						// 	//2 - On ne garde que les trips qui ont un service actif
						// 	$f_calendar = fopen("files/lila_gtfs/calendar.txt", "r");
						// 	$f_dates = fopen("files/lila_gtfs/calendar_dates.txt", "r");

						// 	$jour = date("N");
						// 	$date = date("Ymd");
						// 	$t = 0;

						// 	foreach ($trips as $trip) {

						// 		//On remet le pointer de fgetcsv à 0
						// 		rewind($f_calendar);
						// 		$row = 0;

						// 		//On regarde toutes les ligne du calendar
						// 		while (($data = fgetcsv($f_calendar, 200, ",")) !== FALSE) 
						// 		{
						// 			//si service_id identiques
						// 			if($row != 0 && $data[0] == $trip[1]) 
						// 			{
						// 				//Reset du compteur de calendar_dates
						// 				rewind($f_dates);

						// 				//Si le trip n'est pas actif pour aujourd'hui
						// 				if( 
						// 					$data[$jour] != 1 //si service n'est pas actif aujourd'hui
						// 					|| strtotime($data[8]) > time() //si service_start_date > ajd
						// 					|| strtotime($data[9]) < time() //si service_end_date < ajd
						// 					)
						// 				{
						// 					$actif = false;

						// 					//On vérif si il n'est pas de façon exceptionnelle actif dans calendar_dates
						// 					$row2 = 0;
											
						// 					while (($data2 = fgetcsv($f_dates, 200, ",")) !== FALSE)
						// 					{
						// 						if(
						// 							$row2 !=0 
						// 							&& $data2[0] == $trip[1] //Si bon service_id 
						// 							&& $data2[1] == $date //si calendar_date == $date 
						// 							&& $data2[2] == 1 //si exception_type = 1 (actif)
						// 							)
						// 						{
						// 							$actif = true;
						// 						}
						// 					}						 				
						// 				}
						// 				//Si le trip semble être actif aujourd'hui
						// 				elseif(
						// 					$data[$jour] == 1 //si service est actif aujourd'hui
						// 					|| strtotime($date[8]) < time() //si service_start_date < ajd
						// 					|| strtotime($date[9]) > time() //si service_end_date > ajd
						// 					)
						// 				{
						// 					$actif = true;


						// 					//On vérif si il n'est pas de façon exceptionnelle désactivé dans calendar_dates
						// 					$row2 = 0;
											
						// 					while (($data2 = fgetcsv($f_dates, 200, ",")) !== FALSE)
						// 					{
						// 						if(
						// 							$row2 !=0 
						// 							&& $data2[0] == $trip[1] //Si bon service_id 
						// 							&& $data2[1] == $date //si calendar_date == $date 
						// 							&& $data2[2] == 2 //si exception_type = 2 (désactivé)
						// 						)
						// 						{
						// 							$actif = false; 
						// 						}
						// 					}
						// 				}
						// 			}

						// 	        $row++;
						// 	    }

						// 	    //Si trip n'est pas actif (ou n'existe pas donc aucun service trouvé - not possible ?), on l'enlève de $trips
						// 	    if((isset($actif) && !$actif) || !isset($actif))
						// 	    {
						// 	    	unset($trips[$t]);
						// 	    }

						// 	    unset($actif);
						// 	    $t++;
						// 	}

						// 	fclose($f_calendar);
						// 	fclose($f_dates);

						// 	//On a donc $trips avec tous les trips actifs (normalement 1 seul ?)
						// 	//debug($trips);

						// 	//3 - On cherche les StopPoint enfants du StopArea stocké en dtb
						// 	$arrets = $this->Lila->idsByParent($idArea);
						// 	//debug($arrets);

						// 	/*
						// 		4 - On cherche les StopTimes qui :
						// 			* correspondent aux $trips
						// 			* correspondent aux $arrets
						// 			* arrival_time > now
						// 	 */
						// 	$f_times = fopen("files/lila_gtfs/stop_times.txt", "r");

						// 	$times = array();

						// 	foreach ($trips as $trip) {

						// 		rewind($f_times);
						// 		$row = 0;

						// 		while (($data = fgetcsv($f_times, 200, ",")) !== FALSE)
						// 		{
						// 			if(
						// 				$row != 0
						// 				&& $data[0] == $trip[2] // trip_id identiques
						// 				&& in_array($data[3], $arrets) //stop_id compris dans $arrets
						// 				&& strtotime($data[1]) > time() //Passage après maintenant
						// 				)
						// 			{
						// 				$times[] = $data;
						// 			}

						// 			$row++;
						// 		}

						// 	}

						// 	fclose($f_times);

						// 	//On a donc $times == les prochains passages à l'arret
						// 	//debug($times);

						// 	$temps = false;

						// 	//5 - On prend le passage le plus proche
						// 	foreach ($times as $time) {
						// 		//On stocke le passage le plus proche (plus petit timestamp)
						// 		if(strtotime($time[2]) < strtotime($temps) || !$temps)
						// 		{
						// 			$temps = $time[2];
						// 		}
						// 	}

						// 	$this->set('temps', $temps);
						// 	$this->set('ligne', $widget['Data']['data_2']);
						// 	$this->set('arret', $this->Lila->name($idArea, false, true));
						// }
						// else
						// {
						// 	$error = 'Le widget ne semble pas être configuré.';
						// 	$this->redirect(array('action' => 'edit', $widget['Widget']['id'], $error));
						// }

						

						break;

					// Widget Facebook 
					case 'facebook':
						//On check si l'utilisateur est connecté à facebook pour afficher où non un message dans la vue
						require_once APPLIBS."Facebook".DS."facebook.php";

						$facebook = new Facebook(array(
							'appId' => '463661703654585',
							'secret' => 'c396a819f6848ba9c5c9d494c98dca65'
						));
						$user = $facebook->getUser();


						//Utilisateur non connecté, on renvoi vers edit en demandant de se connecter
						if($user == 0)
						{
							$userConnected = false;
							$error = 'Vous n\'êtes pas connecté à Facebook.';
							$this->redirect(array('action' => 'edit', $widget['Widget']['id'], $error));

						} 
						//Utilisateur connecté
						else 
						{
							$userConnected = true;
							$access_token = $facebook->getAccessToken();

							try 
							{
								//On cherche l'idFacebook et le name du profil/page demandé
								$recherche = $facebook->api('/'.urlencode($widget['Data']['data_1']), 'GET');

								$infos = array(
									'id' => $recherche['id'],
									'name' => $recherche['name'],
									'link' => 'http://facebook.com/'.$widget['Data']['data_1']
								);

								$this->set('infos', $infos);

								try {

									$posts = $facebook->api('/'.urlencode($widget['Data']['data_1']).'/feed/?&limit=100&access_token='.$access_token, 'GET');

									$row = 0;
									$articles = array();

									while(count($articles) != 5)
									{
										if(isset($posts['data'][$row]))
										{
											$post = $posts['data'][$row];

											if(isset($post['message']))
											{
												//Si le status vient bien de la page/profil demandé
												if($post['from']['id'] == $infos['id'])
												{
													$article = array();
													$article['message'] = $post['message'];

													$article['date'] = date('d-m-Y', strtotime($post['created_time']));

													if(isset($post['type'])){
														$article['type'] = $post['type'];
													}
													if(isset($post['picture'])){
														$article['picture'] = $post['picture'];
													}
													if(isset($post['link'])){
														$article['link'] = $post['link'];
													} else {
														$article['link'] = $post['actions'][0]['link'];
													}

													$articles[] = $article;	
												}
											}
										}
										else
										{
											if(!empty($posts['paging']['previous']))
											{
												$posts = $facebook->api($posts['paging']['previous'], 'GET');
												$row = -1;
											}
											else
											{
												break;
												debug('break');
											}
										}
										$row++;
									}

									$this->set('posts', $articles);

								} 
								catch(FacebookApiException $e) 
								{
									//Erreur sur data_1, on renvoi vers edit
									$error = 'Le nom ou l\'indentifiant entré n\'est pas reconnu par Facebook.';
									$this->redirect(array('action' => 'edit', $widget['Widget']['id'], $error));
								}


								
							} 
							catch (FacebookApiException $e) {
								//Erreur sur data_1, on renvoi vers edit
								$error = 'Le nom ou l\'indentifiant entré n\'est pas reconnu par Facebook.';
								$this->redirect(array('action' => 'edit', $widget['Widget']['id'], $error));
							}

						}

						break;

					// Widget Bicloo
					case 'bicloo':
						//Si on a bien une station en db
						if(isset($widget['Data']['data_1']))
						{ 
							//On cherche l'ID de la station
							$this->loadModel('BiclooStation');
							$station = $this->BiclooStation->findById($widget['Data']['data_1']);
							$this->set('station', $station);
						}
						else
						{
							$error = 'Aucun station configurée.';
							$this->redirect(array('action' => 'edit', $widget['Widget']['id'], $error));
						}
						break;


					default:
						break;
				}
				/* Fin fonction widget */

			} else {
				$error = 'Ce widget ne vous appartient pas.';
			}
		}
		$this->set('error', $error);
	}



	/*
	* Function delete
	*
	* Supprime le widget 
	* après avoir vérifier si il appartient bien à l'user courant
	*
	*/
	public function delete($id){
		//On cherche le widget à supprimer
		$widget = $this->Widget->find('first',
				array('conditions' => array('Widget.id' => $id))
			 );


		//Si le widget n'existe pas, on stop
		if(empty($widget)){
			$this->redirect(array('action' => 'refresh'), $this->Widget->$id);
		} else {
			$this->Widget->id = $id;

			//Vérif de l'appartenance du widget à l'user courant
			if($widget['Widget']['user_id'] == $this->Auth->user('id')){

				//Suppression
				$this->Widget->delete($id, true);
				if(isset($widget['Data'])) 
					$this->Widget->Data->delete($widget['Data']['id']);
				$this->Widget->Data->delete($widget['Position']['id']);
				return true;

			} else {
				$this->redirect(array('action' => 'refresh'), $this->Widget->$id);
			}
		}
	}


/* Fonctions pages Showroom */
	/*
	 * Function environnement()
	 * Complète la page shoroom environnement
	 */
	public function environnement(){

		$widgets = $this->Widget->find('all', array(
			'conditions' => array(
				'Upage.name' => 'Environnement',
				'Upage.user_id' => 1
			)
		));

		$this->set('widgets', $widgets);
	}
	/*
	 * Function parkings()
	 * Complète la page shoroom Parkings
	 */
	public function parkings(){

		$widgets = $this->Widget->find('all', array(
			'conditions' => array(
				'Upage.name' => 'Parkings',
				'Upage.user_id' => 1
			)
		));

		$this->set('widgets', $widgets);
	}	
	/*
	 * Function environnement()
	 * Complète la page shoroom Transports
	 */
	public function transports(){

		$widgets = $this->Widget->find('all', array(
			'conditions' => array(
				'Upage.name' => 'Transports',
				'Upage.user_id' => 1
			)
		));

		$this->set('widgets', $widgets);
	}	
	/*
	 * Function actualites()
	 * Complète la page shoroom Actualités
	 */
	public function actualites(){

		$widgets = $this->Widget->find('all', array(
			'conditions' => array(
				'Upage.name' => 'Actualités',
				'Upage.user_id' => 1
			)
		));

		$this->set('widgets', $widgets);
	}
/* End fonction showroom */

/* Fonctions ADMIN */

	/*
	* Function liste()
	*
	* // Admin //
	* Renvoi la liste de tous les widgets
	*
	*/
	public function liste(){
		if($this->Auth->user('group_id') == 1)
		{
			$this->layout = 'admin';
			$widgets = $this->Widget->find('all'); 		// <- A paginer

			$this->set('widgets', $widgets);
		} else {
			$this->redirect(array('action' => 'index'));
		}
	}

	/*
	* Function edition()
	*
	* // Admin //
	* Edit d'un widget et des datas etc.
	*
	*/
	public function edition($id){
		if($this->Auth->user('group_id') == 1)
		{
			$this->layout = 'admin';
			if($this->request->is('post'))
			{

				$data = $this->request->data;

				if($this->Widget->saveAssociated($data, array('validate' => false))){
					$this->Session->setFlash('Modification effectuée avec succès.', 'admin_flash_ok');
					$this->redirect(array('controller' => 'widgets', 'action' => 'liste'));
				} else {
					$this->Session->setFlash('La modification a échouée.', 'admin_flash_err');
				}
			}

			$widget = $this->Widget->find('first', array(
					'conditions' => array(
						'Widget.id' => $id)
					)); 
			$this->set('widget', $widget);

		} else {
			$this->redirect(array('action' => 'index'));
		}
	}

	/*
	* Function suppression
	*
	* Supprime le widget 
	* // admin
	*
	*/
	public function supprimer($id){
		$this->Widget->id = $id;
		$widget = $this->Widget->find('first', array(
				'conditions' => array(
				'Widget.id' => $id)
			)); 
		//Suppression
		$this->Widget->delete($id, true);
		//if(isset($widget['Data']))
			//$this->Widget->Data->delete($widget['Data']['id']);
		//$this->Widget->Pos->delete($widget['Position']['id']);
		$this->Session->setFlash('Suppression effectuée.', 'admin_flash_ok');
		$this->redirect(array('controller' => 'widgets', 'action' => 'liste'));
	}
}