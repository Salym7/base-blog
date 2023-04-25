<?php

if ($user === null) {
	header('Location: ' . BASE_URL . 'auth/login');
	exit();
}

$fields = ['title' => '', 'content' => '', 'id_category' => ''];

$id = (int)URL_PARAMS['id'];

$article = articleGet($id);
$post = $article ?? null;
$hasPost = $post !== null;

if (!$hasPost) {
	exit('Error!');
}

$isSend = false;
$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$fields = extractFields($_POST, ['title', 'content', 'id_category']);
	$validateErrors = articleValidate($fields);

	if (empty($validateErrors)) {
		articleEdit($fields, $id);
		$isSend = true;
		header('Location: /');
		exit();
	}
} else {
	$validateErrors = [];
	$fields['title'] = $post['title'];
	$fields['content'] = $post['content'];
	$fields['id_category'] = $post['id_category'];
}
$categories = getCategory();

$pageTitle = 'Edit article';
$pageContent = template('article/v_edit', [
	'categories' => $categories,
	'isSend' => $isSend,
	'fields' => $fields,
	'validateErrors' => $validateErrors
]);
