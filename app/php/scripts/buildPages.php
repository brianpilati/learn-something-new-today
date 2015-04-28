<?php

    require_once(__DIR__ . '/../AutoLoader.php');

    if(ISSET($argv[1]) && $argv[1] === '--buildLiveSite') {
        require_once(__DIR__ . '/../config/config.php');
    } else if(ISSET($argv[1]) && $argv[1] === '--buildPreviewSite') {
        $GLOBALS['IS_TEST'] = true;
        require_once(__DIR__ . '/../config/config_preview.php');
    } else {
        require_once(__DIR__ . '/../../../test/php/config.php');
    }

    class BuildPages {
        public function __construct() {
            print "\n\nStarted Building Pages\n\n";
            $this->run();
            print "\n\nFinished Building Pages\n\n";
        }

        private function run() {
            $pageBuilder = new PageBuilder();
        }
    }

    new BuildPages();
?>
