<?php

class HrefIsRelativeTest extends SapphireTest
{

    public function testAbsoluteURLs()
    {
        $hrefIsRelativeMethod = new ReflectionMethod('NavigationScraperService', 'hrefIsRelative');
        $hrefIsRelativeMethod->setAccessible(true);

        $service = new NavigationScraperService();

        $this->assertFalse($hrefIsRelativeMethod->invoke($service, 'http://www.example.com/blah'));
        $this->assertFalse($hrefIsRelativeMethod->invoke($service, 'https://www.example.com/blah'));
        $this->assertFalse($hrefIsRelativeMethod->invoke($service, 'www.example.com/blah'));
        $this->assertFalse($hrefIsRelativeMethod->invoke($service, '//example.com/blah'));
    }

    public function testRelativeURLs()
    {
        $hrefIsRelativeMethod = new ReflectionMethod('NavigationScraperService', 'hrefIsRelative');
        $hrefIsRelativeMethod->setAccessible(true);

        $service = new NavigationScraperService();

        $this->assertTrue($hrefIsRelativeMethod->invoke($service, '/blah'));
        $this->assertTrue($hrefIsRelativeMethod->invoke($service, 'blah/something'));
    }
}
