<?php 

//Cài đặt kết nối CSDL cho Illuminate Database
$config['driver']       =   'mysql';
$config['host']         =   'localhost';
$config['database']     =   'test';
$config['username']     =   'root';
$config['password']     =   '';
$config['charset']      =   'utf8';
$config['collation']    =   'utf8_unicode_ci';
$config['database_caching']      = true; //Yêu cầu PHP >=5.4
$config['cache_path']   = APPPATH . '/' . $application_folder . '/cache'; //Folder lưu cache database

//Cấu hình cho Sentry, login bằng Username hoặc Email
$config['login_attribute'] = 'username'; //Username Or Email
//Sha256Hasher: SHA256
//BcryptHasher: bcrypt
//WhirlpoolHasher: whirlpool
$config['password_hasher'] = 'Cartalyst\Sentry\Hashing\Sha256Hasher'; 

//Cấu hình Smarty
$smartyConfig['template_dir'] = APPPATH . '/' . $application_folder . '/templates';
$smartyConfig['caching'] = 0; // Nếu sử dụng cache template là 1, cache có giới hạn thời gian dùng 2
$smartyConfig['cache_lifetime'] = 1800; 
$smartyConfig['compile_dir'] = APPPATH . '/' . $application_folder . '/cache'; 

//Mặc định module chạy khi index
$config['default_module'] = 'test_db';

//Cài múi giờ cho hệ thống
date_default_timezone_set('Asia/Tokyo');
?>