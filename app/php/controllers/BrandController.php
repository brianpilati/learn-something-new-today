<?php

class BrandController {
    private $brandObj;

    public function __construct() {
        $this->brandObj = new BrandModel();
        $this->determineRequestMethod();
    }

    private function determineRequestMethod() {
        $requestMethod = ISSET($_SERVER['REQUEST_METHOD']) 
            ? $_SERVER['REQUEST_METHOD']
            : 'error';

        if ($requestMethod == "GET") {
            $this->get();
        } else if ($requestMethod == "POST") {
            $this->post();
        } else {
            lsnt_header("HTTP/1.0 405 Method Not Allowed");
        }
    }

    private function get() {
        $brandJson = array();
        $this->brandObj->getAll();
        if ($this->brandObj->result) {
            while($dbObj = $this->brandObj->result->fetch_object()) {
                array_push (
                    $brandJson,
                    array (
                        'brandId' => $dbObj->brandId,
                        'brand' => $dbObj->brand
                        'subCategoryId' => $dbObj->subCategoryId
                    )
                );
            }
        }

        lsnt_header("HTTP/1.0 200 Success");
        echo json_encode ($brandJson);
    }

    private function post() {
        $payload = json_decode(file_get_contents("php://input"), true);
        if (sizeof($payload) == 0) {
            $payload = $_POST;
        }
        $response = $this->brandObj->addBrand($payload);

        if (preg_match ( '/\d+/', $response )) {
            lsnt_header("HTTP/1.0 201 Created");
        } else {
            lsnt_header("HTTP/1.0 400 Bad Request");
        }
    }
}

new BrandController();

?>
