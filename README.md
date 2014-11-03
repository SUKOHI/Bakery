Bakery
=====

A PHP package mainly developed for Laravel to generate breadcrumbs using routes.

Installation&setting for Laravel
====

After installation using composer, add the followings to the array in  app/config/app.php

    'providers' => array(  
        ...Others...,  
        'Sukohi\Bakery\BakeryServiceProvider', 
    )

    'aliases' => array(  
        ...Others...,  
        'Bakery' =>'Sukohi\Bakery\Facades\Bakery',
    )

Usage
====

	$params = array(
	
		'home' => 'Home',
		'home.area:vancouver' => 'Vancouver',
		'home.food:sushi,popular' => 'Popular sushi restaurants',
		'*' => 'Samurai'
	
	);

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