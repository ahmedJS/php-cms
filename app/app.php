<?php
namespace CMSApp;

use CMSApp\src\CMS;

require_once __DIR__ . "/../vendor/autoload.php";


// convert argv into string and remove the path
$command  = array_filter($argv,function( $v , $k ){
    return ($k != 0) ? $v : null ;
},ARRAY_FILTER_USE_BOTH);
$command = implode(" ",$command);


$CMSApp = new CMS;

$CMSApp->performCommand($command);

// here the mainfile that accepts openning from terminal to run