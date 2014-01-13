<?php
class BiclooStationShell extends AppShell {
	public $uses = array('BiclooStation');

	/*
	* Function main()
	*
	* List station info from DB
	*
	*/
	public function main() {
		$stations = $this->BiclooStation->find('all');
		foreach ($stations as $station) {
			$s = $station['BiclooStation'];
			$this->out('Last update: '.$s['last_update'].' Name: ' .$s['name']);
		}
	}

	/*
	* Function update()
	*
	* Get station info from Bicloo API and update DB
	*
	* See https://developer.jcdecaux.com/ to get an API key
	*
	*/
	public function update() {
		// Get stations from API
		$apiKey = '';
		$apiURL = 'https://api.jcdecaux.com/vls/v1/stations?contract=nantes&apiKey='.$apiKey;
		$this->out('Getting data from '.$apiURL.'...');
		$stations = json_decode(@file_get_contents($apiURL), true);
		if ($stations) {
			foreach ($stations as $station) {
				// Clean some fields
				$station['name'] = ltrim(substr($station['name'], 6), " -");
				$station['status'] = ($station['status'] == 'OPEN' ? true : false);
				$station['last_update'] = date('c', ($station['last_update']/1000));

				$stationStored = $this->BiclooStation->find('first', array('conditions' => array('BiclooStation.station' => $station['number'])));
				if (!empty($stationStored)) {
					// Update station if needed
					$latest_dt = new DateTime($station['last_update']);
					$stored_dt = new DateTime($stationStored['BiclooStation']['last_update']);
					if ($latest_dt > $stored_dt) {
						$this->BiclooStation->create();
						$stationStored['BiclooStation']['status'] = $station['status'];
						$stationStored['BiclooStation']['bike_stands'] = $station['bike_stands'];
						$stationStored['BiclooStation']['available_bike_stands'] = $station['available_bike_stands'];
						$stationStored['BiclooStation']['available_bikes'] = $station['available_bikes'];
						$stationStored['BiclooStation']['last_update'] = $station['last_update'];
						$this->out('Updating station: '.$stationStored['BiclooStation']['name'].'...');
						$this->BiclooStation->save($stationStored);
					} else {
						$this->out('Unchanged station: '.$stationStored['BiclooStation']['name'].'...');
					}
				} else {
					// Create station
					$this->BiclooStation->create();
					$stationNew = array('BiclooStation' => array(
						'station' => $station['number'],
						'name' => $station['name'],
						'status' => $station['status'],
						'bike_stands' => $station['bike_stands'],
						'available_bike_stands' => $station['available_bike_stands'],
						'available_bikes' => $station['available_bikes'],
						'last_update' => $station['last_update'],
					));
					$this->out('Creating station: '.$stationNew['BiclooStation']['name'].'...');
					$this->BiclooStation->save($stationNew);
				}
			}
		}
		$this->out('Done.');
	}
}
