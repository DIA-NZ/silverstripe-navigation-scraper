# SilverStripe Navigation Scraper

A module for SilverStripe that allows you to scrape navigation from another site and use it as navigation on your own site.

## Example usage

In templates:

	<ul>
		<% loop $ScrapedMenu("ScrapedFooter") %>
			<li><a href="$Link">$Title</a></li>
		<% end_loop %>
	</ul>

Configuration:

	NavigationScraper:
	  menu_sets:
		ScrapedFooter:
		  PageToScrape: 'https://www.example.com'
		  CSSSelector: '.footer-nav li a'
		ScrapedMainNav:
		  PageToScrape: 'https://ww.example.com'
		  CSSSelector: '.header-nav li a'
