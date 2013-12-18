<?php 
class AirShell extends AppShell {

	public $uses = array('Indice');

	/*
	 * Function add()
	 *
	 * AJoute l'indice de quelité de l'air du lendemain
	 * Appelé par tache Cron tous les jours à 23:00 : 
	 * 00 23 * * * /home/foglof1/public_html/app/Console/cakeshell Air add 3gE0SEL -cli /usr/bin -console /home/foglof1/public_html/lib/Cake/Console -app /home/foglof1/public_html/app >> /home/foglof1/public_html/app/tmp/logs/debug.log 
	 * !! Bien passer les fichier cake, cake.bat, cake.php dans app et libs en exécutable
	 */
	public function add()
	{
		$mail = false;
		$code = $this->args[0];

		if($code == '3gE0SEL')
		{
			//Affichqge Date dans log
			echo date("d M Y H:i:s")."\n\r";

			//Ouverture boite mail
			$mbox = imap_open("{mail.foglo.fr/novalidate-cert}", 'airpl@foglo.fr', ',(_vqr3.(K(L', NULL, 1) or die("can't connect: " . imap_last_error());

			if($mbox !== false)
			{
				//Inspection de la boite
				$info = imap_check($mbox);
				//Aperçu des derniers mails
          		$mails = imap_fetch_overview($mbox, '1:'.$info->Nmsgs, 0);
          		//On retourne le tablau mon avoir mail 0 = ajd
          		$mails = array_reverse($mails);

          		if(!empty($mails) && $mails !== false)
          		{
	          		//Id du dernier mail
	          		$uid = $mails[0]->uid;
	          		//Header
	          		$headerText = imap_fetchHeader($mbox, $uid, FT_UID);
	      			$header = imap_rfc822_parse_headers($headerText);

	      			//Si c'est bien un mail d'indices qualité de l'air
	      			if($header->fromaddress == 'contact@airpl.org' && $header->subject == 'airpl INDICES')
	      			{
	      				//Si mail date bien d'aujourd'hui
	      				if(stristr($header->date, date("D, d M Y"))) 
	      				{
			          		//Corps du message
			          		$corps = imap_fetchbody($mbox, $uid, 1, FT_UID);
			          		//On coupe le msg ligne par ligne
		          			$lignes = explode("\r\n", $corps);

		          			//On cherche la ligne contenant le mot "Nantes"
		          			//ex : 2 3  Nantes (2 : ajd / 3 : demain)
		          			foreach ($lignes as $ligne) {
		          				if(stristr($ligne, 'Nantes') !== FALSE) {
		          					//extraction de l'indice du lendemain
									$indice = substr($ligne, 2, 1);
								}
		          			}

		          			//Def de la date du lendemain
							$ajd = date("Y-m-d");
							$demain = mktime(0, 0, 0, substr($ajd,5,2), substr($ajd,8,2)+1, substr($ajd,0,4));
							$demain = date("Y-m-d", $demain);

		          			$data = array(
		          				'Indice' => array(
									'indice' => $indice,
									'date'   => $demain
		          				));

		          			$this->Indice->create();
		          			if(!$this->Indice->save($data)){
		          				//Envoi mail d'alerte si pb à l'enregistrement
		          				$mail = 'Erreur save()';
		          			}

		          			//Suppr du troisième mail pour alléger la boite
	          				$uid2 = $mails[2]->uid;
		          			if($uid2 && !imap_delete($mbox, $uid2, FT_UID)){
		          				$mail = 'Erreur à la suppression du troisième mail';
		          			}
	          			}
	          			else
	          			{
	          				$mail = 'Le dernier mail ne date pas d\'aujourd\'hui '.date("d M Y");
	          			}
	      			}
	      			else
					{
						$mail = 'Le dernier mail ne concerne pas les indices qualité de l\'air';
					}
				}
				//CL_EXPUNGE pour suuprimer les msg marqués par imap_delete
				imap_close($mbox, CL_EXPUNGE);
			}
			else
			{
				$mail = 'Erreur ouverture flux imap';
			}

			if($mail)
			{
				//Envoi email avec mdp
			    App::uses('CakeEmail', 'Network/Email');

				//Construction du msg avec identification du pb à la fin
				$message = 'Il y a eu un problème lors de l\'extraction de l\'indice de qualité de l\'air du lendemain.'."\n\r".'IndicesController::add()'."\n\r".$mail;

		        $email = new CakeEmail();
		        $email->from('contact@foglo.fr');
		        $email->to('guillaume@wuips.com');
		        $email->subject('Bug Indices AIRPL');
		        $email->send($message);

		        echo 'Problème :'."\n\r";
		        echo $mail;
			}
			else
			{
				echo "Pas de problème"."\n\r"."\n\r";
			}		
		}
	}
}

