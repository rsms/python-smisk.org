<?
# Site title and description
gb::$site_title = 'smisk';
#gb::$site_description = 'Ramblings by My Name';

# Shared secret used for hook triggering, etc.
# Must contain only shell-safe characters (a-zA-Z0-9_-. and so on) and be at
# least 62 bytes long.
gb::$secret = '2ft2x8pmlxkaqpmrvb8uckwxzbnk4bmio5427lbvlifik6jokgvkk260yknabtrzff';

# If you have applied server rewrite rules, routing requests to index.php, you
# probably want to set index_url to "" (the empty string). May differ 
# depending on your rewrite rules.
#gb::$index_prefix = '';
# Note that if you use lighttpd, read this: "Configuring PHP"
# http://redmine.lighttpd.net/projects/lighttpd/wiki/Docs:ModFastCGI#FastCGI-and-Programming-Languages
?>