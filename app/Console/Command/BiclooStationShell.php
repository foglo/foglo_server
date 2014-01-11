<?php
class BiclooStationShell extends AppShell {
	public $uses = array('BiclooStation');

	public function main() {
		$stations = $this->BiclooStation->find('all');
		foreach ($stations as $station) {
			$s = $station['BiclooStation'];
			$this->out('Last update: '.$s['last_update'].' Name: ' .$s['name']);
		}
	}
	public function update() {
		// Get stations from API
		$this->out('Getting station data...');

		// Update stations into DB
		$this->out('Updating stations...');
	}
}