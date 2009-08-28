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
		<? gb_head() ?>
	</head>
	<body>
		<div id="head">
			<h1><?
			$u = gb::url_to('/');
			$c = 0;
			foreach (gb::$title as $s) {
				if ($c++) {
					echo '  →  ';
					$u = rtrim($u, '/').'/'.$s;
				}
				echo '<a href="'.h($u).'">'.h($s).'</a>';
			}
			?></h1>
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
		
		if (gb::$is_page && !gb::$is_404) {
			require '_page.php';
		}
		else {
			?>
			<div id="error404">
				<div class="wrapper">
					<h1>404 Not Found</h1>
					The page <b><?= h(gb::url()->toString(false)) ?></b> does not exist.
				</div>
			</div>
			<?
		}
		?>

	<? gb_footer() ?>
	</body>
</html>
