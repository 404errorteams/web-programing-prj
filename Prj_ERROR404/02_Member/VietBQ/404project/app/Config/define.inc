<?php

//NOTICE: save me to UTF8 without BOM
define('VERSION', '1.0');
define('BASE_PATH', dirname(dirname(dirname(__FILE__))) . '/');
define('APP_PATH', BASE_PATH . 'app/');
define('VENDOR_PATH', APP_PATH . 'Vendor/');
define('FILEMP_PATH', APP_PATH . 'data/audio/');
define('MODEL_PATH', APP_PATH . 'Model/');
define('VIEW_PATH', APP_PATH . 'View/');
define('LIB_PATH', APP_PATH . 'Lib/');
define('PLUGIN_PATH', APP_PATH . 'Plugin/');
define('CONFIG_PATH', dirname(__FILE__) . '/');
define('WEBROOT_PATH', getcwd() . '/');
define('WEBROOT_PATH_CLI', getcwd());
define('LANG_PATH', LIB_PATH . 'lang/');
define('LOG_PATH', APP_PATH . 'log/');
define('ROW_OF_PAGE', 20);
define('DIR_NAME', basename(BASE_PATH));

define('IMAGE_UPLOAD_PATH', BASE_PATH . 'data/img/');
define('IMAGE_UPLOAD_PATH_AUTHOR', WEBROOT_PATH . 'img/author/');
define('IMAGE_UPLOAD_PATH_BOOK', WEBROOT_PATH . 'img/book/');
define('IMAGE_UPLOAD_PATH_USER', WEBROOT_PATH . 'img/user/');

define('NO_IMAGE', 'NO_IMAGE.png');


///
/* Import library */
App::import('Lib', 'GlobalVar');
App::import('Lib', 'UserAgentInfo');
App::uses('FB', 'Lib');
App::uses('Linklib', 'Lib/linklib'); // i here
App::uses('Lang', 'Lib/lang');
App::import('Lib', 'Validator');
App::import('Lib', 'GamifyLogger');

App::import('Vendor', 'htmLawed');

if (PHP_SAPI == 'cli') {
    if (strrpos(__FILE__, "/home/tenkana/") !== false) {
        define('SYSTEM_EVIRONMENT', 'development'); // x10
        define('SERVER_NAME', 'dd');
    } else {
        if (strrpos(__FILE__, "/home/codelovers/public_html/apps/") !== false) {
            define('SYSTEM_EVIRONMENT', 'production');
            define('SERVER_NAME', 'ddddddddddd');
        } else {
            define('SYSTEM_EVIRONMENT', 'localhost');
            define('SERVER_NAME', 'localhost');
        }
    }
} else {
    define('SERVER_NAME', $_SERVER['SERVER_NAME']);
    if ($_SERVER['HTTP_HOST'] == 'localhost') {
        define('SYSTEM_EVIRONMENT', 'localhost');
    } else {
        if (strrpos(__FILE__, "/home/tenkana/") !== false) {
            define('SYSTEM_EVIRONMENT', 'development'); // x10
        } else {
            define('SYSTEM_EVIRONMENT', 'production');
        }
    }
}
// Set admin layout
define('ADMIN_LAYOUT', 'bootstrap_admin');

// Set app layout
define('APP_LAYOUT', 'wordmazefront');

function is_localhost() {
    return SYSTEM_EVIRONMENT == 'localhost';
}

function is_development() {
    return SYSTEM_EVIRONMENT == 'development';
}

function is_production() {
    return SYSTEM_EVIRONMENT == 'production';
}

define('HTTP_PROTOCOL', 'http');
define('CALLBACK_PROTOCOL', 'http'); //callback function must be predifined

/*
 * Define web root URL
 */
if (is_localhost()) { // localhost    
    // Define root url
    $tmp = explode(DIRECTORY_SEPARATOR, WEBROOT_PATH);
    $tmp = $tmp[count($tmp) - 3];
    define('ROOT_URL', HTTP_PROTOCOL . "://" . SERVER_NAME . "/{$tmp}/");
    define('ROOT_URL_CALLBACK', CALLBACK_PROTOCOL . "://" . SERVER_NAME . "/{$tmp}/");
    // define web root url
    define('ADMIN_HOME_URL', HTTP_PROTOCOL . '://' . SERVER_NAME . '/' . DIR_NAME . '/admin/');
    define('ADMIN_ROOT_URL', HTTP_PROTOCOL . '://' . SERVER_NAME . '/' . DIR_NAME . '/');
    define('NUM_OF_QUESTION', 3);
    define('DIR_MP3', FILEMP_PATH);
} else if (is_development()) { // development (x10)	
    // Define root url
    define('ROOT_URL', HTTP_PROTOCOL . "://" . SERVER_NAME . "/");
    define('ROOT_URL_CALLBACK', CALLBACK_PROTOCOL . "://" . SERVER_NAME . "/");
    // define web root url
    define('ADMIN_HOME_URL', HTTP_PROTOCOL . '://' . SERVER_NAME . '/admin/');
    define('ADMIN_ROOT_URL', HTTP_PROTOCOL . '://' . SERVER_NAME . '/');
    define('NUM_OF_QUESTION', 5);
    define('DIR_MP3', FILEMP_PATH);
} else { // production	
    // Define root url
    define('ROOT_URL', HTTP_PROTOCOL . "://" . SERVER_NAME . "/");
    define('ROOT_URL_CALLBACK', CALLBACK_PROTOCOL . "://" . SERVER_NAME . "/");
    // define web root url
    define('ADMIN_HOME_URL', HTTP_PROTOCOL . '://' . SERVER_NAME . '/admin/');
    define('ADMIN_ROOT_URL', HTTP_PROTOCOL . '://' . SERVER_NAME . '/');
    define('NUM_OF_QUESTION', 20);
    define('DIR_MP3', FILEMP_PATH);
}

/*
 * Define database params
 */
if (is_localhost()) { // localhost
    // Database config
    define('DB_HOSTNAME', 'localhost');
    define('DB_USERNAME', 'myphp2');
    define('DB_PASSWORD', '123456789');
    define('DB_DATABASE', 'minigame');
} else if (is_development()) { // development (x10)
    // Database config
    define('DB_HOSTNAME', 'localhost');
    define('DB_USERNAME', 'tenkana_stage');
    define('DB_PASSWORD', 'cap3&MeG3p4G');
    define('DB_DATABASE', 'tenkana_minigame');
} else { // production
    // Database config
    define('DB_HOSTNAME', 'localhost');
    define('DB_USERNAME', 'codelovers');
    define('DB_PASSWORD', 'chonolookats');
    define('DB_DATABASE', 'apps');
}

/*
 * Define APP params
 */
if (is_localhost()) { // localhost
    define('NUM_OF_QUIZ', 3);
    // FB app for local test
    define('FB_APP_ID', '327168174054585');
    define('FB_APP_KEY', 'c69d81cbd6b42da0faeecbcd02f95097');
    define('FB_PAGE_NAME', 'Wannbiesquizapp');
    define('FB_FAN_PAGE_ID', '148139262009045');
    define('FB_APP_ADMINS', '100005030772151');

    // Define app url
    define('APP_ROOT_URL', HTTP_PROTOCOL . '://' . SERVER_NAME . '/' . DIR_NAME . '/');
    define('APP_ON_FACEBOOK_URL', 'http://www.facebook.com/' . FB_PAGE_NAME . '?sk=app_' . FB_APP_ID . '&ref=ts');
    define('APP_FACEBOOK_PAGE_URL', 'http://www.facebook.com/pages/' . FB_PAGE_NAME . '/' . FB_FAN_PAGE_ID . '?sk=app_' . FB_APP_ID);
} else if (is_development()) { // development (x10)
    define('NUM_OF_QUIZ', 5);
    define('FB_APP_ID', '101558193357432');
    define('FB_APP_KEY', 'b93fa2c4a63a1f3f2b18bf2c69a3015a');
    define('FB_PAGE_NAME', 'Wannaquizdev2');
    define('FB_FAN_PAGE_ID', '148139262009045');
    define('FB_APP_ADMINS', '100005030772151');

    // Define app url
    define('APP_ROOT_URL', HTTP_PROTOCOL . '://' . SERVER_NAME . '/' . DIR_NAME . '/');
    define('APP_ON_FACEBOOK_URL', 'http://apps.facebook.com/fbquizappdevtwo/');
    define('APP_FACEBOOK_PAGE_URL', 'http://www.facebook.com/pages/' . FB_PAGE_NAME . '/' . FB_FAN_PAGE_ID . '?sk=app_' . FB_APP_ID);
} else { // production    	Fbquizapp_prod (dev2.codelovers@gmail.com)
    define('NUM_OF_QUIZ', 15);
    define('FB_APP_ID', '335342793247093');
    define('FB_APP_KEY', '3d5c8c57be2ab21d439b228d72d31bae');
    define('FB_PAGE_NAME', 'shindangame');
    define('FB_FAN_PAGE_ID', '114517518708104');
    define('FB_APP_ADMINS', '100005030772151');

    // define web root url
    define('APP_ROOT_URL', HTTP_PROTOCOL . '://' . SERVER_NAME . '/' . DIR_NAME . '/');
    define('APP_ON_FACEBOOK_URL', 'http://apps.facebook.com/fbquizapp_prod');
    define('APP_FACEBOOK_PAGE_URL', 'http://www.facebook.com/' . FB_PAGE_NAME . '/app_' . FB_FAN_PAGE_ID);
}

define('CALLBACK_URI', ROOT_URL_CALLBACK . 'callback/');
define('APP_URL', HTTP_PROTOCOL . '://' . SERVER_NAME . '/photogame/moviequiz/');
if (PHP_SAPI != 'cli') {
    define('RETURN_URL', HTTP_PROTOCOL . "://" . SERVER_NAME . $_SERVER["REQUEST_URI"]);
}

define('FB_FIELDS', 'id,name,username,first_name,last_name,email,birthday,gender,work,hometown');
define('FB_PERMISSIONS', 'email,user_about_me,user_birthday,user_hometown, publish_actions,user_work_history');

define('WALL_POST_IMG', '<img src="" />'); // define content that you want to post to wall

define('DEFAULT_LANG', 'vi');
define('DEBUG_MODE', true);
define('DEBUG_NO_CACHE', true);

define('ROW_PER_PAGE', 100);
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', 0);
ini_set("log_errors", "On");
ini_set("error_log", LOG_PATH . "/error.log");
date_default_timezone_set("Asia/Ho_Chi_Minh");


$admin_access_list_arr = array(//sha1
    'admin' => 'a56f5b18e181b3c85b9a040c0c9e645170279669', //honemsaydam
    'vietbq' => 'd6e15bf0694576a3ca2a2bc34354826c90bb78ab',
    'luannt' => 'b0d7d736a39f0321026432df3ef48424039119ec'
);
GlobalVar::write("admin_access_list_arr", $admin_access_list_arr);


define('SESSION_USER_ADMIN', 'session_user_admin');
define('SESSION_USER_ID', 'session_user_id');

//* API linklib */
define('LINKLIB_SECRET_KEY', 'b4m');
define('API_SECRET_KEY', LINKLIB_SECRET_KEY);



GlobalVar::write("sidebar_nav", array(
    array('type' => 'nav_header', 'title' => 'Author'),
    array('type' => 'nav_link', 'title' => 'List Author', 'url' => ADMIN_ROOT_URL . 'adminauthor/index'),
    array('type' => 'nav_link', 'title' => 'Add Author', 'url' => ADMIN_ROOT_URL . 'adminauthor/add'),
    array('type' => 'nav_header', 'title' => 'Book'),
    array('type' => 'nav_link', 'title' => 'List Book', 'url' => ADMIN_ROOT_URL . 'adminbook/index'),
    array('type' => 'nav_link', 'title' => 'Add Book', 'url' => ADMIN_ROOT_URL . 'adminbook/add'),
    array('type' => 'nav_header', 'title' => 'Users'),
    array('type' => 'nav_link', 'title' => 'List Users', 'url' => ADMIN_ROOT_URL . 'adminusers/index'),
    array('type' => 'nav_link', 'title' => 'Add User', 'url' => ADMIN_ROOT_URL . 'adminusers/add'),
    array('type' => 'nav_header', 'title' => 'Category'),
    array('type' => 'nav_link', 'title' => 'List Category', 'url' => ADMIN_ROOT_URL . 'admincategory/list'),
    array('type' => 'nav_link', 'title' => 'Add Category', 'url' => ADMIN_ROOT_URL . 'admincategory/add'),
    array('type' => 'nav_header', 'title' => 'Carts'),
    array('type' => 'nav_link', 'title' => 'List Carts', 'url' => ADMIN_ROOT_URL . 'adminbought/index'),
    array('type' => 'nav_link', 'title' => 'Add Cart', 'url' => ADMIN_ROOT_URL . 'adminbought/add'),
    array('type' => 'nav_header', 'title' => 'User Interested In Book'),
    array('type' => 'nav_link', 'title' => 'List Interested', 'url' => ADMIN_ROOT_URL . 'admininterestedin/index'),
    array('type' => 'nav_link', 'title' => 'Add Interested', 'url' => ADMIN_ROOT_URL . 'admininterestedin/add'),
    array('type' => 'nav_header', 'title' => 'Category of Book'),
    array('type' => 'nav_link', 'title' => 'List Category of Book', 'url' => ADMIN_ROOT_URL . 'adminofcategory/index'),
    array('type' => 'nav_link', 'title' => 'Add Category of Book', 'url' => ADMIN_ROOT_URL . 'adminofcategory/add'),
));
GlobalVar::write('user_gender', array(
    0 => 'female',
    1 => 'male'
));
GlobalVar::write('search_book',array(
    '1'=>'id_book',
    '2'=>'name',
));




