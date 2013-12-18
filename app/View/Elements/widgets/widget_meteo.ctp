<div 
	class="content <?php echo $widget['Widget']['name']; ?> middle sliderkit" 
	data-name="<?php echo $widget['Widget']['name']; ?>" 
	id="<?php echo $widget['Widget']['id']; ?>"
		<?php if($this->Session->read('Auth.User')): ?>
			title="Glissez ce widget sur un autre pour échanger de place."
		<?php endif;?>
	>	
<?php
	if(isset($meteo)):
		//debug($meteo['condition']);
?>
	<div class="over"></div>
	<div class="img middle">
	<?php
		switch (strtoupper($meteo['condition'])) {
			//Si soleil
			case 'SUNNY':
			case 'CLEAR':
			case 'MOSTLY SUNNY':
			case 'FAIR':
			case 'HOT':
				echo $this->Html->image('meteo/soleil.gif', array('alt' => 'Soleil'));
				break;
			
			//Si nuages
			case 'OVERCAST':
			case 'MOSTLY CLOUDY':
			case 'CLOUDY':
				echo $this->Html->image('meteo/nuages.gif', array('alt' => 'Nuages'));
				break;

			//Si nuages et soleil
			case 'PARTLY SUNNY':
			case 'PARTLY CLOUDY':
				echo $this->Html->image('meteo/nuages-soleil.gif', array('alt' => 'Nuages et Soleil'));
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
			case 'LIGHT DRIZZLE':
			case 'SLEET':			
			case 'FREEZING RAIN':		
			case 'HAIL':	
			case 'MIXED RAIN AND HAIL':	
			case 'SLEET':	
				echo $this->Html->image('meteo/pluie.gif', array('alt' => 'Pluie'));
				break;
			
			//Si neige
			case 'RAIN AND SNOW':
			case 'MIXED RAIN AND SNOW':
			case 'MIXED RAIN AND SLEET':
			case 'MIXED SNOW AND SLEET':
			case 'SNOW':
			case 'HEAVY SNOW':
			case 'LIGHT SNOW':
			case 'CHANCE OF SNOW':
			case 'FLURRIES':
			case 'SNOW SHOWERS':
			case 'LIGHT SNOW SHOWERS':
			case 'BLOWING SNOW':
			case 'ICE/SNOW':
			case 'SCATTERED SNOW SHOWERS':
			case 'SNOW FLURRIES':
				echo $this->Html->image('meteo/neige.gif', array('alt' => 'Soleil'));
				break;
			
			//Si froid
			case 'ICY':
			case 'FREEZING DRIZZLE':
			case 'COLD':
				echo $this->Html->image('meteo/froid.gif', array('alt' => 'Froid'));
				break;

			//Si tempête
			case 'CHANCE OF STORM':
			case 'STORM':
			case 'TORNADO':
			case 'HURRICANE':
			case 'BLUSTERY':
			case 'WINDY':
				echo $this->Html->image('meteo/tempete.gif', array('alt' => 'Tempête'));
				break;

			//Si orage
			case 'CHANCE OF TSTORM':
			case 'THUNDERSTORMS':
			case 'SEVERE THUNDERSTORMS':
			case 'TROPICAL STORM':
			case 'ISOLATED THUNDERSTORMS':
				echo $this->Html->image('meteo/orage.gif', array('alt' => 'Orages'));
				break;
			
			//Si brouillard/fumée/etc.
			case 'MIST':
			case 'DUST':
			case 'FOG':
			case 'FOGGY':
			case 'SMOKE':
			case 'SMOKY':
			case 'HAZE':
				echo $this->Html->image('meteo/brouillard.gif', array('alt' => 'Brouillard'));
				break;
			
			default:
				echo '<p class="middle">Pas de renseignement</p><div class="etai"></div>';
				//echo '<br>'.$meteo['condition'];
				break;
		}
	?>
		<div class="etai"></div>
	</div>
	<div class="detail middle">
		<p><?php echo $meteo['ville']; ?></p>
		<h1 class="middle"><?php echo $meteo['temperature'] ?><span>°</span></h1>
		<h2 class="middle">
			<?php echo $meteo['max'] ?>°<br />
			<?php echo $meteo['min'] ?>°
		</h2>	
	</div>
<?php 
	elseif(isset($error)): 
		echo $this->element('error_widget');
	endif;
?>
</div>
<?php echo $this->Html->image('ajax-loader.gif', array('class' => 'loader middle')); ?>
<div class="etai"></div>