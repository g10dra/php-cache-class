<?php
include 'cache.class.php';

//parameters list//
$cache_ext  = '.html';//cache file extension
$cache_time = 3600; //in seconds eg: 3600=60*60 means 1 hour cache time
$cache_folder   = 'cache_gen/'; //folder in which you want to save cache
$ignore_urls   = array();//define a array with full url which you want to ignore for generating cache.
$cache_enable=1; //0 for disable caching and 1 for enable caching functionality.
//parameters list//
$cache_obj=new cache($cache_ext,$cache_time,$cache_folder,$ignore_urls,$cache_enable);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Page to Cache</title>
    </head>
        <body>
           <p> para1<p>
           <p> para2 test<p>
           <p> my anything dynamic data from any data source<p>
        </body>
</html>
<?php

if (!is_dir($cache_obj->cache_folder)) { //create a new folder if we need to
    mkdir($cache_obj->cache_folder);
}
if(!$cache_obj->_ignore_status){
    $fp = fopen($cache_obj->_cache_file, 'w');  //open file for writing
    fwrite($fp, ob_get_contents()); //write contents of the output buffer in Cache file
    fclose($fp); //Close file pointer
}
ob_end_flush(); //Flush and turn off output buffering

?>
