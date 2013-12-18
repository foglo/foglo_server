<div id="menuUser">
	<?php
		if($this->Session->read('Auth.User') != null){

			echo '<span>'.$this->Html->link('Mon compte', array('controller' => 'users', 'action' => 'moncompte')).'</span>';

		} else {

			echo $this->element('connect');
			echo '<span class="connect">Connexion</span>';

		}
	?>
</div>