<?php
function log_error( $num, $str, $file, $line, $context = null )
{
	log_exception( new ErrorException( $str, 0, $num, $file, $line ) );
}



function log_exception( Exception $e )
{
	global $config;
	if ( $config["show_error"] == true )
	{
		print "<table style='width: 800px; display: inline-block;'>";
		print "<tr style='background-color:rgb(230,230,230);'><th colspan=\"2\"><span style=\"color:#b22222\">Exception Error : {$e->getMessage()}</span></th></tr>";
		print "<tr style='background-color:rgb(230,230,230);'><th style='width: 80px;'>Type</th><td>" . get_class( $e ) . "</td></tr>";
		print "<tr style='background-color:rgb(240,240,240);'><th>Message</th><td>{$e->getMessage()}</td></tr>";
		print "<tr style='background-color:rgb(230,230,230);'><th>File</th><td>{$e->getFile()}</td></tr>";
		print "<tr style='background-color:rgb(240,240,240);'><th>Line</th><td>{$e->getLine()}</td></tr>";
		print "</table><hr>";
	}
}

function check_for_fatal()
{
	$error = error_get_last();
	if ( $error["type"] == E_ERROR ){
		log_error( $error["type"], $error["message"], $error["file"], $error["line"] );
	}
}

global $config;

if($config['show_error']){
	if($config['show_error_level'] == '2'){
		register_shutdown_function( "check_for_fatal" );
		set_error_handler( "log_error" );
		set_exception_handler( "log_exception" );
		ini_set( "display_errors", "off" );
		error_reporting( E_ALL );
	}else{
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
	}
}

if(isset($_SESSION['lang'])){
	$lang = $_SESSION['lang'];
	$_COOKIE["lang"] = $lang;
}else if(isset($_COOKIE['lang'])){
	$lang = $_COOKIE['lang'];
}else{
	$lang = 'th';
}
require(APP_DIR .'language/lang.'.$lang.'.php');
?>