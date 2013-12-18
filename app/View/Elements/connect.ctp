<?php
	echo $this->Form->create('User', array(
		'url' => array('controller' => 'users', 'action' => 'login'),
		'class' => 'formConnect'));
	echo $this->Form->input('email', array(
			'label' => 'Email : '
		));
	echo $this->Form->input('password', array(
			'label' => 'Mot de passe : '
		));
	echo $this->Form->input('auto_login', array(
		'type' => 'checkbox',
		'label' => array('class' => 'souvenir middle', 'text' => 'Se souvenir de moi ?'),
		'class' => 'souvenir middle',
		'checked' => 'checked'
	));
	echo $this->Html->link('Vous avez perdu votre mot de passe ?', array('controller' => 'users', 'action' => 'mdp_perdu')). '<br />';
	echo $this->Html->link('Toujours pas inscrit ?', array('controller' => 'users', 'action' => 'inscription'));
	echo '<br />';
	echo $this->Form->end('Connexion');
?>