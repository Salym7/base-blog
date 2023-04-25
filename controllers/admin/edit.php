<?php

if ($user === null) {
    header('Location: ' . BASE_URL . 'auth/login');
    exit();
}

$id = (int)URL_PARAMS['id'];
$category = getCategoryForId($id);
$validateErrors = [];

$validateErrors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fields = extractFields($_POST, ['title', 'description', 'url']);
    $validateErrors = categoryValidate($fields);

    if (empty($validateErrors)) {
        editCategory($fields, $id);
        header('Location:' . BASE_URL . 'admin');
        exit();
    }
}


$pageTitle = 'Edit article';
$pageContent = template('admin/v_edit', [
    'category' => $category,
    'validateErrors' => $validateErrors
]);
