<?php
/*
 * Element error_widget.ctp
 *
 * Affiche un message d'erreur de type info dans le contenu du widget.
 *
 * $error peut être string ou array. 
 * Si array : 
 * $error = array(
		'msg' => 'message d'erreur',
		'type' => '' || 'closeWidget' //ferme le widget cf. JS || 'info' //pas de message, info dans le contenu widget
 	)
 *
 * Donc ici : gestion du type 'info' uniquement
 */
?>
<?php
	if(isset($error))
	{
		if(is_array($error)){
			$msg = $error['msg'];
			$type = $error['type'];
		}
	}

	if($type == 'info'):
?>
	<p class="middle">
		<em>Widget <?php echo $widget['Widget']['name'] ?> : </em> <?php echo $msg ?>
	</p>
	<div class="etai"></div>
<?php endif; ?>