<?php

$id = (int)URL_PARAMS['id'];

$normId = ($strId === (string)$id);

$post = articleGet($id);
$hasPost = $post !== null;
$isAdmin = $post['id_user'] === $user['id_user'];

$messages = messagesAll($id);
$fields = ['id_article' => '', 'name' => '', 'content' => ''];
$validateErrors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$fields = extractFields($_POST, ['name', 'content']);
	$fields['id_article'] = $strId;

	$validateErrors = messagesValidate($fields);

	if (empty($validateErrors)) {
		messagesAdd($fields);
		header("Location: /index.php?c=article&id=$id");
	}
}

$pageTitle = 'One article';
$pageContent = template('article/v_article', [
	'messages' => $messages,
	'hasPost' => $hasPost,
	'post' => $post,
	'fields' => $fields,
	'validateErrors' => $validateErrors,
	'isAdmin' => $isAdmin
]);
