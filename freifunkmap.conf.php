<?php
/**
 * Copyright (C) 2007 Gerald Schnabel
 */

/**
 * For installation: 
 * make the PATH_TO_DATABASE writeable for the webserver user
 * call the script with the parameter install, for example: http://localhost/freifunkmap.php?install
 *   you should see "install successful" in your browser
 * 
 */
 
/**
 * Configuration parameters 
 */
define( "GOOGLE_MAPS_KEY"       ,  "ABQIAAAA09xI2Q46-z5rGpiuYrem8hTfoQ4k9cRoM3EqAQ3hmdQlsFIAsRQQrVrH_du6CZ6dt9yavlipSSMZFw");
define( "DEFAULT_START_POSITION",  "52.526039219655445, 13.411388397216797");
define( "DEFAULT_ZOOMLEVEL",       "13");
define( "DEFAULT_UPDATEINTERVALL", "3600");
define( "DEFAULT_MAPTYPE",         "G_NORMAL_MAP");
define( "PATH_TO_DATABASE",        "/tmp/");    // in the install mode, this folder have to be writeable for the webserver user
define( "DATABASE_FILE",           "nodedb");   // this file would be created in install mode

// Availables languages, for every language a special language file should exists
$GLOBALS['_LANG'] = array(
   'de', // german
   'en', // english
   'es'  // spanish
);

// define default language.
$GLOBALS['_DLANG']='en';

// get browser languages
$GLOBALS['HTTP_ACCEPT_LANGUAGE'] = strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"]);

function detectBrowserLanguage() {
   // detect primary language
   foreach( $GLOBALS['_LANG'] as $currentLang) {
      if( strpos( $GLOBALS['HTTP_ACCEPT_LANGUAGE'], $currentLang) === 0) {
         return $currentLang;
      }
   }
   // try to dectect other language
   foreach( $GLOBALS['_LANG'] as $currentLang) {
      if( strpos( $GLOBALS['HTTP_ACCEPT_LANGUAGE'], $currentLang) !== false) {
         return $currentLang;
      }
   }
   // TODO: if necessary get language by user agent
   // if nothing found return default language
   return $GLOBALS['_DLANG'];
}

// TODO: check if the file realy exists
require_once( "freifunkmap.lang.".detectBrowserLanguage().".php");

