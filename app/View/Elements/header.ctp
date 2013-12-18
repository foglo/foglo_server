<header>
	<div class="beta">
		<p class="beta">foglo</p>
	</div>
	<?php 
	//debug($this->Session->read('Auth.User'));
	if($this->Session->read('Auth.User.premium') || $this->Session->read('Auth.User.group_id') == 3 || $this->Session->read('Auth.User.group_id') == 1) { ?>
		<?php if($this->params['controller'] == 'widgets' && $this->params['action'] == 'index'): ?>
		<div class="slider" title="Passer en mode panneau d'information">
			<span class="slider"></span>
		</div>
		<?php endif; ?>
	<?php } ?>
	<div class="liste">
	<?php 
		if($this->Session->read('Auth.User.premium') == 1 || $this->Session->read('Auth.User.group_id') == 3 || $this->Session->read('Auth.User.group_id') == 1) :
		?>
		<ul>
			<li class="button">
				<span><a>foglo Pages</a></span>
				<ul>
					<li><?php echo $this->Html->link('Environnement', array('controller' => 'widgets', 'action' => 'environnement')); ?></li>
					<li><?php echo $this->Html->link('Transports', array('controller' => 'widgets', 'action' => 'transports')); ?></li>
					<li><?php echo $this->Html->link('Parkings', array('controller' => 'widgets', 'action' => 'parkings')); ?></li>
					<li><?php echo $this->Html->link('Actualités', array('controller' => 'widgets', 'action' => 'actualites')); ?></li>
				</ul>
			</li>
			<li class="big alone">
			<?php 
				if($this->params['controller'] == 'widgets' && $this->params['action'] == 'index')
				{
					if(!empty($this->params['pass'])){
						//Simplification lien pour accueil
						if(strtoupper($this->params['pass'][0]) == 'ACCUEIL'){
							echo $this->Html->link('Accueil', array('controller' => 'widgets', 'action' => 'index'));
						}
						echo $this->Html->link(ucfirst($this->params['pass']['0']), '/page/'.lcfirst($this->params['pass']['0']));
					} else {
						echo $this->Html->link('Accueil', array('controller' => 'widgets', 'action' => 'index')
						);
					}
				}
				elseif($this->params['controller'] == 'widgets' && $this->params['action'] == 'actualites')
				{
				 	echo $this->Html->link('Actualités', array('controller' => 'widgets', 'action' => 'actualites')
						);
				} 
				elseif($this->params['controller'] == 'widgets' && $this->params['action'] == 'transports') 
				{
				 	echo $this->Html->link('Transports', array('controller' => 'widgets', 'action' => 'transports')
						);
				} 
				elseif($this->params['controller'] == 'widgets' && $this->params['action'] == 'environnement') 
				{
				 	echo $this->Html->link('Environnement', array('controller' => 'widgets', 'action' => 'environnement')
						);
				} 
				else {
					echo $this->Html->link('Accueil', array('controller' => 'widgets', 'action' => 'index')
						);
				} 
			?>
			</li>
			<li class="button">
				<span><a>Mon foglo</a></span>
				<ul>
					<?php
					if($upagesHead)
					{
						foreach($upagesHead as $upage)
						{ 
							//Simplification lien pour accueil
							if(strtoupper($upage['Upage']['name']) == 'ACCUEIL'){
								echo '<li>'.$this->Html->link('Accueil', array('controller' => 'widgets', 'action' => 'index')).'</li>';
							} else {
								echo '<li><a href="' . $this->Html->url(array('controller' => 'page')) . '/' . lcfirst($upage['Upage']['name']) . '">' . $upage['Upage']['name'] . '</a></li>';
							}
						} 
					}
					?>
					<li><?php echo $this->Html->link('Gérer mes pages', array('controller' => 'upages', 'action' => 'index')); ?></li>
				</ul>
			</li>				
		</ul>
		<?php
		else:

			//On cherche quelle liste doit prendre la class "big"
			if($this->params['controller'] == 'widgets' && $this->params['action'] == 'actualites'){
				$big = 'actualites';
			} elseif($this->params['controller'] == 'widgets' && $this->params['action'] == 'environnement') {
				$big = 'environnement';
			} elseif($this->params['controller'] == 'widgets' && $this->params['action'] == 'transports') {
				$big = 'transports';
			} elseif($this->params['controller'] == 'widgets' && $this->params['action'] == 'parkings') {
				$big = 'parkings';
			} else {
				$big = 'accueil';
			}

			?>
				<ul>
					<li <?php if($big == 'environnement') echo 'class="big"' ?>>
						<?php echo $this->Html->link('Environnement', array('controller' => 'widgets', 'action' => 'environnement')); ?>
					</li>
					<li <?php if($big == 'transports') echo 'class="big"' ?>>
						<?php echo $this->Html->link('Transports', array('controller' => 'widgets', 'action' => 'transports')); ?>
					</li>
					<li  <?php if($big == 'accueil') echo 'class="big"' ?>>
						<?php echo $this->Html->link('Accueil', array('controller' => 'widgets', 'action' => 'index')); ?>
					</li>
					<li <?php if($big == 'parkings') echo 'class="big"' ?>>
						<?php echo $this->Html->link('Parkings', array('controller' => 'widgets', 'action' => 'parkings')); ?>
					</li>
					<li <?php if($big == 'actualites') echo 'class="big"' ?>>
						<?php echo $this->Html->link('Actualités', array('controller' => 'widgets', 'action' => 'actualites')); ?>
					</li>
				</ul>
			<?php			
	 	endif; 
	?>
	</div>
	<?php echo $this->element('user'); ?>
</header>
