<?php 
Lang::init();
class Lang {
	protected static $default = 'japanese';
	protected static $lg;
	public static function init($langSet = false) {
		global $application_folder;
		if($langSet) {
			include_once APPPATH . '/' . $application_folder . "/languages/" . $langSet . ".php";
		} else {
			include_once APPPATH . '/' . $application_folder . "/languages/" . self::$default . ".php";
		}
		self::$lg = $lang;
	}
	public static function get($key = false) {
		if($key) {
			return self::$lg[$key];
		}
		return '';
	}

	public static function getAll() {
		$allData = array();
		foreach(self::$lg as $k=>$v) {
			$allData[$k] = $v;
		}
		return $allData;
	}
}
?>