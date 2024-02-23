<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define('SITENAME', "CELRI Portal - CDS");
define('SLOGAN', "");
define('LOGO', "logo-startup-6.png");
define('SITE_REGISTRATION', 0);
define('EMAIL_VERIFICATION', 0);
define('SEND_REGISTRATION_MAIL', 0);

define('OPENAI_KEY','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');
define('USE_RECAPTCHA', 0);

define('ONE_WEEK', 604800); // 7 * 24 * 60 * 60

define('DANG_BAO_TRI', 0);



define('WORKSHOP_DANG_DANG_KY', 1);
define('WORKSHOP_DA_MO', 2);
define('WORKSHOP_DA_HUY', 3);
define('WORKSHOP_SO_LUONG_DANG_KY_TOI_THIEU', 6);

define('YEU_CAU_HO_TRO_CHO_XU_LY', 1);

define('YEU_CAU_HO_TRO_DA_XU_LY', 2);

//define('ROLE_GVHD', 1);
//define('ROLE_SVTH', 2);


define('BCT_GROUP_ID', 24);
define('TEACHER_GROUP_ID', 23);
//define('REGISTERED_GROUP_ID', 22);

/* Office 365 Details knm online */
define('OAUTH_APP_ID', '5535284d-f8f5-40d9-86a2-70127786040b');
define('OAUTH_APP_PASSWORD', 'Lszyk-.eHjtXj9sW4o~qZak45_TGf~ZBOM');
define('OAUTH_REDIRECT_URI', 'http://cpms.tvu.edu.local/callback');
define('OAUTH_AUTHORITY', 'https://login.microsoftonline.com/common');
define("OAUTH_AUTHORIZE_ENDPOINT", '/oauth2/v2.0/authorize');

define("OAUTH_TOKEN_ENDPOINT", '/oauth2/v2.0/token');
define("OAUTH_SCOPES", 'openid profile offline_access user.read mailboxsettings.read calendars.readwrite');


//Cache configuration 
Cache::config('hour', array(
    'engine' => 'File',
    'duration' => '+1 hours',
    'path' => CACHE,
    'prefix' => 'cake_short_'
));

Cache::config('week', array(
    'engine' => 'File',
    'duration' => '+1 week',
    'probability' => 100,
    'path' => CACHE . 'long' . DS,
));