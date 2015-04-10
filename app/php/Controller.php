<?php
    header( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
    header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
    header( 'Cache-Control: no-cache, must-revalidate' );
    header( 'Pragma: no-cache' ); 

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

        private function findParams() {
            //REQUEST_METHOD
            if ($this->URI === 'index.html' || empty($this->URI)) {
                $this->file = '../src/index.html';
            } else {
                $this->file = "controllers/DisplayPage.php";
                $uriParams = preg_split("/\//", $this->URI);
                $method = $_SERVER['REQUEST_METHOD'];
                if ($method === "GET") {
                    $this->domain = (ISSET($uriParams[0]) ? $uriParams[0] : NULL);
                    $this->subject = (ISSET($uriParams[1]) ? $uriParams[1] : NULL);
                    $this->group = (ISSET($uriParams[2]) ? $uriParams[2] : NULL);
                    $this->item = (ISSET($uriParams[3]) ? $uriParams[3] : NULL);
                }
            }
        }

        private function setControllerModuleValues() {
            $this->URI = substr($_SERVER['REQUEST_URI'], 1);
            $this->removeParams();
            $this->findParams();
        }

        private function setHeader() {
            header('Content-type: text/html');
        }

        public function invoke() {
            if (file_exists($this->file)) {
                header("HTTP/1.0 200 Success");
                include_once($this->file);
            } else {
                header("HTTP/1.0 404 Not Found");
            }
        }
    }

    $controller = new Controller();
    $controller->invoke();
?>
