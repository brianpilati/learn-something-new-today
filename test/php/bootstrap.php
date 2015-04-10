<?php

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
//include join('/', array('.', 'config', 'config.php'));


    chdir(__DIR__ . '/../../app/php');
?>
