<?php

class MenuSetUpdateServiceTest extends SapphireTest {

	public function setUp() {
		parent::setUp();

		Injector::inst()->registerService(new MockNavigationScraperService(), 'NavigationScraperService');
	}

	public function testSomething() {
		Config::inst()->update('NavigationScraper', 'MenuSets', array(
			'Test' => array(
				'PageToScrape' => 'https://www.example.com',
				'CSSSelector' => '.test a'
			)
		));

		$updateService = new MenuSetUpdateService();

		$updateService->scrapeConfiguredMenuSets();
	}

}
