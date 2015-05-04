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
            ),
            array (
                'category' => 'Fashion' 
            ),
            array (
                'category' => 'Food' 
            ),
            array (
                'category' => 'Gifts' 
            ),
            array (
                'category' => 'Travel' 
            ),
            array (
                'category' => 'Holidays' 
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
            ),
            array (
                'categoryId' => 3,
                'subCategory' => 'Jewelry'
            ),
            array (
                'categoryId' => 3,
                'subCategory' => 'Clothing'
            ),
            array (
                'categoryId' => 3,
                'subCategory' => 'Perfume'
            ),
            array (
                'categoryId' => 4,
                'subCategory' => 'Chocolate'
            ),
            array (
                'categoryId' => 4,
                'subCategory' => 'Fruit Bouquet'
            ),
            array (
                'categoryId' => 4,
                'subCategory' => 'Dining'
            ),
            array (
                'categoryId' => 4,
                'subCategory' => 'Breakfast in Bed'
            ),
            array (
                'categoryId' => 5,
                'subCategory' => 'Card'
            ),
            array (
                'categoryId' => 5,
                'subCategory' => 'Flowers'
            ),
            array (
                'categoryId' => 5,
                'subCategory' => 'Manicure and Pedicure'
            ),
            array (
                'categoryId' => 5,
                'subCategory' => 'Gift Card'
            ),
            array (
                'categoryId' => 5,
                'subCategory' => 'Books'
            ),
            array (
                'categoryId' => 5,
                'subCategory' => 'Spa'
            ),
            array (
                'categoryId' => 6,
                'subCategory' => 'Weekend Getaway'
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
            ),
            array (
                'subCategoryId' => 3,
                'brand' => 'Generic'
            ),
            array (
                'subCategoryId' => 4,
                'brand' => 'Generic'
            ),
            array (
                'subCategoryId' => 5,
                'brand' => 'Generic'
            ),
            array (
                'subCategoryId' => 6,
                'brand' => 'Generic'
            ),
            array (
                'subCategoryId' => 7,
                'brand' => 'Generic'
            ),
            array (
                'subCategoryId' => 8,
                'brand' => 'Generic'
            ),
            array (
                'subCategoryId' => 9,
                'brand' => 'Generic'
            ),
            array (
                'subCategoryId' => 10,
                'brand' => "Mother\'s Day Card"
            ),
            array (
                'subCategoryId' => 11,
                'brand' => 'Generic'
            ),
            array (
                'subCategoryId' => 12,
                'brand' => 'Generic'
            ),
            array (
                'subCategoryId' => 13,
                'brand' => 'Generic'
            ),
            array (
                'subCategoryId' => 14,
                'brand' => 'Generic'
            ),
            array (
                'subCategoryId' => 15,
                'brand' => 'Generic'
            ),
            array (
                'subCategoryId' => 16,
                'brand' => 'Generic'
            )
        );

        $brandObj = new BrandModel();

        foreach ($brands as $data) {
            $brandObj->addBrand($data);
        }
    }

?>
