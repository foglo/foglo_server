<div 
	class="content <?php echo $widget['Widget']['name']; ?> middle sliderkit" 
	data-name="<?php echo $widget['Widget']['name']; ?>" 
	id="<?php echo $widget['Widget']['id']; ?>"
		<?php if($this->Session->read('Auth.User')): ?>
			title="Glissez ce widget sur un autre pour échanger de place."
		<?php endif;?>
	>
	<div class="title">
		<h1 class="middle"><?php echo $widget['Widget']['titre']; ?></h1>
		<div class="etai"></div>
	</div>	
	<div class="slider sliderkit-panels sliderkit-panels-wrapper">
	<?php 
		$datas = array();
		$datas[1] = $widget['Data']['data_1'];
		$datas[2] = $widget['Data']['data_2'];
		$datas[3] = $widget['Data']['data_3'];
		$datas[4] = $widget['Data']['data_4'];

		foreach ($datas as $data) {
			if(!empty($data))
			{
			?>
				<div class="sliderkit-panel">
					<h3 class="middle"><?php echo $data ?></h3>
					<div class="etai"></div>
				</div>
			<?php
			}
		}
	?>
	</div>
</div>
<?php echo $this->Html->image('ajax-loader.gif', array('class' => 'loader middle')); ?>
<div class="etai"></div>
