<?php

class TriggerScrapeBuildTask extends BuildTask
{

    protected $title = 'Scrape navigation from external sites';
    protected $description = 'Scrapes external sites based on configured menu sets and stores them in MenuItems';

    public function run($request)
    {
        $service = new MenuSetUpdateService();
        $service->scrapeConfiguredMenuSets();

        echo 'Done';
    }
}
