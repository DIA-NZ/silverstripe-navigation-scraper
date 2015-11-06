<?php

class NavigationScraperServiceTest extends SapphireTest {

	public function testScrape() {
		$scraper = new NavigationScraperService();

		$scraper->scrape('https://www.dia.govt.nz', '#nav > ul > li > a');
	}

}
