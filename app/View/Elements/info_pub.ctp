<div id="info-pub" class="sliderpub">
	<div class="sliderpub-panels sliderpub-panels-wrapper">
		<div class="sliderpub-panel accroche">
			<div class="petit">
				<?php echo $this->Html->image('info-pub/logo.png', array('alt' => 'cercle', 'class' => 'middle')) ?>
				<div class="etai"></div>
			</div>
			<div class="grand">
				<p class="middle">
					Nous vous simplifions le <span class="c4377b8">quotidien</span>. Rien que ça.
					<?php echo $this->Html->link('Inscrivez-vous', array('controller' => 'users', 'action' => 'inscription'), array('class' => 'green button')); ?>
				</p>
				<div class="etai"></div>
			</div>
		</div>
		<div class="sliderpub-panel accroche">
			<div class="petit">
				<?php echo $this->Html->image('info-pub/logo-sans-point.png', array('alt' => 'cercle', 'class' => 'middle')) ?>
				<div class="etai"></div>
			</div>
			<div class="grand">
				<p class="middle">
					... en allant chercher le <span class="c924c1c">maximum d'informations</span> dont vous avez besoin pour évoluer dans l'<span class="c4377b8">agglomération nantaise</span> ...
				</p>
				<div class="etai"></div>
			</div>
		</div>
		<div class="sliderpub-panel accroche">
			<div class="petit">
				<?php echo $this->Html->image('info-pub/logo-point.png', array('alt' => 'cercle', 'class' => 'middle')) ?>
				<div class="etai"></div>
			</div>
			<div class="grand">
				<p class="middle">
					... et en les regroupant ici selon <span class="c924c1c">vos</span> critères.
				</p>
				<div class="etai"></div>
			</div>
		</div>
		<div class="sliderpub-panel">
			<div class="petit">
				<div class="middle">
					<p>Toutes les infos TAN pour vous déplacer facilement ! </p>
					<?php echo $this->Html->link('Inscrivez-vous', array('controller' => 'users', 'action' => 'inscription'), array('class' => 'green button')); ?>
				</div>
				<div class="etai"></div>
			</div>
			<div class="grand">
				<?php echo $this->Html->image('info-pub/tram-gris-fonce.png', array('alt' => 'cercle', 'class' => 'middle')) ?>
				<div class="etai"></div>
			</div>
		</div>
		<div class="sliderpub-panel">
			<div class="grand">
				<?php echo $this->Html->image('info-pub/ordi.png', array('alt' => 'cercle', 'class' => 'middle')) ?>
				<div class="etai"></div>
			</div>
			<div class="petit">
				<div class="middle">
					<p>Emmenez vos widgets partout avec vous !</p>
					<?php echo $this->Html->link('Inscrivez-vous', array('controller' => 'users', 'action' => 'inscription'), array('class' => 'green button')); ?>
				</div>
				<div class="etai"></div>
			</div>
		</div>
		<div class="sliderpub-panel premium">
			<div class="full">
				<div class="middle">
					<p class="big">Plus de fonctionnalités en devenant Premium.</p>
					<ul class="middle">
						<li>
							<?php echo $this->Html->image('info-pub/agrandissement.png', array('alt' => 'cercle', 'class' => 'middle')) ?>
							<p class="small middle">Passez en mode plein écran, vous venez de créer votre propre panneau d’informations !</p>
						</li>
						<li>
							<?php echo $this->Html->image('info-pub/mon-foglo.png', array('alt' => 'cercle', 'class' => 'middle')) ?>
							<p class="small middle">Créez différentes pages. Pour différents panneaux d’informations.</p>
						</li>
					</ul>
					<?php echo $this->Html->link('Devenez Premium', array('controller' => 'pages', 'action' => 'display', 'premium'), array('class' => 'middle green button')); ?>
				</div>
				<div class="etai"></div>
			</div>
		</div>
		<div class="sliderpub-panel social">
			<div class="petit">
				<div class="middle">
					<p class="big">Vous êtes sur les <span class="c4377b8">réseaux sociaux</span> ?</p>
				</div>
				<div class="etai"></div>
			</div>
			<div class="grand">
				<div class="middle">
					<p>Ça tombe bien, <span class="caac811">foglo</span> aussi !</p>
					<p class="small">Suivez-nous pour rester au courant de nos dernières actualités :</p>
					<a class="middle facebook" href="http://www.facebook.com/foglo">
						<?php echo $this->Html->image('info-pub/facebook.png', array('alt' => 'facebook', 'title' => 'Suivez-nous sur Facebook !')); ?>
					</a>
					<a class="middle" href="http://twitter.com/#!/foglo_nantes">
						<?php echo $this->Html->image('info-pub/twitter.png', array('alt' => 'twitter', 'title' => 'Suivez-nous sur Twitter !')); ?>
					</a>
					<a class="middle g" href="http://plus.google.com/b/117506316819967690343/117506316819967690343/posts">
					 <?php echo $this->Html->image('info-pub/googleplus.png', array('alt' => 'cercle', 'title' => 'Suivez-nous sur Google Plus !')); ?>
					</a>
				</div>
				<div class="etai"></div>
			</div>
		</div>
		<div class="sliderpub-panel video">
			<div class="petit">
				<p class="middle">
					Besoin d’un exemple ?
					<br />
					<?php echo $this->Html->image('info-pub/fleche.png', array('alt' => 'fleche')); ?>
				</p>
				<div class="etai"></div>
			</div>
			<div class="grand">
				<?php 
					echo $this->Html->script('http://a.vimeocdn.com/js/froogaloop2.min.js?190c6-1335862109');
				?>
				<iframe id="player" class="middle vimeo" src="http://player.vimeo.com/video/41793402?api=1byline=0&amp;portrait=0&amp;color=229ba3&amp;api=1&amp;player_id=player&amp;autoplay=0" width="490" height="280" frameborder="0"></iframe>
				<div class="etai"></div>
			</div>
		</div>
	</div>
</div>