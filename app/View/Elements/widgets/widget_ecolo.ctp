<div 
	class="content <?php echo $widget['Widget']['name']; ?> middle" 
	data-name="<?php echo $widget['Widget']['name']; ?>" 
	id="<?php echo $widget['Widget']['id']; ?>"
		<?php if($this->Session->read('Auth.User')): ?>
			title="Glissez ce widget sur un autre pour échanger de place."
		<?php endif;?>
	>
<?php 
	if(isset($meteo) && $meteo):
		switch (strtoupper($meteo['condition'])) {
			//Si soleil
			case 'SUNNY':
			case 'CLEAR':
			case 'MOSTLY SUNNY':
			case 'FAIR':
			case 'HOT':
			//Si nuages et soleil
			case 'PARTLY SUNNY':
			case 'PARTLY CLOUDY':
			//Ça caille mais tant pis
			case 'ICY':
			case 'FREEZING DRIZZLE':
			case 'COLD':
				$msg = "Il fait beau. Pourquoi ne pas laissez votre voiture ? Pour vos déplacements, préférez marcher ou faire du vélo.";
				break;
			
			//Si nuages
			case 'OVERCAST':
			case 'MOSTLY CLOUDY':
			case 'CLOUDY':
				$msg = "Il ne fait pas trop mauvais. Préférez donc la marche, le vélo ou les transports en communs dans vos déplacements.";
				break;

			
			//Si pluie
			case 'SCATTERED THUNDERSTORMS':
			case 'SHOWERS':
			case 'THUNDERSHOWERS':
			case 'ISOLATED THUNDERSHOWERS':
			case 'RAIN SHOWERS':
			case 'SCATTERED SHOWERS':
			case 'CHANCE OF RAIN':
			case 'RAIN':
			case 'LIGHT RAIN':
			case 'DRIZZLE':
			case 'SLEET':			
			case 'FREEZING RAIN':		
			case 'HAIL':	
			case 'MIXED RAIN AND HAIL':	
			case 'SLEET':			
			//Si neige
			case 'RAIN AND SNOW':
			case 'MIXED RAIN AND SNOW':
			case 'MIXED RAIN AND SLEET':
			case 'MIXED SNOW AND SLEET':
			case 'SNOW':
			case 'HEAVY SNOW':
			case 'CHANCE OF SNOW':
			case 'FLURRIES':
			case 'SNOW SHOWERS':
			case 'LIGHT SNOW SHOWERS':
			case 'BLOWING SNOW':
			case 'ICE/SNOW':
			case 'SCATTERED SNOW SHOWERS':
			case 'SNOW FLURRIES':
			//Si brouillard/fumée/etc.
			case 'MIST':
			case 'DUST':
			case 'FOG':
			case 'FOGGY':
			case 'SMOKE':
			case 'SMOKY':
			case 'HAZE':
			case 'DRIZZLE':
			//Tempête
			case 'CHANCE OF STORM':
			case 'STORM':
			case 'TORNADO':
			case 'HURRICANE':
			case 'BLUSTERY':
			case 'WINDY':
			//Si orage
			case 'CHANCE OF TSTORM':
			case 'THUNDERSTORMS':
			case 'SEVERE THUNDERSTORMS':
			case 'TROPICAL STORM':
			case 'ISOLATED THUNDERSTORMS':
				$msg = "Le temps est mauvais. Pour vos déplacements, préférez tout de même les transports en communs à votre voiture.";
				break;
			
			default:
				$msg = 'Pas de données météo';
				break;
		}
?>
	<div class="middle texte">
		<p><?php echo $widget['Data']['data_1']; ?></p>
		<h3><?php echo $msg; ?></h3>
	</div>
	<div class="etai"></div>
<?php 
	elseif(isset($error)): 
		echo $this->element('error_widget');
	endif;
?>
</div>
<?php echo $this->Html->image('ajax-loader.gif', array('class' => 'loader middle')); ?>
<div class="etai"></div>