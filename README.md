# SuperSimplePHPLocalization

Simply include this script and get translations by adding ?lang=fr to the URL!

# INSTRUCTIONS

Please note that en/fr are used as example languages. The following instructions can be applied to any number of languages.

This script defaults to english (en.txt). You can specify your own default language by defining LANG_DEFAULT before including this script.

	<?php define('LANG_DEFAULT', 'fr'); // only necessary if not using EN as default language ?>
	<?php include('locale/lang.php'); // must be included on all pages that need translations ?>

Put the /locale folder (contains lang.php and a .txt language file for each language) at the root of your project.
Include lang.php at the top of all necessary pages: 

	<?php include('locale/lang.php'); ?>

fr.txt should be UTF8 encoded with the following format:

	{
  		"lang":"fr-ca",
  		"No":"Non",
  		"Yes":"Oui",
  		"or":"ou"
	}

This will be case sensitive, so cases must match exactly in order to return the translated phrase.

Create an en.txt file (if that is default language) with just:

	{
		"lang":"en-ca" 
	} 


There is no need for string translations in the default language.
If a translation is not found it returns the original phrase.
Default language file is useful when you want to use a key to retrieve information, e.g: alt_lang can be defined in EN to return 'fr' and FR to return 'en'.
You could also use a key for translations to avoid long paragraphs, e.g: 'paragraph_1' in the code but a full paragraph in each translation file.

# SWITCH LANGUAGES

Toggle the language by adding ?lang=fr to the URL.
Make use of .htaccess rewrite rules in order to make URL's prettier.
example.com/?page=about&lang=en --> example.com/about
example.com/?page=about&lang=fr --> example.com/a-propos

# USING THE TRANSLATIONS

Replace all your text with the following 

	<?php echo __("Some text here"); ?>

# NOTES

Works best by fragmenting your text into smaller chunks. Avoid HTML tags inside of translations.
Ensure to escape interfering characters with a backslash (\) such as quotes (") and apostrophes (') when needed.
Strings must COMPLETELY match in order to return a translation. 

For example:

	<?php echo __("Please use \"quotation marks\" properly"); ?> 

The string above must be a copy/paste replica in order to return a translation

	{
		"Please use \"quotation marks\" properly":"S'il vous plaît utiliser les \"guillemets\" correctement" 
	} 
