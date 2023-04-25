<?php

$articles = articlesAll();

$pageTitle = 'All article';
$pageContent = template("article/v_index", [
    'articles' => $articles
]);
