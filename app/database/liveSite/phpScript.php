<?php

    include join('/', array('..', '..', 'php', 'Autoloader.php'));
    include join('/', array('..', '..', 'php', 'config', 'config.php'));

    buildCategory();
    buildSubCategory();
    buildBrand();

    function buildCategory() {
        $categories = array (
            array (
                'category' => 'Entertainment' 
            ),
            array (
                'category' => 'Toys' 
            )
        );

        $categoryObj = new CategoryModel();

        foreach ($categories as $data) {
            $categoryObj->addCategory($data);
        }

    }

    function buildSubCategory() {
        $subCategories = array (
            array (
                'categoryId' => 1,
                'subCategory' => 'Movies'
            ),
            array (
                'categoryId' => 2,
                'subCategory' => 'Building Blocks'
            )
        );

        $subCategoryObj = new SubCategoryModel();

        foreach ($subCategories as $data) {
            $subCategoryObj->addSubCategory($data);
        }
    }

    function buildBrand() {
        $brands = array (
            array (
                'subCategoryId' => 1,
                'brand' => 'Marvel'
            ),
            array (
                'subCategoryId' => 2,
                'brand' => 'LEGO'
            )
        );

        $brandObj = new BrandModel();

        foreach ($brands as $data) {
            $brandObj->addBrand($data);
        }
    }

?>
