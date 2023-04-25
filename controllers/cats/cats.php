<?php

$cat = URL_PARAMS['cat'];

$categories = getCategory();
$pageTitle = 'Cats';
if ($cat) {
    $articles = articlesAllForCatTitle($cat);
} else {
    $articles = articlesAll();
}



$left = template('cats/v_menu', [
    'categories' => $categories,
]);
$content = template('cats/v_cats_article', [
    'articles' => $articles
]);

$pageTitle = 'category';
$pageContent = template('base/v_con2col', [
    'left' => $left,
    'content' => $content,
    'title' => 'Articles'
]);
