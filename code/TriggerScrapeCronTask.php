<?php

if (!interface_exists('CronTask')) {
	return;
}

class TriggerScrapeCronTask implements CronTask {

	public function getSchedule() {
		return Config::inst()->get('TriggerScrapeCronTask', 'schedule');
	}

	public function process() {
		$service = new MenuSetUpdateService();
		$service->scrapeConfiguredMenuSets();

		echo 'Done';
	}

}
