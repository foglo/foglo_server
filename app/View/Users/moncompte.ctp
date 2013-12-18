<?php
	echo $this->element('user_sidebar');
?>
<div class="contenu">
	<h1>Votre compte</h1>
	<h2><?php echo $user['User']['prenom'].' '.$user['User']['nom']; ?></h2>
	<h4>Adresse email : <?php echo $user['User']['email'] ?></h4>
	<h4>Compte créé le : <?php echo $user['User']['created'] ?></h4>
	<br />
	<?php if($user['User']['premium'] == 1): ?>
	<h4>Abonnement premium jusqu'au <?php echo $user['User']['end_premium'] ?></h4>
	<?php endif; ?>
</div>
<div class="cb"></div>
