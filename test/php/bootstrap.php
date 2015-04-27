<?php

function get_ob() {
    $text = ob_get_clean();
    ob_start();
    return $text;
}

function test_http_response_code() {
    $responses = preg_split("/\s/", $GLOBALS['HEADER']);
    return $responses[1];
}

if (!file_exists('./vendor/autoload.php')) {
    echo "\n\n";
    die(<<<'EOT'
You must set up the project dependencies, run the following commands:

wget http://getcomposer.org/composer.phar
php composer.phar install

EOT
    );
}

include join('/', array('.', 'app', 'php',  'AutoLoader.php'));
include join('/', array('.', 'test', 'php', 'config.php'));

chdir(__DIR__ . '/../../app/php');
?>
