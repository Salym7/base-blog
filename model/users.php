<?php

function usersById(string $id): ?array
{
    $sql = "SELECT id_user,login,email,name FROM users WHERE id_user=:id";
    $query = dbQuery($sql, ['id' => $id]);
    $user = $query->fetch();
    return $user === false ? null : $user;
}

function usersOne(string $login): ?array
{
    $sql = "SELECT id_user,password FROM users WHERE login=:login";
    $query = dbQuery($sql, ['login' => $login]);
    $user = $query->fetch();
    return $user === false ? null : $user;
}

$fields = ['login' => '', 'password' => '', 'email' => '', 'name' => ''];

function addUser(array $fields): bool
{
    $sql = "INSERT INTO users (id_user, login, password, email, name) VALUES (NULL, :login, :password, :email, :name)";
    dbQuery($sql, $fields);
    return true;
}

function userValidate(array &$fields): array
{
    $errors = [];
    $textLen = mb_strlen($fields['content'], 'UTF-8');

    if (mb_strlen($fields['login'], 'UTF-8') < 3) {
        $errors[] = 'login не короче 3 символов!';
    }
    if (mb_strlen($fields['password'], 'UTF-8') < 5) {
        $errors[] = 'Password не короче 5 символов!';
    }
    if (mb_strlen($fields['email'], 'UTF-8') < 5) {
        $errors[] = 'Email не короче 5 символов!';
    }
    if (mb_strlen($fields['name'], 'UTF-8') < 3) {
        $errors[] = 'Name не короче 3 символов!';
    }

    $fields['login'] = htmlspecialchars($fields['login']);
    $fields['password'] = htmlspecialchars($fields['password']);
    $fields['email'] = htmlspecialchars($fields['email']);
    $fields['name'] = htmlspecialchars($fields['name']);

    return $errors;
}
