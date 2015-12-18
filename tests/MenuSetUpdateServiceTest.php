<?php

class MenuSetUpdateServiceTest extends SapphireTest
{

    public function setUp()
    {
        parent::setUp();

        Injector::inst()->registerService(new MockNavigationScraperService(), 'NavigationScraperService');
    }

    public function testSomething()
    {
        Config::inst()->remove('NavigationScraper', 'MenuSets');
        Config::inst()->update('NavigationScraper', 'MenuSets', array(
            'Test' => array(
                'PageToScrape' => 'https://www.example.com',
                'CSSSelector' => '.test a'
            )
        ));

        $updateService = new MenuSetUpdateService();
        $updateService->scrapeConfiguredMenuSets();

        $menuItems = MenuItem::get();

        $this->assertEquals(1, count($menuItems));

        $menuItem = $menuItems->first();

        $this->assertEquals('Test', $menuItem->MenuSet);
        $this->assertEquals('Hello world!', $menuItem->LinkText);
        $this->assertEquals('https://www.example.com/hello-world', $menuItem->LinkHref);
    }
}
