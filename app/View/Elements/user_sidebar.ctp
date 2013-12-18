<div id="sidebar" class="userSidebar">
	<?php 


		//Si compte gratuit
		if(!$user['User']['premium'] && $user['User']['group_id'] != 1 && $user['User']['group_id'] != 3): 
	?>
		<?php echo $this->Html->link('Devenir Premium', array('controller' => 'pages', 'action' => 'display', 'premium'), array('class' => 'button')); ?>
		<br />
	<?php endif; ?>

	<?php echo $this->Html->link('Se déconnecter', array('controller' => 'users', 'action' => 'logout'), array('class' => 'button')); ?>
	<?php echo $this->Html->link('Modifier mon compte', array('controller' => 'users', 'action' => 'modifier_compte'), array('class' => 'button')); ?>
	<?php echo $this->Html->link('Modifier mon mot de passe', array('controller' => 'users', 'action' => 'modifier_mdp'), array('class' => 'button')); ?>
	<?php echo $this->Html->link('Supprimer mon compte', array('controller' => 'users', 'action' => 'suppression'), array('class' => 'button'), "Voulez-vous réellement supprimer votre compte ? Aucun retour en arrière ne sera possible."); ?>
</div>
