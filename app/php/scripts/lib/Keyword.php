<?php 
    class Keyword {
        private $keywords;
        public function __construct($packageId, $itemId) {
            $this->build($packageId, $itemId);
        }

        private function build($packageId, $itemId) {
            $this->keywords = "";
            $keywordObj = new KeywordModel();
            $keywordObj->getKeywordsByPackageAndItemId($packageId, $itemId);
            if($keywordObj->result) {
                while($dbObj = $keywordObj->result->fetch_object()) {
                    $this->keywords .= "{$dbObj->keyword}, ";
                }
            }
            $this->keywords .= CATCH_PHRASE;
        }

        public function getKeywords() {
            return $this->keywords;
        }
    }
?>
