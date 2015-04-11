<?php

    require_once(__DIR__ . '/../AutoLoader.php');
    require_once(__DIR__ . '/../config/config.php');

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
