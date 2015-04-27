<?php

    include join('/', array('..', '..', 'php', 'Autoloader.php'));
    include join('/', array('..', '..', 'php', 'config', 'config.php'));

    $categories = array (
        'Entertainment',
        'Toys'
    );

    $categoryObj = new CategoryModel();

    foreach ($categories as $category) {
        $data = array (
            'category' => $category
        );

        $categoryObj->addCategory($data);
    }

?>
