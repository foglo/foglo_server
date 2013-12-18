<!DOCTYPE html>
<html lang="fr">
<head>
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no' />
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout; ?> - foglo</title>
	<link href="http://fonts.googleapis.com/css?family=Terminal+Dosis|Marvel " rel="stylesheet" type="text/css">
	<link rel="publisher" href="https://plus.google.com/u/0/117506316819967690343/posts" />
	<?php
		echo $this->Html->meta('icon','/favicon.png', array('type' => 'icon'));

		echo $this->Html->css('style.css?v=12458');
		echo $this->Html->script('jquery-1.7.1.min');
		echo $this->Html->script('modernizr.custom');

		echo $this->Html->script('main.js?v=12468');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('scriptBefore');
		echo $this->fetch('script');
?>
		<!--[if lt IE 9]>
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
		<h3 class="middle">Votre navigateur ne permet pas de profiter de foglo à son maximum. Préférez Google Chrome ou Mozilla Firefox</h3>
		<div class="etai"></div>
	</div>
	<![endif]-->
	<!--[if lte IE 8]>
	<div id="old-browser">
		<h3 class="middle">Votre naviagateur n'est pas supporté. foglo nécessite un navigateur récent.</h3>
		<div class="etai"></div>
	</div>
	<![endif]-->
	<header class="pages">
		<div class="logo">
			<?php
				echo $this->Html->link( 
						$this->Html->image('logo_footer.png', array('alt' => 'logo', 'title' => 'Retour aux widgets')),
						array('controller' => 'widgets'),
						array('escape' => false)
					);
			?>
		</div>
		<div class="liste">
			<ul>
				<li>
					<?php echo $this->Html->link('A propos', array('controller' => 'pages', 'action' => 'display', 'about')) ?>
				</li>
				<li >
					<?php echo $this->Html->link('Blog', '/blog'); ?>
				</li>
				<?php echo $this->Html->link( 
						$this->Html->image('fleche-retour.png', array('alt' => 'retour aux widgets', 'title' => 'Retour aux widgets')),
						array('controller' => 'widgets'),
						array('escape' => false, 'class' => 'retour')
					);  ?>		
			</ul>
		</div>
	</header>
	<?php
		echo $this->Session->flash();
		echo $this->Session->flash('auth');
	?>
	<div id="container" class="pages <?php echo $title_for_layout; ?>">
		<?php echo $this->fetch('content'); ?>
	</div>
	<?php
		//Insertion du footer
		echo $this->element('footer');
	?>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
