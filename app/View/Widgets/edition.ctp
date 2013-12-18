<div class="box round first grid">
    <h2>Modifier un widget</h2>
    <div class="block">
<?php 
	echo $this->Form->create('Widget');

	echo '<h1>Widget '. $widget['Widget']['id'] .'</h1>';
	echo $this->Form->input('Widget.name', array(
		'value' => $widget['Widget']['name']
		));
	echo $this->Form->input('Widget.upage_id', array(
		'value' => $widget['Widget']['upage_id'],
		'type' => 'text'
		));
	echo $this->Form->input('Widget.disabled', array(
		'value' => $widget['Widget']['disabled']
		));
	echo $this->Form->input('Widget.id', array(
		'type' => 'hidden',
		'value' => $widget['Widget']['id']
		));


	echo '<br/><h1>Data '. $widget['Data']['id'] .'</h1>';
	echo $this->Form->input('Data.data_1', array(
		'value' => $widget['Data']['data_1']
		));
	echo $this->Form->input('Data.data_2', array(
		'value' => $widget['Data']['data_2']
		));
	echo $this->Form->input('Data.data_3', array(
		'value' => $widget['Data']['data_3']
		));
	echo $this->Form->input('Data.data_4', array(
		'value' => $widget['Data']['data_4']
		));
	echo $this->Form->input('Data.widget_id', array(
		'value' => $widget['Data']['widget_id'],
		'type' => 'text'
		));
	echo $this->Form->input('Data.id', array(
		'type' => 'hidden',
		'value' => $widget['Data']['id']
		));


	echo '<br/><h1>Position '. $widget['Position']['id'] .'</h1>';
	echo $this->Form->input('Position.widget_id', array(
		'value' => $widget['Position']['widget_id'],
		'type' => 'text'
		));
	echo $this->Form->input('Position.upage_id', array(
		'value' => $widget['Position']['upage_id'],
		'type' => 'text'
		));
	echo $this->Form->input('Position.position', array(
		'value' => $widget['Position']['position'],
		'type' => 'text'
		));
	echo $this->Form->input('Position.id', array(
		'type' => 'hidden',
		'value' => $widget['Position']['id']
		));

	echo '<br />';

	echo $this->Form->end('Modifier');

debug($widget)
?>
	</div>
</div>