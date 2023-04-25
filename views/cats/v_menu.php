<div class="">
    <ul class="list-group">
        <li class="list-group-item">
            <a href="<?= BASE_URL ?>cats">All category</a>
        </li>
        <? foreach ($categories as $category) : ?>
            <li class="list-group-item">
                <a href="<?= BASE_URL ?>cats/<?= $category['title'] ?>"><?= $category['title'] ?></a>
            </li>
        <? endforeach; ?>
    </ul>
</div>