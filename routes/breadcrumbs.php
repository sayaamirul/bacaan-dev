<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home-page'));
});

Breadcrumbs::for('article.list', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Articles', route('article.list'));
});

Breadcrumbs::for('article.single', function (BreadcrumbTrail $trail, App\Models\Article $article) {
    $trail->parent('article.list');
    $trail->push($article->title, route('article.single', $article));
});

Breadcrumbs::for('article.series', function (BreadcrumbTrail $trail, App\Models\Article $article) {
    $trail->parent('article.list');
    $trail->push($article->series->title, route('series.single', $article->series));
    $trail->push($article->title, route('article.single', $article));
});

Breadcrumbs::for('snippet.list', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Snippets', route('snippet.list'));
});

Breadcrumbs::for('snippet.single', function (BreadcrumbTrail $trail, App\Models\Snippet $snippet) {
    $trail->parent('snippet.list');
    $trail->push($snippet->name, route('snippet.single', $snippet));
});
