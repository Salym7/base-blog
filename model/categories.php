<?php
function getCategory(): array
{
	$sql = "SELECT * FROM categories";
	$query = dbQuery($sql);
	return $query->fetchAll();
}

function getCategoryForId($id): array
{
	$sql = "SELECT * FROM categories WHERE id_category = $id";
	$query = dbQuery($sql);
	return $query->fetch();
}


function addCategory(array $fields): bool
{
	$sql = "INSERT INTO categories ( title, description, url ) VALUES (:title, :description , :url)";
	dbQuery($sql, $fields);
	return true;
}

function editCategory(array $fields, int $id): bool
{
	$sql = "UPDATE categories SET title = :title, description = :description, url = :url WHERE categories.id_category = $id";
	dbQuery($sql, $fields);
	return true;
}

function deleteCategory(int $id): bool
{
	$sql = "DELETE FROM categories WHERE categories.id_category = $id";
	dbQuery($sql);
	return true;
}



function categoryValidate(array &$fields): array
{
	$errors = [];
	$textLen = mb_strlen($fields['description'], 'UTF-8');

	if (mb_strlen($fields['title'], 'UTF-8') < 2) {
		$errors[] = 'Тайтл не короче 2 символов!';
	}

	if (mb_strlen($fields['url'], 'UTF-8') < 5) {
		$errors[] = 'url не короче 2 символов!';
	}

	if ($textLen < 10 || $textLen > 140) {
		$errors[] = 'description от 10 до 140 символов!';
	}

	$fields['title'] = htmlspecialchars($fields['title']);
	$fields['description'] = htmlspecialchars($fields['description']);
	$fields['url'] = htmlspecialchars($fields['url']);

	return $errors;
}
