# SilverStripe Navigation Scraper

A module for SilverStripe that allows you to scrape navigation from another site and use it as navigation on your own site.

## Installation

Install with composer:

```
composer require 'deptinternalaffairsnz/silverstripe-navigation-scraper' '1.0.0'
```

## Usage

### Configuration

In your own config file (e.g. `mysite/_config/config.yml`) define the menu sets, URLs to scrape, and CSS selectors to target.

```yml
NavigationScraper:
  MenuSets:
	ScrapedFooter:
	  PageToScrape: 'https://www.example.com'
	  CSSSelector: '.footer-nav li a'
	ScrapedMainNav:
	  PageToScrape: 'https://www.example.com'
	  CSSSelector: '.header-nav li a'
```

### Trigger a scrape

There are two options to trigger a scrape.

1. Run the build task `dev/tasks/TriggerScrapeBuildTask`
2. Install the cron task module - assuming you've configured a cron job appropriately a scrape will be run daily at 1am by default.

### Templates

Use the $ScrapedMenu function in your templates, like so:

```html
<ul>
	<% loop $ScrapedMenu("ScrapedFooter") %>
		<li><a href="$Link">$Title</a></li>
	<% end_loop %>
</ul>
```
