<?
# Site title and description
gb::$site_title = 'smisk';

# Private secret
gb::$secret = trim(file_get_contents(dirname(__FILE__).'/secret'));

# Index prefix -- rewrite rules only engaged live
if ($_SERVER['SERVER_NAME'] === 'python-smisk.org')
	gb::$index_prefix = '';
?>
