<?php

if ($user === null) {
    header('Location: ' . BASE_URL . 'auth/login');
    exit();
}

$id = (int)URL_PARAMS['id'];

$res = articleRemove($id);

$pageTitle = 'Delete';
$pageContent = template('article/v_delete', [
    'res' => $res
]);
