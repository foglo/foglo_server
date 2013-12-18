<div class="box round first grid">
    <h2>Modifier un widget</h2>
    <div class="block">
<?php 
	echo $this->Form->create('User');

	echo '<h1>User '. $user['User']['id'] .'</h1>';
	echo $this->Form->input('User.prenom', array(
		'value' => $user['User']['prenom']
		));
	echo $this->Form->input('User.nom', array(
		'value' => $user['User']['nom'],
		'type' => 'text'
		));
	echo $this->Form->input('User.email', array(
		'value' => $user['User']['email']
		));
	echo $this->Form->input('User.end_premium', array(
		'value' => $user['User']['end_premium'],
		'type' => 'text'
		));
	echo $this->Form->input('User.group_id', array(
		'selected' => $user['User']['group_id'],
		'options' => array(
			'1' => 'Admin',
			'2' => 'Normal',
			'3' => 'Premium gratuit'
			)
		));
	echo $this->Form->input('User.id', array(
		'type' => 'hidden',
		'value' => $user['User']['id']
		));

/*
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
*/
/*

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
*/
	echo '<br />';

	echo $this->Form->end('Modifier');

?>
	</div>
</div>