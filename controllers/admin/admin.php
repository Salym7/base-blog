<?php

if ($user === null) {
    header('Location: ' . BASE_URL . 'auth/login');
    exit();
}

if ($user === null) {
    header('Location ' . BASE_URL . 'auth/login');
    exit();
}

$categories = getCategory();

$fields = ['title' => '', 'description' => '', 'url' => ''];
$validateErrors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fields = extractFields($_POST, ['title', 'description', 'url']);
    $validateErrors = categoryValidate($fields);

    if (empty($validateErrors)) {
        $res = addCategory($fields);
        header('Location:' . BASE_URL . 'admin');
        exit();
    }
}


$pageTitle = 'Edit article';
$pageContent = template('admin/v_admin', [
    'categories' => $categories,
    'fields' => $fields,
    'validateErrors' => $validateErrors
]);
