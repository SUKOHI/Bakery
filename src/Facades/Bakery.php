<?php namespace Sukohi\Bakery\Facades;

use Illuminate\Support\Facades\Facade;

class Bakery extends Facade {
	
	protected static function getFacadeAccessor() {

		return 'bakery';

	}

}