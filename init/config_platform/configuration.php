<?php
class JConfig {
	public $offline = '0';
	public $offline_message = 'Ce site est en maintenance.<br /> Merci de revenir ultérieurement.';
	public $display_offline_message = '1';
	public $offline_image = '';
	public $sitename = 'JoomlaTest';
	public $editor = 'tinymce';
	public $captcha = '0';
	public $list_limit = '20';
	public $access = '1';
	public $debug = '0';
	public $debug_lang = '0';
	public $dbtype = 'pdomysql';
	public $host = 'mysql';
	public $user = '';
	public $password = '';
	public $db = '';
	public $dbprefix = 'joo_';
	public $live_site = '';
	public $secret = 'Ow0ORVtuiXXi7cgo';
	public $gzip = '0';
	public $error_reporting = 'default';
	public $helpurl = 'https://help.joomla.org/proxy/index.php?keyref=Help{major}{minor}:{keyref}';
	public $ftp_host = '';
	public $ftp_port = '';
	public $ftp_user = '';
	public $ftp_pass = '';
	public $ftp_root = '';
	public $ftp_enable = '0';
	public $offset = 'UTC';
	public $mailonline = '1';
	public $mailer = 'mail';
	public $mailfrom = 'test@test.com';
	public $fromname = 'JoomlaTest';
	public $sendmail = '/usr/sbin/sendmail';
	public $smtpauth = '0';
	public $smtpuser = '';
	public $smtppass = '';
	public $smtphost = 'localhost';
	public $smtpsecure = 'none';
	public $smtpport = '25';
	public $caching = '0';
	public $cache_handler = 'file';
	public $cachetime = '15';
	public $cache_platformprefix = '0';
	public $MetaDesc = '';
	public $MetaKeys = '';
	public $MetaTitle = '1';
	public $MetaAuthor = '1';
	public $MetaVersion = '0';
	public $robots = '';
	public $sef = '1';
	public $sef_rewrite = '1';
	public $sef_suffix = '0';
	public $unicodeslugs = '0';
	public $feed_limit = '10';
	public $feed_email = 'none';
	public $log_path = '/app/administrator/logs';
	public $tmp_path = '/app/tmp';
	public $lifetime = '15';
	public $session_handler = 'database';


	public function __construct() {
		if (empty($_ENV['PLATFORM_RELATIONSHIPS'])) {
			return;	
		}

		// This is where we get the relationships of our application dynamically
    		//from Platform.sh
		$relationships = json_decode(base64_decode($_ENV['PLATFORM_RELATIONSHIPS']), TRUE);
		// We are using the first relationship called "database" found in your
		// relationships. Note that you can call this relationship as you wish
		// in you .platform.app.yaml file, but 'database' is a good name.
		$this->db = $relationships['database'][0]['path'];
		$this->user = $relationships['database'][0]['username'];
		$this->password = $relationships['database'][0]['password'];
		$this->host = $relationships['database'][0]['host'];
	}
}
