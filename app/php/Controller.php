<?php
    include join('/', array(__DIR__, 'AutoLoader.php'));
    #include join('/', array('.', 'test', 'php', 'config.php'));

    lsnt_header( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
    lsnt_header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
    lsnt_header( 'Cache-Control: no-cache, must-revalidate' );
    lsnt_header( 'Pragma: no-cache' ); 

    class Controller {

        public function __construct() {
            $this->setControllerModuleValues();
            $this->setHeader();
        }

        private function removeParams() {
            $payloadPosition = strpos($this->URI, '?');
            if ($payloadPosition) {
                $this->URI = substr($this->URI, 0, $payloadPosition);
            }
        }

        private function findFileDirectory() {
            //REQUEST_METHOD
            $this->file = __DIR__;
            $uriParams = preg_split("/\//", $this->URI);
            $controllerName = ucfirst($uriParams[sizeOf($uriParams)-1]);
            for($index=0; $index<sizeOf($uriParams)-1; $index++) {
                $this->file .= "/{$uriParams[$index]}";
            }

            $this->file .= "/{$controllerName}Controller.php";
        }

        private function setControllerModuleValues() {
            $this->URI = substr($_SERVER['REQUEST_URI'], 1);
            $this->removeParams();
            $this->findFileDirectory();
        }

        private function setHeader() {
            lsnt_header('Content-type: text/html');
        }

        public function invoke() {
            if (file_exists($this->file)) {
                lsnt_header("HTTP/1.0 200 Success");
                include_once($this->file);
            } else {
                lsnt_header("HTTP/1.0 404 Not Found");
            }
        }
    }

    $controller = new Controller();
    $controller->invoke();
?>
