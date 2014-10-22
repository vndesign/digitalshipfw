<?php 
namespace Core;
class Controller {
	public static function load($name, $method = 'index', $params = array()) {
		global $application_folder;
		include_once APPPATH . '/' . $application_folder . '/controllers/' . $name . '.php';
		return '';
	}
}
?>