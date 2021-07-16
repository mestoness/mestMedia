<?php
session_start();
ob_start();



define("captchaKey", "6LfXFTwbAAAAACiUJSQE7HwdASz3cmsiy_PIrs2o");
define("APP_DIR", "App");
define("BASE_PROJECT", ltrim(rtrim($_SERVER["PHP_SELF"], "index.php"), "/"));
define("SITE_URL", $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . "/" . BASE_PROJECT);


date_default_timezone_set('Europe/Istanbul');


require APP_DIR . "/init.php";



Route::get("search", "userSearch@index", ["adminAuth"]);
Route::get("profile/" . $_reg_url, "profile@index", ["adminAuth"]);
Route::get("/", "index@index", ["adminAuth"]);
Route::get("p/" . $_reg_url . "/" . $_reg_number, "postC@index", ["adminAuth"]);
Route::get("login", "authUser@login", ["adminNotAuth"]);
Route::get("logout", function () {
	session_destroy();
	header("location:./");
	die(0);
});



Route::post("profile/" . $_reg_url, "profile@post", ["adminAuth"]);
Route::post("add-post", "index@postAdd", ["adminAuth"]);
Route::post("ajaxlimitpost", "index@ajaxLimit", ["adminAuth"]);
Route::post("ajaxlimitcomment", "postC@ajaxComment", ["adminAuth"]);
Route::post("ajaxlimitpostprofile", "postC@ajaxProfilePost", ["adminAuth"]);
Route::post("p/" . $_reg_url . "/" . $_reg_number, "postC@post", ["adminAuth"]);
Route::post("login", "authUser@loginPost", ["adminNotAuth"]);


Route::error(function () {
	header("location:" . site_URL());
	die();
});
