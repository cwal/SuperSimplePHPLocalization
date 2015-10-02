<?php

/* --------------------------------------------------------------------

  Super Simple PHP Localization. 
  https://github.com/cwal/SuperSimplePHPLocalization

  @author	Christopher Waldau <http://chris.waldau.ca>

  Copyright (c) Christopher Waldau <chris@waldau.ca> All rights reserved.
  
  Licensed under the MIT license
  http://opensource.org/licenses/MIT
  
  --------------------------------------------------------------------- */

/*
 * Create a /locale folder with lang.php inside and a .txt language file for each language.
 * Include this script on all necessary pages: include('locale/lang.php');
 * fr.txt should be UTF8 encoded with the following format:
 * {
 *   "lang":"fr-ca",
 *   "No":"Non",
 *   "Yes":"Oui",
 *   "or":"ou"
 * }
 * This will be case sensitive, so cases must match to return the translated phrase.
 * Create an en.txt file (if that is default language) with just:
 * {
 * 	"lang":"en-ca" 
 * } 
 * No need for string translations in default language.
 * If a translation is not found it returns the original phrase.
 * Define language by adding ?lang=fr to the URL
 * Use by calling __('Some text here');
 */


/*
 * Define the url path for the resources
 * file_get_contents requires full path so this finds the current directory
 * and is the reason for lang.php being being in the same folder as the translation files.
 * Otherwise INCLUDE_PATH can be defined manually and lang.php placed anywhere.
 */
defined('INCLUDE_PATH') or define('INCLUDE_PATH', dirname(__FILE__) . '/');

/*
 * Define the language
 * Checks the URL for user defined language
 * Otherwise checks for manually defined language and finally defaults to english
 */
if(isset($_GET['lang']))
	define('LANGUAGE', $_GET['lang']);
else
	defined('LANGUAGE') or define('LANGUAGE', 'en');

/*
 * Load the proper language file and return the translated phrase
 *
 * The language file is JSON encoded and returns an associative array (must be UTF8 encoded)
 *
 * @param string $phrase The phrase that needs to be translated
 * @return string The translated string
 */
function __($phrase) {
    /* Static keyword is used to ensure the file is loaded only once */
    static $translations = NULL;
    /* If no instance of $translations has occured load the language file */
    if (is_null($translations)) {
        $lang_file = INCLUDE_PATH . LANGUAGE . '.txt';
        if (!file_exists($lang_file)) {
            $lang_file = INCLUDE_PATH . 'en.txt';
        }
        $lang_file_content = file_get_contents($lang_file);
        /* Load the language file as a JSON object and transform it into an associative array */
        $translations = json_decode($lang_file_content, true);
    }
	/* Check if the $phrase exists in the array, otherwise return just $phrase */
	if(array_key_exists($phrase, $translations))
    	return $translations[$phrase];
	else
		return $phrase;
}
?>
