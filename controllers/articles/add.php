<?php

if ($user === null) {
	header('Location: ' . BASE_URL . 'auth/login');
	exit();
}

$fields = ['title' => '', 'content' => '', 'id_category' => ''];
$validateErrors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$fields = extractFields($_POST, ['title', 'content', 'id_category']);
	$fields['id_user'] = $user['id_user'];
	$validateErrors = articleValidate($fields);
	if (empty($validateErrors)) {
		articleAdd($fields);
		header('Location: index.php');
		exit();
	}
}

$categories = getCategory();

$left = template('article/v_add', [
	'fields' => $fields,
	'validateErrors' => $validateErrors,
	'categories' => $categories
]);
$content = template('contacts/v_menu');

$pageTitle = 'Add article';
$pageContent = template('base/v_col_for_add', [
	'left' => $left,
	'content' => $content,
	'title' => 'Contacts',
]);
