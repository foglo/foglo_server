<div class="contenu">
	<p>Pour récupérer un nouveau mot de passe, merci de rentrer l'adresse email de votre compte ci-dessous. Un nouveau mot de passe vous sera envoyé. Vous pourrez par la suite le modifier depuis votre page compte habituelle.</p>
	<?php
		echo $this->Form->create('User', array('class' => 'compte'));
		echo $this->Form->input('email', array(
				'label' => 'Votre adresse email :'
			));
		echo $this->Form->end('Envoyer le mail');
	?>
</div>
<div class="cb"></div>