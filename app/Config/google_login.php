<?php
/* Google App Details knm online */
define('GOOGLE_APP_NAME', 'trungtamhtptdayvahoc');
define('GOOGLE_OAUTH_CLIENT_ID', '940830533905-9gnc8ikvo7vvvlk84p38nf1pj0mit11a.apps.googleusercontent.com');
define('GOOGLE_OAUTH_CLIENT_SECRET', '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');
define('GOOGLE_OAUTH_REDIRECT_URI', BASE_URL . 'googleLoginCalback');
define("GOOGLE_SITE_NAME", 'https://celri.tvu.edu.vn');
/*******Google ******/
require_once '../Vendor/Google/src/config.php';
require_once '../Vendor/Google/src/Google_Client.php';
require_once '../Vendor/Google/src/contrib/Google_PlusService.php';
require_once '../Vendor/Google/src/contrib/Google_Oauth2Service.php';
