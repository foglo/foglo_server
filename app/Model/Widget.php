<?php

class Widget extends AppModel{

	public $name = 'Widget';
	public $belongsTo = array(
			"User" => array(
				'className' => 'User',
				'dependent' => true
			),
			"Upage" => array(
				'className' => 'Upage',
				'dependent' => true
		));
	public $hasOne = array(
		'Data' => array(
			'className' => 'Data',
			'dependent' => true
			),
		'Position' => array(
			'className' => 'Position',
			'dependent' => true
		));
	public $validate = array(
        'name' => array('alphaNumeric')
    );


    /*
     * Function weather($ville)
     *
     * Renvois la météo obtenue via Yahoo! Weather
     */
    public function weather($ville) 
   	{
   		$err = false;

    	//On check si la météo est déjà en cache
		$xmlMeteo = Cache::read('meteo'.$ville, '10min');

		//Pas de cache de la météo
		if(!$xmlMeteo)
		{
			//Clé API Yahoo!
    		$cleYahoo = "HGM0uZ_V34GPzWpD1M0rt_GBIWDl_DUT89P09bsA9DRVg.mwMfiURclM0IrIqj0EbNOQkWOdpfo.zm.PHIKlDitz.fSS8Ks-";

			//On a besoin du code WOEID de la ville
			$woeid = Cache::read('woeid'.$ville, '2day');

			//Pas de cache WOEID : cURL sur Yahoo
			if(!$woeid)
			{
				//Lecture xml
				$xmlWOEID = @file_get_contents('http://where.yahooapis.com/v1/places.q('.$ville.')?appid='.$cleYahoo);
				$objWOEID = @simplexml_load_string($xmlWOEID);

				//Si pb sur xml
				if(!$xmlWOEID || empty($xmlWOEID) || !$objWOEID->place)
				{
					$err = array(
						'type' => 'mauvaise ville',
						'msg' => 'Le service Yahoo! Météo n\'a renvoyé aucune données pour cette ville.'
					);
				}
				else
				{
					$woeid = (string)$objWOEID->place->woeid;

					//Ecriture du cache
					Cache::set(array('duration' => '+2 days'));
					Cache::write('woeid'.$ville, $woeid);
				}
			}
			
			if($woeid)
			{
				//Lecture xml
				$xmlMeteo = @file_get_contents('http://weather.yahooapis.com/forecastrss?appid='.$cleYahoo.'&w='.$woeid.'&u=c');
				$objMeteo = @simplexml_load_string($xmlMeteo);

				//Si pb sur xml
				if(!$xmlMeteo || empty($xmlMeteo) || (((string)$objMeteo->channel->title) == 'Yahoo! Weather - Error'))
				{
					$err = array(
						'type' => 'info',
						'msg' => 'Erreur avec le service Yahoo! Météo.'
					);
				}
				else
				{
					//Ecriture du cache
					Cache::write('meteo'.$ville, $xmlMeteo, '10min');
				}
			}
		}

		if($xmlMeteo)
		{
			$objMeteo = @simplexml_load_string($xmlMeteo);

			function yahoo_weather($item, $needle, $data) 
			{
				$regex = '<yweather:'. $item .'.*' . $needle . '="(.*?)".*/>';
				preg_match($regex, $data, $matches);

				if(!empty($matches))
				{
					return $matches[1];	
				}
				else
				{
					return 'Inconnu';
				}
			}

			if(!$err)
			{
				$meteo = array(
					'type'        => 'meteo',
					'ville'       => $ville,
					'temperature' => yahoo_weather('condition', 'temp', $xmlMeteo),
					'min'         => yahoo_weather('forecast', 'low', $xmlMeteo),
					'max'         => yahoo_weather('forecast', 'high', $xmlMeteo),
					'condition'       => yahoo_weather('condition', 'text', $xmlMeteo),
					'condition_code'  => yahoo_weather('condition', 'code', $xmlMeteo),
				);

				return $meteo;
			}
			else
			{
				return $err;
			}
		}

		return $err;

    }

}