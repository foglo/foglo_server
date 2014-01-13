<div 
	class="content <?php echo $widget['Widget']['name']; ?> middle sliderkit" 
	data-name="<?php echo $widget['Widget']['name']; ?>" 
	id="<?php echo $widget['Widget']['id']; ?>"
		<?php if($this->Session->read('Auth.User')): ?>
			title = "Glissez ce widget sur un autre pour échanger de place."
		<?php endif; ?>
	>

	<?php if(isset($station)): ?>
	<div class="slider sliderkit-panels sliderkit-panels-wrapper">

		<div class="station middle sliderkit-panel">
			<div class="title">
				<?php echo $this->Html->image('bicloo.svg', array('alt' => 'logo bicloo', 'class' => 'middle')); ?>
				<h1 class="middle"><?php echo $station['BiclooStation']['name'] ;?></h1>
			</div>

			<div class="details">
				<div class="middle">
					<?php echo $this->Html->image('bicloo.svg', array('alt' => 'logo bicloo', 'class' => 'middle')); ?>
				</div>

				<div class="middle">
					<h1><?php echo $station['BiclooStation']['available_bikes'] ?></h1>
					<p>Vélos disponibles</p>
				</div>

			</div>
		</div>

		<div class="station middle sliderkit-panel">
			<div class="title">
				<?php echo $this->Html->image('bicloo.svg', array('alt' => 'logo bicloo', 'class' => 'middle')); ?>
				<h1 class="middle"><?php echo $station['BiclooStation']['name'] ;?></h1>
			</div>

			<div class="details">
				<div class="middle">
					<?php echo $this->Html->image('bicloo-station.svg', array('alt' => 'logo station bicloo', 'class' => '	middle')); ?>
				</div>

				<div class="middle">
					<h1><?php echo $station['BiclooStation']['available_bike_stands'] ?></h1>

					<?php if($station['BiclooStation']['available_bike_stands'] > 1) : ?>
						<p>Points d'attache disponibles</p>
					<?php else:  ?>
						<p>Point d'attache disponible</p>
					<?php endif; ?>
				</div>
					
			</div>

		</div>
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
