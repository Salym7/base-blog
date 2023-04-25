<?php

$fields = ['login' => '', 'password' => '', 'email' => '', 'name' => ''];
$validateErrors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields = extractFields($_POST, ['login', 'password', 'email', 'name']);
    $fields['password'] = password_hash($fields['password'], PASSWORD_BCRYPT);
    $validateErrors = userValidate($fields);
    if (empty($validateErrors)) {
        addUser($fields);
        header('Location: ' . BASE_URL . 'auth/login');
        exit();
    }
}

$pageTitle = 'Regest';
$pageContent = template('auth/v_reg', [
    'fields' => $fields,
    'validateErrors' => $validateErrors
]);
