<div 
	class="content <?php echo $widget['Widget']['name']; ?> middle sliderkit" 
	data-name="<?php echo $widget['Widget']['name']; ?>" 
	id="<?php echo $widget['Widget']['id']; ?>"
		<?php if($this->Session->read('Auth.User')): ?>
			title = "Glissez ce widget sur un autre pour échanger de place."
		<?php endif; ?>
	>

	<?php if(isset($passages)): ?>

	<div class="slider sliderkit-panels sliderkit-panels-wrapper">
	<?php 
		foreach ($passages as $passage)
		{
		?>
		<div class="passage middle sliderkit-panel">

			<div class="ligne middle">
				<h1 class="middle <?php if(isset($couleur)) echo 'c'.$couleur; ?>">
					<span >Tan</span>
					<?php echo $passage['ligne']['numLigne']; ?>
				</h1>
				<div class="etai"></div>
			</div>
		<?php 
			//Si un temps d'attente est dispo
			if(isset($passage['temps']) && !empty($passage['temps'])): 
		?>
			<div class="details middle">
				<ul>
					<?php echo $this->Html->image('arret_bus.png', array('alt' => 'icone_bus', 'class' => 'middle')); ?>
					<li class="middle"><?php echo $arret; ?></li>
					<br />
					<?php echo $this->Html->image('sens_bus.png', array('alt' => 'icone_bus', 'class' => 'middle')); ?>
					<li class="middle"><?php echo $passage['terminus']; ?></li>
				</ul>
				<h1><?php echo $passage['temps'] ;?></h1>
			</div>
		<?php 
			//Pas de temps dispo (donc normalement durée d'attente > 1h)
			else:
		?>
			<div class="details middle">
				<ul>
					<?php echo $this->Html->image('arret_bus.png', array('alt' => 'icone_bus', 'class' => 'middle')); ?>
					<li class="middle"><?php echo html_entity_decode($arret, ENT_NOQUOTES, "UTF-8"); ?></li>
					<br />
					<?php echo $this->Html->image('sens_bus.png', array('alt' => 'icone_bus', 'class' => 'middle')); ?>
					<li class="middle"><?php echo html_entity_decode($passage['terminus'], ENT_NOQUOTES, "UTF-8"); ?></li>
				</ul>
				<h3>Pas de passage avant 1 heure au moins.</h3>
			</div>

		<?php endif; ?>
		</div>
	<?php 
		} //End foreach passages

		//InfoTrafic
		if(isset($infosTan)):
			foreach ($infosTan as $info) 
			{
			?>
			<div class="info middle sliderkit-panel">
				<div class="title">
					<?php echo $this->Html->image('info-trafic.jpg', array('alt' => 'info trafic', 'class' => 'middle')); ?>
					<h1 class="middle">Tan : <?php echo $info['titre']; ?></h1>
				</div>
				<div class="msg">
					<p class="middle"><?php echo $info['resume']; ?></p>
					<div class="etai"></div>
				</div>
			</div>
			<?php
			}
		endif; 
	?>
	</div>
	<?php 
		elseif(isset($error)): 
			echo $this->element('error_widget');
		endif;
	?>


	<div class="etai"></div>
</div>
<?php echo $this->Html->image('ajax-loader.gif', array('class' => 'loader middle')); ?>
<div class="etai"></div>