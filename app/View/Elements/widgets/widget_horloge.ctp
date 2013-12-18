<div 
	class="content <?php echo $widget['Widget']['name']; ?> middle sliderkit" 
	data-name="<?php echo $widget['Widget']['name']; ?>" 
	id="<?php echo $widget['Widget']['id']; ?>"
		<?php if($this->Session->read('Auth.User')): ?>
			title="Glissez ce widget sur un autre pour échanger de place."
		<?php endif;?>
	>

	<?php if(isset($heure) && isset($date)): ?>

	<div class="slider sliderkit-panels">
		<div class="sliderkit-panel middle">
			<h1 class="middle heure"><?php echo $heure; ?></h1>
			<div class="etai"></div>
		</div>
		<div class="sliderkit-panel middle date">
			<div class="middle">
				<h2><?php echo $date['jour']; ?></h2>
				<h1><?php echo $date['nb'].' '.$date['mois']; ?></h1>
				<h3><?php echo $date['annee']; ?></h3>
			</div>
			<div class="etai"></div>
		</div>
	</div>
	<?php 
		elseif(isset($error)): 
			echo $this->element('error_widget');
		endif;
	?>
</div>
<?php echo $this->Html->image('ajax-loader.gif', array('class' => 'loader middle')); ?>
<div class="etai"></div>