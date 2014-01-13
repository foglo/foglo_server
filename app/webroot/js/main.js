$(document).ready(function(){

	/* --- --- --- --- --- --- --- --- --- --- --- */
	/* --- 		== INIT
	/* --- --- --- --- --- --- --- --- --- --- --- */

	var header = $(document).find('header');
	var container = $(document).find('div#container');
	var footer = $(document).find('footer');
	//Sidebar contenant les nouveau widget
	var sidebar = $(document).find('section#wSidebar');
	var wDropZone = $(document).find("div#container #wDropZone");

	//Pour savoir si sliderTV en route ou pas
	var isTVSliding = false;

	//Détection si mobile ou pas
	if(navigator.userAgent.match(/Android/i)
		 || navigator.userAgent.match(/webOS/i)
		 || navigator.userAgent.match(/iPhone/i)
		 || navigator.userAgent.match(/iPad/i)
		 || navigator.userAgent.match(/iPod/i)
		 || navigator.userAgent.match(/BlackBerry/i)
		){
		var isMobile = true;
	} else {
		var isMobile = false;
	}

	/* --- --- --- --- --- --- --- --- --- --- --- */
	/* --- 		== USER
	/* --- --- --- --- --- --- --- --- --- --- --- */

	/*
	* Ouverture du menu pour login
	*/
	$('div#menuUser span').click(function(){
		var menu = $(this).parent();
		var statut = $(this).attr('class');

		if (statut == 'connect'){
			menu.addClass('opened').find('form').fadeIn(400);
			$(this).text('Fermer').removeClass('connect').addClass('close');	
		} else if (statut == 'close'){
			menu.find('form').fadeOut(200);
			menu.removeClass('opened');
			$(this).text('Connexion').removeClass('close').addClass('connect');
		}
	});


	/* --- --- --- --- --- --- --- --- --- --- --- */
	/* --- 		== Widgets
	/* --- --- --- --- --- --- --- --- --- --- --- */

	/*
	* Initialisation des widgets
	*/
	var widgets = $(document).find('div.page div.widget');
	var widgetsSidebar = $(document).find('section#wSidebar div.widget');
	//Id de la page
	var upageID = $(document).find('div.page').attr('data-upage');
	//Sert à l'ajout de nouveaux widgets
	var template = '<div class="widget change tempNew" id="" draggable="true"><img src="' + root + 'img/ajax-loader.gif" class="loader middle" alt="" /><div class="etai"></div></div>';

	//Lancement refresh des widgets toutes X min
	widgets.each(function(){
		if(this.id){
			_refresh(this);
		}
	});

	/*
	 * Drag&Drop des widgets si possible et non-mobile, sinon widgetAdd
	 *
	 */
	if(Modernizr.draganddrop && !isMobile && !ie)
	{
		//On suppr le widgetAdd
		$(document).find('.widgetAdd').remove();

	 	/*
	 	 * EventHandler sur tous les widgets de la page
	 	 * pour changement de position
	 	 * et pour ajout d'un widget à côté d'un autre
	 	 */

		/*
		 * Function reset Bind
		 *
		 * Réactualise la liste des écouteurs d'event
		 */
		function resetBind(){
			widgets = $(document).find('div.page div.widget');
			widgets.unbind('dragstart', handleDragStart);
			widgets.unbind('dragenter', handleDragEnter);
			widgets.unbind('dragover', handleDragOver);
			widgets.unbind('dragend', handleDragEnd);

			widgets.bind('dragstart', handleDragStart);
			widgets.bind('dragenter', handleDragEnter);
			widgets.bind('dragover', handleDragOver);
			widgets.bind('dragend', handleDragEnd);
		}
		//Lancement des écoutes
		resetBind(); 

	 	/*
	 	 * EventHandler sur les widgets sidebar
	 	 * pour changement de position
	 	 *
	 	 */
		widgetsSidebar = $(document).find('section#wSidebar div.widget');
		widgetsSidebar.bind('dragstart', DragStart);
		widgetsSidebar.bind('dragover', DragOver);
		widgetsSidebar.bind('dragend', DragEnd);

	 	/*
	 	 * EventHandler sur Sidebar
	 	 * pour suppression widget
	 	 *
	 	 */
	 	// Sidebar définie dans init des widgets
		sidebar.bind('dragover', sideDragOver);

	 	/*
	 	 * EventHandler sur bouton supprimer
	 	 * pour suppression widget
	 	 *
	 	 */
		btnSupprimer = $(document).find('section#wSidebar div.supprimer');
		btnSupprimer.bind('dragover', btnDragOver);
		btnSupprimer.bind('dragenter', btnDragEnter);
		btnSupprimer.bind('dragleave', btnDragLeave);
		btnSupprimer.bind('drop', btnDrop);

	 	/*
	 	 * EventHandler sur le div.page
	 	 * pour changement de position
	 	 *
	 	 */
		wDropZone = $(document).find("div#container #wDropZone");
		wDropZone.bind('dragover', onDragOver);
		wDropZone.bind('dragenter', onDragEnter);
		wDropZone.bind('drop', onDrop);
		wDropZone.bind('dragend', onDragEnd);
	}
	// Drag&Drop non supporté, solution WidgetAdd
	else
	{
		//On affiche le WidgetAdd
		$(document).find('.widgetAdd').css('display', 'inline-block');
		//On suppr la sidebar
		sidebar.fadeOut().remove();
	}
	/* End Drag&Drop */


	/*
	 * Function _refresh()
	 *
	 * Charge un widget
	 * 
	 * @params widget = id du widget à charger
	 *
	 */
	function _refresh(widget){

		//Si widget en cours d'edition on ne refersh pas
		var panneau = $(widget).find('div.panneau');
		if(panneau.length == 0)
		{
			$.ajax({
				type: "POST",
				url: root+"widgets/refresh",
				data: 'id=' + $(widget).attr('id'),
				success: function(retour){

					//Si retour panneau d'options, on envoi à construct() pour gestion plus poussée
					if($(retour).hasClass('panneau'))
					{
						_construct(widget, retour);
					}
					else
					{
						$(widget).html(retour);
						$(widget).removeClass('change');
						
						//Suppr p Supprimer 
						if(Modernizr.draganddrop && !ie && !isMobile)
						{
							$(widget).find('p.supprimer').remove();
						}

						//gestion du slide pour widgets à plusieurs panneaux
						_slider(widget);
					}
				}
			});
		}

		//Refresh toutes les min
		setTimeout(function(){
			_refresh(widget)
		}, 60000);
	}

	/*
	 * Function _create(wDrag, wDrop = flase)
	 *
	 * Crée un nouveau widget
	 * (!) Ne gère pas les création via WidgetAdd
	 */
	function _create(wDrag, wDrop, wDropZone) {

		/* Actions en fonction du widget avant sa création */
		// name = $(wDrag).data('type');
		// if(name == 'facebook')
		// {
			
		// }

		if(wDrop != false){
			//Création du widget après wDrop
			url = root+"widgets/add/" + upageID + "/" + ($(wDrop).index())
		} else {
			//Création du widget à la fin de la page
			url = root+"widgets/add/" + upageID
		}

		//Créa d'un nouveau widget en dtb 
		$.ajax({
			type: "POST",
			url: url,
			data: { Widget : {name: $(wDrag).attr('data-type')}},
			success: function(content){
				widget = $(wDropZone).find('.tempNew');
				$(widget).removeClass('tempNew');

				//Construction du widget
				_construct(widget, content);

				if(Modernizr.draganddrop)
				{
					$(widget).find('p.supprimer').remove();
				}
			}
		});
	}

	/*
	 * Function _construct()
	 * 
	 * Gère le retour AJAX après une création de widget
	 *
	 */
	function _construct(widget, content){
		//Init
		var name = $(content).attr('data-name');
		var id = $(content).attr('id');

		//Affichage du contenu dans le widget et ajout de son id
		$(widget).html(content);
		$(widget).attr('id', id);
		//Ajout du type de widget sur le widget
		$(widget).addClass(name);

		//Retour panneau options
		if($(content).hasClass('panneau'))
		{
			//Si Widget Tan, lancement completeTan()
			if(name == "tan") {
				completeTan(widget);
			}
			if(name == "lila") {
				completeLila(widget);
			}
		}
		//Retour content
		else if($(content).hasClass('content'))
		{
			//Si widget sans form options
			if(typeof(name) != 'undefined' && (name == 'horloge' || name == 'air')) 
			{
				//Si widget à slider, lancement sliderkit
				_slider(widget);
			}	
		}

		$(widget).removeClass('change');

		//Suppr class widgetAdd
		if($(widget).hasClass('widgetAdd'))
		{
			$(widget).removeClass('widgetAdd');
		}

		//Suppr p Supprimer 
		if(Modernizr.draganddrop && !ie && !isMobile)
		{
			$(widget).find('p.supprimer').remove();
		}
	}

	/*
	 * Function _slider()
	 *
	 * Lancement de slider
	 */
	function _slider(widget) {
		var name = $(widget).find('div.content').data('name');
		//Si widget à slider
		if(name == 'tan' || name == 'perso' || name == 'twitter' || name == 'horloge' || name == 'air' || name == 'rss' || name == 'facebook' || name == 'bicloo')
		{
			//Init
			var slider = $(widget).find('div.slider');
			var diapos = slider.find('div.sliderkit-panel');
			var nbDiapos = diapos.length;

			//Si plusieurs diapo
			if(nbDiapos > 1)
			{
				//Si perso|twitter|fb|air, slider 7sec
				if(name == 'tan' || name == 'perso' || name == 'twitter'|| name == 'air' || name == 'rss' || name == 'facebook'){
					speed = 7000;
				} else {
					speed = 5000;
				}

				//Mise en place du slide 
				$(widget).find('.slider').sliderkit({
					auto: false,
					start: 0,
					autostill: true,
					circular: true,
				   	panelfx: 'sliding',
				   	panelfxspeed : 1000,
				   	autospeed: speed,
				   	width: 'auto'
				});

				var sliderk = $(widget).find('.slider').data("sliderkit");
			   	sliderk.autoScrollStart();
			   	//Bidouille js pour changer attr "left" (cf. sliderkit)
				sliderk.changeObjWidth($(slider).width());

			   	//Si sliderTV en cours
			   	if(isTVSliding)
			   	{
					//Pour widgets qu'on stop dans script sliderTV
					if($(widget).attr('data-scroll') == 'scrollStop'){
				   		sliderk.autoScrollStop();
					}	

					//Classe "double" pour affichage en parallèle de 2 diapo
					if((name == 'tan' && nbDiapos == 2) || name == 'horloge' || name == 'air')
					{
						$(widget).find('.sliderkit-panel').addClass('double').css('display', 'inline-block');
					}						
			   	}
			}
		}
	}

	/*
	 * Fonction loadOptions(widget)
	 *
	 * Charge le panneau d'option d'un widget
	 */
	function _loadOptions(widget){
		//Init
		var name = $(widget).find('div.content').data('name');
		widget.addClass('change');
		var p = widget.find('p.options');

		$.ajax({
			type: "POST",
			url: root+'widgets/edit/'+widget.attr('id'),
			success: function(retour){
				widget.removeClass('change');
				$(retour).insertAfter(p);

				//Si widget Tan, lacement completeTan(), pareil pour Lila
				if(typeof(name) != 'undefined')
				{
					//Activation des select2 par défaut
					//select évolué, avec champ de recherche
					$('.select2').select2({
						placeholder: "Choisissez une option",
						allowClear: true
					});

					if(name == 'tan'){
						completeTan(widget);
					}
					if(name == 'lila'){
						completeLila(widget);
					}
				}

				//Suppr p Supprimer 
				if(Modernizr.draganddrop && !ie && !isMobile)
				{
					$(widget).find('p.supprimer').remove();
				}
			}
		});
	}


	/*
	 * Si pas de Drag&Drop, Nouveau widget par WidgetAdd
	 *
	 * Quand click sur btt nouveau, chargement du form de sélection de widgets
	 * Puis quand submit du form, chargement du résultat + affichage d'un nouveau widgetAdd
	 */
	$('div.widgetAdd button').live('click', function(){

		widget = $(this).parent().parent();
		$(this).remove();

		$.ajax({
			type: "POST",
			url: root+"widgets/add/"+upageID,
			success: function(form){

				//On affiche le formulaire de sélection
				widget.html(form);
				var img = widget.find('div.submit img.loader');

				//A l'envoi du form
				$('div.widgetAdd form').submit(function(){
					//Loader
					img.fadeIn();			
					var form = $(this);

					/* Actions en fonction du widget avant sa création */
					// name = form.find('select').val();
					// if(name == 'facebook')
					// {
					// 	facebookLogin();
					// }

					//Créa nouveau widget
					$.ajax({
						type: "POST",
						url: root+"widgets/add/"+upageID,
						data: form.serialize(),
						success: function(retour){
							//Construction du widget
							_construct(widget, retour);

							img.fadeOut()
							//Insertion d'un nouveau WidgetAdd
							$('<div class="widget widgetAdd"><div class="content"><button class="gros">Nouveau</button><div class="etai"></div></div></div>').insertAfter(widget).fadeIn();
							
							//Réactualisation de la liste des widgets
							widgets = $(document).find('div.page div.widget');
						}
					});
					return false;
				});
			}
		});
	});

	//Annulation du nouveau widget par WidgetAdd
	$('div.widgetAdd p.annuler').live('click', function(){
		var widget = $(this).parent();
		widget.html('<div class="content"><button class="gros">Nouveau</button><div class="etai"></div></div>');
	});
	/* End Nouveau widget */

	/*
	* Options widgets
	*
	* Affiche le panneau d'options pour un widget
	*
	* Gestion de l'envoi du panneau
	*
	*/
	//Ouverture du panneau options
	$('div.widget p.open').live("click", function(){
		//Init
		var p = $(this)
		var widget = $(this).parent();

		$(this).removeClass('open').addClass('close').text('×');
		widget.find('div.content').fadeOut();

		//Chargement du panneau d'options
		_loadOptions(widget);

	});

	//Fermeture du panneau options
	$('div.widget p.close').live("click", function(){
		var widget = $(this).parent();

		$(this).removeClass('close').addClass('open').text('+');

		widget.removeClass('overflowNone');

		widget.find('div.content').fadeIn();
		widget.find('div.panneau').remove();

		if(Modernizr.draganddrop && !ie && !isMobile)
		{
			$(widget).find('p.supprimer').remove();
		}
		return false;
	});

	//Si mobile, clique sur widget pour ouverture
	if(isMobile)
	{
		$('div.widget').live("click", function(){
			var widget = $(this);
			var p = widget.find('p.options');
			var content = widget.find('div.content');

			//Si le panneau d'options n'est pas présent (donc content visible)
			if($(p).hasClass('open') && content.css('display') == 'block')
			{
				content.fadeOut();
				$(p).addClass('close').removeClass('open').text('×');

				_loadOptions(widget);
			}
		});
	}

	//Submit du form d'edit
	$('div.widget div.panneau form').live('submit', function(){
		img = $(this).find('div.submit img.loader');
		stop = $(this).attr('data-stop');

		if(stop == 'false')
		{
			//Init
			var widget = $(this).parent().parent();
			var id = widget.find('div.panneau').attr('id');
			var form = $(this);

			widget.attr('id', id);
			img.fadeIn();

			//Edition du widget
			$.ajax({
				type: "POST",
				url: root+'widgets/edit/'+widget.attr('id'),
				data: form.serialize(),
				success: function(retour){

					//Ajout du type de widget sur le widget
					var name = $(retour).attr('data-name');

					//Affichage
					widget.html(retour);

					if(Modernizr.draganddrop && !ie && !isMobile)
					{
						$(widget).find('p.supprimer').remove();
					}

					//Si retour panneau options (il n'a pas de data-name)
					if(name == 'undefined')
					{
						if (widget.hasClass('tan')) {
							completeTan(widget);
						}
						if (widget.hasClass('lila')) {
							completeLila(widget);
						}
					}
					else
					{
						widget.addClass(name);
						//gestion du slide
						_slider(widget);
					}

					img.fadeOut();
				}
			});
		}
		return false;
	});

	/* End Options widgets */

	/*
	* Suppression widget
	*/
	$('div.widget p.supprimer').live('click', function(){
		var widget = $(this).parent();
		if(confirm('Souhaitez-vous réellement supprimer le widget ?'))
		{
			$.ajax({
				type: "POST",
				url: root+'widgets/delete/'+widget.attr('id')
			});
			widget.remove();
			//Réactualisation de la liste des widgets
			widgets = $(document).find('div.page div.widget');
		}
	})
	/* End Suppression widget */




	/* --- --- --- --- --- --- --- --- --- --- --- */
	/* --- 		== SliderTV
	/* --- --- --- --- --- --- --- --- --- --- --- */

	$('header div.slider span').click(function(){
		//Ouverture	
		if($(this).attr('class') == 'slider')
		{
			openTV(this);
		}
		//Fermeture
		else if($(this).attr('class') == 'widgets')
		{
			closeTV(this);
		}
	});

	/*
	 * Function openTV()
	 *
	 * Ouvre le sliderTV
	 */
	function openTV(btn)
	{
		isTVSliding = true;

		//On change de classe pour fermeture si click (cf. plus bas)
		$(btn).removeClass('slider').addClass('widgets').attr('title', 'Retourner aux widgets');

		/*
		 * Passage en mode panneau d'info 
		 * On cache header, footer, sidebar
		 * On change de background 
		 */

		header.addClass('sliderTV dark');
		//Apparition/disparition header quand hover
		$('header.sliderTV').mouseover(function(){
			$(this).removeClass('sliderTV');
		});
		header.mouseleave(function(){
			$(this).addClass('sliderTV');
		});

		$('body').height(window.innerHeight);
		$(container).height($('body').height() - $(header).height());
		$('div.page').css({'border': '2px dashed #222', 'padding': 0});
		footer.fadeOut();
		sidebar.fadeOut().css('display', 'none');
		$('body').css({'background-color': '#222', 'overflow' : 'hidden'});
		$('html').css('background-color', '#222');
		widgets.removeAttr('draggable');


		/*
		 * Mise en place du slider
		 */
		container.addClass('sliderkitTV');
		$('div.page').addClass('sliderkitTV-panels sliderkitTV-panels-wrapper');
		widgets.addClass('sliderkitTV-panel');

		$('.sliderkitTV-panels-wrapper').sliderkit({
			auto: false,
			autostill: false,
			circular: true,
			panelfx: 'sliding',
			panelfxspeed : 0,
			autospeed: 6000,
			cssprefix : 'sliderkitTV'
		});

		sliderTV = $('.sliderkitTV-panels-wrapper').data("sliderkit");
		//Pas de lancement auto, slider contrôlé par runTV()

		/*
		 * Gestion des widgets avec slider incorporés
		 */
		widgets = $(document).find('div.page div.widget');
		widgets.each(function()
		{
			name = $(this).find('div.content').data('name');

			var slider = $(this).find('div.slider');
			var sliderk = slider.data('sliderkit');
			var widgetk = this;
			var diapos = slider.find('div.sliderkit-panel');
			var nbDiapos = diapos.length;

			//Class "double" pour affiche en parallèle si que 2 diapo
			if((name == 'tan' || name == 'horloge' || name == 'air') && nbDiapos == 2)
			{
				//Ajout de scrollStop pour empêcher refresh() de relancer un slider
				$(this).attr('data-scroll', 'scrollStop');
				sliderk.autoScrollStop();
				$(widgetk).find('.sliderkit-panel').addClass('double').css('display', 'inline-block');
			}

			//On refresh pour styliser le tout
			_refresh(this);
		});

		/*
		 * Lancement du slider après avoir calculé la duration
		 */
		var widget = widgets.parent().find(':first');
		var slider = $(widget).find('div.slider');
		var name = $(widget).find('div.content').data('name');
		var diapos = slider.find('div.sliderkit-panel');
		var nbDiapos = diapos.length;

		//Gestion de la durée avant prochain panneau
		if(name == 'perso' || name == 'twitter' || name == 'rss' || name == 'facebook'){
			//Duration en fonction du nombre de contenus
			duration = 7000*nbDiapos;
		} else {
			duration = 6000;
		}

		//Appel prochain panneau
		sliderTV.stepForward();

		//Lancement runTV()
		setTimeout(function(){
			runTV(sliderTV)
		}, duration);

		//Fermeture slider par touche eschap	
		$(window).keydown(function(e){
			switch(e.keyCode){
				case 27: closeTV(btn);
				break;
			}
		});
	}

	/*
	 * Function closeTV()
	 *
	 * Ferme le sliderTV
	 */
	function closeTV(btn) {
		isTVSliding = false;

		/*
		 * Arrêt du slider
		 */
		$('div.page').removeClass('sliderkitTV-panels sliderkitTV-panels-wrapper');

		//Suppression du conteneur sliderkitTV-panels-wrapper
		tempWidgets = $('.sliderkitTV-panels-wrapper').html();
		$('.sliderkitTV-panels-wrapper').remove();
		$('div.page').html(tempWidgets);

		//Réactualisation de la liste des widgets
		widgets = $(document).find('div.page div.widget');
		
		widgets.removeClass('sliderkitTV-panel sliderkitTV-panel-active sliderkitTV-panels-old');
		widgets.css({'display' : 'inline-block', 'left' : 0});

		/*
		 * Relance des sliders avec 2 panneaux (comme TAN)
		 */
		widgets.each(function(){
			var name = $(this).find('div.content').data('name');
			//Si twitter, perso, pas d'arrêt, simple refresh
			if(name == 'perso' || name == 'twitter')
			{
				_refresh(this);
			}
			else
			{
				var widgetk = this;
				var slider = $(this).find('div.slider');
				var sliderk = slider.data('sliderkit');
				var diapos = slider.find('div.sliderkit-panel');
				var nbDiapos = diapos.length;

				$(widgetk).removeAttr('data-scroll');

				if(nbDiapos <= 2 && nbDiapos > 0)
				{
					$(widgetk).addClass('change');
					_refresh(widgetk);
				}
				$(widgetk).find('.sliderkit-panel').removeClass('double');				
			}
		});

		/*
		 * On sort du mode panneau d'info 
		 * On affiche header, footer, sidebar
		 * On change de background 
		 */
		header.removeClass('sliderTV dark');
		$('header.sliderTV').mouseover(function(){
			$(this).removeClass('sliderTV');
		});
		header.mouseleave(function(){
			$(this).removeClass('sliderTV');
		});
		container.removeClass('sliderkitTV');
		$(container).height('auto');
		$('div.page').css({'border': '2px dashed #333', 'padding-top': '30px'});
		footer.fadeIn();
		sidebar.fadeIn();
		$('body').height('auto');
		$('body').css({'background-color': '#333', 'overflow' : 'auto'});
		$('html').css('background-color', '#333');
		widgets.attr('draggable', 'true');

		//On change de classe pour ouverture si click (cf. plus haut)
		$(btn).removeClass('widgets').addClass('slider').attr('title', 'Passer en mode panneau d\'information');
	}

	/*
	 * Function runTV()
	 *
	 * Gère le défilement du sliderTV
	 */
	function runTV(sliderTV){
		if(isTVSliding)
		{
			var widget = $('.sliderkitTV-panel-active');

			//Gestion si widget avec slider incorporé
			var slider = $(widget).find('div.slider');
			var sliderk = $(widget).find('.slider').data("sliderkit");
			var diapos = slider.find('div.sliderkit-panel');
			var nbDiapos = diapos.length;
			//Bidouille js : actu width du slider pour attr "left"
			if(nbDiapos > 1 && typeof(sliderk) != 'undefined')
			{
				//Function bidouillée, cf sliderkit
				sliderk.changeObjWidth($(slider).width());
			}

			//Gestion de duration
			name = $(widget).find('div.content').data('name');
			if(name == 'perso' || name == 'twitter' || name == 'rss' || name == 'facebook'){
				//Duration en fonction du nombre de contenus
				duration = (7000*nbDiapos + 2000);
			} else {
				duration = 6000;
			}
			//On passe au widget suivant
			sliderTV.stepForward();

			setTimeout(function(){
				runTV(sliderTV)
			}, duration);	
		}
	}



	/* --- --- --- --- --- --- --- --- --- --- --- */
	/* --- 		== Fonctions diverses
	/* --- --- --- --- --- --- --- --- --- --- --- */

	/*
	 * footer en bas de page (temporaire)
	 */
	$(container).css('min-height', window.innerHeight - ($(header).height() + $(footer).height() + $(document).find('div#info-pub').height()));

	/*
	 * Ouverture des listes de pages (onglets premimum) au click
	 */
	$('header li.button').click(function(){
		if($(this).find('ul').css('margin-top') ==  '-1000px')
		{
			$(this).find('ul').animate({
				marginTop: -2
			}, 200);
			$(this).find('li').animate({
				height: 32
			}, 200);
		}
		else
		{
			$(this).find('ul').animate({
				marginTop: -1000
			}, 200);
			$(this).find('li').animate({
				height: 0
			}, 200);
		}
	});

	/*
	 * Fermeture d'un message d'erreur ou flash (dans widget comme dans le reste du site)
	 */
	$('button.closeInfo').live('click', function(){
		//Si le msg d'erreur doit supprimer le widget
		if($(this).hasClass('closeWidget'))
		{
			widget = $(this).parent().parent();
			if($(widget).hasClass('panneau') || $(widget).hasClass('content'))
			{
				widget = $(widget).parent();
			}
			widget.fadeOut(200).remove();
		}
		else
		{
			error = $(this).parent();
			error.fadeOut(200).remove();
		}
	})

	/*
	* Function completeTan()
	*
	* Aide au remplissage du champ choix d'arrêt Tan
	*
	*/
	function completeTan(widget){
		//Init
		var form	  = $(widget).find('form');
		var divArret  = form.find('div.arret');
		var divLigne  = form.find('div.ligne');
		var divDirect = form.find('div.direction');
		var divSubmit = form.find('div.submit');
		var select2   = form.find('.select2');

		//Select Arrêt
		$('select.arret').select2({
			placeholder: "Choisissez un arrêt",
			allowClear: true
		});

		// On enlève le overflow hidden ou auto de .widget et .panneau quand les listes sont ouvertes
		form.find('div.select2-container a.select2-choice').delay(500).click(function(){
			//Si liste ouverte (donc va fermer) on remet overflow
			if($(this).parent().hasClass('select2-dropdown-open')) {
				$(widget).removeClass('overflowNone');
			}
			//Si liste fermée (donc va ouvrir), on enlève overflow
			else
			{
				$(widget).addClass('overflowNone');
			}
		});

		//Gestion du remplissage progressif arrêt + ligne + direction
		//Quand arrêt validé
		$('select.arret').bind('change', function(){
			
			//Reset si deuxième click
			form.data('stop', 'true');
			divLigne.fadeOut(100).find('select').html('');
			divDirect.fadeOut(100).find('select').html('');
			divSubmit.fadeOut(100);
			form.find('img.loader').css('display', 'none'); 
			form.find('p.alerte').fadeOut();
			
			//Vide Input et suppr select 2 pour repartir correctement
			$('input.ligne, input.direction').val("");
			$('div.ligne div.select2-container, div.direction div.select2-container').remove();

			//On va chercher les lignes correspondantes à l'arrêt
		 	arret = $('select.arret').select2("val");

		 	//On lance si un arret a été choisi
		 	if(arret != "")
		 	{

		 		divArret.find('img.loader').css('display', 'inline-block');

				$.ajax({
					type: "POST",
					url: root+'tans/lignes/'+arret,
					dataType: "json",
					success: function(lignes){

						if(lignes != null)
						{
							//Input Ligne
							$('input.ligne').select2({
								placeholder: "Choisissez une ligne",
								allowClear: true,
								//On rempli le select avec la ligne vide + data
								data: lignes
							});

							//Affichage Ligne
							divArret.find('img.loader').css('display', 'none'); 
							divLigne.fadeIn(100);

							//Quand ligne sélectionnée
						   	$('input.ligne').bind('change', function(){

					 			//Reset si deuxième click
								form.data('stop', 'true');
								divDirect.fadeOut(100).find('select').html('');
								divSubmit.fadeOut(100);
								form.find('img.loader').css('display', 'none'); 
								form.find('p.alerte').fadeOut();

								//Vide Input et suppr select 2 pour repartir correctement
								$('input.direction').val("");
								$('div.direction div.select2').remove();

			 					ligne = $('input.ligne').select2("val");

			 					//On lance la recherche si une ligne a été choisie
			 					if(ligne != "")
			 					{
				 					divLigne.find('img.loader').css('display', 'inline-block');

				 					//On va chercher les directions pour la ligne sélectionnée
				 					$.ajax({
				 						type: "POST",
				 						url: root+'tans/directions/'+ligne,
				 						dataType: "json",
				 						success: function(directions){

				 							if(directions != null)
				 							{
												//Input Ligne
												$('input.direction').select2({
													placeholder: "Choisissez un sens",
													allowClear: true,
													//On rempli le select avec la ligne vide + data
													data: directions
												});

												divLigne.find('img.loader').css('display', 'none');

												divDirect.fadeIn(100);

												$('input.direction').bind('change', function(){

													//Reset si deuxième click
													form.data('stop', 'true');
													divSubmit.fadeOut(100);
													form.find('img.loader').css('display', 'none'); 
													form.find('p.alerte').fadeOut();

													direction = $('input.direction').select2("val");

													if(direction != "")
													{
														divSubmit.fadeIn(100);

											 			//On active la possibilité d'envoi des options (cf. submit du form d'edit)
											 			form.attr('data-stop', 'false');
													}
												});
				 							}
				 							else
				 							{
												form.find('img.loader').css('display', 'none'); 
												divDirect.fadeIn('200').find('p.alerte').fadeIn('200');
											}
				 						}
				 					});
									return false;
			 					}
							});
						}
						else
						{
							form.find('img.loader').css('display', 'none'); 
							divLigne.fadeIn('200').find('p.alerte').fadeIn('200');
						}
					}
		 		});
		 	} 	
		});
	}

	/*
	* Function completeLila()
	*
	* Aide au remplissage du champ choix d'arrêt Tan
	*
	*/
	function completeLila(widget){
		//Init
		var form	  = $(widget).find('form');
		var divArret  = form.find('div.arret');
		var divLigne  = form.find('div.ligne');
		var divDirect = form.find('div.direction');
		var divSubmit = form.find('div.submit');
		var select2   = form.find('.select2');

		//Select Arrêt
		$('select.arret').select2({
			placeholder: "Choisissez un arrêt",
			allowClear: true
		});

		// On enlève le overflow hidden ou auto de .widget et .panneau quand les listes sont ouvertes
		form.find('div.select2-container a.select2-choice').delay(500).click(function(){
			//Si liste ouverte (donc va fermer) on remet overflow
			if($(this).parent().hasClass('select2-dropdown-open')) {
				widget.removeClass('overflowNone');
			}
			//Si liste fermée (donc va ouvrir), on enlève overflow
			else
			{
				widget.addClass('overflowNone');
			}
		});

		//Gestion du remplissage progressif arrêt + ligne + direction
		//Quand arrêt validé
		$('select.arret').bind('change', function(){
			
			//Reset si deuxième click
			form.data('stop', 'true');
			divLigne.fadeOut(100).find('select').html('');
			divDirect.fadeOut(100).find('select').html('');
			divSubmit.fadeOut(100);
			form.find('img.loader').css('display', 'none'); 
			form.find('p.alerte').fadeOut();
			
			//Vide Input et suppr select 2 pour repartir correctement
			$('input.ligne, input.direction').val("");
			$('div.ligne div.select2-container, div.direction div.select2-container').remove();

			//On va chercher les lignes correspondantes à l'arrêt
		 	arret = $('select.arret').select2("val");

		 	//On lance si un arret a été choisi
		 	if(arret != "")
		 	{
		 		divArret.find('img.loader').css('display', 'inline-block');

				$.ajax({
					type: "POST",
					url: root+'lilas/routes/'+arret,
					dataType: "json",
					error:function (xhr){
	                    form.find('img.loader').css('display', 'none'); 
						divLigne.fadeIn('200').find('p.alerte').fadeIn('200');
	                },
					success: function(lignes){

						if(lignes != null)
						{
							//Input Ligne
							$('input.ligne').select2({
								placeholder: "Choisissez une ligne",
								allowClear: true,
								//On rempli le select avec la ligne vide + data
								data: lignes
							});

							//Affichage Ligne
							divArret.find('img.loader').css('display', 'none'); 
							divLigne.fadeIn(100);

							//Quand ligne sélectionnée
						   	$('input.ligne').bind('change', function(){

					 			//Reset si deuxième click
								form.data('stop', 'true');
								divDirect.fadeOut(100).find('select').html('');
								divSubmit.fadeOut(100);
								form.find('img.loader').css('display', 'none'); 
								form.find('p.alerte').fadeOut();

								//Vide Input et suppr select 2 pour repartir correctement
								$('input.direction').val("");
								$('div.direction div.select2').remove();

			 					ligne = $('input.ligne').select2("val");

			 					//On lance la recherche si une ligne a été choisie
			 					if(ligne != "")
			 					{
				 					divLigne.find('img.loader').css('display', 'inline-block');

				 					//On va chercher les directions pour la ligne sélectionnée
				 					$.ajax({
				 						type: "POST",
				 						url: root+'lilas/sens/'+ligne,
				 						dataType: "json",
				 						error:function (xhr){
						                    form.find('img.loader').css('display', 'none'); 
											divDirect.fadeIn('200').find('p.alerte').fadeIn('200');
						                },
				 						success: function(directions){

				 							if(directions != null)
				 							{
												//Input Ligne
												$('input.direction').select2({
													placeholder: "Choisissez un sens",
													allowClear: true,
													//On rempli le select avec la ligne vide + data
													data: directions
												});

												divLigne.find('img.loader').css('display', 'none');

												divDirect.fadeIn(100);

												$('input.direction').bind('change', function(){

													//Reset si deuxième click
													form.data('stop', 'true');
													divSubmit.fadeOut(100);
													form.find('img.loader').css('display', 'none'); 
													form.find('p.alerte').fadeOut();

													direction = $('input.direction').select2("val");

													if(direction != "")
													{
														divSubmit.fadeIn(100);

											 			//On active la possibilité d'envoi des options (cf. submit du form d'edit)
											 			form.attr('data-stop', 'false');
													}
												});
				 							}
				 							else
				 							{
												form.find('img.loader').css('display', 'none'); 
												divDirect.fadeIn('200').find('p.alerte').fadeIn('200');
											}
				 						}
				 					});
									return false;
			 					}
							});
						}
						else
						{
							form.find('img.loader').css('display', 'none'); 
							divLigne.fadeIn('200').find('p.alerte').fadeIn('200');
						}
					}
		 		});
		 	} 	
		});
	}

	/*
	 * Lance le slider d'info-pub si présent
	 *
	 */
	infoPub = $(document).find('div#info-pub div.sliderpub-panels-wrapper');
	if(infoPub.length)
	{
		//Init des slider (auto scroll à false, on les démarre à la main après)
		$('div#info-pub div.sliderpub-panels-wrapper').sliderkit({
			auto: false,
			autostill: false,
			circular: true,
		   	panelfx: 'sliding',
		   	panelfxspeed : 0,
		   	autospeed: 6000,
		   	cssprefix : 'sliderpub'
		});

 		//On récupère les objets sliderkit
		sliderPub = $('div#info-pub div.sliderpub-panels-wrapper').data("sliderkit");
		//On les lance
	 	sliderPub.autoScrollStart();

	 	//Cas de la vidéo : on veut stopper le slide pour la lire
	 	// Quand la viédo est ready
		jQuery('iframe.vimeo').each(function(){
			Froogaloop(this).addEvent('ready', readyVimeo);
		});
		
		function readyVimeo(playerID){
			// ! Frogaloop = API vimeo
			//Quand la lecture commence, on stop le slider
			Froogaloop(playerID).addEvent('play', function(){
				sliderPub.autoScrollStop();
			});
			//Relance du slider quand vidéo finie
			Froogaloop(playerID).addEvent('finish', function(){
				sliderPub.autoScrollStart();
			});
		}
	}


	/*
	 * Fonctions liées au Drag&Drop
	 *
	 * Déclanchées par les écoutes
	 */

		/*
		 * Function handleDragStart : Actions quand un widget est déplacé
		 */
		function handleDragStart(e){
			//Pour les widgets du div.page
			if($(this).parent().parent().attr('id') != 'wSidebar')
			{
				$(this).css('opacity', '0.4');
				//On définie l'origine du widget
				wStyle = 'page';
				wDrag = this;
				//Objectif du D&D : déplacement (move)
				e.originalEvent.dataTransfer.effectAllowed = 'move';
				e.originalEvent.dataTransfer.setData('text/html', this.innerHTML);
			}
			//Pour un nouveau widget ajouté SUR un widget déjà présent
			else if($(this).parent().parent().attr('id') == 'wSidebar')
			{
				//On définie l'origine du widget
				wStyle = 'sidebar';
				wDrag = this;
				//Objectif du D&D : déplacement (move)
				e.originalEvent.dataTransfer.effectAllowed = 'move';
				e.originalEvent.dataTransfer.setData('text/html', this.innerHTML);
			}
			//Zone de laché en bordure pointillée
			wDropZone.css('border', '2px dashed #888');
			//Sidebar maintenue ouverte
			sidebar.addClass('attention');
		}
		/*
		 * Function handleDragOver : Actions quand un widget est survolé par un autre
		 */
		function handleDragOver(e){
			if(e.preventDefault){
				e.preventDefault();
			}
			e.originalEvent.dataTransfer.dropEffect = 'move';
			return false;
		}
		/*
		 * Function handleDragEnter : Actions quand un widgt rentre dans un widget
		 */
		function handleDragEnter(e){
			widgets.css('margin-left', 0);
			//Si créa new widget : on fait de la place à gauche
			if(wStyle == 'sidebar')
			{
				$(this).animate({
					marginLeft: $(this).width(),
					opacity: 0.6
				}, 200);
			}
			//Si changement de place, simple jeu d'opacité
			else if(wStyle == 'page')
			{
				$(this).animate({
					opacity: 0.2
				}, 200);
			}

			if(e.preventDefault){
				e.preventDefault();
			}

			//Enregistrement du widgets survolé cf. drop sur div.page
			wDrop = this;
		}
		/*
		 * Function handleDragLeave : Actions quand un widget ne survole plus un widget
		 */
		function handleDragLeave(e){
			//Reset du css
			$(this).animate({
				marginLeft: 0,
				opacity: 1
			}, 200);
		}
		/*
		 * Function handleDragEnd : Actions fin drag&drop
		 */
		function handleDragEnd(e){
			//Réactu listes des widgets
			widgets.animate({
				opacity: 1,
				marginLeft: 0
			}, 200);

			//Reset général
			sidebar.removeClass('opened');

			wStyle = null;
			wDrag = null;
			wDrop = null;

			resetBind();
			wDropZone.css('border', '2px dashed #333');
			sidebar.removeClass('attention');
		}

		/*
		 * Function onDragStart : Actions quand un widget sidebar est déplacé
		 */
		function DragStart(e){
			//Def origine du widget
			wStyle = 'sidebar';
			wDrag = this;
			//Objectif : déplacement du widget
			e.originalEvent.dataTransfer.effectAllowed = 'move';
			e.originalEvent.dataTransfer.setData('text/html', this.innerHTML);
			//Css
			wDropZone.css('border', '2px dashed #888');
			sidebar.addClass('attention');
		}
		function DragOver(e){
			if(e.preventDefault){
				e.preventDefault();
			}
			//Objectif : copie du widget (!= à DragStart ?!)
			e.originalEvent.dataTransfer.dropEffect = 'copy';
			return false;
		}
		function DragEnd(e)
		{
			//Reste général
			widgets = $(document).find('div.page div.widget');
			widgets.animate({
				opacity: 1,
				marginLeft: 0
			}, 200);

			wStyle = null;
			wDrag = null;
			wDrop = null;
			sidebar.removeClass('attention');
			wDropZone.css('border', '2px dashed #333');
		}
	
		/*
		 * Function sideDragEnter : Actions quand sidebar est survolé par un widget
		 */
		function sideDragOver(e){
			if(wStyle == 'page') {
				sidebar.removeClass('attention').addClass('opened');
			}
		}

		/*
		 * Function btnDragOver : Actions quand btn suppr de la sidebar est survolé par un widget
		 */
		function btnDragOver(e){
			if(e.preventDefault){
				e.preventDefault();
			}
			e.originalEvent.dataTransfer.dropEffect = 'move';
			return false;
		}		
		/*
		 * Function btnDragEnter : Actions quand btn suppr est survolé par un widget
		 */
		function btnDragEnter(e){
			if(e.preventDefault){
				e.preventDefault();
			}
			btnSupprimer.addClass('hover');
		}		
		/*
		 * Function onDragLeave : Actions quand btn suppr n'est plus survolé par un widget
		 */
		function btnDragLeave(e){
			if(e.preventDefault){
				e.preventDefault();
			}
			btnSupprimer.removeClass('hover');
		}
		/*
		 * Function btnDrop : Actions quand un élément est relaché sur le btn suppr
		 */
		function btnDrop(e){
			if(e.preventDefault){
				e.preventDefault();
			}
			//Si le widget vient bien de la zone widget
			if(wStyle == 'page')
			{
				Drag = wDrag;
				id = $(wDrag).attr('id');
				if(typeof(id) != 'undefined' || id != null)
				{
					if(confirm('Souhaitez-vous réellement supprimer le widget ?'))
					{
						//Suppression
						$.ajax({
							type: "POST",
							url: root+'widgets/delete/'+id
						});
						$(Drag).remove();

						//Reset css
						widgets.animate({
							opacity: 1,
							marginLeft: 0
						}, 200);
						resetBind(); 
					}
				}
				else
				{
					//On ne peut pas supprimer le widget car l'id n'est ajouté qu'après l'envoi des options
					alert('Merci de terminer l\'enregistrement du widget avant de le supprimer.')
				}				
			}

			//Reset général
			sidebar.removeClass('opened');

			widgets = $(document).find('div.page div.widget');
			widgets.animate({
				opacity: 1,
				marginLeft: 0
			}, 200);

			wStyle = null;
			wDrag = null;
			wDrop = null;
		}

		/*
		 * Function onDragOver : Actions quand wDropZone est survolée par un widget
		 */
		function onDragOver(e){
			if(e.preventDefault){
				e.preventDefault();
			}
			e.originalEvent.dataTransfer.dropEffect = 'move';
			return false;
		}
		/*
		 * Function onDragEnter : Actions quand la zone est survolée par un widget
		 */
		function onDragEnter(e){
			if(e.preventDefault){
				e.preventDefault();
			}
		}
		/*
		 * Function onDrop : Actions quand un élément est relaché sur la zone
		 */
		function onDrop(e){
			if(e.preventDefault){
				e.preventDefault();
			}

			//Limité aux widgets de div.page >> Changement de position
			if(wStyle == 'page')
			{
				//Si le widget existe bien et qu'il ne change pas de place avec lui même
				if(typeof(wDrop) != 'undefined' && wDrop != wDrag)
				{
					//On stocke les widgets de façon temporaire
					tempwDrop = $(wDrop).clone();
					tempwDrag = $(wDrag).clone();

					//On échange
					$(wDrop).replaceWith(tempwDrag);
					$(wDrag).replaceWith(tempwDrop);

					//On change les position en dtb
					$.ajax({
						type: "POST",
						url:  root+"positions/change/" + upageID + "/" + $(tempwDrag).attr('id') + "/" + ($(tempwDrag).index())
					})
					$.ajax({
						type: "POST",
						url:  root+"positions/change/" + upageID + "/" + $(tempwDrop).attr('id') + "/" + ($(tempwDrop).index())
					})
				}
				else if(typeof(wDrop) != 'undefined' && wDrop == wDrag) {} //Ne rien faire si widget relaché sur lui même
				else
				{
					//Si déplacement d'un widget à la fin de la page (on n'a pas glissé sur un wDrop)
					//On le place à la fin des widgets
					$(wDropZone).append(wDrag);
					//On change la position en dtb
					$.ajax({
						type: "POST",
						url:  root+"positions/change/" + upageID + "/" + $(wDrag).attr('id') + "/" + ($(wDrag).index())
					})
				}
			}

			//Limité aux widgets Sidebar >> Création d'un nouveau widget
			else if(wStyle == 'sidebar')
			{
				wDrag = $(wDrag).clone();
				//On suppr le message d'aide "Glisser un widget depuis le menu"
				$(document).find('div.page .empty').fadeOut(200).remove();

				//Nouveau widgets à une place précise (on a survolé un widget)
				if(typeof(wDrop) != 'undefined' && wDrop != null)
				{
					//On insère un widget type avant le widget survolé
					widget = template;
					$(widget).insertBefore(wDrop);

					_create(wDrag, wDrop, wDropZone);
				}
				//Nouveau widget à la fin
				else
				{
					//On insère un widget type à la fin
					widget = template;
					$(wDropZone).append(widget);

					_create(wDrag, false, wDropZone);
				}
			}

			//Reset général
			widgets = $(document).find('div.page div.widget');
			widgets.animate({
				opacity: 1,
				marginLeft: 0
			}, 200);

			wStyle = null;
			wDrag = null;
			wDrop = null;
			resetBind();
			wDropZone.css('border', '2px dashed #333');
			sidebar.removeClass('attention opened');
		}
		/*
		 * Function onDragEnd : Actions fin drag&drop
		 */
		function onDragEnd(e){
			//Reset
			widgets = $(document).find('div.page div.widget');
			widgets.animate({
				opacity: 1,
				marginLeft: 0
			}, 200);

			wStyle = null;
			wDrag = null;
			wDrop = null;
		}

	//Pour IE
	if(ie && ieVersion != 9)
	{
		$(container).html('<h1>Votre naviagateur n\'est pas supporté. foglo nécessite un navigateur récent comme Google Chrome ou Mozilla Firefox.</h1>');
	}

	/*
	 * Les actions placées ici s'éxecutent à chaque retour AJAX
	 *
	 */
	$(document).ajaxStop(function(){

		/* Active les bulle d'infos sur les élements .gtip avec un title = msg à afficher */
		$('.infoBulle').qtip({
			style: {
				classes: 'ui-tooltip-shadow ui-tooltip-bootstrap'
			},
			position: {
				my: 'left center', 
				at : 'right center',
			}
		});

	});

	/*
	 * Function facebookLogin()
	 *
	 * Gère la connexion à facebook pour le widget Facebook
	 */
	function facebookLogin(elem) {
		FB.login(function(retour){

			status = retour.status;
			
			//Si class facebookEdit c'est le panneaux d'options du widget Facebook
			if($(elem).hasClass('facebookEdit') && status == 'connected')
			{
				form = $(elem).parents('form');
				form.find('p.notConnectedFb').fadeOut(200);
				form.find('div.notConnected').fadeIn(200).removeClass('notConnected');
				form.find('div.submit').fadeIn(200);
			}

		}, {scope: 'read_stream'});
	}
	$('.facebookConnect').live('click', function(){
		facebookLogin(this);
		return false;
	});


	/*
	 * Page A propos
	 *
	 * Gestion de l'animation Besoin/Concept
	 */
	$('div.pages.About div.texte').css('min-height', ($('div.pages.About div.texte').find('ul.besoin').height() + 100));
	$('div.pages.About').find('h1.concept, h1.besoin').click(function(){
		$('div.pages.About').find('ul').removeClass('active');
		$('div.pages.About').find('ul.'+$(this).data('type')).addClass('active');
		$('div.pages.About').find('h1').removeClass('active');
		$('div.pages.About').find('h1.'+$(this).data('type')).addClass('active');
	});

});

/* Chargement du SDK Facebook */
window.fbAsyncInit = function() {
  FB.init({
    appId      : '463661703654585', // App ID
    //channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true,  // parse XFBML
    oauth      : true
  });
  // Additional initialization code here
};
// Load the SDK Asynchronously
(function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/fr_FR/all.js";
   ref.parentNode.insertBefore(js, ref);
 }(document));
