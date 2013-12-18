<div 
	class="content <?php echo $widget['Widget']['name']; ?> middle sliderkit" 
	data-name="<?php echo $widget['Widget']['name']; ?>" 
	id="<?php echo $widget['Widget']['id']; ?>"
		<?php if($this->Session->read('Auth.User')): ?>
			title="Glissez ce widget sur un autre pour échanger de place."
		<?php endif;?>
	>
	<div class="title">
		<h1 class="middle">Air <span>Nantes</span> </h1>
		<div class="etai"></div>
	</div>
	<div class="slider sliderkit-panels sliderkit-panels-wrapper">
		<div class="sliderkit-panel">
		<?php 
			/* Indice */
			if(!empty($indice)): 

			//Construction du texte
			$indices = array(
				'1'  => 'Très Bon',
				'2'  => 'Très Bon',
				'3'  => 'Bon',
				'4'  => 'Bon',
				'5'  => 'Moyen',
				'6'  => 'Médiocre',
				'7'  => 'Médiocre',
				'8'  => 'Mauvais',
				'9'  => 'Mauvais',
				'10' => 'Très Mauvais'
				);
			//Msg de la forme "1 - Très Bon"
			$msg = $indice.' - '.$indices[$indice];

			//couleurs
			$colors = array(
				'1'  => 'c54b11f',
				'2'  => 'c54b11f',
				'3'  => 'caac811',
				'4'  => 'caac811',
				'5'  => 'cdedd00',
				'6'  => 'cec7321',
				'7'  => 'cec7321',
				'8'  => 'cff3421',
				'9'  => 'cff3421',
				'10' => 'cff0015'
				);
		?>
			<div class="middle indice <?php if(!isset($alerte)){ echo "alone"; } ?> ">
				<h2>Indice de qualité :</h2>
				<h1 class="<?php echo $colors[$indice] ?>"><?php echo $msg; ?></h1>
			</div>

		<?php else: ?>

			<p class="middle">Indice de qualité de l'air indisponible.</p>

		<?php endif; ?>
		
			<div class="etai"></div>
		</div>

		<?php
			//Alerte
			if(isset($alerte)):
		?>
		<div class="sliderkit-panel">
			<div class="middle alerte">
				<h2>Alerte :</h2>
				<h3><?php echo $alerte; ?> </h3>
			</div>
			<div class="etai"></div>
		</div>
		<?php endif; ?>
	</div>

</div>
<?php echo $this->Html->image('ajax-loader.gif', array('class' => 'loader middle')); ?>
<div class="etai"></div>