<h1 class="bigTitle">Nous contacter</h1>
<?php echo $this->Form->create('Contact'); ?>
	<div class="left middle">
	<?php
		echo $this->Form->input('nom', array('label' => "Votre nom :", 'size' => 80));
		echo $this->Form->input('email', array('label' => "Votre adresse email :", 'size' => 80));
	?>
	</div>
	<div class="right middle">
	<?php echo $this->Form->input('message', array(
			'cols' => 70,
			'rows' => 12,
			'type' => 'textarea',
			'label' => 'Comment vous aider ?'
			)); ?> 
	<?php echo $this->Form->error('message'); ?>
	</div>
<?php echo $this->Form->end("Envoyer le message"); ?>

<hr />

<h1 class="bigTitle social">Nous suivre</h1>
<div class="social">
	<h2>Suivez-nous pour rester au courant de nos dernières actualités :</h2>
	<a class="middle fb" href="http://www.facebook.com/foglo">
		<?php echo $this->Html->image('info-pub/facebook.png', array('alt' => 'facebook', 'title' => 'Suivez-nous sur Facebook !')); ?>
	</a>
	<a class="middle tt" href="http://twitter.com/#!/foglo_nantes">
		<?php echo $this->Html->image('info-pub/twitter.png', array('alt' => 'twitter', 'title' => 'Suivez-nous sur Twitter !')); ?>
	</a>
	<a class="middle g" href="http://plus.google.com/b/117506316819967690343/117506316819967690343/posts">
	 <?php echo $this->Html->image('info-pub/googleplus.png', array('alt' => 'cercle', 'title' => 'Suivez-nous sur Google Plus !')); ?>
	</a>
</div>

<hr />

<h1 class="bigTitle aide">Nous aider</h1>
<div class="aide">
	<h2>Un petit coup de main ne serait pas de refus !</h2>
	<a target="_blank" class="button green middle first" href="https://docs.google.com/spreadsheet/viewform?formkey=dGs5ay0teU9sSjkzeGRRQWQxNDloS3c6MQ#gid=0">Rapporter un bug</a>
	<a target="_blank" class="button green middle second" href="https://docs.google.com/spreadsheet/viewform?formkey=dFBqRVJhaEFZV3FpWTRRak44c2M1Y1E6MQ">Soumettre une idée</a>	
</div>
