Bakery
=====

A PHP package mainly developed for Laravel to generate breadcrumbs using routes.  
(This is for Laravel 4.2. [For Laravel 5+](https://github.com/SUKOHI/Bakery))

Installation
====

Add this package name in composer.json

    "require": {
      "sukohi/bakery": "1.*"
    }

Execute composer command.

    composer update

Register the service provider in app.php

    'providers' => [
        ...Others...,  
        'Sukohi\Bakery\BakeryServiceProvider',
    ]

Also alias

    'aliases' => [
        ...Others...,  
        'Bakery' => 'Sukohi\Bakery\Facades\Bakery',
    ]

Usage
====

	$params = [
	
		'home' => 'Home',
		'home.area:vancouver' => 'Vancouver',
		'home.food:sushi,popular' => 'Popular sushi restaurants',
		'*' => 'Samurai'
	
	];

	foreach(Bakery::get($params) as $bakery) {
	
		if($bakery->isCurrent) {
	
			echo $bakery->title;
	
		} else {
	
			echo HTML::link($bakery->url, $bakery->title) .' &gt; ';
	
		}
	
	}

About parameter pattern
====

	1.'route' => 'title'
	2.'route:parameter' => 'title'
	3.'route:parameter1,parameter2' => 'title',
	4.'*' => 'Current Page'


License
====

This package is licensed under the MIT License.

Copyright 2014 Sukohi Kuhoh