<?php namespace Sukohi\Bakery;

use Illuminate\Support\Facades\Request;
class Bakery {
	
	public function get($breadcrumbs_data) {
		
		$bakery_data = [];
		
		foreach ($breadcrumbs_data as $route => $link_text) {
			
			$obj = new \stdClass;
			
			if($route == '*') {

				$obj->url = Request::url();
				$obj->isCurrent = true;
				
			} else {

				$params = [];
				
				if(strpos($route, ':') !== false) {
				
					list($route, $params) = explode(':', $route);
					
					if(strpos($params, ',') !== false) {
						
						$params = explode(',', $params);
						
					} else {
						
						$params = [$params];
						
					}
					
				}
				
				$obj->url = route($route, $params);
				$obj->isCurrent = false;
				
			}
			
			$obj->title = $link_text;
			$bakery_data[] = $obj;
			
		}
		
		return $bakery_data;
		
	}
	
}