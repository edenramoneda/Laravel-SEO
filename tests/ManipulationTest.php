<?php

namespace romanzipp\Seo\Test;

use romanzipp\Seo\Facades\Seo;
use romanzipp\Seo\Services\SeoService;
use romanzipp\Seo\Test\TestCase;

class InstantiationTest extends TestCase
{
    public function testInstance()
    {
        $seo = app(SeoService::class);

        Title::hook(
            (new Hook)
                ->onBody()
                ->callback(function($body) {
                    return $body . ' 1';
                })
        );

        Title::hook(
            Hook::make()
                ->onBody()
                ->callback(function($body) {
                    return $body . ' 1';
                })
        );

        OpenGraph::hook(
            Hook::make()
                ->onAttributes()
                ->whereAttribute('property', 'og:title')
                ->callback(function($attributes) {
                    return $attributes;
                })
        );
    }
}