<?php

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class NavigationScraperService {

	public function scrape($url, $selector) {
		$client = new Client();

		$crawler = $client->request('GET', $url);

		$menuItems = $crawler->filter($selector)->each(function (Crawler $node) use ($url) {
			return array(
				'html' => $node->html(),
				'href' => $url . $node->attr('href')
			);
		});

		return $menuItems;
	}

}
