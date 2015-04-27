<?php

    function format_directory($baseDirectory, $directory) {
        return join('/', array($baseDirectory, $directory));
    }

    function lsnt_header($header) {
        if (ISSET($GLOBALS['IS_TEST'])) {
            $GLOBALS['HEADER'] = $header;
        } else {
            header($header);
        }
    }

?>
