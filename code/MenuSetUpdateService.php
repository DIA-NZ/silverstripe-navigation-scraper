<?php

class MenuSetUpdateService {

	public function scrapeConfiguredMenuSets() {
		$menuSetsToScrape = Config::inst()->get('NavigationScraper', 'MenuSets');

		$scraperService = Injector::inst()->create('NavigationScraperService');

		foreach ($menuSetsToScrape as $menuSet => $details) {
			$menuItems = $scraperService->scrape($details['PageToScrape'], $details['CSSSelector']);

			Debug::dump($menuItems);
		}
	}

}
