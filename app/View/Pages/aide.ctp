<h1 class="bigTitle">
	Créer - Déplacer - Supprimer des widgets
</h1>
<div class="middle tree">
	<h1>Créer</h1>
	<?php echo $this->Html->image('aide/creer.png', array('alt' => 'illustration')) ?>
	<p>Vous voulez créer un widget :</p>
	<ul>
		<li>Une fois connecté, déplacez votre curseur sur la réserve des widgets à droite.</li>
		<li>Sélectionnez un widget et maintenez le clic gauche tout en déplaçant le widget sur votre page.</li>
		<li>Relachez le widget.</li>
	</ul>
</div>
<div class="middle tree">
	<h1>Déplacer</h1>
	<?php echo $this->Html->image('aide/deplacer.png', array('alt' => 'illustration')) ?>
	<p>Pour déplacer un widget :</p>
	<ul>
		<li>Cliquez sur un widget et maintenez le clic gauche.</li>
		<li>Déplacez le widget sur un autre widget.</li>
		<li>Relachez le clic, les widgets échangent de place.</li>
	</ul>
</div>
<div class="middle tree">
	<h1>Supprimer</h1>
	<?php echo $this->Html->image('aide/supprimer.png', array('alt' => 'illustration')) ?>
	<p>Si vous voulez supprimer un widget :</p>
	<ul>
		<li>Cliquez sur un widget et maintenez le clic gauche.</li>
		<li>Déplacez le widget sur la réserve des widgets. La réserve s'ouvre.</li>
		<li>Relachez le widget sur la zone "Supprimer", en bas.</li>
	</ul>
</div>
<hr />
<a name="widgets" ></a>
<h1 class="bigTitle widgets">Les widgets</h1>
<section class="middle">
	<div class="title middle">
	<?php echo $this->Html->image('aide/meteo.png', array('alt' => 'illustration')) ?>
	</div>
	<div class="texte middle">
		<h1 class="middle">Météo</h1>
		<p>
			Affiche la météo pour la ville que vous avez choisie. En un coup d'oeil, vous connaissez la température actuelle, les minimale et maximale de la journée et la couverture nuageuse. Pour le configuré, il vous suffit d'indiquer votre ville.
			<br>
			<em>Origine : <a href="http://weather.yahoo.com/">Yahoo! Weather</a></em>
		</p>
	</div>
</section>
<section class="middle">
	<div class="title middle">
	<?php echo $this->Html->image('aide/tan.png', array('alt' => 'illustration')) ?>
	</div>
	<div class="texte middle">
		<h1 class="middle">Tan</h1>
		<p>
			Affiche le prochain passage d'un bus/tram/busway/navibus selon votre configuration. Vous choisissez l'arrêt, la ligne et le sens, le widget vous retourne les données en respectant la couleur de la ligne pour vous faire gagner un maximum de temps. Vous pouvez également choisir d'afficher les Info-Trafic Tan pour la ligne, si il y en a.
			<br>
			<em>Origine : <a href="http://data.nantes.fr">data.nantes.fr</a></em></p>
	</div>
</section>
<section class="middle">
	<div class="title middle">
	<?php echo $this->Html->image('aide/parkings.png', array('alt' => 'illustration')) ?>
	</div>
	<div class="texte middle">
		<h1 class="middle">Parkings</h1>
		<p>Affiche exactement les mêmes informations que vous pouvez trouver sur les différents panneaux Parkings dans Nantes. Vous choisissez un parking et le widget vous indique le nombre de places restantes. Si il n'y en a plus, il sera alors affiché "Complet" ou "Abonnés".
		<br>
			<em>Origine : <a href="http://data.nantes.fr">data.nantes.fr</a></em></p>
	</div>
</section>
<section class="middle">
	<div class="title middle">
	<?php echo $this->Html->image('aide/perso.png', array('alt' => 'illustration')) ?>
	</div>
	<div class="texte middle">
		<h1 class="middle">Personnalisable</h1>
		<p>Réservé aux comptes Premium, le widget Personnalisable est très utile pour la création de panneaux d'affichage. A vous de choisir un titre et d'inclure vos propres informations.</p>
	</div>
</section>
<section class="middle">
	<div class="title middle">
	<?php echo $this->Html->image('aide/twitter.png', array('alt' => 'illustration')) ?>
	</div>
	<div class="texte middle">
		<h1 class="middle">Twitter</h1>
		<p>Affiche les 5 derniers tweets du compte twitter que vous avez configuré. Par exemple, entrez "foglo_nantes" pour suivre le <a href="http://twitter.com/foglo_nantes">twitter de foglo</a>.
		<br>
			<em>Origine : <a href="http://twitter.fr">Twitter</a></em></p>
	</div>
</section>
<section class="middle">
	<div class="title middle">
	<?php echo $this->Html->image('aide/air.png', array('alt' => 'illustration')) ?>
	</div>
	<div class="texte middle">
		<h1 class="middle">Air</h1>
		<p>Le widget affiche la qualité de l'air de la région nantaise, donnée provenant de <a href="airpl.org">aipl.org</a>. Si une alerte polution est générée par le service, elle sera également affichée. Aucune configuration nécessaire.
		<br>
			<em>Origine : <a href="http://airpl.org">Air Pays de la Loire</a></em></p>
	</div>
</section>
<section class="middle">
	<div class="title middle">
	<?php echo $this->Html->image('aide/facebook.png', array('alt' => 'illustration')) ?>
	</div>
	<div class="texte middle">
		<h1 class="middle">Facebook</h1>
		<p>Affiche les 5 derniers posts du profil ou de la page Facebook que vous avez configuré. Entrez par exemple "foglo" pour suivre <a href="http://facebook.com/foglo">la page facebook de foglo</a>. Pour fonctionner, le widget a besoin que vous soyez connecté à facebook à travers foglo. Si vous ne l'êtes pas, il vous le signalera et vous n'aurez qu'à cliquer sur "Connexion".
		<br>
			<em>Origine : <a href="http://facebook.com">Facebook</a></em></p>
	</div>
</section>
<section class="middle">
	<div class="title middle">
	<?php echo $this->Html->image('aide/ecolo.png', array('alt' => 'illustration')) ?>
	</div>
	<div class="texte middle">
		<h1 class="middle">Be écolo</h1>
		<p>Vous hésitez entre prendre la voiture, les transports en commum ou partir à pied ? Le widget vous aide à choisir en fonction du temps qu'il fait. Il vous suffit de rentrez votre ville en paramètre.
		<br>
			<em>Origine : <a href="http://weather.yahoo.com/">Yahoo! Weather</a></em></p>
	</div>
</section>
<section class="middle">
	<div class="title middle">
	<?php echo $this->Html->image('aide/rss.png', array('alt' => 'illustration')) ?>
	</div>
	<div class="texte middle">
		<h1 class="middle">RSS</h1>
		<p>Affiche les 5 dernières entrées d'un flux RSS que vous avez configuré. Entrez par exemple "foglo.fr/blog" ou "http://foglo.fr/blog" pour suivre les dernières actualités de foglo.</p>
	</div>
</section>
<section class="middle">
	<div class="title middle">
	<?php echo $this->Html->image('aide/horloge.png', array('alt' => 'illustration')) ?>
	</div>
	<div class="texte middle">
		<h1 class="middle">Horloge</h1>
		<p>foglo affiche aussi le minimum : la date et l'heure. Aucune configuration n'est nécessaire.</p>
	</div>
</section>
<section class="middle">
	<div class="title middle">
	<?php echo $this->Html->image('aide/lila.png', array('alt' => 'illustration')) ?>
	</div>
	<div class="texte middle">
		<h1 class="middle">Lila</h1>
		<p>Affiche le prochain passage à votre arrêt de car lila habituel. Vous choisissez l'arrêt, la ligne et le sens. (Désactivé temporairement. <a href="http://foglo.fr/blog/2012/09/17/foglo-sort-de-sa-beta-tombe-en-panne-et-revient/">Plus d'infos ici.</a>)
		<br>
			<em>Origine : <a href="http://data.loire-atlantique.fr/">data.loire-atlantique.fr</a></em></p>
	</div>
</section>