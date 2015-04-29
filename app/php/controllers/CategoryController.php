<?php

class CategoryController {
    private $categoryObj;

    public function __construct() {
        $this->categoryObj = new CategoryModel();
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
        $categoryJson = array();
        $this->categoryObj->getAll();
        if ($this->categoryObj->result) {
            while($dbObj = $this->categoryObj->result->fetch_object()) {
                array_push (
                    $categoryJson,
                    array (
                        'categoryId' => $dbObj->categoryId,
                        'category' => $dbObj->category
                    )
                );
            }
        }

        lsnt_header("HTTP/1.0 200 Success");
        echo json_encode ($categoryJson);
    }

    private function post() {
        $payload = json_decode(file_get_contents("php://input"), true);
        if (sizeof($payload) == 0) {
            $payload = $_POST;
        }
        $response = $this->categoryObj->addCategory($payload);

        if (preg_match ( '/\d+/', $response )) {
            lsnt_header("HTTP/1.0 201 Created");
        } else {
            lsnt_header("HTTP/1.0 400 Bad Request");
        }
    }
}

new CategoryController();

?>
