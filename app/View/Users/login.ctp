<div class="contenu login">
	<div class="connect middle">
		<h1>Connexion</h1>
		<?php
			echo $this->element('connect');
		?>	
	</div>
	<div class="inscription middle">
		<h1>Toujours pas inscrit ?</h1>
		<p>
			Si vous êtes nantais, foglo va vous simplifier le quotidien !
		</p>
		<p>
			Regroupez un maximum de données sous forme de blocs d'information (ou widgets) dans un seul et même endroit.
			<?php echo $this->Html->link('Inscrivez-vous !', array('controller' => 'users', 'action' => 'inscription'), array('class' => 'green button')); ?>
		</p>
	</div>
</div>