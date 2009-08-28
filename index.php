<?
$gb_handle_request = true;
require 'gitblog/gitblog.php';

class smisk {
	static public $stable_version = '1.1.6';
	static public $main_repo_url = 'git://github.com/rsms/smisk.git';
	static public $pgp_key = '431B61D0';
}

# this overrides some or all values if smisk::
GBPage::find('config')->body();

# / defaults to about page
if ($gb_request_uri === '') {
	gb::$is_page = true;
	gb::$is_posts = false;
	$gb_request_uri = 'about';
	$post = GBPage::find('about');
}

function selected($startswith) {
	global $gb_request_uri;
	if (strpos($gb_request_uri, $startswith) === 0)
		return 'class="selected"';
	return '';
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=2.0; minimum-scale=1.0; user-scalable=1;" />
    <link rel="stylesheet" media="screen" href="<?= gb::$site_url ?>res/screen.css" type="text/css" />
    <link rel="stylesheet" media="only screen and (max-device-width: 480px)" href="<?= gb::$site_url ?>res/iphone.css" type="text/css" />
    <link rel="icon" href="<?= gb::$site_url ?>res/favicon.png" type="image/png"/>
    <link rel="home" href="<?= gb::$site_url ?>" />
    <link rel="alternate" title="Changes (commits)" type="application/atom+xml" href="http://github.com/feeds/rsms/commits/smisk/" />
    <link rel="alternate" title="Announcements" type="application/rss+xml" href="http://groups.google.com/group/smisk-announce/feed/rss_v2_0_msgs.xml" />
    <link rel="alternate" title="Discussions" type="application/rss+xml" href="http://groups.google.com/group/smisk-discuss/feed/rss_v2_0_msgs.xml" />
    <title><?= gb_title() ?></title>
  </head>
  <body>
    <div id="head">
      <h1><?= gb_title() ?></h1>
    </div>
    <div id="menu">
      <ul>
        <li><a href="<?= gb::$site_url ?>" <?= selected('about') ?>
          title="An overview of Smisk, list of key features and mailing lists">about</a></li>
        <li><a href="<?= gb::url_to('/examples') ?>" <?= selected('examples') ?>
          title="Introduction to Smisk by example">examples</a></li>
        <li><a href="<?= gb::url_to('/docs') ?>" <?= selected('docs') ?>
          title="Documentation of the Python API, the C API as well as general usage and guidelines">docs</a></li>
        <li><a href="<?= gb::url_to('/downloads') ?>" <?= selected('downloads') ?>
          title="How and where to download Smisk">downloads</a></li>
        <li><a href="http://github.com/rsms/smisk/issues"
          title="List of all the horrible bugs... or wait a minute... no bugs?!">issues</a></li>
        <li><a href="http://github.com/rsms/smisk/tree/master"
          title="The master repository at GitHub, including all source code and information about the current development process">code</a></li>
      </ul>
    </div>
		<?
		# regular gitblog logic:
		if (gb::$is_404 || gb::$is_post || gb::$is_posts || gb::$is_tags || gb::$is_categories) {
			?>
			<div id="error404">
				<div class="wrapper">
					<h1>404 Not Found</h1>
					The page <b><?= h(gb::url()->toString(false)) ?></b> does not exist.
				</div>
			</div>
			<?
		}
		elseif (gb::$is_page) {
			require '_page.php';
		}
		/*elseif (gb::$is_post) {
			require '_post.php';
		}
		elseif (gb::$is_posts || gb::$is_tags || gb::$is_categories) {
			require gb::$theme_dir.'/posts.php';
		}*/
		
		?>
<? if ($_SERVER['SERVER_NAME'] === 'python-smisk.org'): ?>
    <script type="text/javascript">
      var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
      document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script><script type="text/javascript">
      try {
      var pageTracker = _gat._getTracker("UA-7185897-1");
      pageTracker._trackPageview();
      } catch(err) {}
    </script>
<? endif ?>
  </body>
</html>