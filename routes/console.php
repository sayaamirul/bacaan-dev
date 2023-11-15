<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('make:sitemap', function () {
    $sitemapPath = 'public/sitemap.xml';

    \Spatie\Sitemap\SitemapGenerator::create(config('app.url'))
        ->shouldCrawl(function (GuzzleHttp\Psr7\Uri $url) {
            return strpos($url->getPath(), '/admin') === false;
        })
        ->writeToFile($sitemapPath);
    \Termwind\render('<div class="px-1 bg-green-500">Sitemap generated succesfully !</div>');
})->describe('Generate site sitemap');

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
