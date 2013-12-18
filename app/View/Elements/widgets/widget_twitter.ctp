<div 
	class="content <?php echo $widget['Widget']['name']; ?> middle sliderkit" 
	data-name="<?php echo $widget['Widget']['name']; ?>" 
	id="<?php echo $widget['Widget']['id']; ?>"
		<?php if($this->Session->read('Auth.User')): ?>
			title="Glissez ce widget sur un autre pour échanger de place."
		<?php endif;?>
	>
	<div class="title">
		<h1 class="middle">@<?php echo $widget['Data']['data_1']; ?></h1>
		<div class="etai"></div>
	</div>
	<?php if($tweets): ?>
	<div class="slider sliderkit-panels sliderkit-panels-wrapper">
	<?php 
		foreach ($tweets as $tweet) {
		?>
			<div class="sliderkit-panel">
				<h3 class="middle"><?php echo $tweet['text']; ?></h3>
				<div class="etai"></div>
			</div>
		<?php
		}
	?>
	</div>
	<?php 
		elseif(isset($error)): 
			echo $this->element('error_widget');
		endif;
	?>
</div>
<?php echo $this->Html->image('ajax-loader.gif', array('class' => 'loader middle')); ?>
<div class="etai"></div>