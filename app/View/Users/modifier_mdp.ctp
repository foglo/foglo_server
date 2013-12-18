<?php
	echo $this->element('user_sidebar');
?>
<div class="contenu">
	<h1>Modifier mon mot de passe</h1>
	<p>Pour changer de mot de passe, complètez les deux champs si dessous. Laissez-les vides sinon.</p>
<?php
	echo $this->Form->create('User', array('class' => 'compte'));

	echo $this->Form->input('new_password_1', array(
			'type'  => 'password',
			'label' => 'Nouveau mot de passe : '
		));
	echo $this->Form->input('new_password_2', array(
			'type'  => 'password',
			'label' => 'Confirmation : '
		));
	echo '<br />';
	echo $this->Form->input('password', array('label' => 'Mot de passe actuel: '));


	echo $this->Form->input('id', array(
			'value' => $user['User']['id']
		));
	echo $this->Form->end('Modifier');
?>
</div>
<div class="cb"></div>