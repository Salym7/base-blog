<hr>
<div class="articles">
    <? foreach ($articles as $id => $article) : ?>
        <div class="article">
            <h2><?= $article['title'] ?></h2>
            <a href="<?= BASE_URL ?>article/<?= $article['id_article'] ?>">Read more</a>
        </div>
    <? endforeach; ?>
</div>