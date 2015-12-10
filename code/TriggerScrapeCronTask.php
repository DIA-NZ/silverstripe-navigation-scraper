<?php

if (!interface_exists('CronTask')) {
	return;
}

class TriggerScrapeCronTask implements CronTask {

	public function getSchedule() {
		return '0 1 * * *';
	}

	public function process() {
		$service = new MenuSetUpdateService();
		$service->scrapeConfiguredMenuSets();

		echo 'Done';
	}

}
