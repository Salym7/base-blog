<?php

function articlesAll(): array
{
	$sql = "SELECT * FROM articles ORDER BY dt_add DESC";
	$query = dbQuery($sql);
	return $query->fetchAll();
}

function articlesAllForCatTitle(string $title): array
{
	$sql = "SELECT articles.*, categories.title AS cat_title FROM articles JOIN categories using(id_category) WHERE categories.title = '$title' ORDER BY dt_add DESC";
	$query = dbQuery($sql);
	return $query->fetchAll();
}



function articleGet(int $id): array
{
	$sql = "SELECT * FROM articles WHERE id_article = $id";
	$query = dbQuery($sql);
	return $query->fetch();
}

function articleRemove(int $id): bool
{
	$sql = "DELETE FROM articles WHERE articles.id_article = $id";
	dbQuery($sql);
	return true;
}


function articleAdd(array $fields): bool
{
	$sql = "INSERT INTO articles ( title, content, id_category, id_user) VALUES (:title, :content, :id_category , :id_user)";
	dbQuery($sql, $fields);
	return true;
}
function articleEdit(array $fields, $id): bool
{
	$sql = "UPDATE articles SET title = :title, content = :content, id_category = :id_category WHERE articles.id_article = $id";
	dbQuery($sql, $fields);
	return true;
}
function articleValidate(array &$fields): array
{
	$errors = [];
	$textLen = mb_strlen($fields['content'], 'UTF-8');

	if (mb_strlen($fields['title'], 'UTF-8') < 2) {
		$errors[] = 'Тайтл не короче 2 символов!';
	}

	if ($textLen < 10 || $textLen > 140) {
		$errors[] = 'content от 10 до 140 символов!';
	}

	$fields['title'] = htmlspecialchars($fields['title']);
	$fields['content'] = htmlspecialchars($fields['content']);

	return $errors;
}
