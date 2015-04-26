<?php
    #Information for testing on a local environment 
    //Copy this from config_template.php to config.php

    //SITE
    define('SITE_NAME', 'Learn Something New Today');
    define('CATCH_PHRASE', 'Learn Something New Today');
    define('SITE_TWITTER_HANDLE', '@lsnewtoday');
    define('SITE_TITLE', 'Learn Something New Today');
    define('SITE_URL', 'http://learn-something-new-today');
    define('SOURCE_DIRECTORY', __DIR__ . '/../../src');

    //DB
    define('DB_HOST', '127.0.0.1');
    define('DB_PASSWD', '<local_db_passwd>');
    define('LOGMASK', 1);
    define('DB_USER', 'lsnt');
    define('DB_NAME', 'lsnt');
    define('LOGGING_DEBUG', '/tmp/debug_log.txt');
    define('LOGGING_AUDIT', '/tmp/audit_log.txt');

    //Ads
    define('HEADER_AD', false);
    define('MARQUEE_AD', false);
    define('MAIN_TOP_AD', false);
    define('MAIN_MIDDLE_AD', false);
    define('MAIN_BOTTOM_AD', false);
    define('BOTTOM_LEFT_AD', false);
    define('BOTTOM_CENTER_AD', false);
    define('BOTTOM_RIGHT_AD', false);
    define('LSNT_PROMOTION_ADS', false);

    //Google Analytics
    define('GOOGLE_ANALYTICS', false);
?>
