<?php

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Guzzle\Http\Client as GuzzleClient;

class NavigationScraperService {

	private $cache = array();

	/**
	 * Scrapes the given URL and filters out a list of links based on the given CSS selector
	 *
	 * @param string $url
	 * @param string $selector
	 * @return array
	 */
	public function scrape($url, $selector) {
		$crawler = $this->getCrawler($url);

		$menuItems = $crawler->filter($selector)->each(function (Crawler $node) use ($url) {
			return array(
				'html' => $node->html(),
				'href' => $url . $node->attr('href')
			);
		});

		return $menuItems;
	}

	/**
	 * @param string $url
	 * @return Symfony\Component\DomCrawler\Crawler
	 */
	private function getCrawler($url) {
		if (isset($this->cache[$url])) {
			$crawler = $this->cache[$url];
		} else {
			$crawler = $this->getCrawlerCacheMiss($url);
		}

		return $crawler;
	}

	private function getCrawlerCacheMiss($url) {
		$client = new Client();

		$this->useProxyIfAvailable($client);

		$this->cache[$url] = $client->request('GET', $url);

		return $this->cache[$url];
	}

	private function useProxyIfAvailable(Client $client) {
		if (defined('SS_OUTBOUND_PROXY') && defined('SS_OUTBOUND_PROXY_PORT')) {
			$guzzleClient = new GuzzleClient('', array(
				'request.options' => array(
					'proxy' => 'tcp://' . SS_OUTBOUND_PROXY . ':' . SS_OUTBOUND_PROXY_PORT
				)
			));

			$client->setClient($guzzleClient);
		}
	}

}
