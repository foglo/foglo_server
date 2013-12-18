<div 
	class="content <?php echo $widget['Widget']['name']; ?> middle sliderkit" 
	data-name="<?php echo $widget['Widget']['name']; ?>" 
	id="<?php echo $widget['Widget']['id']; ?>"
		<?php if($this->Session->read('Auth.User')): ?>
			title="Glissez ce widget sur un autre pour échanger de place."
		<?php endif;?>
	>	
<?php
	if(isset($parking) && !isset($nodata)):
	?>
	<div class="parking">
		<?php echo $this->Html->image('parking.png', array('alt' => 'panneau parking', 'class' => 'middle')); ?>
		<p class="middle"><?php echo $parking['parking']; ?></p>
		<div class="etai"></div>
	</div>
	<div class="message">
		<h1 class="middle"><?php echo $parking['message']; ?></h1>
		<div class="etai"></div>
	</div>
<?php 
	elseif(isset($error)): 
		echo $this->element('error_widget');
	endif;
?>
</div>
<?php echo $this->Html->image('ajax-loader.gif', array('class' => 'loader middle')); ?>
<div class="etai"></div>