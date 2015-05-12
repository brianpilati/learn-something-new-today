<?php

    class CTAPackages {
        private $packages;

        public function __construct($packageId) {
            $this->buildPackages($packageId);
        }

        private function buildPackages($packageId) {
            $this->packages = array();
            $packagesObj = new PackageModel();
            $packagesObj->getMorePackages($packageId);
            if($packagesObj->result) {
                while($packageObj = $packagesObj->result->fetch_object()) {
                    array_push (
                        $this->packages,
                        new Package($packageObj)
                    );
                }
            }
        }

        public function getPackages() {
            return $this->packages;
        }
    }
?>
