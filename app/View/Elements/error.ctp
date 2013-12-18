<?php
/*
 * Element error.ctp
 *
 * Affiche un message d'erreur dans un widget.
 * Peut être fermé en JS
 *
 * Appelé par WidgetController::edit(), WidgetController::refresh()
 *
 * $error peut être string ou array. 
 * Si array : 
 * $error = array(
		'msg' => 'message d'erreur',
		'type' => '' || 'closeWidget' //ferme le widget cf. JS || 'info' //pas de message, info dans widget
 	)
 *
 */
?>
<?php
	if(isset($error))
	{
		if(is_array($error)){
			$msg = $error['msg'];
			$type = $error['type'];
		} else {
			$msg = $error;
			$type = '';
		}
	}

	if($type != 'info'):
?>
	<p class="error">
		<?php echo $msg ?>
		<button class="closeInfo <?php echo $type; ?>">Fermer</button>
	</p>
<?php endif; ?>