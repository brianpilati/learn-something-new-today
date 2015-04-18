<?php
    #Information for testing on a local environment 
    //Copy this from config_template.php to config.php
    define('SITE_URL', 'http://learn-something-new-today');
    define('DB_HOST', '127.0.0.1');
    define('DB_PASSWD', '<local_db_passwd>');
    define('LOGMASK', 1);
    define('DB_USER', 'lsnt');
    define('DB_NAME', 'lsnt');
    define('LOGGING_DEBUG', '/tmp/debug_log.txt');
    define('LOGGING_AUDIT', '/tmp/audit_log.txt');
?>
