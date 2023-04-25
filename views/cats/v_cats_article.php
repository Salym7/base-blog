<div class="articles">
    <? foreach ($articles as $id => $article) : ?>
        <div class="article">
            <h4><?= $article['title'] ?></h4>
            <a href="<?= BASE_URL ?>article/<?= $article['id_article'] ?>">
                Read more
            </a>
        </div>
    <? endforeach; ?>
</div>