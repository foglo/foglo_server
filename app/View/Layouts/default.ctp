<!DOCTYPE html>
<html lang="fr">
<head>
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no' />
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php if($title_for_layout == 'titleAccueil'): ?>
			foglo
		<?php else: echo $title_for_layout; ?> - foglo
		<?php endif; ?>
	</title>
	<link href="http://fonts.googleapis.com/css?family=Terminal+Dosis|Marvel " rel="stylesheet" type="text/css">
	<link rel="publisher" href="https://plus.google.com/u/0/117506316819967690343/posts" />
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
	<meta name="description" content="En allant chercher le maximum d'information dont vous avez besoins pour évoluer dans l'agglomération nantais, nous vous simplifions le quotidien. Rien que ça.">
	<?php
		echo $this->Html->meta('icon','/favicon.png', array('type' => 'icon'));

		echo $this->Html->css('style.css?v=12456798345');
		echo $this->Html->script('jquery-1.7.1.min');
		echo $this->Html->script('jquery.easing.1.3.min');
		echo $this->Html->script('modernizr.custom');

		//Select2
		echo $this->Html->css('select2.css?v=2');
		echo $this->Html->script('select2.js?v=2');

		//Sliderkit
		echo $this->Html->script('jquery.sliderkit.1.9.2');
		echo $this->Html->css('sliderkit-core.css?v=12');

		echo $this->Html->script('main.js?v=1234567874');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('scriptBefore');
		echo $this->fetch('script');
	?>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script type="text/javascript">
		ie = false;
		root ="<?php echo 'http://'.$_SERVER['HTTP_HOST'], $this->webroot; ?>";
	</script>
	<!-- Analytics -->
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-31511206-1']);
	  _gaq.push(['_setDomainName', 'foglo.fr']);
	  _gaq.push(['_trackPageview']);
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
	<!--[if IE 9]>
		<script type="text/javascript">
			ie = true;
			ieVersion = 9;
		</script>
	<![endif]-->
	<!--[if lt IE 9]>
		<script type="text/javascript">
			ie = true;
			ieVersion = 8;
		</script>
	<![endif]-->
</head>
<body>
	<!--[if IE 9]>
	<div id="old-browser">
		<h3 class="middle">Votre navigateur ne permet pas de profiter de foglo à son maximum. Préférez Google Chrome, Mozilla Firefox ou Safari.</h3>
		<div class="etai"></div>
	</div>
	<![endif]-->
	<!--[if lte IE 8]>
	<div id="old-browser">
		<h3 class="middle">Votre naviagateur n'est pas supporté. foglo nécessite un navigateur récent comme les dernières versions de Google Chrome, Mozilla Firefox ou Safari.</h3>
		<div class="etai"></div>
	</div>
	<![endif]-->
	<?php
		//Insertion du header
		echo $this->element('header');

		//Insertion du bloc d'info-pub si visiteur anonyme
		if($this->Session->read('Auth.User') == null && $this->request->url != 'inscription' && $this->request->url != 'users/mdp_perdu'&& $this->request->url != 'users/login')
		{

			echo $this->element('info_pub');
			
			if($this->params['controller'] == 'widgets' && $this->params['action'] == 'index'){
				echo '<h2 class="presentation">Voici des exemples de blocs d\'informations (ou widgets) que vous pouvez créer une fois '. $this->Html->link('inscrit', array('controller' => 'users', 'action' => 'inscription' )) .' :</h2>';
			} 
		}
	?>
	<?php
		echo $this->Session->flash();
		echo $this->Session->flash('auth');
	?>
	<div id="container">
		<?php echo $this->fetch('content');?>
	</div>
	<?php
		if($this->Session->read('Auth.User') == null && $this->params['controller'] == 'widgets' && $this->params['action'] == 'index')
		{
			echo '<h2 class="presentation button">Toujours pas inscrit ? '. $this->Html->link('Inscrivez-vous', array('controller' => 'users', 'action' => 'inscription' ), array('class' => 'green button')).'</h2>' ;
			
		}

		if($this->params['controller'] == 'widgets' && $this->params['action'] == 'index' && $this->Session->read('Auth.User') != null)
		{
			echo $this->element('widgets'); 
		}

	?>
	<?php
		//Insertion du footer
		echo $this->element('footer');
	?>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
