<?php

function messagesAll(int $id): array
{
	$sql = "SELECT * FROM messages WHERE messages.id_article = $id ORDER BY dt_add DESC";
	$query = dbQuery($sql);
	return $query->fetchAll();
}


function messagesAdd(array $fields): bool
{
	$sql = "INSERT INTO `messages` (`id_messages`, `id_article`, `name`, `content`, `dt_add`) VALUES (NULL, :id_article, :name, :content, CURRENT_TIMESTAMP)";
	dbQuery($sql, $fields);
	return true;
}
function messagesValidate(array &$fields): array
{
	$errors = [];
	$textLen = mb_strlen($fields['content'], 'UTF-8');

	if (mb_strlen($fields['name'], 'UTF-8') < 2) {
		$errors[] = 'Name не короче 2 символов!';
	}

	if ($textLen < 10 || $textLen > 140) {
		$errors[] = 'content от 10 до 140 символов!';
	}

	$fields['name'] = htmlspecialchars($fields['name']);
	$fields['content'] = htmlspecialchars($fields['content']);

	return $errors;
}
