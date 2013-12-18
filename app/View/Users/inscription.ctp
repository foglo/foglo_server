<div class="contenu inscription">
	<div class="inscription middle">
		<h1>Inscription</h1>
		<p>Inscrivez-vous pour choisir vos propres widgets !</p>
		<?php
			echo $this->Form->create('User', array('class' => 'compte'));
			echo $this->Form->input('prenom', array(
					'label' => 'Prénom : '
				));
			echo $this->Form->input('nom', array(
					'label' => 'Nom : '
				));
			echo $this->Form->input('email', array(
					'label' => 'Adresse email : '
				));
			echo $this->Form->input('password', array(
					'label' => 'Mot de passe : '
				));
			echo $this->Form->input('pwd_confirm', array(
					'label' => 'Confirmation : ',
					'type' => 'password'
				));
			echo '<p>En cliquant sur INSCRIPTION, vous acceptez nos '.$this->Html->link('Conditions d\'utilisation', array('controller' => 'pages', 'action' => 'display', 'cgu')).' .</p>';

			echo $this->Form->input('group_id', array('type' => 'hidden'));
			echo $this->Form->end('Inscription')
		?>
	</div>
	<div class="social middle">
		<h1>Restez connecté !</h1>
		<p class="small">Suivez-nous pour rester au courant de nos dernières actualités :</p>
		<a class="middle facebook" href="http://www.facebook.com/pages/Foglo/322458057822172">
			<?php echo $this->Html->image('info-pub/facebook.png', array('alt' => 'facebook', 'title' => 'Suivez-nous sur Facebook !')); ?>
		</a>
		<a class="middle" href="http://twitter.com/#!/foglo_nantes">
			<?php echo $this->Html->image('info-pub/twitter.png', array('alt' => 'twitter', 'title' => 'Suivez-nous sur Twitter !')); ?>
		</a>
		<a class="middle g" href="http://plus.google.com/b/117506316819967690343/117506316819967690343/posts">
		 <?php echo $this->Html->image('info-pub/googleplus.png', array('alt' => 'cercle', 'title' => 'Suivez-nous sur Google Plus !')); ?>
		</a>		
	</div>
</div>