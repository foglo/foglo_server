<?php
	echo $this->element('user_sidebar');
?>
<div class="contenu">
	<h1>Modifier mon compte</h1>
<?php
	echo $this->Form->create('User', array('class' => 'compte'));
	echo $this->Form->input('prenom', array(
		'value' => $user['User']['prenom'],
		'label' => 'Prénom : '));
	echo $this->Form->input('nom', array(
		'value' => $user['User']['nom'],
		'label' => 'Nom : '));
	echo $this->Form->input('email', array(
		'value' => $user['User']['email'],
		'label' => 'Email :'));

	echo $this->Form->input('password', array('label' => 'Mot de passe : '));

	echo $this->Form->input('id', array(
			'value' => $user['User']['id']
		));
	echo $this->Form->end('Modifier');
?>
</div>
<div class="cb"></div>