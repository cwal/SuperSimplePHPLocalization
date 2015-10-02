# SuperSimplePHPLocalization

Simply include this script and get translations by adding ?lang=fr to the URL!

# INSTRUCTIONS

Please note that en/fr are used as example languages. The following instructions can be applied to any number of languages.

Create a /locale folder with lang.php inside and a .txt language file for each language.
Include lang.php on all necessary pages: 

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

# SWITCH LANGUAGES

Toggle the language by adding ?lang=fr to the URL

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
