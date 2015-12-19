<?php

class MockNavigationScraperService
{

    public function scrape($url, $selector)
    {
        return array(
            array(
                'html' => 'Hello world!',
                'href' => 'https://www.example.com/hello-world'
            )
        );
    }
}
