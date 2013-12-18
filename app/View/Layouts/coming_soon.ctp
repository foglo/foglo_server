<!DOCTYPE html>
<html lang="fr">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>foglo</title>
	<link href="http://fonts.googleapis.com/css?family=Terminal+Dosis|Marvel " rel="stylesheet" type="text/css">
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('style');
		echo $this->Html->script('jquery-1.7.1.min');
		echo $this->Html->script('main');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		//echo $this->fetch('scriptBefore');
		echo $this->fetch('script');
	?>

	<?php //Pour francerv : que Google ignore le site. A désactiver pour le vrai site. ?>
	<!-- <meta name="robots" content="noindex,nofollow"> -->
</head>
<body>
	<?php
		//Insertion du header
		//echo $this->element('header');

		//Insertion du bloc d'info-pub si visiteur anonyme
		//if($this->Session->read('Auth.User') == null && $this->request->url != ('users/inscription' || 'users/login' || 'users/mdp_perdu')) {
		//	echo $this->element('info_pub');
		//}
	?>
	<?php
		//echo $this->Session->flash();
		//echo $this->Session->flash('auth');
	?>
	<div id="container" class="coming">
		<?php echo $this->fetch('content'); ?>
	</div>
	<?php
		//Insertion du footer
		//echo $this->element('footer');
	?>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
