<?php
	//Si il y a retour de widget
	if(isset($widget))
	{
	?>
		<div 
			class="panneau <?php echo $widget['Widget']['name']; ?> middle"  
			id="<?php echo $widget['Widget']['id']; ?>" 
			data-name="<?php echo $widget['Widget']['name']; ?>"
			>
			<?php
				$class = '';
				if(isset($stopForm) && $stopForm){
					$class = 'stop';
				}

				echo $this->Form->create('Widget', array(
						'class' => 'middle '.$widget['Widget']['name'].' '.$class,
						//data-stop yes pour empècher envoi form avec button par défaut
						'data-stop' => ($widget['Widget']['name'] == 'tan|lila|facebook') ? 'true' : 'false', 
					));

				/* En fonction des widgets */
				
				switch ($widget['Widget']['name']) {
					//Météo
					case 'meteo':
						echo $this->Form->input('Data.id', array(
								'value' => $widget['Data']['id'],
								'type'  => 'hidden'
							));
						echo $this->Form->input('Data.data_1', array(
								'label' => 'Ville : ',
								'value' => $widget['Data']['data_1']
							));
						break;
					
					//Tan
					case 'tan':
						echo $this->Form->input('Data.id', array(
								'value' => $widget['Data']['id'],
								'type' => 'hidden'
							));

						echo '<div class="arret">';

						//Construction options (la première ligne doit être vide pour select2)
						$option = array('' => "");
						$options = array_merge($option, $arrets ?: array());

						echo $this->Form->input('Data.data_1', array(
								'label' => false,
								'type'  => 'select',
								'div'   => false,
								'options' => $options,
								'class' => 'select2 arret'
							));

						echo $this->Html->image('ajax-loader.gif', array('class' => 'loader'));
						echo '</div> <br />';

						echo '<div class="ligne">';
						echo $this->Form->input('Data.data_2', array(
								'label' => false,
								'type'  => 'hidden',
								'class' => 'ligne',
								'div'   => 'select2 ligne'
							));
						echo $this->Html->image('ajax-loader.gif', array('class' => 'loader'));
						echo '<p class="alerte">Aucune ligne disponnible pour cet arrêt.</p>';
						echo '</div> <br />';

						echo '<div class="direction">';
						echo $this->Form->input('Data.data_3', array(
								'label'    => false,
								'type'  => 'hidden',
								'class'    => 'select2 direction',
								'div'      => 'direction',
							));
						echo $this->Html->image('ajax-loader.gif', array('class' => 'loader'));
						echo '<p class="alerte">Aucune direction disponnible pour cette ligne.</p>';
						echo '</div>';
						echo $this->Form->input('Data.data_4', array(
								'label' => 'Info-Trafic <a class="infoBulle" href="#" title="Le widget peut afficher les alertes Info-Trafic Tan pour votre ligne si il y en a.">?</a>',
								'type' => 'checkbox'
							));
						break;

					//Parkings
					case 'parkings':
						echo $this->Form->input('Data.id', array(
								'value' => $widget['Data']['id'],
								'type'  => 'hidden'
							));
						echo $this->Form->input('Data.data_1', array(
								'label' => 'Parking : ',
								'options' => array(
										'DECRE-BOUFFAY'             => 'Decré-Bouffay',
										'TOUR DE BRETAGNE'          => 'Tour de Bretagne',
										'ARISTIDE BRIAND'           => 'Aristide Briand',
										'MEDIATHEQUE'               => 'Mediathèque',
										'COMMERCE'                  => 'Commerce',
										'TALENSAC'                  => 'Talensac',
										'CITE INT DES CONGRES'      => 'Cité des Congrès',
										'CATHEDRALE'                => 'Cathédrale',
										'LES MACHINES'              => 'Les Machines',
										'BACO-LU'                   => 'Baco-lu',
										'FEYDEAU'                   => 'Feydeau',
										'HOTEL DIEU'                => 'Hotel Dieu',
										'C.H.U'                     => 'C.H.U',
										'GRASLIN'                   => 'Graslin',
										'GARE NORD'                 => 'Gare Nord',
										'GARE SUD 1'                => 'Gare Sud 1',
										'GARE SUD 2'                => 'Gare Sud 2',
										'GARE SUD 3'                => 'Gare Sud 3',
										'GARE SUD 3'                => 'Gare Sud 4',
										'GARE SUD 2 LIMITE 1 HEURE' => 'Gare Sud 2 - 1H',
										'BELLAMY'                   => 'Bellamy',
										'CHATEAU'                   => 'Château',
										'VIVIANI'                   => 'Viviani'
								 	),
								'selected' => $widget['Data']['data_1']
							));
						break;

					//Perso
					case 'perso':
						echo $this->Form->input('Widget.titre', array(
								'value'     => $widget['Widget']['titre'],
								'type'      => 'text',
								'maxlength' => 18,
								'label'     => 'Titre : '
							));
						echo $this->Form->input('Data.id', array(
								'value' => $widget['Data']['id'],
								'type'  => 'hidden',
							));
						echo $this->Form->input('Data.data_1', array(
								'value' => $widget['Data']['data_1'],
								'type'  => 'textarea',
								'label' => 'Message 1 : '
							));
						echo $this->Form->input('Data.data_2', array(
								'value' => $widget['Data']['data_2'],
								'type'  => 'textarea',
								'label' => 'Message 2 : '
							));
						echo $this->Form->input('Data.data_3', array(
								'value' => $widget['Data']['data_3'],
								'type'  => 'textarea',
								'label' => 'Message 3 : '
							));
						echo $this->Form->input('Data.data_4', array(
								'value' => $widget['Data']['data_4'],
								'type'  => 'textarea',
								'label' => 'Message 4 : '
							));
						break;

					//Twitter
					case 'twitter':
						echo $this->Form->input('Data.id', array(
								'value' => $widget['Data']['id'],
								'type'  => 'hidden'
							));
						echo $this->Form->input('Data.data_1', array(
								'label' => 'Compte @',
								'value' => $widget['Data']['data_1']
							));
						break;

					//Ecolo
					case 'ecolo':
						echo $this->Form->input('Data.id', array(
							'value' => $widget['Data']['id'],
							'type'  => 'hidden'
						));
					echo $this->Form->input('Data.data_1', array(
							'label' => 'Ville : ',
							'value' => $widget['Data']['data_1']
						));
						break;

					//Rss
					case 'rss':
						echo $this->Form->input('Data.id', array(
							'value' => $widget['Data']['id'],
							'type'  => 'hidden'
						));
					echo $this->Form->input('Data.data_1', array(
							'label' => 'Flux Rss : ',
							'value' => $widget['Data']['data_1']
						));
						break;
					
					//Lila
					case 'lila':
						echo $this->Form->input('Data.id', array(
								'value' => $widget['Data']['id'],
								'type' => 'hidden'
							));

						echo '<div class="arret">';

						//Construction options (la première ligne doit être vide pour select2)
						$option = array('' => "");
						$options = array_merge($option, $arrets ?: array());

						echo '<p>Mode Expérimental <a class="infoBulle" href="#" title="Mode \'Expérimental\' dû au fait de certaines complications techniques qui entrainent des opérations plus lentes. Le widget met un certain temps à trouver les directions correspondantes à votre ligne lors du paramètrage. Ces directions peuvent d\'ailleurs  posez problème : le widget essaie de les construire à partir du premier et du dernier arrêt du plus long voyage de la ligne. Il vous sera peut être nécessaire de consulter les fiches horaires pour vous y retrouver. Ces problèmes sont dû à des erreurs dans les fichiers de données mis en place par data.loire-atlantique.fr. Nous les avons signalé et espérons que cela soit réparé rapidement.">?</a></p>';

						echo $this->Form->input('Data.data_1', array(
								'label' => false,
								'type'  => 'select',
								'div'   => false,
								'options' => $options,
								'class' => 'select2 arret'
							));

						echo $this->Html->image('ajax-loader.gif', array('class' => 'loader'));
						echo '</div> <br />';

						echo '<div class="ligne">';
						echo $this->Form->input('Data.data_2', array(
								'label' => false,
								'type'  => 'hidden',
								'class' => 'ligne',
								'div'   => 'select2 ligne'
							));
						echo $this->Html->image('ajax-loader.gif', array('class' => 'loader'));
						echo '<p class="alerte">Aucune ligne disponnible pour cet arrêt.</p>';
						echo '</div> <br />';

						echo '<div class="direction">';
						echo $this->Form->input('Data.data_3', array(
								'label'    => false,
								'type'  => 'hidden',
								'class'    => 'select2 direction',
								'div'      => 'direction',
							));
						echo $this->Html->image('ajax-loader.gif', array('class' => 'loader'));
						echo '<p class="alerte">Aucune direction disponnible pour cette ligne.</p>';
						echo '</div>';
						break;

					//Facebook
					case 'facebook':
						echo $this->Form->input('Data.id', array(
							'value' => $widget['Data']['id'],
							'type'  => 'hidden'
						));

						$class = '';
						//Utilisateur non connecté à FB
						if(!$userConnected) {
							$class = 'notConnected';
						}

						echo '<p class="notConnectedFb '. $class .'">Vous n\'êtes pas connecté à Facebook. <a class="caac811 facebookConnect facebookEdit" href="#">Connexion.</a><a title="Si vous n\'êtes pas connecté à Facebook à travers foglo, le widget ne peut pas accéder au site. " href="#" class="infoBulle">?</a></p>';

						echo $this->Form->input('Data.data_1', array(
							'label' => 'Nom ou identifiant d\'une personne ou d\'une page : <a title="Par exemple \'foglo\' pour la page facebook.com/foglo ou \'zuck\' pour le profil facebook.com/zuck." href="#" class="infoBulle">?</a>',
							'value' => $widget['Data']['data_1'],
							'div'   => $class,
						));
						break;

					//Stations Bicloo
					case 'bicloo':

						echo $this->Form->input('Data.id', array(
								'value' => $widget['Data']['id'],
								'type'  => 'hidden'
							));

						echo '<div class="station">';

						$option = array('' => "");
						$options = $option + ($stations ?: array());

						echo $this->Form->input('Data.data_1', array(
								'label' => false,
								'type'  => 'select',
								'div'   => false,
								'options' => $options,
								'class' => 'select2 station'
							));

						echo $this->Html->image('ajax-loader.gif', array('class' => 'loader'));
						echo '</div> <br />';
						break;

					default:
						break;
				}

				/* End fonction widgets */
					
				echo $this->Form->input('user_id', array(
					'value' => $widget['Widget']['user_id'],
					'type'  => 'hidden'
					));
				echo $this->Form->input('id', array(
					'value' => $widget['Widget']['id'],
					'type'  => 'hidden'
					));
				echo $this->Form->submit('Enregister', array(
					'after' => $this->Html->image('ajax-loader.gif', array('class' => 'loader')),
					'value' => 'Enregister'
					));
			?>
				</form>
			<div class="etai"></div>
			<?php 
				//Affichage des erreurs si existantes
				if($error != false){
					echo $this->element('error'); 
				}
			?>
		</div>
	<?php	
	}
?>
<p class="supprimer">Supprimer</p>
<?php 
	if(isset($poptions)){
		echo '<p class="options close" title="Options">×</p>';
	}

