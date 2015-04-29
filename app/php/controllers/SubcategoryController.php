<?php

class SubcategoryController {
    private $subCategoryObj;

    public function __construct() {
        $this->subCategoryObj = new SubcategoryModel();
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
        $subCategoryJson = array();
        $this->subCategoryObj->getAll();
        if ($this->subCategoryObj->result) {
            while($dbObj = $this->subCategoryObj->result->fetch_object()) {
                array_push (
                    $subCategoryJson,
                    array (
                        'subCategoryId' => $dbObj->subCategoryId,
                        'subCategory' => $dbObj->subCategory
                        'categoryId' => $dbObj->categoryId
                    )
                );
            }
        }

        lsnt_header("HTTP/1.0 200 Success");
        echo json_encode ($subCategoryJson);
    }

    private function post() {
        $payload = json_decode(file_get_contents("php://input"), true);
        if (sizeof($payload) == 0) {
            $payload = $_POST;
        }
        $response = $this->subCategoryObj->addCategory($payload);

        if (preg_match ( '/\d+/', $response )) {
            lsnt_header("HTTP/1.0 201 Created");
        } else {
            lsnt_header("HTTP/1.0 400 Bad Request");
        }
    }
}

new SubcategoryController();

?>
