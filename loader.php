<?php 
set_time_limit(0);
use Cartalyst\Sentry\Users\Eloquent\User;
use Illuminate\Cache\CacheManager as CacheManager;
use Illuminate\Filesystem\Filesystem as Filesystem;
use Silex\Application;

// Load các vendor của composer
include_once APPPATH . "/vendor/autoload.php";

//Tên thư mục chứa ứng dụng
$application_folder = 'applications';

//Load các config trong thư mục application , config
$path = APPPATH . '/' . $application_folder . '/config';
$dh  = opendir($path);
while (false !== ($filename = readdir($dh))) {
	if(!in_array($filename,array(".",".."))) 
		require_once $path . '/' . $filename;
}

//Gọi các file core của hệ thống
$path = APPPATH . '/core';
$dh  = opendir($path);
while (false !== ($filename = readdir($dh))) {
	if(!in_array($filename,array(".",".."))) 
		require_once $path . '/' . $filename;
}

// Đặt bí danh cho các lớp
class_alias('Cartalyst\Sentry\Facades\Native\Sentry', 'Sentry');
class_alias('Illuminate\Database\Capsule\Manager', 'DS');
class_alias('Core\Controller', 'Controller');

//Tạo kết nối tới database
$capsule = new DS;
$capsule->addConnection($config);
$capsule->setAsGlobal();
$capsule->bootEloquent();
if($config['database_caching']) {
	$container = $capsule->getContainer();
	$container['config']['cache.driver'] = 'file';
	$container['config']['cache.path'] = $config['cache_path'];
	$container['config']['cache.connection'] = null;
	$container['config']['cache.table'] = 'cache';
	$container['config']['cache.memcached'] = array(array('host' => '127.0.0.1', 'port' => 11211, 'weight' => 100),);
	$container['config']['cache.prefix'] = '';
	$container['files'] = new Filesystem();
	$cacheManager = new CacheManager($container);
	$capsule->setCacheManager($cacheManager);
}

//Smarty config
require_once APPPATH . "/vendor/smarty/smarty/libs/Smarty.class.php";
$smarty = new Smarty;
foreach ($smartyConfig as $key => $value) {
	$smarty->$key = $value;
}

//Load Twig

$app = new Application();
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => APPPATH . '/' . $application_folder .'/views',
));
$app['debug'] = true;


//Load Language file
$lang = Lang::getAll();

//Set login Attribute
User::setLoginAttributeName($config['login_attribute']);
User::setHasher(new $config['password_hasher']);

$smarty->assign('lang', $lang);

?>