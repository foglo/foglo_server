<?php
	//Affichage des erreurs si existantes
	if($error != false){
		echo $this->element('error'); 
	}

	//Si il y a retour de widget 
	if(isset($widget))
	{
		$w = $widget['Widget'];

		//On va chercher l'élement correspondnat au widget
		echo $this->element('widgets/widget_'.$w['name'], array(
			'widget' => $widget));

		//On empèche l'édit par non-inscrit sur accueil + pas d'edit si widget sans options
		if($this->Session->read('Auth.User') && $this->Session->read('Auth.User.id') == $widget['Widget']['user_id'] && !(isset($stopOptions) && $stopOptions))
		{
			echo '<p class="options open" title="Options">+</p>';
		}

	}
?>
