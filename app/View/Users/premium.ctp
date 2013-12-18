<?php
	echo $this->element('user_sidebar');
?>
<div class="contenu">
	<h1>Modifier mon compte</h1>
	<h3>Pour finaliser le passage en compte Premium, veuillez valider l'opération en cliquant sur le bouton ci-dessous.</h3>
	<p>
		<strong>Rappel : </strong> le compte Premium étant toujours au stade <em>beta</em>, il est totalement gratuit. N'hésitez pas à nous faire part de vos remarques via <a href="http://foglo.fr/contact">la page contact</a> ou sur les réseaux sociaux (<a href="http://twitter.fr/foglo_nantes">Twitter</a> - <a href="http://facebook.com/foglo">Facebook</a>). Nous attendons vos retours !
	</p>
	<?php

		echo $this->Form->create('User');

		// echo $this->Form->input('formule', array(
		// 	'options' => array(
		// 		'1' => 'Gratuit jusqu\'au 31 Août'),
		// 	'label' => 'Choisissez une formule : '
		// 	));

		echo $this->Form->button(
			'Devenir premium',
			array('class' => 'green')
			);

	?>

</div>