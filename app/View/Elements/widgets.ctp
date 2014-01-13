<section id="wSidebar">
	<div class="etai"></div>
	<p class="title middle">Widgets</p>
	<div class="widgets middle">
		<p class="top">Glissez-déposez les widgets.</p>
		<div draggable="true" class="widget" data-type="meteo"><p>Météo</p></div>
		<div draggable="true" class="widget" data-type="tan"><p>Tan</p></div>
		<div draggable="true" class="widget" data-type="parkings"><p>Parkings</p></div>
		<div draggable="true" class="widget" data-type="twitter"><p>Twitter</p></div>
		<div draggable="true" class="widget" data-type="ecolo"><p>Be écolo</p></div>
		<div draggable="true" class="widget" data-type="horloge"><p>Horloge</p></div>
		<div draggable="true" class="widget" data-type="air"><p>Air</p></div>
		<div draggable="true" class="widget" data-type="rss"><p>Rss</p></div>
		<!-- <div draggable="true" class="widget" data-type="lila"><p>lila</p></div> -->
		<div draggable="true" class="widget" data-type="facebook"><p>facebook</p></div>
		<div draggable="true" class="widget" data-type="bicloo"><p>Bicloo</p></div>		
	<?php 
		//Widget personnalisable 
		if($this->Session->read('Auth.User.premium') == 1 || $this->Session->read('Auth.User.group_id') == 1 || $this->Session->read('Auth.User.group_id') == 3): 
	?>
		<div draggable="true" class="widget" data-type="perso"><p>Perso</p></div>
	<?php 
		endif;
		
		//Réservé aux admin
		if($this->Session->read('Auth.User.group_id') == 1):
	?>
	<?php endif;?>
		<p class="help"><?php echo $this->Html->link('Besoin d\'aide ?', array('controller' => 'pages', 'action' => 'display', 'aide')); ?></p>
		<div class="supprimer" title="Glissez un widget ici pour le supprimer."><p>Supprimer</p></div>
	</div>
</section>