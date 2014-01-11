<div class="content middle">
<?php	
	echo $this->Form->create('Widget');
	echo $this->Form->input('name', array('options' => array(
												'meteo'    => 'Météo',
												'tan'      => 'Tan',
												'parkings' => 'Parkings',
												'twitter'  => 'Twitter',
												'ecolo'    => 'Be écolo',
												'horloge'  => 'Horloge',
												'air'      => 'Air',
												'rss'      => 'Rss',
												// 'lila'     => 'Lila',
												'facebook' => 'Facebook',
												'bicloo'   => 'Bicloo',
											 ),
									 	'label' => 'Widget : '));
	echo $this->Form->input('user_id', array(
		'value' => $user_id,
		'type' => 'hidden'
		));
	echo $this->Form->input('upage_id', array(
		'value' => $upageID,
		'type' => 'hidden'
		));
	echo '<div class="spacer"></div>';
	echo $this->Form->submit('Créer', array(
		'after' => $this->Html->image('ajax-loader.gif', array('class' => 'loader')),
		'value' => 'Enregister'
		));
?>
	</form>
	<div class="etai"></div>
</div>
<p class="options annuler">×</p>
<?php echo $this->Html->image('ajax-loader.gif', array('class' => 'loader middle')); ?>
<div class="etai"></div>
