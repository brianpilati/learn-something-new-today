<?php

    require_once(__DIR__ . '/../AutoLoader.php');

    if(ISSET($argv[1]) && $argv[1] === '--buildLiveSite') {
        require_once(__DIR__ . '/../config/config.php');
        DEFINE('IS_TEST', false);
    } else {
        require_once(__DIR__ . '/../../../test/php/config.php');
    }

    class BuildPages {
        public function __construct() {
            $this->run();
        }

        private function run() {
            $pageBuilder = new PageBuilder();
        }
    }

    new BuildPages();
?>
