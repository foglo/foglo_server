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
			<div class="ligne middle">
				<h1 class="middle <?php if(isset($couleur)) echo 'c'.$couleur; ?>">
					<span >Bicloo</span>
				</h1>
			</div>
			<div class="details middle">
				<ul>
					<li class="middle"><?php echo $station['BiclooStation']['available_bikes']." vélos disponibles"; ?></li>
					<li class="middle"><?php echo $station['BiclooStation']['available_bike_stands']." points d'attache disponibles"; ?></li>
				</ul>
				<h1><?php echo $station['BiclooStation']['name'] ;?></h1>
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