<?php

class MenuSetUpdateService {

	/**
	 * Scrapes all configured MenuSets under the NavigationScraper configuration item
	 */
	public function scrapeConfiguredMenuSets() {
		$menuSetsToScrape = Config::inst()->get('NavigationScraper', 'MenuSets');

		$scraperService = Injector::inst()->create('NavigationScraperService');

		foreach ($menuSetsToScrape as $menuSet => $details) {
			$menuItems = $scraperService->scrape($details['PageToScrape'], $details['CSSSelector']);

			if (count($menuItems) == 0) {
				continue;
			}

			MenuItem::get()->filter(array('MenuSet' => $menuSet))->removeAll();

			foreach ($menuItems as $menuItemData) {
				$menuItem = new MenuItem(array(
					'MenuSet' => $menuSet,
					'LinkText' => $menuItemData['html'],
					'LinkHref' => $menuItemData['href']
				));

				$menuItem->write();
			}
		}
	}

}
